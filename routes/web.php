<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ListitemController;
use App\Http\Controllers\Backend\MediasocialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pagesbackend.user.index');
});

Route::prefix('backpanel')->group(function () {
    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/getAll', [UserController::class, 'getAll'])->name('user.getAll');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('/{id}/resetpassword', [UserController::class, 'resetpassword'])->name('user.resetpassword');
    });

    //Media Social
    Route::prefix('mediasocial')->group(function(){
        Route::get('/',[MediasocialController::class, 'index'])->name('mediasocial.index');
        Route::get('/getAll', [MediasocialController::class, 'getAll'])->name('mediasocial.getAll');
        Route::post('/', [MediasocialController::class, 'store'])->name('mediasocial.store');
        Route::post('/{id}/changeStatus', [MediasocialController::class, 'changeStatus'])->name('mediasocial.changeStatus');
        Route::get('/{id}/show', [MediasocialController::class, 'show'])->name('mediasocial.show');
        Route::post('/{id}/update', [MediasocialController::class, 'update'])->name('mediasocial.update');
    });

    //List Item
    Route::prefix('listitem')->group(function(){
        Route::get('/',[ListitemController::class, 'index'])->name('listitem.index');
        Route::get('/getAll', [ListitemController::class, 'getAll'])->name('listitem.getAll');
        Route::get('/create', [ListitemController::class, 'create'])->name('listitem.create');
        Route::post('/', [ListitemController::class, 'store'])->name('listitem.store');
        Route::post('/{id}/changeStatus', [ListitemController::class, 'changeStatus'])->name('listitem.changeStatus');
        Route::get('/{id}/show', [ListitemController::class, 'show'])->name('listitem.show');
        Route::post('/{id}/update', [ListitemController::class, 'update'])->name('listitem.update');
    });
});

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
