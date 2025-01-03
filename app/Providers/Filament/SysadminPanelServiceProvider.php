<?php

namespace App\Providers\Filament;

use A2Insights\FilamentSaas\User\Filament\Components\Phone;
use A2Insights\FilamentSaas\User\Filament\Components\Username;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

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
            // ->registration(\A2Insights\FilamentSaas\User\Filament\Pages\Register::class)
            ->passwordReset()
            ->emailVerification()
            ->profile()
            ->sidebarCollapsibleOnDesktop()
            // ->sidebarFullyCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->unsavedChangesAlerts()
            ->resources([
                config('filament-logger.activity_resource'),
            ])
            ->pages([
                Pages\Dashboard::class,
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
            ->plugins([
                \Awcodes\FilamentQuickCreate\QuickCreatePlugin::make()
                    ->includes([
                        \A2Insights\FilamentSaas\User\Filament\UserResource::class,
                    ]),
                \pxlrbt\FilamentSpotlight\SpotlightPlugin::make(),
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
                \CmsMulti\FilamentClearCache\FilamentClearCachePlugin::make(),
                \Brickx\MaintenanceSwitch\MaintenanceSwitchPlugin::make(),
                \Jeffgreco13\FilamentBreezy\BreezyCore::make()
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
                    ->myProfileComponents([Phone::class, Username::class]),
                \Hasnayeen\Themes\ThemesPlugin::make()->canViewThemesPage(fn () => auth()->user() ? auth()->user()->hasRole('super_admin') : false),
                \Marjose123\FilamentWebhookServer\WebhookPlugin::make(),
                \HusamTariq\FilamentDatabaseSchedule\FilamentDatabaseSchedulePlugin::make(),
                \SolutionForest\FilamentFirewall\FilamentFirewallPanel::make(),
                \pxlrbt\FilamentEnvironmentIndicator\EnvironmentIndicatorPlugin::make(),
                \BezhanSalleh\FilamentExceptions\FilamentExceptionsPlugin::make(),
                \Croustibat\FilamentJobsMonitor\FilamentJobsMonitorPlugin::make()
                    ->label('Job')
                    ->pluralLabel('Jobs')
                    ->enableNavigation(true)
                    ->navigationIcon('heroicon-o-cpu-chip')
                    ->navigationGroup('System')
                    ->navigationSort(5)
                    ->navigationCountBadge(true)
                    ->enablePruning(true)
                    ->pruningRetention(7),
                \A2Insights\FilamentSaas\User\UserPlugin::make(),
                \A2Insights\FilamentSaas\Features\FeaturesPlugin::make(),
                \A2Insights\FilamentSaas\Settings\SettingsPlugin::make(),
                \A2Insights\FilamentSaas\System\SystemPlugin::make(),
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
                \Hasnayeen\Themes\Http\Middleware\SetTheme::class,
                \A2Insights\FilamentSaas\Settings\Http\Middleware\Locale::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                \Cog\Laravel\Ban\Http\Middleware\ForbidBannedUser::class,
            ]);
    }
}
