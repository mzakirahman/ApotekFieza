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
Route::get('/', function () {
    return view('login');
});



// login
Route::get('login','App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login','App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout','App\Http\Controllers\AuthController@index')->name('logout');

//auth
//auth -> PemilikApotek || Karyawan

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['Cek_login:PemilikApotek']], function(){
        Route::get('/admin/dataobat','App\Http\Controllers\DashboardDataobatAdminController@index')->name('/admin/dataobat');


        // ADMIN

        Route::get('/admin/dataobat', function () {
            return view('Dashboard.DataObat.index2');
        });

        // data obat admin
        Route::get('/admin/dataobat','DashboardDataobatAdminController@index');
        Route::get('/admin/dataobat/cetak','DashboardDataobatAdminController@cetak');
        Route::get('/dashboard/dataobat/cetak','DashboardDataobatController@cetak');
        Route::get('/admin/dataobat/tambah','DashboardDataobatAdminController@tambah');
        Route::post('/admin/dataobat/store','DashboardDataobatAdminController@store');
        Route::get('/admin/dataobat/editdo/{kode_obat}','DashboardDataobatAdminController@edit');
        Route::post('/admin/dataobat/update','DashboardDataobatAdminController@update');
        Route::get('/admin/dataobat/hapusdo/{kode_obat}','DashboardDataobatAdminController@hapus');
        Route::get('/admin/dataobat/show','DashboardDataobatAdminController@show');

        // obat masuk admin
        Route::get('/admin/obatmasuk','DashboardDataObatmasukAdminController@index');
        Route::get('/admin/obatmasuk/tambah','DashboardDataObatmasukAdminController@tambah');
        Route::post('/admin/obatmasuk/store','DashboardDataObatmasukAdminController@store');
        Route::get('/admin/obatmasuk/cetak','DashboardDataObatmasukAdminController@cetak');
        Route::get('/admin/obatmasuk/cetakPertanggal/{tglAwal}/{tglAkhir}','DashboardDataObatmasukAdminController@cetakPertanggal');

        // obat keluar admin
        Route::get('/admin/obatkeluar','DashboardDataObatkeluarAdminController@index');
        Route::get('/admin/obatkeluar/tambah','DashboardDataObatkeluarAdminController@tambah');
        Route::post('/admin/obatkeluar/store','DashboardDataObatkeluarAdminController@store');
        Route::get('/admin/obatkeluar/cetak','DashboardDataObatkeluarAdminController@cetak');
        Route::get('/admin/obatkeluar/cetakPertanggal/{tglAwal}/{tglAkhir}','DashboardDataObatkeluarAdminController@cetakPertanggal');

        
    });

    Route::group(['middleware' => ['Cek_login:Karyawan']], function(){
        Route::get('/dashboard/dataobat','App\Http\Controllers\DashboardDataobatController@index')->name('/dashboard/dataobat');

        Route::get('/dashboard/dataobat', function () {
            return view('Dashboard.DataObat.index');
        });
        
        // Data Obat
        Route::get('/dashboard/dataobat','DashboardDataobatController@index');
        Route::get('/dashboard/dataobat/tambah','DashboardDataobatController@tambah');
        Route::post('/dashboard/dataobat/store','DashboardDataobatController@store');
        Route::get('/dashboard/dataobat/editdo/{kode_obat}','DashboardDataobatController@edit');
        Route::post('/dashboard/dataobat/update','DashboardDataobatController@update');
        Route::get('/dashboard/dataobat/hapusdo/{kode_obat}','DashboardDataobatController@hapus');
        Route::get('/dashboard/dataobat/cetak','DashboardDataobatController@cetak');
        Route::get('/dashboard/dataobat/show','DashboardDataObatController@show');
        
        // Data Obat Masuk
        Route::get('/dashboard/obatmasuk','DashboardObatmasukController@index');
        Route::get('/dashboard/obatmasuk/tambah','DashboardObatmasukController@tambah');
        Route::post('/dashboard/obatmasuk/store','DashboardObatmasukController@store');
        Route::get('/dashboard/obatmasuk/hapus/{kode_om}','DashboardObatmasukController@hapus');
        Route::get('/dashboard/obatmasuk/cetak','DashboardObatmasukController@cetak');
        Route::get('/dashboard/obatmasuk/cetakPertanggal/{tglAwal}/{tglAkhir}','DashboardObatmasukController@cetakPertanggal');
        
        // Data Obat Keluar
        Route::get('/dashboard/obatkeluar','DashboardObatkeluarController@index');
        Route::get('/dashboard/obatkeluar/tambah','DashboardObatkeluarController@tambah');
        // Route::get('/dashboard/obatkeluar/ajax','DashboardObatkeluarController@ajax');
        Route::post('/dashboard/obatkeluar/store','DashboardObatkeluarController@store');
        Route::get('/dashboard/obatkeluar/hapusobatkeluar/{kode_OK}','DashboardObatkeluarController@hapus');
        Route::get('/dashboard/obatkeluar/cetak','DashboardObatkeluarController@cetak');
        Route::get('/dashboard/obatkeluar/cetakPertanggal/{tglAwal}/{tglAkhir}','DashboardObatkeluarController@cetakPertanggal');
    });
});


