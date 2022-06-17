<?php

namespace Active\Checkers;

interface Checker
{
    public function check($route, $currentRouteName);
}
