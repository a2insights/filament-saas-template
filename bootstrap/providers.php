<?php

use App\Providers\AppServiceProvider;
use App\Providers\Filament\SysadminPanelServiceProvider;
use App\Providers\Filament\TenantPanelServiceProvider;

return [
    AppServiceProvider::class,
    SysadminPanelServiceProvider::class,
    TenantPanelServiceProvider::class,
];
