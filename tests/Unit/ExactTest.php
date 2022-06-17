<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExactTest extends TestCase
{
    public function test_it_detects_exact_routes()
    {
        $checker = new \Active\Checkers\ExactChecker();
        $this->assertTrue($checker->check('home', 'home'));
        $this->assertFalse($checker->check('home', 'about'));
    }
}
