<?php

namespace Active\Checkers;

class ExactChecker implements Checker
{
    public function check($route, $currentRouteName)
    {
        return $route == $currentRouteName;
    }
}
