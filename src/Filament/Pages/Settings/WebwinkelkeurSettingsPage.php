<?php

namespace Qubiqx\QcommerceEcommerceWebwinkelkeur\Filament\Pages\Settings;

use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Tabs\Tab;
use Qubiqx\QcommerceCore\Classes\Sites;
use Filament\Forms\Components\Placeholder;
use Qubiqx\QcommerceCore\Models\Customsetting;
use Filament\Forms\Concerns\InteractsWithForms;
use Qubiqx\QcommerceEcommerceWebwinkelkeur\Classes\Webwinkelkeur;

class WebwinkelkeurSettingsPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $title = 'Webwinkelkeur';

    protected static string $view = 'qcommerce-core::settings.pages.default-settings';

    public function mount(): void
    {
        $formData = [];
        $sites = Sites::getSites();
        foreach ($sites as $site) {
            $formData["webwinkelkeur_client_id_{$site['id']}"] = Customsetting::get('webwinkelkeur_client_id', $site['id'], 'same');
            $formData["webwinkelkeur_auth_token_{$site['id']}"] = Customsetting::get('webwinkelkeur_auth_token', $site['id'], 'order');
            $formData["webwinkelkeur_connected_{$site['id']}"] = Customsetting::get('webwinkelkeur_connected', $site['id'], 0);
            $formData["webwinkelkeur_connection_error_{$site['id']}"] = Customsetting::get('webwinkelkeur_connection_error', $site['id'], '');
        }

        $this->form->fill($formData);
    }

    protected function getFormSchema(): array
    {
        $sites = Sites::getSites();
        $tabGroups = [];

        $tabs = [];
        foreach ($sites as $site) {
            $schema = [
                Placeholder::make('label')
                    ->label("Webwinkelkeur voor {$site['name']}")
                    ->content('Activeer webwinkelkeur zodat de klanten automatisch een mail krijgen om een review achter te laten.')
                    ->columnSpan([
                        'default' => 1,
                        'lg' => 2,
                    ]),
                Placeholder::make('label')
                    ->label("Webwinkelkeur is " . (!Customsetting::get('webwinkelkeur_connected', $site['id'], 0) ? 'niet' : '') . ' geconnect')
                    ->content(Customsetting::get('webwinkelkeur_connection_error', $site['id'], ''))
                    ->columnSpan([
                        'default' => 1,
                        'lg' => 2,
                    ]),
                TextInput::make("webwinkelkeur_client_id_{$site['id']}")
                    ->label('Webwinkelkeur Client ID')
                    ->rules([
                        'max:255',
                    ]),
                TextInput::make("webwinkelkeur_auth_token_{$site['id']}")
                    ->label('Webwinkelkeur Auth Token')
                    ->rules([
                        'max:255',
                    ]),
            ];

            $tabs[] = Tab::make($site['id'])
                ->label(ucfirst($site['name']))
                ->schema($schema)
                ->columns([
                    'default' => 1,
                    'lg' => 2,
                ]);
        }
        $tabGroups[] = Tabs::make('Sites')
            ->tabs($tabs);

        return $tabGroups;
    }

    public function submit()
    {
        $sites = Sites::getSites();

        foreach ($sites as $site) {
            Customsetting::set('webwinkelkeur_client_id', $this->form->getState()["webwinkelkeur_client_id_{$site['id']}"], $site['id']);
            Customsetting::set('webwinkelkeur_auth_token', $this->form->getState()["webwinkelkeur_auth_token_{$site['id']}"], $site['id']);
            Customsetting::set('webwinkelkeur_connected', Webwinkelkeur::isConnected($site['id']), $site['id']);
        }

        $this->notify('success', 'De Webwinkelkeur instellingen zijn opgeslagen');
        return redirect(WebwinkelkeurSettingsPage::getUrl());
    }
}
