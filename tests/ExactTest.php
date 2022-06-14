<?php

namespace Active\Tests;

use Active\Core;
use Active\Facade;
use Illuminate\Support\Facades\Route;

class ExactTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Route::shouldReceive('current')->andReturnSelf();
        Route::shouldReceive('getName')->andReturn('home');
    }

    /** @test */
    public function it_can_be_instantiated()
    {
        $this->assertInstanceOf(Core::class, app('active'));
    }

    /** @test */
    public function facade_is_accessible()
    {
        $this->assertEquals('open', Facade::active('home'));
    }

    /** @test */
    public function activated_class_from_config()
    {
        $this->assertEquals('open', config('active.class'));
        $this->assertEquals('open', app('active')->active('home'));
    }

    /** @test */
    public function active_from_argument_is_preferred()
    {
        $this->assertEquals('open', app('active')->active('home', 'open'));
    }

    /** @test */
    public function when_config_is_missing()
    {
        app()['config']->set('active.class', null);
        $this->assertEquals('active', app('active')->active('home'));
    }
}
