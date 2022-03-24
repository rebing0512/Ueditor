<?php


//编辑器
Route::group([
    'prefix'=>'ueditor',
],function(\Illuminate\Routing\Router $router){
    $router->any('functions','UeditorController@functions')->name('jenson.ueditor.functions');
});
