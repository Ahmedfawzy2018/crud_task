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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('addproject','ProjectController@addProject')->name('addproject') ;
Route::get('showprojects','ProjectController@index')->name('showprojects') ;
Route::get('projectdelete/{id}','ProjectController@delete');  
Route::get('projectpage/{id}','ProjectController@show')->name('projectpage') ;

Route::post('addsubproject','TaskController@addsub')->name('addsubproject') ;
Route::get('showsubprojects/{id}','TaskController@index')->name('showsubprojects') ;
Route::get('taskdelete/{id}','TaskController@delete');  
Route::get('taskupdate/{id}','TaskController@taskupdate');  

