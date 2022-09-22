<?php


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

Route::get('/',function(){
    return view('login');
});
Route::get('register',function(){
    return view('register');
});
Route::get('admin-logout','AuthController@logout')->name('admin.logout');
 Route::post('registration','AuthController@Register')->name('admin.register');
Route::post('login','AuthController@login')->name('admin.login');

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('home',function(){
        return view('pages.home');
    });

    Route::get('nep',function(){
        return view('pages.NEP.nep');
    });
    Route::get('zoom',function(){
        return view('pages.ZOOM.zoom');
    });
    Route::get('student-report',function(){
        return view('pages.student_rep');
    });
    
    Route::post('zoom-store','ZoomController@store');
    Route::post('create-files','ZoomController@createCode');
     Route::post('nep-store','nepController@store');
    Route::post('nep-create-files','nepController@createCode');
    Route::resource('student-resource','StudentReportController');
    Route::post('student-resource-getstudnet','StudentReportController@getStundet');
    
});

