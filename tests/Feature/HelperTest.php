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
    public function active_helper_test_is_ok()
    {
        Route::shouldReceive('current')->andReturnSelf();
        Route::shouldReceive('getName')->andReturn('home');
        $this->assertEquals('active', active(['home', 'about'], 'active'));
        $this->assertEquals('', active([], 'active'));
        $this->assertEquals('active', active(['test', 'hom*'], 'active'));
        $this->assertEquals('', active(['test', 'test*'], 'active'));
    }

    /** @test */
    public function is_active_helper_test_is_ok()
    {
        Route::shouldReceive('current')->andReturnSelf();
        Route::shouldReceive('getName')->andReturn('home');
        // $this->assertTrue(isActive(['home', 'about'], 'active'));
        // $this->assertFalse(isActive([], 'active'));
        // $this->assertTrue(isActive(['test', 'hom*'], 'active'));
        // $this->assertFalse(isActive(['test', 'test*'], 'active'));
        $this->assertTrue(isActive(['home']));
    }
}
