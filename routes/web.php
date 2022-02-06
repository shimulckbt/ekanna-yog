<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;

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

/////////         About Route        //////////


Route::group(['prefix' => '/admin/about', 'middleware' => 'auth'], function () {
    Route::get('/all', [AboutController::class, 'aboutShow'])->name('about.all');
    Route::get('/edit', [AboutController::class, 'aboutEdit'])->name('about.edit');
    Route::post('/update', [AboutController::class, 'aboutUpdate'])->name('about.update');
    Route::get('/delete', [AboutController::class, 'aboutDelete'])->name('about.delete');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
