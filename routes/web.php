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
    return view('templates.login');
});

Route::get('/stats', function () {
    return view('pages.statistic');
});

Route::get('/alert', function () {
    return view('pages.components.component');
});

Route::get('/daftar', function () {
    return view('templates.register');
});

// Route::get('/tambahDokter', function () {
//     return view('templates.tambahDokter');
// });

Route::get('/tambahDokter', function () {
    return view('templates.tambahDokter');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tampilanDokter', 'addDokter@index')->name('index');
Route::get('/tambahDokter', 'addDokter@spesialis');
Route::post('/tambahDokter', 'addDokter@store')->name('post');
Route::post('deleteItem', 'addDokter@deleteItem');
Route::get('redirection', 'addDokter@redirection');
Route::get('redirections', 'addDokter@redirections');
Route::post('editItem', 'addDokter@update');


Route::get('/pesan', 'FlashMessageController@index');
Route::get('/get-pesan', 'FlashMessageController@pesan');

Route::get('/tambahPasien', 'pasienController@index');
Route::post('/tambahPasien', 'pasienController@store')->name('post.pasien');
Route::get('/tambahPasien/{id}', 'pasienController@dropDown');
Route::get('/tampilanPasien', 'pasienController@tampilanPasien');
Route::post('/deletePasien', 'pasienController@deleteItem');
Route::get('redirectionPasien', 'pasienController@redirection');
Route::get('redirectionsPasien', 'pasienController@redirections');