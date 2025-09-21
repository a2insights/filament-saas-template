<?php

namespace App\Providers\Filament;

use A2Insights\FilamentSaas\Features\FeaturesPlugin;
use A2Insights\FilamentSaas\Settings\Http\Middleware\Locale;
use A2Insights\FilamentSaas\Settings\SettingsPlugin;
use A2Insights\FilamentSaas\System\SystemPlugin;
use A2Insights\FilamentSaas\User\Filament\Components\Phone;
use A2Insights\FilamentSaas\User\Filament\Components\Username;
use A2Insights\FilamentSaas\User\Filament\UserResource;
use A2Insights\FilamentSaas\User\UserPlugin;
use Awcodes\QuickCreate\QuickCreatePlugin;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Enums\Platform;
use HusamTariq\FilamentDatabaseSchedule\FilamentDatabaseSchedulePlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Kenepa\Banner\BannerPlugin;
use Marjose123\FilamentWebhookServer\WebhookPlugin;
use pxlrbt\FilamentEnvironmentIndicator\EnvironmentIndicatorPlugin;
use pxlrbt\FilamentSpotlight\SpotlightPlugin;
use SolutionForest\FilamentFirewall\FilamentFirewallPlugin;

class SysadminPanelServiceProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('sysadmin')
            ->homeUrl('/')
            ->path('sysadmin')
            ->authGuard('web')
            ->login()
            ->passwordReset()
            ->emailVerification()
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->unsavedChangesAlerts()
            ->viteTheme('resources/css/filament/sysadmin/theme.css')
            ->pages([
                Dashboard::class,
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
            ->plugins([
                BannerPlugin::make()->persistsBannersInDatabase(),
                QuickCreatePlugin::make()
                    ->includes([
                        UserResource::class,
                    ]),
                SpotlightPlugin::make(),
                FilamentShieldPlugin::make()->registerNavigation(false),
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                        shouldRegisterNavigation: false, // Adds a main navigation item for the My Profile page (default = false)
                        hasAvatars: true, // Enables the avatar upload form component (default = false)
                        slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')
                    )->enableTwoFactorAuthentication(
                        force: false, // force the user to enable 2FA before they can use the application (default = false)
                        // action: CustomTwoFactorPage::class // optionally, use a custom 2FA page
                    )
                    // TODO: Disable becouse we cant disable from features settings
                    // ->enableSanctumTokens(
                    //     permissions: ['create', 'update', 'view', 'delete'] // optional, customize the permissions (default = ["create", "view", "update", "delete"])
                    // )
                    ->myProfileComponents([Phone::class, Username::class])
                    ->avatarUploadComponent(fn ($fileUpload) => $fileUpload
                        ->visibility('private')
                        ->directory('avatars')
                        ->disk('avatars')),
                WebhookPlugin::make(),
                FilamentDatabaseSchedulePlugin::make(),
                FilamentFirewallPlugin::make(),
                EnvironmentIndicatorPlugin::make(),
                UserPlugin::make(),
                FeaturesPlugin::make(),
                SettingsPlugin::make(),
                SystemPlugin::make(),
            ])
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                Locale::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->globalSearchFieldSuffix(fn (): ?string => match (Platform::detect()) {
                Platform::Windows, Platform::Linux => 'CTRL+K',
                Platform::Mac => '⌘K',
                default => null,
            });
    }
}
