<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ListitemController;
use App\Http\Controllers\Backend\MasterwebController;
use App\Http\Controllers\Backend\MediasocialController;
use App\Http\Controllers\Backend\HeaderbannerController;

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
Route::get('/backpanel', function () {
    return view('pagesbackend.loginpage');
})->name('login');
Route::post('/login', [UserController::class, 'auth'])->name('login.post');
Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
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
            Route::get('/getmediasocial', [MediasocialController::class, 'getmediasocial'])->name('mediasocial.getaccountmediasocial');
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

        //header banner
        Route::prefix('headerbanner')->group(function(){
            Route::get('/',[HeaderbannerController::class, 'index'])->name('headerbanner.index');
            Route::get('/getAll', [HeaderbannerController::class, 'getAll'])->name('headerbanner.getAll');
            Route::post('/', [HeaderbannerController::class, 'store'])->name('headerbanner.store');
            Route::post('/{id}/changeStatus', [HeaderbannerController::class, 'changeStatus'])->name('headerbanner.changeStatus');
            Route::get('/{id}/show', [HeaderbannerController::class, 'show'])->name('headerbanner.show');
            Route::post('/{id}/update', [HeaderbannerController::class, 'update'])->name('headerbanner.update');
        });
        //Products
        Route::prefix('product')->group(function(){
            Route::get('/',[ProductController::class, 'index'])->name('product.index');
            Route::get('/getAll', [ProductController::class, 'getAll'])->name('product.getAll');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/', [ProductController::class, 'store'])->name('product.store');
            Route::post('/{id}/changeStatus', [ProductController::class, 'changeStatus'])->name('product.changeStatus');
            Route::post('/{id}/changeMenu', [ProductController::class, 'changeMenu'])->name('product.changeMenu');
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
            Route::get('/{id}/getdetailmedsos', [ProductController::class, 'getdetailmedsos'])->name('product.getdetailmedsos');
            Route::post('/{id}/update', [ProductController::class, 'update'])->name('product.update');
            Route::get('/getDataMedsos', [ProductController::class, 'getDataMedsos'])->name('product.getDataMedsos');
            Route::get('/{id}/choosemedsos', [ProductController::class, 'chooseMedsos'])->name('product.chooseMedsos');
        });

        //master
        Route::prefix('masterweb')->group(function(){
            Route::get('/',[MasterwebController::class, 'index'])->name('masterweb.index');
            Route::post('/storeheader', [MasterwebController::class, 'storeheader'])->name('masterweb.storeheader');
            Route::post('/storefooter', [MasterwebController::class, 'storefooter'])->name('masterweb.storefooter');
            Route::post('/storecontact', [MasterwebController::class, 'storecontact'])->name('masterweb.storecontact');
        });
    });
});
// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
