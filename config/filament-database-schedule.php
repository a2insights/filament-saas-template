<?php

// config for HusamTariq/FilamentDatabaseSchedule

use HusamTariq\FilamentDatabaseSchedule\Filament\Resources\Schedules\ScheduleResource;
use HusamTariq\FilamentDatabaseSchedule\Models\Schedule;
use Illuminate\Support\Str;

return [
    /**
     *  Table and Model used for schedule list
     */
    'table' => [
        'schedules' => 'schedules',
        'schedule_histories' => 'schedule_histories'
    ],
    'model' => Schedule::class,

    'timezone' => env('FILAMENT_SCHEDULE_TIMEZONE', config('app.timezone')),

    'resources' =>
        [
            ScheduleResource::class,
        ],

    /**
     * Cache settings
     */
    'cache' => [
        'store' => env('FILAMENT_SCHEDULE_CACHE_DRIVER', 'file'),
        'key' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_schedule_'),
        'enabled' => env('FILAMENT_SCHEDULE_CACHE_ENABLE', !config('app.debug')),
    ],

    /**
     * Route settings
     */
    'route_slug' => 'schedules',

    'default_ordering' => 'created_at',
    'default_ordering_direction' => 'DESC',

    /**
     * Resource navigation icon
     */
    "navigation_icon" => 'heroicon-o-rectangle-stack',

    /**
     * When opening history, is output collapsed
     */
    'history_collapsed' => env('FILAMENT_SCHEDULE_HISTORY_COLLAPSED', false),

    /**
     * How many jobs do you want to have on each page ?
     */
    'per_page' => 10,

    /**
     * Commands settings
     */
    'commands' => [

        'enable_custom' => true,
        /**
         * By default, all commands possible to be used with "php artisan" will be shown, this parameter excludes from
         * the list commands that you do not want to show for the schedule.
         */
        'exclude' => [ //regex
            'help',
            'list',
            'test',
            'down',
            'up',
            'env',
            'serve',
            'tinker',
            'clear-compiled',
            'key:generate',
            'package:discover',
            'storage:link',
            'notifications:table',
            'session:table',
            'stub:publish',
            'vendor:publish',
            'route:*',
            'event:*',
            'migrate:*',
            'cache:*',
            'auth:*',
            'config:*',
            'db:*',
            'optimize*',
            'make:*',
            'queue:*',
            'schedule:*',
            'view:*',
            'phpunit:*'
        ],
        /**
         * Alternatively, you can set the "show_supported_only" parameter to true to only allow commands
         * that are in the supported list.
         */
        "show_supported_only" => false,
        "supported" => [
            //ex."erp:*"
        ],
    ],


    'tool-help-cron-expression' => [
        'enable' => true,
        'url' => 'https://crontab.cronhub.io/'
    ]
];
