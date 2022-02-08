<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UpcomingWorkController;

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

/////////         About Route        ///////////


Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {

    //////////          ROUTE START FOR ABOUT          //////////

    Route::get('/about/all', [AboutController::class, 'aboutShow'])->name('about.all');
    Route::get('/about/add', [AboutController::class, 'aboutAdd'])->name('about.add');
    Route::post('/about/store', [AboutController::class, 'aboutStore'])->name('about.store');
    Route::get('/about/edit/{id}', [AboutController::class, 'aboutEdit'])->name('about.edit');
    Route::post('/about/update/{id}', [AboutController::class, 'aboutUpdate'])->name('about.update');
    Route::get('/about/delete/{id}', [AboutController::class, 'aboutDelete'])->name('about.delete');

    //////////          ROUTE END FOR ABOUT          //////////

    //////////          ROUTE START FOR HOME          //////////

    Route::get('/home/start/all', [HomeController::class, 'homeStartShow'])->name('home-start.all');
    Route::get('/home/start/add', [HomeController::class, 'homeStartAdd'])->name('home-start.add');
    Route::post('home/start/store', [HomeController::class, 'homeStartStore'])->name('home-start.store');
    Route::get('/home/start/edit/{id}', [HomeController::class, 'homeStartEdit'])->name('home-start.edit');
    Route::post('/home/start/update/{id}', [HomeController::class, 'homeStartUpdate'])->name('home-start.update');
    Route::get('/home/start/delete/{id}', [HomeController::class, 'homeStartDelete'])->name('home-start.delete');

    //////////          ROUTE END FOR HOMESTART          //////////

    //////////          ROUTE END FOR UPCOMMING          //////////

    Route::get('/home/upcoming/all', [UpcomingWorkController::class, 'upcomingWorkShow'])->name('upcoming-work.all');
    Route::get('/home/upcoming/add', [UpcomingWorkController::class, 'upcomingWorkAdd'])->name('upcoming-work.add');
    Route::post('home/upcoming/store', [UpcomingWorkController::class, 'upcomingWorkStore'])->name('upcoming-work.store');
    Route::get('/home/upcoming/edit/{id}', [UpcomingWorkController::class, 'upcomingWorkEdit'])->name('upcoming-work.edit');
    Route::post('/home/upcoming/update/{id}', [UpcomingWorkController::class, 'upcomingWorkUpdate'])->name('upcoming-work.update');
    Route::get('/home/upcoming/delete/{id}', [UpcomingWorkController::class, 'upcomingWorkDelete'])->name('upcoming-work.delete');

    //////////          ROUTE END FOR UPCOMMING          //////////


    //////////          ROUTE END FOR Slide          //////////

    Route::get('/home/slide/all', [SlideController::class, 'slideShow'])->name('slide.all');
    Route::get('/home/slide/add', [SlideController::class, 'slideAdd'])->name('slide.add');
    Route::post('/home/slide/store', [SlideController::class, 'slideStore'])->name('slide.store');
    Route::get('/home/slide/edit/{id}', [SlideController::class, 'slideEdit'])->name('slide.edit');
    Route::post('/home/slide/update/{id}', [SlideController::class, 'slideUpdate'])->name('slide.update');
    Route::get('/home/slide/delete/{id}', [SlideController::class, 'slideDelete'])->name('slide.delete');

    //////////          ROUTE END FOR Slide          //////////

    /////////////        HOME RELATED ROUTING ENDED         ////////


    //////////          ROUTE START FOR CONTACT          //////////

    Route::get('/contact/all', [ContactController::class, 'contactShow'])->name('contact.all');
    Route::get('/contact/add', [ContactController::class, 'contactAdd'])->name('contact.add');
    Route::post('/contact/store', [ContactController::class, 'contactStore'])->name('contact.store');
    Route::get('/contact/edit/{id}', [ContactController::class, 'contactEdit'])->name('contact.edit');
    Route::post('/contact/update/{id}', [ContactController::class, 'contactUpdate'])->name('contact.update');
    Route::get('/contact/delete/{id}', [ContactController::class, 'contactDelete'])->name('contact.delete');

    //////////          ROUTE END FOR CONTACT          //////////


});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
