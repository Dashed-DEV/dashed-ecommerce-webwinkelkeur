<?php

namespace Qubiqx\QcommerceEcommerceWebwinkelkeur;

use Qubiqx\QcommerceEcommerceWebwinkelkeur\Commands\QcommerceEcommerceWebwinkelkeurCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class QcommerceEcommerceWebwinkelkeurServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('qcommerce-ecommerce-webwinkelkeur')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_qcommerce-ecommerce-webwinkelkeur_table')
            ->hasCommand(QcommerceEcommerceWebwinkelkeurCommand::class);
    }
}
