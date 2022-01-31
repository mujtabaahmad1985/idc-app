<?php

namespace App\Providers;
use Auth;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;
use DB;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //


        view()->composer('*', function ($view) {

            if ($view->getName() != 'login' && $view->getName() != 'register_as_patient'  && $view->getName() != 'partials.activate'  && $view->getName() != 'partials.activate-approved' && $view->getName() != 'mails.reset-password' && $view->getName() != 'reset') {
                if(Auth::check()) {
                    $permissions_allowed = Auth::user()->permissions->pluck('id')->all();
                    $folders = NULL;
                    if (Auth::user()->role == 'staff') {
                        $folders = Auth::user()->folders;

                    }

                    $view->with(['permissions_allowed' => $permissions_allowed, 'permissions_json' => json_encode($permissions_allowed), 'folders' => $folders]);
                }
            }

        });

        DB::listen(function ($query) {
            // $query->sql
            // $query->bindings
            // $query->time
            Log::info('Database Execution',[
                'Query: '=>$query->sql,
                'Data Binding: ' =>$query->bindings,
                'Running Time: ' =>$query->time
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
