<?php

namespace Active;

use Active\Checkers\ExactChecker;
use Active\Checkers\StarChecker;

class Core
{
    public $chckers = [
        ExactChecker::class,
        StarChecker::class,
    ];

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
        foreach ($this->chckers as$value) {
            $checker = new $value();
            if ($checker->check($route, $currentRouteName)) {
                return true;
            }
        }

        return false;
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
