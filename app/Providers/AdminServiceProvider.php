<?php

namespace App\Providers;
use App\Contracts\AdminContract;
use Illuminate\Support\ServiceProvider;
use App\Repositories\AdminRepository;

class AdminServiceProvider extends ServiceProvider
{
    protected $repositoriese = [AdminContract::class=>AdminRepository::class,];
 
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositoriese as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
