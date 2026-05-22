import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/filament/sysadmin/theme.css',
                'resources/css/filament/brisk/theme.css',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/filament/aberdeen/theme.css',
                'resources/css/filament/inverness/theme.css',
                'resources/css/filament/edinburgh/theme.css',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
                'app/Filament/**',
                'app/Forms/Components/**',
                'app/Livewire/**',
                'app/Infolists/Components/**',
                'app/Providers/Filament/**',
                'app/Tables/Columns/**',
                'resources/css/filament/sysadmin/theme.css',
            ],
        }),
        tailwindcss(),
    ],
    build: {
        chunkSizeWarningLimit: 2500,
    },
})
