<?php

namespace App\Providers;

use App\Models\Education\Course;
use App\Models\Elements\Art;
use App\Models\Elements\Post;
use App\Models\Tickets\Ticket;
use App\Models\User;
use Auth;
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

        Gate::define('pay', function (User $user, $id) {
            return $user === Auth::user() && !$user->hasPaid($id);
        });

        Gate::define('watch-dashboard', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-categories', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-subcategories', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-payment', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-groups', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-users', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('delete-users', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-own-art', function (User $user, Art $art) {
            return $art->user_id === $user->id;
        });

        Gate::define('manage-own-post', function (User $user, Post $post) {
            return $post->user_id === $user->id;
        });

        Gate::define('manage-own-ticket', function (User $user, Ticket $ticket) {
            return $ticket->user_id === $user->id;
        });

        Gate::define('manage-own-course', function (User $user, Course $course) {
            return $course->user_id === $user->id;
        });
    }
}
