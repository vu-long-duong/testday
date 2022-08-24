<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
})->name('welcom');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/create-post', [PostController::class, 'create'])->name('admin.post-create');
Route::post('/store-post', [PostController::class, 'store'])->name('admin.post-store');

Route::get('/edit-post/{id}',[PostController::class,'edit'])->name('admin.post-edit');
Route::post('/update-post/{id}',[PostController::class,'update'])->name('admin.post-update');

Route::get('/index-post', [PostController::class, 'index'])->name('admin.post-index');
