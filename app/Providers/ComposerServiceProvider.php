<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Career;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('*', function ($view) {
            $careers = Career::select(['id', 'career', 'desc_corta', 'image'])->get();
            $inscription = Setting::select('value', 'obs')->where('name', '=', 'inscripcion')->first();
            $view->with('provider', [
                'inscription' => $inscription,
                'careers' => $careers
            ]);
        });
    }
}
