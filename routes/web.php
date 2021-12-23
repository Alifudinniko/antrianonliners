<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficerController;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
    Alert::alert('Title', 'Message', 'Type');
    return view('welcomeee');
})->name('welcomeee');
Route::get('/bamb', function () {

    return view('admins.jadwal.create');
});
Route::get('my-chart', 'ChartController@index');

Auth::routes();

// =>  Halaman sehabis login
Route::get('/home', 'HomeController@index')->name('home');  // selain officer
Route::get('/dashboard', 'DashboardController@index');      // officer

// => Halaman depan / welcomeee
Route::get('/', 'FrontendController@index');
Route::get('/search', 'FrontendController@search')->name('poli.search');




// => Halaman depan membuat antrian sepertinya tapi tidak berhasil
Route::resource('antrian', 'AntriansController');
Route::get('/new-antrian/{id_poly}', 'FrontendController@show')->name('create.antrian');

// => Halaman untuk mendapatkan nomer antrian
Route::get('/tiket/{user_id}/{dokter_id}/{date}/{sesi}', 'FrontendController@tiket')->name('create.tiket');

// => Halaman untuk mendisplay antrian
Route::resource('display', 'DisplayController');
Route::get('/display', 'DisplayController@index')->name('display.index');      // display

//kirim email
Route::get('/sendmail', 'MailController@kirim_email');

// => Login sebagai Admin
Route::group(['middleware' => ['auth', 'admin']], function () {

    //  => CRUD admin, officer, poly, pasien
    Route::resource('admin', 'AdminController');
    Route::resource('officer', 'OfficerController');
    Route::resource('poly', 'PolysController');
    Route::resource('pasien', 'PasiensController');
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store')->name('profile.store');
    //=> Rekap
    // Route::resource('rekap', 'RekapController');
    Route::get('/rekap', 'RekapController@index')->name('rekap.index');
    Route::post('/rekap', 'RekapController@sort');
    Route::get('/rekap/export_excel', 'RekapController@export_excel')->name('rekap.excel');

    // => Dokter
    Route::resource('dokter', 'DokterController');



    Route::get('/dokter/status/update/{id}', 'DokterController@toggleStatus')->name('update.status.dokter');
});

// => Login sebagai Officer
Route::group(['middleware' => ['auth', 'officer']], function () {


    // => Antrian
    Route::resource('antrian', 'AntriansController');
    Route::get('/status/update/2/{id}', 'AntriansController@toggleStatus')->name('update.status.antrian');
    Route::get('/status/update/{id}', 'AntriansController@toggleStatus')->name('update.status.antrian');
    // Route::get('export', 'AntriansController@export')->name('export');
    // => Pasien
    Route::get('/antrian/list', 'AntriansController@list')->name('antrian.list');
    Route::get('/antriantoday/{id}', 'AntriansController@antriantoday')->name('antriantoday');



    // => Jadwal
    Route::resource('jadwal', 'JadwalController');
    Route::post('/jadwal/check', 'JadwalController@check')->name('jadwal.check');
    Route::post('/jadwal/update', 'JadwalController@updateTime')->name('jadwal.update');
    // => Sesi
    Route::resource('sesi', 'SesisController');
    Route::post('/sesi/update2/{id}', 'SesisController@update2')->name('sesi.buka');
    Route::get('/status/update/{id}', 'SesisController@toggleStatus')->name('update.status.sesi');
});

// => Login sebagai Pasien
Route::group(['middleware' => ['auth', 'pasien']], function () {


    // =>Print tiket
    Route::get('/my-antrian/print/{id}', 'FrontendController@print');


    // =>buat antrian
    Route::post('/pesan/antrian', 'FrontendController@store')->name('pesan.antrian');
    Route::get('/my-antrian', 'FrontendController@myAntrians')->name('my.antrian');

    Route::post('/display/sesi', 'DisplayController@show')->name('sesi.display');
});

// !! info : name buat dipanggil di view
