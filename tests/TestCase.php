<?php

namespace Dashed\DashedEcommerceWebwinkelkeur\Tests;

use Dashed\DashedEcommerceWebwinkelkeur\DashedEcommerceWebwinkelkeurServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Dashed\\DashedEcommerceWebwinkelkeur\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            DashedEcommerceWebwinkelkeurServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_dashed-ecommerce-webwinkelkeur_table.php.stub';
        $migration->up();
        */
    }
}
