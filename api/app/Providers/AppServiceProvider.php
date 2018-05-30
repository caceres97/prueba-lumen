<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
      $this->registerUserInterface();
      $this->registerUserManagementInterface();
    }

    protected function registerUserInterface()
    {
      $this->app->bind('App\Repositories\User\UserInterface', function($app)
      {
        return new \App\Repositories\User\EloquentUser( new \App\User() );
      });
    }

    protected function registerUserManagementInterface()
    {
      $this->app->bind('App\Services\UserManagement\UserManagementInterface', function($app)
      {
        return new \App\Services\UserManagement\UserManager(
          $app->make('App\Repositories\User\UserInterface')
        );
      });
    }
}
