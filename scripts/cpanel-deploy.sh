#!/bin/bash
# Run by cPanel "Deploy HEAD Commit" via .cpanel.yml. Safe to re-run.
set -euo pipefail

APP="$(cd "$(dirname "$0")/.." && pwd)"
PHP=/opt/cpanel/ea-php84/root/usr/bin/php
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

# Composer
if [ ! -f "$COMPOSER" ]; then
    mkdir -p "$HOME/bin"
    curl -sS https://getcomposer.org/installer | "$PHP" -- --install-dir="$HOME/bin" --filename=composer.phar
fi
COMPOSER_HOME="$HOME/.composer" "$PHP" "$COMPOSER" install \
    --no-dev --optimize-autoloader --no-interaction --prefer-dist

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
    "$PHP" artisan key:generate --force
fi

"$PHP" artisan migrate --force
"$PHP" artisan storage:link 2>/dev/null || true
"$PHP" artisan config:cache
"$PHP" artisan view:cache
