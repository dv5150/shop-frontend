<?php

namespace DV5150\Shop\Frontend;

use DV5150\Shop\Frontend\Console\Commands\InstallCommand;
use DV5150\Shop\Frontend\Contracts\ProductListComposerServiceContract;
use DV5150\Shop\Frontend\Services\ProductListComposerService;
use DV5150\Shop\Frontend\View\Composers\ProductListComposer;
use Illuminate\Support\Facades\App;
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
            ->hasViewComposer(
                'shop::partials.productList',
                ProductListComposer::class,
            )->hasCommand(InstallCommand::class);
    }

    public function register()
    {
        $this->registerBindings();

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

    protected function registerBindings(): void
    {
        App::bind(ProductListComposerServiceContract::class, fn () => new ProductListComposerService());
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