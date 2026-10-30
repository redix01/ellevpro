#!/bin/bash
# Run by cPanel "Deploy HEAD Commit" via .cpanel.yml. Safe to re-run.
# Host quirks this works around:
#  - putenv()/phpinfo() are disabled, so PHP runs with disable_functions cleared
#  - symlinks are not served, so public/ is copied into public_html
#  - the main domain's docroot can't move off public_html
set -euo pipefail

APP="$(cd "$(dirname "$0")/.." && pwd)"
WEB="$HOME/public_html"
PHP="/opt/cpanel/ea-php84/root/usr/bin/php -d disable_functions="
COMPOSER="$HOME/bin/composer.phar"
DATA="$HOME/ellevpro-data"
DB="$DATA/database.sqlite"

cd "$APP"

# Writable dirs Laravel needs (not all are tracked in git)
mkdir -p bootstrap/cache storage/logs storage/app/public \
    storage/framework/{cache/data,sessions,views}
chmod -R u+rwX,g+rX bootstrap/cache storage

# SQLite lives outside the git tree so pulls never conflict with live data.
# First deploy seeds it from the committed copy.
mkdir -p "$DATA"
if [ ! -f "$DB" ]; then
    if [ -f caregpov_ellev8 ]; then cp caregpov_ellev8 "$DB"; else touch "$DB"; fi
    chmod 600 "$DB"
fi

# Composer (downloaded directly: the installer needs phpinfo())
if [ ! -f "$COMPOSER" ]; then
    mkdir -p "$HOME/bin"
    curl -fsSL https://getcomposer.org/download/latest-stable/composer.phar -o "$COMPOSER"
fi
export COMPOSER_HOME="$HOME/.composer"
$PHP "$COMPOSER" install --no-dev --optimize-autoloader --no-interaction --prefer-dist --no-scripts
$PHP artisan package:discover --ansi

# .env: created once, never overwritten (holds the live secrets)
if [ ! -f .env ]; then
    cp .env.example .env
    sed -i \
        -e 's|^APP_NAME=.*|APP_NAME="Elleven8"|' \
        -e 's|^APP_ENV=.*|APP_ENV=production|' \
        -e 's|^APP_DEBUG=.*|APP_DEBUG=false|' \
        -e 's|^APP_URL=.*|APP_URL=http://www.elleven8.us|' \
        -e "s|^DB_CONNECTION=.*|DB_CONNECTION=sqlite\nDB_DATABASE=$DB|" \
        -e 's|^LOG_LEVEL=.*|LOG_LEVEL=error|' \
        .env
    $PHP artisan key:generate --force
fi

$PHP artisan migrate --force
$PHP artisan config:cache
$PHP artisan view:cache

# Uploads: public_html/storage is a real dir; storage/app/public points at it
# (PHP follows symlinks, Apache here does not).
if [ ! -L "$APP/storage/app/public" ]; then
    mkdir -p "$WEB/storage"
    cp -a "$APP/storage/app/public/." "$WEB/storage/"
    rm -rf "$APP/storage/app/public"
    ln -s "$WEB/storage" "$APP/storage/app/public"
fi

# Copy public/ into public_html, then re-point the front controller at ../ellevpro
for f in "$APP"/public/*; do
    n=$(basename "$f")
    case "$n" in index.php|storage|error_log) continue;; esac
    cp -a "$f" "$WEB/"
done
sed -e "s#__DIR__.'/../#__DIR__.'/../ellevpro/#g" \
    -e "s#->handleRequest(#->usePublicPath(__DIR__)\n    ->handleRequest(#" \
    "$APP/public/index.php" > "$WEB/index.php"
