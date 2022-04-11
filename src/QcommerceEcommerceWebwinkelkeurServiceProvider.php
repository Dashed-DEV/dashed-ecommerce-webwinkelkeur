<?php

namespace Qubiqx\QcommerceEcommerceWebwinkelkeur;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Qubiqx\QcommerceEcommerceWebwinkelkeur\Filament\Pages\Settings\WebwinkelkeurSettingsPage;

class QcommerceEcommerceWebwinkelkeurServiceProvider extends PluginServiceProvider
{
    public static string $name = 'qcommerce-ecommerce-webwinkelkeur';

    public function configurePackage(Package $package): void
    {
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

    protected function getPages(): array
    {
        return array_merge(parent::getPages(), [
            WebwinkelkeurSettingsPage::class,
        ]);
    }
}
