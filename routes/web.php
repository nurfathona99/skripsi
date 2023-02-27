<?php

use Illuminate\Support\Facades\Route;

// Route::get('pass', bcrypt('qweqweqwe'));

 Route::group(['namespace' => 'App\Http\Controllers\Admin'], function ()
 {
     Route::get('/', ['as' => 'admin.login', 'uses' => 'AuthController@index']);
     Route::post('/submit', ['as' => 'admin.login.submit', 'uses' => 'AuthController@login']);
     Route::get('logout', ['as' => 'admin.logout', 'uses' => 'AuthController@logout']);

    //  Route::group(['middleware' => ['auth.admin'], 'prefix' => 'admin'], function ()
     Route::group(['prefix' => 'admin'], function ()
     {
         Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'SiteController@index']);

         // AJAX
         Route::get('ajax/user/email', ['as' => 'ajax.user.email', 'uses' => 'AjaxController@EmailUser']);
         Route::get('ajax/dosen/email', ['as' => 'ajax.dosen.email', 'uses' => 'AjaxController@EmailDosen']);
         Route::get('ajax/dosen/nidn', ['as' => 'ajax.dosen.nidn', 'uses' => 'AjaxController@NidnDosen']);
         Route::get('ajax/matakuliah/name', ['as' => 'ajax.matakuliah.name', 'uses' => 'AjaxController@NamaMataKuliah']);
         Route::get('ajax/matakuliah/code', ['as' => 'ajax.matakuliah.code', 'uses' => 'AjaxController@CodeMataKuliah']);
         Route::get('ajax/ruangan/name', ['as' => 'ajax.ruangan.name', 'uses' => 'AjaxController@NamaRuangan']);
         Route::get('ajax/ruangan/code', ['as' => 'ajax.ruangan.code', 'uses' => 'AjaxController@CodeRuangan']);
         Route::get('ajax/mengajar/matakuliah', ['as' => 'ajax.mengajar.matakuliah', 'uses' => 'AjaxController@RuanganMengajar']);

         // User
         Route::get('users', ['as' => 'admin.user', 'uses' => 'UserController@index']);
         Route::get('users/create', ['as' => 'admin.user.create', 'uses' => 'UserController@create']);
         Route::post('users/create', ['as' => 'admin.user.store', 'uses' => 'UserController@store']);
         Route::get('users/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UserController@edit']);
         Route::post('users/update/{id?}', ['as' => 'admin.user.update', 'uses' => 'UserController@update']);
         Route::delete('users/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'UserController@destroy']);

         //Day
         Route::get('hari', ['as' => 'admin.hari', 'uses' => 'DayController@index']);
         Route::get('hari/create', ['as' => 'admin.hari.create', 'uses' => 'DayController@create']);
         Route::post('hari/create', ['as' => 'admin.hari.store', 'uses' => 'DayController@store']);
         Route::get('hari/edit/{id}', ['as' => 'admin.hari.edit', 'uses' => 'DayController@edit']);
         Route::post('hari/update/{id?}', ['as' => 'admin.hari.update', 'uses' => 'DayController@update']);
         Route::delete('hari/delete/{id}', ['as' => 'admin.hari.delete', 'uses' => 'DayController@destroy']);

         //Time
         Route::get('waktu', ['as' => 'admin.waktu', 'uses' => 'TimeController@index']);
         Route::get('waktu/create', ['as' => 'admin.waktu.create', 'uses' => 'TimeController@create']);
         Route::post('waktu/create', ['as' => 'admin.waktu.create', 'uses' => 'TimeController@store']);
         Route::get('waktu/edit/{id}', ['as' => 'admin.waktu.edit', 'uses' => 'TimeController@edit']);
         Route::post('waktu/update/{id?}', ['as' => 'admin.waktu.update', 'uses' => 'TimeController@update']);
         Route::delete('waktu/delete/{id}', ['as' => 'admin.waktu.delete', 'uses' => 'TimeController@destroy']);

         //Lecturer
         Route::get('dosen', ['as' => 'admin.dosen', 'uses' => 'LecturersController@index']);
         Route::get('dosen/create', ['as' => 'admin.dosen.create', 'uses' => 'LecturersController@create']);
         Route::post('dosen/create', ['as' => 'admin.dosen.store', 'uses' => 'LecturersController@store']);
         Route::get('dosen/edit/{id}', ['as' => 'admin.dosen.edit', 'uses' => 'LecturersController@edit']);
         Route::post('dosen/update/{id?}', ['as' => 'admin.dosen.update', 'uses' => 'LecturersController@update']);
         Route::delete('dosen/delete/{id}', ['as' => 'admin.dosen.delete', 'uses' => 'LecturersController@destroy']);

         //Courses
         Route::get('matakuliah', ['as' => 'admin.matakuliah', 'uses' => 'CoursesController@index']);
         Route::get('matakuliah/create', ['as' => 'admin.matakuliah.create', 'uses' => 'CoursesController@create']);
         Route::post('matakuliah/create', ['as' => 'admin.matakuliah.store', 'uses' => 'CoursesController@store']);
         Route::get('matakuliah/edit/{id}', ['as' => 'admin.matakuliah.edit', 'uses' => 'CoursesController@edit']);
         Route::post('matakuliah/update/{id?}', ['as' => 'admin.matakuliah.update', 'uses' => 'CoursesController@update']);
         Route::delete('matakuliah/delete/{id}', ['as' => 'admin.matakuliah.delete', 'uses' => 'CoursesController@destroy']);

         //Room
         Route::get('ruangan', ['as' => 'admin.ruangan', 'uses' => 'RoomsController@index']);
         Route::get('ruangan/create', ['as' => 'admin.ruangan.create', 'uses' => 'RoomsController@create']);
         Route::post('ruangan/create', ['as' => 'admin.ruangan.store', 'uses' => 'RoomsController@store']);
         Route::get('ruangan/edit/{id}', ['as' => 'admin.ruangan.edit', 'uses' => 'RoomsController@edit']);
         Route::post('ruangan/update/{id?}', ['as' => 'admin.ruangan.update', 'uses' => 'RoomsController@update']);
         Route::delete('ruangan/delete/{id}', ['as' => 'admin.ruangan.delete', 'uses' => 'RoomsController@destroy']);

         //Teach
         Route::get('mengajar', ['as' => 'admin.mengajar', 'uses' => 'TeachController@index']);
         Route::get('mengajar/create', ['as' => 'admin.mengajar.create', 'uses' => 'TeachController@create']);
         Route::post('mengajar/create', ['as' => 'admin.mengajar.store', 'uses' => 'TeachController@store']);
         Route::get('mengajar/edit/{id}', ['as' => 'admin.mengajar.edit', 'uses' => 'TeachController@edit']);
         Route::post('mengajar/update/{id?}', ['as' => 'admin.mengajar.update', 'uses' => 'TeachController@update']);
         Route::delete('mengajar/delete/{id}', ['as' => 'admin.mengajar.delete', 'uses' => 'TeachController@destroy']);

         //kelas
         Route::get('kelas', ['as' => 'admin.kelas', 'uses' => 'KelasController@index']);
         Route::get('kelas/create', ['as' => 'admin.kelas.create', 'uses' => 'KelasController@create']);
         Route::post('kelas/create', ['as' => 'admin.kelas.store', 'uses' => 'KelasController@store']);
         Route::get('kelas/edit/{id}', ['as' => 'admin.kelas.edit', 'uses' => 'KelasController@edit']);
         Route::post('kelas/update/{id?}', ['as' => 'admin.kelas.update', 'uses' => 'KelasController@update']);
         Route::delete('kelas/delete/{id}', ['as' => 'admin.kelas.delete', 'uses' => 'KelasController@destroy']);

         //timedays
         Route::get('waktuhari', ['as' => 'admin.waktuhari', 'uses' => 'TimedayController@index']);
         Route::get('waktuhari/create', ['as' => 'admin.waktuhari.create', 'uses' => 'TimedayController@create']);
         Route::post('waktuhari/create', ['as' => 'admin.waktuhari.store', 'uses' => 'TimedayController@store']);
         Route::get('waktuhari/edit/{id}', ['as' => 'admin.waktuhari.edit', 'uses' => 'TimedayController@edit']);
         Route::post('waktuhari/update/{id?}', ['as' => 'admin.waktuhari.update', 'uses' => 'TimedayController@update']);
         Route::delete('waktuhari/delete/{id}', ['as' => 'admin.waktuhari.delete', 'uses' => 'TimedayController@destroy']);

         //generate
         Route::get('generates', ['as' => 'admin.generates', 'uses' => 'GenetikController@index']);
         Route::get('generates/submit', ['as' => 'admin.generates.submit', 'uses' => 'GenetikController@submit']);
         Route::get('generates/result/{id}', ['as' => 'admin.generates.result', 'uses' => 'GenetikController@result']);
         Route::get('generates/excel/{id}', ['as' => 'admin.generates.excel', 'uses' => 'GenetikController@excel']);

     });
 });
