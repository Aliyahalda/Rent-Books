<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;




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



Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('/', function () {
        return view('welcome');   
     });   
    Route::get('register',  [AuthController::class, 'register']);  
    Route::post('register',  [AuthController::class, 'regis']);    
    Route::post('login',  [AuthController::class, 'auth']);
});
  


Route::middleware('auth')->group(function(){
    Route::get('profile',  [UserController::class, 'profile'])->middleware('only_client');
    Route::get('dashboard',  [AdminController::class, 'index'])->middleware('only_admin');

    Route::get('users',  [AdminController::class, 'users'])->middleware('only_admin');
    Route::get('users-registered',  [AdminController::class, 'usersRegis'])->middleware('only_admin');
    Route::get('users-detail/{slug}', [AdminController::class, 'usersApprove'])->middleware('only_admin');
    Route::get('users-approve/{slug}', [AdminController::class, 'usersDetail'])->middleware('only_admin');
    //mengahapus data
    Route::get('users-ban/{slug}', [AdminController::class, 'usersBan'])->middleware('only_admin');
    //menampilkan data yang ke hapus
    Route::get('users-banned', [AdminController::class, 'usersBanned'])->middleware('only_admin');
    //restore data yang terhapus
    Route::get('users-restore/{slug}', [AdminController::class, 'usersRestore'])->middleware('only_admin');

    Route::get('category',  [AdminController::class, 'category'])->middleware('only_admin');
    Route::get('category-add',  [AdminController::class, 'categoryAdd'])->middleware('only_admin');
    Route::post('category-add',  [AdminController::class, 'categoryStore'])->middleware('only_admin');
    Route::get('category-edit/{slug}',  [AdminController::class, 'categoryEdit'])->middleware('only_admin');
    Route::put('category-edit/{slug}',  [AdminController::class, 'categoryUpdate'])->middleware('only_admin');
    Route::get('categoryUpdate/{slug}',  [AdminController::class, 'categoryDestroy'])->middleware('only_admin');

    Route::get('book',  [AdminController::class, 'book'])->middleware('only_admin');
    Route::get('books-add',  [AdminController::class, 'booksAdd'])->middleware('only_admin');
    Route::post('books-add',  [AdminController::class, 'bookStore'])->middleware('only_admin');
    Route::get('booksDelete/{slug}',  [AdminController::class, 'booksDestroy'])->middleware('only_admin');
    Route::get('book-edit/{slug}',  [AdminController::class, 'bookEdit'])->middleware('only_admin');
    Route::put('book-edit/{slug}',  [AdminController::class, 'booksUpdate'])->middleware('only_admin');

    Route::get('rent',  [AdminController::class, 'rent'])->middleware('only_admin');
    Route::get('logout', [AuthController::class, 'logout']);

});








