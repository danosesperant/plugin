<?php
// src/Providers/NomDuPackageServiceProvider.php
namespace PluginVoiture\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Helper\STDIN;


class VoitureServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
    public function boot()
    {
        // Charger les migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Charger les vues
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'pluginVoiture');

        // Charger les routes
        $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');

        // Publier les fichiers de configuration
        $this->publishes([
            __DIR__.'/../config/pluginVoiture.php' => config_path('pluginVoiture.php'),
        ]);
        Artisan::call(
            'make:filament-resource',
            [
                'name' => 'Voiture',
                '--force' => true,
            ]
        );
        $sourceFile = base_path('vendor/voiture/plugin-voiture/vendor/Resource/VoitureResource.php');
        $destinationFile = base_path('app/Filament/Resources/VoitureResource.php');
        
        if (File::exists($destinationFile)) {
            File::copy($sourceFile, $destinationFile, true);
        }
        Artisan::call('migrate',['--force' => true]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Enregistrer les configurations
        $this->mergeConfigFrom(
            __DIR__.'/../config/pluginVoiture.php', 'pluginVoiture'
        );
        // $this->app->register(VoitureServiceProvider::class);
    }
}
