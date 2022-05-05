<?php

namespace Active;

class Core
{
    // TODO:: add regex for route patterns
    public function active($route, $class = null) {
        $currentRouteName = app('router')->current()->getName();
        if ($route == $currentRouteName){
            return $class ?? config('active.class');
        }
        return '';
    }

}
