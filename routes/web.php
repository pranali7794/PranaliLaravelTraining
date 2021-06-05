<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/insert', function () {  
//     return view('create');  
// }); 

Route::resource('crud','App\Http\Controllers\CrudsController',
            ['names'=>[
                'index' => 'crud.index',
                'create' => 'crud.create',
                'update' => 'crud.update',
                'edit' => 'crud.edit',
                'store' => 'crud.store',
                'show' => 'crud.show',
                'destroy' => 'crud.destroy',
            ]]);
Route::get('crud-list','App\Http\Controllers\CrudsController@getData');


Route::view('/','welcome');
Route::get('contact', function() {
	return view('contact');
});

//Route::view('/contact','contact');
Route::view('about','about');

Route::get('customers', 'App\Http\Controllers\CustomersController@list');// Route::get('crud/public/insert', function () {  
//     return view('create');  
// });  

//Route::post('save', 'App\Http\Controllers\CrudsController@store');
Route::resource('posts','App\Http\Controllers\PostsController');