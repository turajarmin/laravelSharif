<?php

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
Route::resource('/Post','PostController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/Auth',function (){
   return 'this is test';
})->middleware('isAdmin:admin');
use \Illuminate\Http\Request;
Route::get('/session',function (Request $request){
    $request->session()->flash('message','thanks for register in the website');
   return $request->session()->get('message');
});
Route::get('/Slider',function(){
   return 'slider';
});



