<?php

use Illuminate\Http\Request;

use App\Http\controllers\MobileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('app-login', 'MobileController@login');
Route::post('app-employee', 'MobileController@employee');
Route::post('app-sale-order', 'MobileController@sale_order');
Route::post('app-sale-entry-view', 'MobileController@sale_entry_view');
Route::post('app-test', 'MobileController@test');
Route::post('list-customers', 'MobileController@list_customer');
