<?php

namespace Dashed\DashedEcommerceWebwinkelkeur;

use Filament\PluginServiceProvider;
use Dashed\DashedEcommerceWebwinkelkeur\Filament\Pages\Settings\WebwinkelkeurSettingsPage;
use Spatie\LaravelPackageTools\Package;

class DashedEcommerceWebwinkelkeurServiceProvider extends PluginServiceProvider
{
    public static string $name = 'dashed-ecommerce-webwinkelkeur';

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
            ->name('dashed-ecommerce-webwinkelkeur');
    }

    protected function getPages(): array
    {
        return array_merge(parent::getPages(), [
            WebwinkelkeurSettingsPage::class,
        ]);
    }
}
