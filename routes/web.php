<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UpcomingWorkController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\CampController;
use App\Http\Controllers\user\HomeUserController;

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

Route::get('/', [HomeUserController::class, 'showHome'])->name('home');
Route::get('/camp', [HomeUserController::class, 'showCamp'])->name('camp');
Route::get('/about', [HomeUserController::class, 'showAbout'])->name('about');
Route::post('/', [HomeUserController::class, 'contactStore'])->name('contactHome.store');

/////////         About Route        ///////////


Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {

    //////////          ROUTE START FOR HOME          //////////

    Route::get('/home/start/all', [HomeController::class, 'homeStartShow'])->name('home-start.all');
    Route::get('/home/start/add', [HomeController::class, 'homeStartAdd'])->name('home-start.add');
    Route::post('home/start/store', [HomeController::class, 'homeStartStore'])->name('home-start.store');
    Route::get('/home/start/edit/{id}', [HomeController::class, 'homeStartEdit'])->name('home-start.edit');
    Route::post('/home/start/update/{id}', [HomeController::class, 'homeStartUpdate'])->name('home-start.update');
    Route::get('/home/start/delete/{id}', [HomeController::class, 'homeStartDelete'])->name('home-start.delete');
    Route::get('/home/start/active/{id}', [HomeController::class, 'homeStartActive'])->name('home-start.active');

    //////////          ROUTE END FOR HOMESTART          //////////

    //////////          ROUTE END FOR UPCOMMING WPRKS          //////////

    Route::get('/home/upcoming/all', [UpcomingWorkController::class, 'upcomingWorkShow'])->name('upcoming-work.all');
    Route::get('/home/upcoming/add', [UpcomingWorkController::class, 'upcomingWorkAdd'])->name('upcoming-work.add');
    Route::post('home/upcoming/store', [UpcomingWorkController::class, 'upcomingWorkStore'])->name('upcoming-work.store');
    Route::get('/home/upcoming/edit/{id}', [UpcomingWorkController::class, 'upcomingWorkEdit'])->name('upcoming-work.edit');
    Route::post('/home/upcoming/update/{id}', [UpcomingWorkController::class, 'upcomingWorkUpdate'])->name('upcoming-work.update');
    Route::get('/home/upcoming/delete/{id}', [UpcomingWorkController::class, 'upcomingWorkDelete'])->name('upcoming-work.delete');

    //////////          ROUTE END FOR UPCOMMING WORKS          //////////

    //////////          ROUTE START FOR VIDEO LINK          //////////

    Route::get('/home/video/all', [HomeController::class, 'videoLinkShow'])->name('video-link.all');
    Route::get('/home/video/add', [HomeController::class, 'videoLinkAdd'])->name('video-link.add');
    Route::post('home/video/store', [HomeController::class, 'videoLinkStore'])->name('video-link.store');
    Route::get('/home/video/edit/{id}', [HomeController::class, 'videoLinkEdit'])->name('video-link.edit');
    Route::post('/home/video/update/{id}', [HomeController::class, 'videoLinkUpdate'])->name('video-link.update');
    Route::get('/home/video/delete/{id}', [HomeController::class, 'videoLinkDelete'])->name('video-link.delete');

    //////////          ROUTE END FOR VIDEO LINK          //////////


    //////////          ROUTE END FOR Slide          //////////

    Route::get('/home/slide/all', [SlideController::class, 'slideShow'])->name('slide.all');
    Route::get('/home/slide/add', [SlideController::class, 'slideAdd'])->name('slide.add');
    Route::post('/home/slide/store', [SlideController::class, 'slideStore'])->name('slide.store');
    Route::get('/home/slide/edit/{id}', [SlideController::class, 'slideEdit'])->name('slide.edit');
    Route::post('/home/slide/update/{id}', [SlideController::class, 'slideUpdate'])->name('slide.update');
    Route::get('/home/slide/delete/{id}', [SlideController::class, 'slideDelete'])->name('slide.delete');

    //////////          ROUTE END FOR Slide          //////////

    /////////////        HOME RELATED ROUTING ENDED         ////////


    //////////          ROUTE START FOR ABOUT          //////////

    Route::get('/about/all', [AboutController::class, 'aboutShow'])->name('about.all');
    Route::get('/about/add', [AboutController::class, 'aboutAdd'])->name('about.add');
    Route::post('/about/store', [AboutController::class, 'aboutStore'])->name('about.store');
    Route::get('/about/edit/{id}', [AboutController::class, 'aboutEdit'])->name('about.edit');
    Route::post('/about/update/{id}', [AboutController::class, 'aboutUpdate'])->name('about.update');
    Route::get('/about/delete/{id}', [AboutController::class, 'aboutDelete'])->name('about.delete');

    //////////          ROUTE END FOR ABOUT          //////////


    //////////          ROUTE START FOR CONTACT          //////////

    Route::get('/contact/all', [ContactController::class, 'contactShow'])->name('contact.all');
    Route::get('/contact/add', [ContactController::class, 'contactAdd'])->name('contact.add');
    Route::post('/contact/store', [ContactController::class, 'contactStore'])->name('contact.store');
    Route::get('/contact/edit/{id}', [ContactController::class, 'contactEdit'])->name('contact.edit');
    Route::post('/contact/update/{id}', [ContactController::class, 'contactUpdate'])->name('contact.update');
    Route::get('/contact/delete/{id}', [ContactController::class, 'contactDelete'])->name('contact.delete');

    //////////          ROUTE END FOR CONTACT          //////////







    /////////          ROUTE STARTS FOR CAMP         ///////////

    Route::get('/camp/all', [CampController::class, 'campShow'])->name('camp.all');
    Route::get('/camp/add', [CampController::class, 'campAdd'])->name('camp.add');
    Route::post('/camp/store', [CampController::class, 'campStore'])->name('camp.store');
    Route::get('/camp/edit/{id}', [CampController::class, 'campEdit'])->name('camp.edit');
    Route::post('/camp/update/{id}', [CampController::class, 'campUpdate'])->name('camp.update');
    Route::get('/camp/delete/{id}', [CampController::class, 'campDelete'])->name('camp.delete');

    /////////          ROUTE ENDS FOR CAMP         ///////////


    /////////          ROUTE STARTS FOR CAMP UPDATES         ///////////

    Route::get('/camp/update/all', [CampController::class, 'campUpdateShow'])->name('camp-update.all');
    Route::get('/camp/update/add', [CampController::class, 'campUpdateAdd'])->name('camp-update.add');
    Route::post('/cam/updatep/store', [CampController::class, 'campUpdateStore'])->name('camp-update.store');
    Route::get('/camp/update/edit/{id}', [CampController::class, 'campUpdateEdit'])->name('camp-update.edit');
    Route::post('/cam/updatep/update/{id}', [CampController::class, 'campUpdateUpdate'])->name('camp-update.update');
    Route::get('/camp/update/delete/{id}', [CampController::class, 'campUpdateDelete'])->name('camp-update.delete');

    /////////          ROUTE ENDS FOR CAMP UPDATES         ///////////








    //////////          ROUTE STARTS FOR FOOTER          //////////

    Route::get('/footer/all', [FooterController::class, 'footerShow'])->name('footer.all');
    Route::get('/footer/add', [FooterController::class, 'footerAdd'])->name('footer.add');
    Route::post('/footer/store', [FooterController::class, 'footerStore'])->name('footer.store');
    Route::get('/footer/edit/{id}', [FooterController::class, 'footerEdit'])->name('footer.edit');
    Route::post('/footer/update/{id}', [FooterController::class, 'footerUpdate'])->name('footer.update');
    Route::get('/footer/delete/{id}', [FooterController::class, 'footerDelete'])->name('footer.delete');

    //////////          ROUTE END FOR FOOTER          //////////


});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
