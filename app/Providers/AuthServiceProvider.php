<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('administrador', function($user) {
            if($user->role_id == 1){
                return true;
            }
        });
        Gate::define('supervisor', function($user) {
            if($user->role_id == 2){
                return true;
            }
        });
        Gate::define('auxiliar', function($user) {
            if($user->role_id == 3){
                return true;
            }
        });
        Gate::define('operarios', function($user) {
            if($user->role_id == 4){
                abort(403);
            }
        });
    }
}
