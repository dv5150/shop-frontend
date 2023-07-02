<?php

namespace DV5150\Shop\Frontend;

use DV5150\Shop\Frontend\Console\Commands\InstallCommand;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ShopFrontendServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('shop')
            ->hasViews()
            ->hasAssets()
            ->hasCommand(InstallCommand::class);
    }

    public function register()
    {
        $this->registerRoutes();

        parent::register();
    }

    public function boot()
    {
        parent::boot();

        $this->publishes([
            $this->getPath('resources/js/components') => resource_path('js/components/shop')
        ], 'shop-vue');
    }

    protected function registerRoutes(): void
    {
        Route::middleware('web')
            ->as('shop.')
            ->group($this->getPath('routes/shop.php'));
    }

    protected function getPath(?string $target = null): string
    {
        return __DIR__ . "/../$target";
    }
}