<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('create-article', function ($user) {
            // Autoriser à la fois les administrateurs et les auteurs
            return $user->is_admin === true || $user->role === 'auteur';
        });

        Gate::define('delete-article', function ($user, Article $article) {
            if ($user->is_admin) {
                return true;
            }

            return $article->user_id === $user->id;
        });
    }
}
