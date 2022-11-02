<?php

if (!function_exists('active')) {
    function active($route, $class = null)
    {
        return app(\Active\Core::class)->active($route, $class);
    }
}
