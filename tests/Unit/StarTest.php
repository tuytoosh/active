<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class StarTest extends TestCase
{
    public function test_it_detects_star_routes()
    {
        $checker = new \Active\Checkers\StarChecker();
        $this->assertTrue($checker->check('*', 'home'));
        $this->assertTrue($checker->check('*', 'about'));
        $this->assertTrue($checker->check('*', 'contact'));
    }

    public function test_it_detects_star_routes_with_prefix()
    {
        $checker = new \Active\Checkers\StarChecker();
        $this->assertTrue($checker->check('admin/*', 'admin/home'));
        $this->assertTrue($checker->check('admin/*', 'admin/about'));
        $this->assertTrue($checker->check('admin/*', 'admin/contact'));
    }
}
