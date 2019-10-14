<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
         'App\Post' => 'App\Policies\PostPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-post',function($user,$post){
            return $user->id==$post->user->id;
        });
    }
}
