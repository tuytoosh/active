<?php

if (!function_exists('active')) {
    function active($route, $class = null): string
    {
        return app(\Active\Core::class)->active($route, $class);
    }
}

if (!function_exists('isActive')) {
    function isActive($route, $class = null): bool
    {
        return active($route, $class) == ($class ?? config('active.class') ?? 'active');
    }
}
