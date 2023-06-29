<?php

namespace DV5150\Shop\Frontend\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'shop:install:frontend';

    protected $description = 'Install the webshop package frontend assets.';

    public function handle()
    {
        $this->info('Publishing views...');

        $this->callSilently("vendor:publish", [
            '--tag' => 'shop-views',
        ]);

        $this->info('Publishing Milligram CSS...');

        $this->callSilently("vendor:publish", [
            '--tag' => 'shop-assets',
        ]);

        $this->info('Publishing Vue components...');

        $this->callSilently("vendor:publish", [
            '--tag' => 'shop-vue',
        ]);

        $this->info('Installation complete. Run `php artisan migrate` to create the required tables.');

        return self::SUCCESS;
    }
}
