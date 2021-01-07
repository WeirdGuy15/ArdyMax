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

/*Route::get('/', function () {
    return view('menuadmin.user');
});*/
Route::get('/','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin')->name('postlogin');
Route::get('/logout','AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth','checkLevel:Superadmin,Admin']], function(){

	Route::get('/dashboard', 'AdminController@index')->name('dashboard');
	Route::get('dashboard/chart', 'AdminController@chart')->name('Chartdashboard');

	//USER
	Route::get('/user','UserController@index')->name('user');
	Route::post('/user/create','UserController@create')->name('AddUser');
	Route::post('user/update/{id}', 'UserController@update')->name('UpdateUser');
	Route::get('user/delete/{id}', 'UserController@delete')->name('DeleteUser');

	//USER
	Route::get('/customer','CustomerController@index')->name('customer');
	Route::post('customer/update/{id}', 'CustomerController@update')->name('Updatecustomer');
	Route::get('customer/delete/{id}', 'CustomerController@delete')->name('Deletecustomer');

	//DEVISI
	Route::get('/devisi','DevisiController@index')->name('devisi');
	Route::post('/devisi/create','DevisiController@create')->name('AddDevisi');
	Route::post('devisi/update/{id}', 'DevisiController@update')->name('UpdateDevisi');
	Route::get('devisi/delete/{id}', 'DevisiController@delete')->name('DeleteDevisi');

	//PAKET
	Route::get('/paket','paketController@index')->name('paket');
	Route::post('/paket/create','paketController@create')->name('Addpaket');
	Route::post('paket/update/{id}', 'paketController@update')->name('Updatepaket');
	Route::get('paket/delete/{id}', 'paketController@delete')->name('Deletepaket');
			
	//RIAS
	Route::get('/rias','RiasController@index')->name('rias');
	Route::post('/rias/create','RiasController@create')->name('Addrias');
	Route::post('rias/update/{id}', 'RiasController@update')->name('Updaterias');
	Route::get('rias/delete/{id}', 'RiasController@delete')->name('Deleterias');

	//JENISRIAS
	Route::get('/jenisrias','jenisriasController@index')->name('jenisrias');
	Route::post('/jenisrias/create','jenisriasController@create')->name('Addjenisrias');
	Route::post('jenisrias/update/{id}', 'jenisriasController@update')->name('Updatejenisrias');
	Route::get('jenisrias/delete/{id}', 'jenisriasController@delete')->name('Deletejenisrias');
			
	//Dekorasi        
	Route::get('/dek','DekController@index')->name('dek');
	Route::post('/dek/create','DekController@create')->name('Adddek');
	Route::post('dek/update/{id}', 'DekController@update')->name('Updatedek');
	Route::get('dek/delete/{id}', 'DekController@delete')->name('Deletedek');		

	//Dokumentasi
	Route::get('/dok','DokController@index')->name('dok');
	Route::post('/dok/create','DokController@create')->name('Adddok');
	Route::post('dok/{id}/update', 'DokController@update')->name('Updatedok');
	Route::get('dok/{id}/delete', 'DokController@delete')->name('Deletedok');		

	//MC
	Route::get('/mc','McController@index')->name('mc');
	Route::post('/mc/create','McController@create')->name('Addmc');
	Route::post('mc/{id}/update', 'McController@update')->name('Updatemc');
	Route::get('mc/{id}/delete', 'McController@delete')->name('Deletemc');

	//Hiburan
	Route::get('/hiburan','HiburanController@index')->name('hiburan');
	Route::post('/hiburan/create','HiburanController@create')->name('Addhiburan');
	Route::post('hiburan/{id}/update', 'HiburanController@update')->name('Updatehiburan');
	Route::get('hiburan/{id}/delete', 'HiburanController@delete')->name('Deletehiburan');

	//Cuculampah
	Route::get('/cuculampah','cuculampahController@index')->name('cuculampah');
	Route::post('/cuculampah/create','cuculampahController@create')->name('Addcuculampah');
	Route::post('cuculampah/{id}/update', 'cuculampahController@update')->name('Updatecuculampah');
	Route::get('cuculampah/{id}/delete', 'cuculampahController@delete')->name('Deletecuculampah');

	//TENDA
	Route::get('/tenda','TendaController@index')->name('tenda');
	Route::post('/tenda/create','TendaController@create')->name('Addtenda');
	Route::post('tenda/{id}/update', 'TendaController@update')->name('Updatetenda');
	Route::get('tenda/{id}/delete', 'TendaController@delete')->name('Deletetenda');

	//MOBIL
	Route::get('/mobil','MobilController@index')->name('mobil');
	Route::post('/mobil/create','MobilController@create')->name('Addmobil');
	Route::post('mobil/{id}/update', 'MobilController@update')->name('Updatemobil');
	Route::get('mobil/{id}/delete', 'MobilController@delete')->name('Deletemobil');

	//Jadwal
	Route::get('/jadwal','jadwalController@index')->name('jadwal');
	Route::post('/jadwal/create','jadwalController@create')->name('Addjadwal');
	Route::post('jadwal/{id}/update', 'jadwalController@update')->name('Updatejadwal');
	Route::get('jadwal/{id}/lihat', 'jadwalController@lihat')->name('Viewjadwal');
	Route::get('jadwal/{id}/selesai', 'jadwalController@laporan')->name('Donejadwal');	
	Route::get('jadwal/{id}/delete', 'jadwalController@delete')->name('Deletejadwal');	
	Route::get('jadwal/{id}/edit', 'jadwalController@edit')->name('Editjadwal');
	Route::get('jadwal/dekor/{id}', 'jadwalController@dekor')->name('Getdekor');
	Route::get('jadwal/dok/{id}', 'jadwalController@dok')->name('Getdok');
	Route::get('jadwal/rias/{id}', 'jadwalController@rias')->name('Getrias');
	Route::get('jadwal/hiburan/{id}', 'jadwalController@hiburan')->name('Gethiburan');
	Route::get('jadwal/mc/{id}', 'jadwalController@mc')->name('Getmc');
			
	//Laporan
	Route::get('/laporan','LaporanController@index')->name('laporan');
	Route::get('laporan/{id}/delete', 'LaporanController@delete')->name('Deletelaporan');
	Route::get('laporan/export','LaporanController@export')->name('Exportlaporan');		

	//Makanan
	Route::get('makanan','MakanController@index')->name('makanan');
	Route::get('makanan/{kategori}','MakanController@kategori')->name('makananKategori');
	Route::post('/makanan/create','MakanController@add')->name('Addmakan');
	Route::post('makanan/update/{id}', 'MakanController@update')->name('Updatemakan');
	Route::get('makanan/delete/{id}', 'MakanController@delete')->name('Deletemakan');

});



