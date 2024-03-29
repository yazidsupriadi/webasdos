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


Route::get('/','Controller@home');
Route::get('/dashboard','HomeController@admin');

Route::get('/daftar', 'Controller@daftar');
Route::get('/daftarasdos', 'Controller@registerasdos');
Route::post('/daftarasdos', 'Controller@storeregisterasdos');
Route::get('/daftarasdos/isibio', 'Controller@isibio');
Route::post('/daftarasdos/isibio', 'Controller@isibiostore');
Route::get('/daftarasdos/calon-asdos-bio/{id}', 'Controller@biocaasdos');
Route::get('/files/{file}', 'Controller@downloadberkas')->name('download');
Route::get('/daftarasdos/daftar-matkul/{id}', 'Controller@daftar_matkul');
Route::get('/daftarasdos/daftar-matkul-caasdos/{id}', 'Controller@daftar_matkul_caasdos');
Route::post('/daftarasdos/daftar-matkul-caasdos/store/{id}', 'Controller@daftar_matkul_caasdos_store');

Route::group(['middleware' => 'admin'], function()
{
Route::get('/dashboard','HomeController@admin');

//dosen
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/dosen','DosenController@index');
Route::get('/admin/dosen/add','DosenController@add');
Route::post('/admin/dosen/store','DosenController@store');
Route::get('/admin/dosen/edit/{id}','DosenController@edit');
Route::put('/admin/dosen/update/{id}','DosenController@update');
Route::delete('/admin/dosen/delete/{id}','DosenController@delete');
Route::get('/admin/dosen/search','DosenController@search');
Route::get('/admin/dosen/export_excel', 'DosenController@export_excel');
//matkul

Route::get('/admin/matkul','MatkulController@index');
Route::delete('/admin/matkul/delete/{id}','MatkulController@delete');
Route::get('/admin/matkul/add','MatkulController@add');
Route::post('/admin/matkul/store','MatkulController@store');
Route::get('/admin/matkul/edit/{id}','MatkulController@edit');
Route::put('/admin/matkul/update/{id}','MatkulController@update');
Route::get('/admin/matkul/search','MatkulController@search');
Route::get('/admin/matkul/export_excel', 'MatkulController@export_excel');
//kelas
Route::get('/admin/kelas','KelasController@index');
Route::get('admin/kelas/add','KelasController@add');
Route::post('/admin/kelas/store','KelasController@store');
Route::get('/admin/kelas/edit/{id}','KelasController@edit');
Route::put('/admin/kelas/update/{id}','KelasController@update');
Route::delete('/admin/kelas/delete/{id}','KelasController@delete');
Route::get('/admin/kelas/search/kode','KelasController@kode_search');
Route::get('/admin/kelas/search/prodi','KelasController@prodi_search');
Route::get('/admin/kelas/search/tahun-akademik','KelasController@tahun_akademik_search');
Route::get('/admin/kelas/export_excel', 'KelasController@export_excel');

//ruangan
Route::get('/admin/ruangan','RuanganController@index');
Route::get('admin/ruangan/add','RuanganController@add');
Route::post('/admin/ruangan/store','RuanganController@store');
Route::get('/admin/ruangan/edit/{id}','RuanganController@edit');
Route::put('/admin/ruangan/update/{id}','RuanganController@update');
Route::delete('/admin/ruangan/delete/{id}','RuanganController@delete');
Route::get('/admin/ruangan/search','RuanganController@search');
Route::get('/admin/ruangan/export_excel', 'RuanganController@export_excel');

//insentif
Route::get('/admin/insentif','InsentifController@index');
Route::get('admin/insentif/add','InsentifController@add');
Route::post('/admin/insentif/store','InsentifController@store');
Route::delete('/admin/insentif/delete/{id}','InsentifController@delete');
Route::get('/admin/insentif/edit/{id}','InsentifController@edit');
Route::put('/admin/insentif/update/{id}','InsentifController@update');
Route::get('/admin/insentif/search/tipe-insentif','InsentifController@tipe_insentif_search');
Route::get('/admin/insentif/search/tahun-akademik','InsentifController@tahun_akademik_search');
Route::get('/admin/insentif/export_excel', 'InsentifController@export_excel');

//jadwal praktek
Route::get('/admin/jadwal-praktikum','JadwalPraktikumController@index');
Route::get('/admin/jadwal-praktikum/add','JadwalPraktikumController@add');
Route::post('/admin/jadwal-praktikum/store','JadwalPraktikumController@store');
Route::delete('/admin/jadwal-praktikum/delete/{id}','JadwalPraktikumController@delete');
Route::get('/admin/jadwal-praktikum/search-by-date','JadwalPraktikumController@search_by_date');
Route::get('/admin/jadwal-praktikum/search-by-tahun-akademik','JadwalPraktikumController@search_by_tahun_akademik');
Route::get('/admin/jadwal-praktikum/export_excel', 'JadwalPraktikumController@export_excel');
Route::get('/admin/jadwal-praktikum/pending','JadwalPraktikumController@adminpendingindex');
Route::get('/admin/jadwal-praktikum/updatestatus/{id}','JadwalPraktikumController@updatestatusjadwalpraktek');

//user
Route::get('/admin/user','UserController@index');
Route::get('/admin/applicant','UserController@daftarasdos');
Route::get('/admin/asdos','UserController@dataasdos');
Route::get('/admin/daftar-asistensi',"UserController@daftar_asistensi");
Route::get('/admin/daftar-asistensi-tidak-aktif',"UserController@daftar_asistensi_nonaktif");
Route::get('/admin/profileasdos/{id}','UserController@profileasdos');
Route::get('/admin/asdos/export_excel', 'UserController@export_excel');
Route::get('/admin/asdos/export_applicant_excel', 'UserController@export_applicant_excel');
Route::get('/admin/asdos/update-status-matkul/{id}', 'UserController@update_status_matkul');

Route::get('/admin/applicant/{id}','UserController@makeasdos');
Route::delete('/admin/user/delete/{id}','UserController@delete');
Route::get('/admin/user/rules/{id}','UserController@makeadmin');
//presensi
Route::get('/admin/presensi/detail/{id}','PresensiController@detailpresensi');
Route::get('/admin/asdos-presensi','PresensiController@asdos_presensi');
Route::get('/admin/presensi/export_excel', 'PresensiController@export_excel');
Route::get('/admin/presensi/export_excel_asdos/{id}', 'PresensiController@export_excel_asdos');
Route::get('/admin/presensi/updatestatusapproval/{id}','PresensiController@updatestatusapprovalpresensi');
Route::get('/admin/presensi/editpresensi/{id}','PresensiController@edit');
Route::put('/admin/presensi/editpresensi/update/{id}','PresensiController@update');

//gaji
Route::get('admin/gaji','GajiController@index');
Route::get('admin/honor-asdos','GajiController@asdos_honor');
Route::get('/admin/honorasdos/updategaji/{id}','GajiController@updatestatusgaji');
Route::get('/admin/gaji/detail/{id}','GajiController@detailgaji');
Route::get('/admin/gaji/export_excel', 'GajiController@export_excel');
Route::get('/admin/gaji/export_excel_asdos/{id}', 'GajiController@export_excel_asdos');
Route::get('/admin/gaji/detail/presensi/{id}','GajiController@detailpresensi');

//sertifikat
Route::get('admin/sertifikat','SertifikatController@index');
Route::get('admin/sertifikat/add','SertifikatController@add');
Route::post('/admin/sertifikat/store','SertifikatController@store');
Route::delete('/admin/sertifikat/delete/{id}','SertifikatController@delete');
Route::get('/admin/sertifikat/export_excel', 'SertifikatController@export_excel');


//tahun akademik
Route::get('admin/tahun-akademik','TahunAkademikController@index');
Route::get('admin/tahun-akademik/add','TahunAkademikController@add');
Route::post('admin/tahun-akademik/store','TahunAkademikController@store');
Route::delete('/admin/tahun-akademik/delete/{id}','TahunAkademikController@delete');
Route::get('/admin/tahun-akademik/search/tahun','TahunAkademikController@tahun_search');
Route::get('/admin/tahun-akademik/edit/{id}','TahunAkademikController@edit');
Route::put('/admin/tahun-akademik/update/{id}','TahunAkademikController@update');

//testimonial
Route::get('admin/testimonial','TestimonialController@index');
Route::get('admin/testimonial/add','TestimonialController@add');
Route::post('admin/testimonial/store','TestimonialController@store');
Route::delete('/admin/testimonial/delete/{id}','TestimonialController@delete');
Route::get('/admin/testimonial/edit/{id}','TestimonialController@edit');
Route::put('/admin/testimonial/update/{id}','TestimonialController@update');

});
Auth::routes();

//asdos
//jadwal praktek
Route::group(['middleware' => 'asdos'], function()
{

    
Route::get('/asdos/dashboard','HomeController@asdos');

Route::get('/asdos/jadwal-praktikum','JadwalPraktikumController@asdosindex');
Route::get('/asdos/jadwal-praktikum/pending','JadwalPraktikumController@asdospendingindex');
Route::get('/asdos/jadwal-praktikum/add','JadwalPraktikumController@addasdos');
Route::post('/asdos/jadwal-praktikum/store','JadwalPraktikumController@storeasdos');

//kelas
Route::get('/asdos/kelas','KelasController@asdosindex');

//ruangan
Route::get('/asdos/ruangan','RuanganController@asdosindex');

//matkul
Route::get('/asdos/matkul','MatkulController@asdosindex');

//asdos
Route::get('/asdos','UserController@asdos');

//presensi
Route::get('/asdos/presensi','PresensiController@indexasdos');
Route::get('/asdos/presensi/add/{id}','PresensiController@addasdos');
Route::post('/asdos/presensi/store','PresensiController@asdosstore');
Route::delete('/asdos/presensi/presensidelete/{id}','PresensiController@presensidelete');
Route::get('/insentif/{id}','PresensiController@insentif')->name('getinsentif');

//asdos
Route::get('/asdos/profile/{id}','AsdosController@profile');
Route::get('/asdos/profile/edit/{id}','AsdosController@editprofile');
Route::put('/asdos/profile/edit/{id}','AsdosController@update');
Route::get('/asdos/profile/edit-photo/{id}','AsdosController@editphoto');
Route::put('/asdos/profile/edit-photo/{id}','AsdosController@updatephoto');


//gaji
Route::get('/asdos/gaji','GajiController@asdosindex');
Route::get('/asdos/gaji/paid','GajiController@asdosgajipaid');
Route::get('/asdos/gaji/detail/presensi/{id}','GajiController@detailpresensi');

//sertifikat
Route::get('/asdos/sertifikat/{id}','SertifikatController@sertifikatasdos');

});