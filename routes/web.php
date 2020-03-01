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
Route::get('bv/', 'baivietController@index');
Route::get('/', 'baivietController@index')->name("/");
//Chi Tiết Tin
Route::get('/tin/{TieuDeKD}','BaivietController@detail');
// Hiện Các Tin Trong Loại
Route::get('loai/{TenKD}','BaivietController@cat');
//postComment
Route::post('tin/binhluan',[
	'as' =>'tin/binhluan',
	'uses' => 'BaivietController@postFile'
]);
//TimKiem
Route::get('timkiem','BaivietController@timkiem');
//contact
Route::get('lienhe/', 'baivietController@lienhe');
Route::post('lienhe/', 'GuimailController@guimaillienhe');
Route::get('doingonngu/{language}', 'BaivietController@changeLanguage')->name('change-lang');
// QuanTri
Route::resource('theloai','TheloaiController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth','admin']], function () {
   Route::resource('theloai', 'TheloaiController');
});

Route::resource('loaitin', 'LoaitinController');
Route::resource('tintuc', 'TinController');
Route::get('layloaitintrong1theloai/{idTL}', function($idTL){	
		$kq = DB::select("SELECT idLT, Ten FROM loaitin WHERE idTL=$idTL");
		foreach($kq as $row) { echo "<option value=$row->idLT> $row->Ten </option>";}
	});
