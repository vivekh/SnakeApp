<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Snake;

Route::get('/', 'WelcomeController@index');

Route::get('/snakes','SnakesController@index');

Route::get('snake-shop',function(){
    return view('snake-shop');
});

Route::any('/form-submit', function(){
    $days = Input::get('days');
    Input::file('file')->move(storage_path(),Input::file('file')->getClientOriginalName());
    $file = Input::file('file')->getClientOriginalName();
    $contents = File::get(storage_path().'\\'.$file);
    $xml = simplexml_load_string($contents);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);

    foreach($array['goldenKingCobra'] as $snake) {
        Snake::create($snake['@attributes']);
    }
    $production = Snake::production($days);
    $livestock = Snake::livestock($days);
    return view('snake-stats', ['production' => $production,'livestock' => $livestock]);
});

Route::get('/snake-shop/snake-stats/{days}','SnakesController@snake_stats');

Route::get('/snake-shop/stats/{days}','SnakesController@stats');

Route::get('/snake-shop/livestock/{days}','SnakesController@livestock');

Route::get('/test', function() {

});
