<?php

namespace Dashed\DashedEcommerceWebwinkelkeur;

use Dashed\DashedEcommerceWebwinkelkeur\Filament\Pages\Settings\WebwinkelkeurSettingsPage;
use Filament\Contracts\Plugin;
use Filament\Panel;

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
