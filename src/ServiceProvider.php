<?php

namespace Jenson\Ueditor;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {

        // 路由
        $this->setupRoutes($this->app->router);
        // 配置
        $this->mergeConfigFrom(
            __DIR__ . '/config/mbcore_ueditor.php', 'mbcore_ueditor',
        );
        // 发布配置文件
        $this->publishes([
            __DIR__.'/config/mbcore_ueditor.php' => config_path('mbcore_ueditor.php'),
        ], 'config');

        // 资源文件
        $this->publishes([
            __DIR__.'/resources/assets' => public_path('assets/Jenson/Ueditor'),
        ], 'public');
    }

    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Jenson\Ueditor\Controllers'], function($router)
        {
            require __DIR__ . '/routes/routes.php';
        });
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'config/mbcore_ueditor.php',
        ]);
    }
}
