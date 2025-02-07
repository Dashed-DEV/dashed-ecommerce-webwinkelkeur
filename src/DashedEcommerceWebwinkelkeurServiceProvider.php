<?php

namespace Dashed\DashedEcommerceWebwinkelkeur;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Dashed\DashedEcommerceWebwinkelkeur\Filament\Pages\Settings\WebwinkelkeurSettingsPage;

class DashedEcommerceWebwinkelkeurServiceProvider extends PackageServiceProvider
{
    public static string $name = 'dashed-ecommerce-webwinkelkeur';

    public function configurePackage(Package $package): void
    {
        cms()->registerSettingsPage(WebwinkelkeurSettingsPage::class, 'Webwinkelkeur', 'chat-bubble-left-ellipsis', 'Koppel Webwinkelkeur');

        $package
            ->name('dashed-ecommerce-webwinkelkeur');

        cms()->builder('plugins', [
            new DashedEcommerceWebwinkelkeurPlugin(),
        ]);
    }
}
