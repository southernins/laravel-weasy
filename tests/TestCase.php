<?php

namespace SouthernIns\LaravelWeasy\Tests;

use SouthernIns\LaravelWeasy\Facades\WeasyPdf;
use SouthernIns\LaravelWeasy\ServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Support\Facades\View;

abstract class TestCase extends OrchestraTestCase
{
    protected function setUp() : void
    {
        parent::setUp();

//        dd( __DIR__.'/views' );

        View::addLocation(__DIR__.'/views');
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return string[]
     */
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return string[]
     */
    protected function getPackageAliases($app)
    {
        return [
            'PDF' => WeasyPdf::class,
        ];
    }
}
