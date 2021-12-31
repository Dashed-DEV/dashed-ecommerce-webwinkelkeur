<?php

namespace Qubiqx\QcommerceEcommerceWebwinkelkeur;

use Filament\PluginServiceProvider;
use Qubiqx\QcommerceEcommerceWebwinkelkeur\Filament\Pages\Settings\WebwinkelkeurSettingsPage;
use Spatie\LaravelPackageTools\Package;

class QcommerceEcommerceWebwinkelkeurServiceProvider extends PluginServiceProvider
{
    public static string $name = 'qcommerce-ecommerce-webwinkelkeur';

    public function configurePackage(Package $package): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        cms()->builder(
            'settingPages',
            array_merge(cms()->builder('settingPages'), [
                'webwinkelkeur' => [
                    'name' => 'Webwinkelkeur',
                    'description' => 'Laat je klanten een review schrijven na een bestelling',
                    'icon' => 'chat-alt-2',
                    'page' => WebwinkelkeurSettingsPage::class,
                ],
            ])
        );

        $package
            ->name('qcommerce-ecommerce-webwinkelkeur');
    }

//    protected function getStyles(): array
//    {
//        return array_merge(parent::getStyles(), []);
//    }
//
    protected function getPages(): array
    {
        return array_merge(parent::getPages(), [
            WebwinkelkeurSettingsPage::class,
        ]);
    }

//    protected function getResources(): array
//    {
//        return array_merge(parent::getResources(), []);
//    }
//
//    protected function getWidgets(): array
//    {
//        return array_merge(parent::getWidgets(), []);
//    }
}
