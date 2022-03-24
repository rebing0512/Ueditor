<?php

namespace Jenson\Ueditor;

class ServiceProvider extends Controllers
{
    public function boot()
    {
        // 配置
        $this->mergeConfigFrom(
            __DIR__ . '/config/mbcore_ueditor.php', 'mbcore_ueditor'
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
