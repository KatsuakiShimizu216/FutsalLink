<?php

use Illuminate\support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;


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
//     return view('auth/register');
// });

Auth::routes();

Route::get('/', [DisplayController::class, 'index']);
Route::resource('/team','TeamController',['except' => ['update','destroy']]);
Route::get('/search',[DisplayController::class,'search'])->name('search');
Route::post('/search',[DisplayController::class,'search'])->name('search');



Route::get('/message/{team}/confirm',[DisplayController::class, 'redirect']);
Route::get('/message/{team}/complete',[DisplayController::class, 'redirect']);



//登録アカウントのみ
Route::group(['middleware' => 'auth'],function(){
    Route::get('/message/{team}/form',[RegistrationController::class, 'messageForm'])->name('message.form');
    Route::post('/message/{team}/confirm',[RegistrationController::class, 'messageConf'])->name('message.conf');
    Route::post('/message/{team}/complete',[RegistrationController::class, 'messageComp'])->name('message.comp');
    Route::get('/favorite',[DisplayController::class, 'Favorite'])->name('favorite');
    
    Route::post('/like', 'DisplayController@like')->name('reviews.like');

//     // チーム管理者のみ
    Route::group(['middleware' => ['auth', 'can:system-only']], function () {

        // Route::group(['middleware' =>'can:view,Team'], function(){
            Route::post('/team/{team}/edit',[RegistrationController::class, 'teamEdit']);
            Route::post('/team/{team}/teamdelete',[RegistrationController::class, 'deleteTeam'])->name('delete.team');
            Route::get('/manage/messagelist',[DisplayController::class, 'messeList'])->name('messe.list');

            Route::get('/manage/messagelist',[DisplayController::class, 'messeList'])->name('messe.list');
            Route::get('/message/{message}/detail',[DisplayController::class, 'messeDetail'])->name('messe.detail');
            Route::post('/message/{message}/delete',[RegistrationController::class, 'deleteMesse'])->name('delete.messe');
    
    
    
        // });
    });
});
