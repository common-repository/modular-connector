<?php

namespace Modular\ConnectorDependencies;

return ['debug' => \defined('WP_DEBUG') ? \WP_DEBUG : \true, 'env' => \defined('Modular\\ConnectorDependencies\\WP_ENV') ? \Modular\ConnectorDependencies\WP_ENV : \Modular\ConnectorDependencies\env('WP_ENV', 'production'), 'controllers' => ['namespace' => 'App\\Http\\Controllers\\', 'path' => \Modular\ConnectorDependencies\base_path('app/Http/Controllers')], 'console' => ['namespace' => 'Modular\\ConnectorDependencies\\App\\Console\\Commands', 'path' => \Modular\ConnectorDependencies\base_path('app/Console/commands')], 'storage' => ['path' => \Modular\ConnectorDependencies\base_path('storage/app/store')], 'cache' => ['path' => \Modular\ConnectorDependencies\base_path('bootstrap/cache')], 'timezone' => \Modular\ConnectorDependencies\env('APP_TIMEZONE', 'UTC'), 'providers' => [Illuminate\Filesystem\FilesystemServiceProvider::class, Illuminate\Database\DatabaseServiceProvider::class, Illuminate\Validation\ValidationServiceProvider::class, Illuminate\View\ViewServiceProvider::class], 'aliases' => ['Artisan' => Illuminate\Support\Facades\Artisan::class, 'Storage' => Illuminate\Support\Facades\Storage::class, 'Validator' => Illuminate\Support\Facades\Validator::class, 'View' => Illuminate\Support\Facades\View::class]];
