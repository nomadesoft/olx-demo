<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    $oMainCtrl = new App\Http\Controllers\MainController();
    return $oMainCtrl->index();
});

$app->post('/search', function() use ($app) {

    $oSearchCtrl = new App\Http\Controllers\SearchController();
    return $oSearchCtrl->search($app->request);
});

$app->get('/search', function() use ($app) {

	return redirect('/');
});


