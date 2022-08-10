<?php

use App\Http\Controllers\OuterController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome' , [
//         'nama' => 'Chrisnico'
//     ]);
// });



Route::controller(OuterController::class)->group(function () {
    Route::get('/' ,'index')->name('home');
    Route::get('/article/{id}' , 'article_detail')->name('article_detail');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/login' , 'login_form')->name('login_form');
    Route::post('/login' , 'login_action')->name('login_action');

    Route::get('/dashboard' , 'dashboard_index')->name('dashboard_index');
    Route::post('/logout' , 'dashboard_logout')->name('dashboard_logout');

    Route::get('/dashboard/input' , 'article_input_action')->name('article_input_action');
    Route::post('/dashboard/delete' , 'article_delete_action')->name('article_delete_action');
    Route::post('/article/add' , 'article_add_action')->name('article_add_action');

    Route::get('/article/edit/{id}' , 'article_edit_action')->name('article_edit_action');

    Route::post('/article/edit/update' , 'article_update_action')->name('article_update_action');
    Route::get('/register' , 'register_form')->name('register_form');
    Route::post('/register/acc' , 'register_action')->name('register_acc');

});
