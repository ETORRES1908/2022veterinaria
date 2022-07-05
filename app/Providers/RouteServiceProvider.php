<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    // public const HOME = '/';
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
     public function boot()
     {
         $this->configureRateLimiting();

         $this->routes(function () {
             Route::prefix('api')
                 ->middleware('api')
                 ->namespace($this->namespace)
                 ->group(base_path('routes/api.php'));

             Route::middleware('web')
                 ->namespace($this->namespace)
                 ->group(base_path('routes/web.php'));

         });
     }
     protected function configureRateLimiting()
     {
         RateLimiter::for('api', function (Request $request) {
             return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
         });
     }
    //   public function boot()
    //   {
    //      parent::boot();
    //  }
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    //  public function map()
    //  {
    //      $this->mapApiRoutes();

    //      $this->mapWebRoutes();

    // //     //
    //  }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    //  protected function mapWebRoutes()
    //  {
    //      Route::middleware('web')
    //           ->namespace($this->namespace)
    //           ->group(base_path('routes/web.php'));
    //  }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
      */
    //  protected function mapApiRoutes()
    //  {
    //      Route::prefix('api')
    //           ->middleware('api')
    //           ->namespace($this->namespace)
    //           ->group(base_path('routes/api.php'));
    //  }
}
