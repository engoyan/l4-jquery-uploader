<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$config = Config::get('jquery-uploader::jquery-uploader'); 

/*
Route::get('some-route', function()
{
    $config = Config::get('some.config');
    Route::dispatch( MyController($config) );
    return new MyController(configData);
   
});
*/

foreach ($config as $name => $attribs)
{
    
    $index =  array(
        'uses' => $attribs['controller'] . '@index', 
        'as' => $name . '-index',
    );
    
    $run = array(
        'uses' => $attribs['controller'] . '@run', 
        'as' => $name . '-run',
    );
    
    $view = array(
        'uses' => $attribs['controller'] . '@view', 
        'as' => $name . '-view',
    );
    
    if ($attribs['before']) {
        $index['before'] = $attribs['before'];    
        $run['before'] = $attribs['before'];    
        $view['before'] = $attribs['before'];    
    }
    
    Route::get($attribs['index'], $index); 
    Route::any($attribs['index'] . '-run', $run);
    Route::get($attribs['index'] . '-view/{version}/{filename}', $view);
  
}

