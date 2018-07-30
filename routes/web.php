<?php
use App\Peserta;
use App\Promotor;
use Illuminate\Http\Request;
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

Auth::routes();

Route::get('/under-construction', function(){
    return view('under');
})->name('under');

Route::group(['middleware' => 'auth'], function () {

	 /*
    |--------------------------------------------------------------------------
    | Home Routes and Default Controller
    |--------------------------------------------------------------------------
    */
    Route::get('/', function() { return redirect('/home'); });
    Route::get('/home', 'PromotorController@index');

	 /*
    |--------------------------------------------------------------------------
    | Promotor's Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/promotor', 'PromotorController');
    Route::get('/caripromotor/{nama_promotor}', 'PromotorController@caripromotor');
    Route::get('/datatableApi', 'PromotorController@datatableApi');
	 /*
    |--------------------------------------------------------------------------
    | Peserta's Routes
    |--------------------------------------------------------------------------
    */
	Route::resource('/peserta', 'PesertaController');
    Route::get('/caripeserta/{nama_peserta}', 'PesertaController@caripeserta');
}); /* end of Middleware Auth */


