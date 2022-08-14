<?php

use Illuminate\support\Facades\Route;
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
Route::get('/team/{team}/detail',[DisplayController::class, 'teamDetail'])->name('team.detail');


//登録アカウントのみ
Route::group(['middleware' => 'auth'],function(){
    Route::get('/message/{team}/form',[RegistrationController::class, 'messageForm'])->name('message.form');
    Route::post('/message/{team}/confirm',[RegistrationController::class, 'messageConf'])->name('message.conf');
    Route::post('/message/{team}/complete',[RegistrationController::class, 'messageComp'])->name('message.comp');
       
    
    // チーム管理者のみ
    Route::group(['middleware' => ['auth', 'can:system-only']], function () {

        
        Route::get('/manage/teampost',[RegistrationController::class, 'teamForm'])->name('team.form');
        Route::post('/manage/teampost',[RegistrationController::class, 'teamPost']);
        
        
        Route::get('/manage/teamlist',[DisplayController::class, 'teamList'])->name('team.list');
        Route::get('/manage/{team}/teamedit',[RegistrationController::class, 'teameditForm'])->name('team.edit');
        Route::post('/manage/{team}/teamedit',[RegistrationController::class, 'teamEdit']);
        Route::post('/manage/{team}/teamdelete',[RegistrationController::class, 'deleteTeam'])->name('delete.team');
              
        
        Route::get('/manage/messagelist',[DisplayController::class, 'messeList'])->name('messe.list');
        Route::get('/manage/{message}/detail',[DisplayController::class, 'messeDetail'])->name('messe.detail');
        Route::post('/manage/{message}/delete',[RegistrationController::class, 'deleteMesse'])->name('delete.messe');
    
    });

});
