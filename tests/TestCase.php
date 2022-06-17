<?php

namespace Active\Tests;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Active\ServiceProvider::class,
        ];
    }

    /**
     * Override application aliases.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Active' => Active\Facade::class,
        ];
    }

    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Define environment setup.
     */
    protected function defineEnvironment($app)
    {
        $app['config']->set('active.class', 'open');
    }
}
