<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Forum;
use App\Models\Reactions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share common data with views
        $events = Event::all();
        $forums = Forum::all();
        $reactions = Reactions::with('forum')->get();

        View::share([
            'events' => $events,
            'forums' => $forums,
            'reactions' => $reactions,
        ]);

        // Load role-specific AdminLTE configuration
        // if (Auth::check()) {
        //     $role = Auth::user()->usertype;

        //     if ($role === 'admin') {
        //         config(['adminlte' => config('adminlte')]);
        //     } elseif ($role === 'barangay') {
        //         config(['adminlte_barangay' => config('adminlte_barangay')]);
        //     }

        // }
    }
}
