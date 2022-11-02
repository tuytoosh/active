<?php

namespace Active\Tests\Feature;

use Active\Tests\TestCase;
use Illuminate\Support\Facades\Route;

class HelperTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function helper_test_is_ok()
    {
        Route::shouldReceive('current')->andReturnSelf();
        Route::shouldReceive('getName')->andReturn('home');
        $this->assertEquals('active', active(['home', 'about'], 'active'));
        $this->assertEquals('', active([], 'active'));
        $this->assertEquals('active', active(['test', 'hom*'], 'active'));
        $this->assertEquals('', active(['test', 'test*'], 'active'));
    }
}
