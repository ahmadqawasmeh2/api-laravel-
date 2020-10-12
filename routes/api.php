<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['checkPassword','Changelaunage'])->namespace('categrioy')->group(function()
{
 Route::post('get_allcategroiy','Categrioescontroller@index');
 Route::post('get-category-byId','Categrioescontroller@getCategoryById');
 Route::post('changeStatus','Categrioescontroller@changeStatus');



});

Route::prefix ('admin')->middleware(['checkPassword','Changelaunage'])->namespace('Admin')->group(function (){
    Route::post('login', 'AdminCntroller@login');
});

// Route::middleware(['checkPassword','Changelaunage','CheakAdminToken:admins-api']) ->namespace('categrioy')->group(function () {
//     Route::get('offers', 'CategoriesController@index');
// });

