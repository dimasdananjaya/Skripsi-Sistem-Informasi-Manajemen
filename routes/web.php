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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/pengunjung','PengunjungDashboardController');

Route::group(['middleware' => ['auth', 'petugas_dinas'], 'prefix' => 'petugas_dinas'], function () {
    Route::get('/', 'PetugasDinasDashboardController@index')->name('petugas_dinas_dashboard');
    Route::resource('/uml','UMLController');
    Route::resource('/komoditi','KomoditiController');
    Route::resource('/data_petugas_uml','DataPetugasUMLController');
    Route::resource('/gapoktan','GapoktanPetugasDinasController');
    Route::resource('/user','UserController');
});

Route::group(['prefix' => 'petugas_uml'], function () {
    Route::get('/login', 'AuthPetugasUML\LoginController@showLoginForm')->name('petugas_uml_login');
    Route::post('/login/submit', 'AuthPetugasUML\LoginController@login')->name('petugas_uml_login_submit');
    Route::get('/', 'PetugasUMLDashboardController@index')->name('petugas_uml_dashboard');
    Route::get('/gapoktan/{id}', 'PetugasUMLDashboardController@show');
    Route::get('/lihat_gapoktan/{id}', 'PetugasUMLDashboardController@halamanPrint');
    Route::post('/logout','AuthPetugasUML\LoginController@logout')->name('petugas_uml_logout');
    Route::resource('/gapoktan','GapoktanController');
    Route::resource('/alat','AlatController');
    Route::resource('/pemasaran','PemasaranController');
    Route::resource('/produksi','ProduksiController');

});

Route::group(['middleware' => ['auth', 'kepala_bidang'], 'prefix' => 'kepala_bidang'], function () {
    Route::get('/', 'KepalaBidangDashboardController@index')->name('kepala_bidang_dashboard');
    Route::get('/laporan_gapoktan', 'KepalaBidangDashboardController@laporanGapoktan')->name('laporan_gapoktan');
    Route::get('/laporan_uml', 'KepalaBidangDashboardController@laporanUML')->name('laporan_uml');

});

