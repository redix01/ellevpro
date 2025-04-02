<?php

namespace App\Helpers;

use Jenssegers\Agent\Agent;

class UserAgentParser
{
    public static function getBrowser($userAgent)
    {
        $agent = new Agent();
        $agent->setUserAgent($userAgent);

        return $agent->browser();
    }

    public static function getOS($userAgent)
    {
        $agent = new Agent();
        $agent->setUserAgent($userAgent);

        return $agent->platform();
    }
}
