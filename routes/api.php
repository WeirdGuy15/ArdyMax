<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('lihatuserperid/{id}','API\UserController@lihatuserperid');

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});

Route::get('userviewedit/{id}','API\UserController@viewedit');//GetDataUseryangMaudiedit
Route::put('userupdate/{id}','API\UserController@update');//PutUpdateUser
Route::get('getlevel','API\UserController@getlevel');//GetFOrmDevisi


Route::get('Api','ApiController@awal'); //GetSemuaApiYangterdaftar
Route::get('Apiuser','ApiController@Apiuser'); //GetApiSesuaiNamaUser



Route::get('userlist','API\UserController@viewuser'); //GetSemuauserYangterdaftar
Route::get('form','ApiController@form'); //GetisiDataForm(untuk Tambah Api Supaya Dinamis)
Route::post('tambah', 'ApiController@tambah'); //TambahApi
Route::post('uploadfoto', 'ApiController@uploadfoto');//UploadFotoApi
Route::post('uploadfotogaun', 'ApiController@uploadfotogaun');//UploadFotoApi
Route::post('uploadfotodekor', 'ApiController@uploadfotodekor');//UploadFotoApi
Route::post('uploadfotobooth', 'ApiController@uploadfotobooth');//UploadFotoApi

Route::get('lihatApi/{id}','ApiController@lihatApi'); //nampilkanApiperID
Route::post('sudah/{id}', 'ApiController@sudah'); //masukKeRiwayat
Route::get('vieweditApi/{id}','ApiController@viewedit');
Route::put('updateApi/{id}','ApiController@updateApi');


Route::get('history', 'ApiController@history'); //masukKeRiwayat
Route::get('viewhistory/{id}', 'ApiController@viewhistory'); //masukKeRiwayat
Route::delete('deleteriwayat/{id}','LaporanController@deleteriwayat');//hapus riwayat
Route::delete('deleteApi/{id}','ApiController@deleteApi');//hapus Api
Route::get('export','LaporanController@export');//download laporan
Route::delete('delete/{id}','API\UserController@delete');//hapus USERR 

Route::get('image/{filename}','ApiController@image');//getfoto

Route::post('login/customer','ApiController@loginnumber');//loginCustomer


//Route::get('Api','ApiController@awal');
//Route::get('form','ApiController@form');
//Route::post('tambah', 'ApiController@tambah');


