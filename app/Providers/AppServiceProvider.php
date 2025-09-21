<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\ConnectedAccount;
use App\Models\User;
use App\Policies\CompanyPolicy;
use App\Policies\ConnectedAccountPolicy;
use App\Policies\IpPolicy;
use App\Policies\RolePolicy;
use App\Policies\SchedulePolicy;
use App\Policies\UserPolicy;
use App\Policies\WebhookPolicy;
use HusamTariq\FilamentDatabaseSchedule\Models\Schedule;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Marjose123\FilamentWebhookServer\Models\FilamentWebhookServer;
use SolutionForest\FilamentFirewall\Models\Ip;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Relation::morphMap([
            'user' => User::class,
            'company' => Company::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Filament Company
        Gate::policy(Company::class, CompanyPolicy::class);
        Gate::policy(ConnectedAccount::class, ConnectedAccountPolicy::class);

        // Filament Shield
        Gate::policy(Role::class, RolePolicy::class);

        // Filament Saas
        Gate::policy(User::class, UserPolicy::class);

        // Filament Database Schedule
        Gate::policy(FilamentWebhookServer::class, WebhookPolicy::class);

        // Filament Firewall
        Gate::policy(Ip::class, IpPolicy::class);

        // Filament Database Schedule
        Gate::policy(Schedule::class, SchedulePolicy::class);
    }
}
