<?php

namespace Active\Tests;

use Illuminate\Support\Facades\Route;

class StarTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Route::shouldReceive('current')->andReturnSelf();
        Route::shouldReceive('getName')->andReturn('admin.post.index');
    }

    /** @test */
    public function single_star_is_activated()
    {
        $this->assertEquals('open', app('active')->active('*'));
    }

    /** @test */
    public function ends_with_star_is_activated()
    {
        $this->assertEquals('open', app('active')->active('admin.*'));
        $this->assertEquals('is-active', app('active')->active('admin.*', 'is-active'));
    }
}
