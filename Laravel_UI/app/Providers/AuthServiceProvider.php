<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Article;
use App\Policies\ArticlePolicy;


class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
    Article::class => ArticlePolicy::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        Gate::define('create-article', function ($user) {
        // Auteur = is_admin = false → peut créer
        // Admin  = is_admin = true  → ne peut pas créer
        return $user->is_admin === false;
       });

       // La logique de suppression est maintenant gérée par ArticlePolicy::delete()
      // Gate::define('delete-article', function ($user, Article $article) {
     //     ...
    // });
    }
}