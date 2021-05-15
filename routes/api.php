<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| APIController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register APIController routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your APIController!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
