<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {                                //Этот вариант формирования путей не желателен
//     $viewData = [];                                                          // т.к. в будущем будет тяжко
//     $viewData["title"] = "Home Page - Online Store";
//     return view('home.index')->with("viewData", $viewData);
// });

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");


Route::get('/conditions', 'App\Http\Controllers\ConditionController@index')->name("condition.index");
Route::get('/contract', 'App\Http\Controllers\ContractController@index')->name("contract.index");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/requirements', 'App\Http\Controllers\RequirementController@index')->name("requirement.index");

Route::middleware('auth')->group(function(){
    Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
    Route::get('/conditions/{id}', 'App\Http\Controllers\ConditionController@show')->name("condition.show");
    Route::get('/contract/{id}', 'App\Http\Controllers\ContractController@show')->name("contract.show");
    Route::get('/requirement/{id}', 'App\Http\Controllers\ContractController@show')->name("requirement.show");
});

Route::middleware('admin')->group(function(){

    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::get('/admin/conditions', 'App\Http\Controllers\Admin\AdminConditionController@index')->name("admin.condition.index");
    Route::get('/admin/requirements', 'App\Http\Controllers\Admin\AdminRequirementController@index')->name("admin.requirement.index");
    
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");

    Route::post('/admin/conditions/store', 'App\Http\Controllers\Admin\AdminConditionController@store')->name("admin.condition.store");
    Route::delete('/admin/conditions/{id}/delete', 'App\Http\Controllers\Admin\AdminConditiConController@delete')->name("admin.condition.delete");
    Route::get('/admin/conditions/{id}/edit', 'App\Http\Controllers\Admin\AdminConditionController@edit')->name("admin.condition.edit");
    Route::put('/admin/conditions/{id}/update', 'App\Http\Controllers\Admin\AdminConditionController@update')->name("admin.condition.update");


    Route::post('/admin/requirements/store', 'App\Http\Controllers\Admin\AdminRequirementController@store')->name("admin.requirement.store");
    Route::delete('/admin/requirements/{id}/delete', 'App\Http\Controllers\Admin\AdminRequirementController@delete')->name("admin.requirement.delete");
    Route::get('/admin/requirements/{id}/edit', 'App\Http\Controllers\Admin\AdminRequirementController@edit')->name("admin.requirement.edit");
    Route::put('/admin/requirements/{id}/update', 'App\Http\Controllers\Admin\AdminRequirementController@update')->name("admin.requirement.update");
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
