<?php

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
    
    return view('auth.login');
});

Auth::routes();
Route::get('/dashboard','HomeController@admin');

//dosen
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/dosen','DosenController@index');
Route::get('/admin/dosen/add','DosenController@add');
Route::post('/admin/dosen/store','DosenController@store');
Route::get('/admin/dosen/edit/{id}','DosenController@edit');
Route::put('/admin/dosen/update/{id}','DosenController@update');
Route::delete('/admin/dosen/delete/{id}','DosenController@delete');

//matkul

Route::get('/admin/matkul','MatkulController@index');
Route::delete('/admin/matkul/delete/{id}','MatkulController@delete');
Route::get('/admin/matkul/add','MatkulController@add');
Route::post('/admin/matkul/store','MatkulController@store');
Route::get('/admin/matkul/edit/{id}','MatkulController@edit');
Route::put('/admin/matkul/update/{id}','DosenController@update');

//kelas
Route::get('/admin/kelas','KelasController@index');
Route::get('admin/kelas/add','KelasController@add');
Route::post('/admin/kelas/store','KelasController@store');
Route::get('/admin/kelas/edit/{id}','KelasController@edit');
Route::put('/admin/kelas/update/{id}','KelasController@update');
Route::delete('/admin/kelas/delete/{id}','KelasController@delete');

//insentif
Route::get('/admin/insentif','InsentifController@index');
Route::get('admin/insentif/add','InsentifController@add');
Route::post('/admin/insentif/store','InsentifController@store');
Route::delete('/admin/insentif/delete/{id}','InsentifController@delete');
Route::get('/admin/insentif/edit/{id}','InsentifController@edit');
Route::put('/admin/insentif/update/{id}','InsentifController@update');

//jadwal praktek
Route::get('/admin/jadwal-praktikum','JadwalPraktikumController@index');
Route::get('/admin/jadwal-praktikum/add','JadwalPraktikumController@add');
Route::post('/admin/jadwal-praktikum/store','JadwalPraktikumController@store');

Route::delete('/admin/jadwal-praktikum/delete/{id}','JadwalPraktikumController@delete');

//user
Route::get('/admin/user','UserController@index');
Route::delete('/admin/user/delete/{id}','UserController@delete');
Route::get('/admin/user/rules/{id}','UserController@makeadmin');
//presensi
Route::get('/admin/presensi','PresensiController@index');




//asdos
//jadwal praktek
Route::get('/asdos/jadwal-praktikum','JadwalPraktikumController@asdosindex');
Route::get('/asdos/jadwal-praktikum/add','JadwalPraktikumController@addasdos');
Route::post('/asdos/jadwal-praktikum/store','JadwalPraktikumController@storeasdos');

//kelas
Route::get('/asdos/kelas','KelasController@asdosindex');

//matkul
Route::get('/asdos/matkul','MatkulController@asdosindex');

//asdos
Route::get('/asdos','UserController@asdos');

//presensi
Route::get('/asdos/presensi','PresensiController@indexasdos');
Route::get('/asdos/presensi/add','PresensiController@addasdos');
Route::post('/asdos/presensi/store','PresensiController@asdosstore');
Route::delete('/asdos/presensi/presensidelete/{id}','PresensiController@presensidelete');


//asdos
Route::get('/asdos/profile/{id}','AsdosController@profile');
