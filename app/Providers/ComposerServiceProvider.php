<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\SiteComposer;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', 'App\Http\ViewComposers\SiteComposer');
    }

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
        //
    }

}