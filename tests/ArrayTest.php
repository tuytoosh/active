<?php

namespace Active\Tests;

use Illuminate\Support\Facades\Route;

class ArrayTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Route::shouldReceive('current')->andReturnSelf();
        Route::shouldReceive('getName')->andReturn('home');
    }

    /** @test */
    public function it_can_handle_arrays()
    {
        Route::shouldReceive('current')->andReturnSelf();
        Route::shouldReceive('getName')->andReturn('home');
        $this->assertEquals('active', app('active')->active(['home', 'about'], 'active'));
        $this->assertEquals('', app('active')->active([], 'active'));
        $this->assertEquals('active', app('active')->active(['test', 'hom*'], 'active'));
        $this->assertEquals('', app('active')->active(['test', 'test*'], 'active'));
    }
}
