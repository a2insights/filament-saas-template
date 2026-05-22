<?php

use A2Insights\FilamentSaas\User\Filament\UserResource;
use App\Models\Company;
use App\Models\User;

return [
    'users' => [
        'model' => User::class,
        'resource' => UserResource::class,
        'tenant_scope' => false,
    ],

    'companies' => [
        'model' => Company::class,
    ],

    'robots_allowed_domains' => [
        'localhost',
    ],
];
