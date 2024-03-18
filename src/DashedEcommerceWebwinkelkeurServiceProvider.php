<?php

namespace Dashed\DashedEcommerceWebwinkelkeur;

<<<<<<< HEAD
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Dashed\DashedEcommerceWebwinkelkeur\Filament\Pages\Settings\WebwinkelkeurSettingsPage;
=======
use Dashed\DashedEcommerceWebwinkelkeur\Filament\Pages\Settings\WebwinkelkeurSettingsPage;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
>>>>>>> filamentv3

class DashedEcommerceWebwinkelkeurServiceProvider extends PackageServiceProvider
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
                    'icon' => 'chat-bubble-left-ellipsis',
                    'page' => WebwinkelkeurSettingsPage::class,
                ],
            ])
        );

        $package
            ->name('dashed-ecommerce-webwinkelkeur');
    }
}
