<?php

namespace Active;

use Illuminate\Support\Str;

class Core
{
    public function active($route, $class = null)
    {
        $class = $class ?? config('active.class') ?? 'active';
        $currentRouteName = app('router')->current()->getName();

        if (is_array($route)) {
            return $this->arrayHandler($route, $currentRouteName, $class);
        }

        return $this->matches($route, $currentRouteName) ? $class : '';
    }

    public function matches($route, $currentRouteName)
    {
        if ($route == '*') {
            return true;
        }

        if (Str::endsWith($route, '*')) {
            $start_with = Str::replaceLast('*', '', $route);

            return Str::startsWith($currentRouteName, $start_with);
        }

        return $route == $currentRouteName;
    }

    public function arrayHandler($routes, $currentRouteName, $class)
    {
        foreach ($routes as $route) {
            if ($this->matches($route, $currentRouteName)) {
                return $class;
            }
        }

        return '';
    }
}
