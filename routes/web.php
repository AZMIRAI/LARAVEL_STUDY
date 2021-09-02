<?php

use App\Http\Controllers\PostsController;
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
    // return "Hi~ Hello World";
});
// Route::get('/login', function () {
//     return view('welcome');
//     // return "Hi~ Hello World"
// })->name ('login');
Route::get('/layout', function () {
    return view('layouts/app');
    // return "Hi~ Hello World";
});
Route::get('/hi', function () {
    return view('hello');
    // return "Hi~ Hello World";
});

// Route::get('/posts', [PostsController::class, 'index']);
// Route::get('/create', [PostsController::class, 'create']);
// Route::get('/store', [PostsController::class, 'store']);

Route::resource('/posts', PostsController::class);


