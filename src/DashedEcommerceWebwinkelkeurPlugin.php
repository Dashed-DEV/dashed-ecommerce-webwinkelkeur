<?php

namespace Dashed\DashedEcommerceWebwinkelkeur;

use Filament\Panel;
use Filament\Contracts\Plugin;
use Dashed\DashedEcommerceWebwinkelkeur\Filament\Pages\Settings\WebwinkelkeurSettingsPage;

class DashedEcommerceWebwinkelkeurPlugin implements Plugin
{
    public function getId(): string
    {
        return 'dashed-ecommerce-webwinkelkeur';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->pages([
                WebwinkelkeurSettingsPage::class,
            ]);
    }

    public function boot(Panel $panel): void
    {

    }
}
