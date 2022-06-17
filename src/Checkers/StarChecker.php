<?php

namespace Active\Checkers;

use Illuminate\Support\Str;

class StarChecker implements Checker
{
    public function check($route, $currentRouteName)
    {
        if ($route == '*') {
            return true;
        }
        if (Str::endsWith($route, '*')) {
            $start_with = Str::replaceLast('*', '', $route);

            return Str::startsWith($currentRouteName, $start_with);
        }

        return false;
    }
}
