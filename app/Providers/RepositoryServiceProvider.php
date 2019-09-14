<?php
 
namespace App\Providers;
 
use App\Contracts\DepartmentContract;
use Illuminate\Support\ServiceProvider;
use App\Repositories\DepartmentRepository;
 
class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [DepartmentContract::class=>DepartmentRepository::class,];
 
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
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
 