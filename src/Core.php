<?php

namespace Active;
use Illuminate\Support\Str;
class Core
{
    public function active($route, $class = null)
    {
        $class = $class ?? config('active.class') ?? 'active';

        if ($route == '*') {
            return $class;
        }

        $currentRouteName = app('router')->current()->getName();
        if (Str::endsWith($route, "*")) {
            $start_with = Str::replaceLast("*", "", $route);
            return Str::startsWith($currentRouteName, $start_with) ? $class : "";
        }
        return $route == $currentRouteName ? $class : "";
    }
}
