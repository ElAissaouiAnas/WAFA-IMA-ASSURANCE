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

Route::name('home')->get('/', 'HomeController@home');
Route::name('formulaire')->get('/formulaire', 'HomeController@formulaire');
Route::name('formulaire_key')->get('/formulaire/{key}', 'HomeController@formulaire');
Route::name('formulaire_key')->post('/formulaire/{key}', 'HomeController@formulaire');
Route::name('hiw')->get('/souscrire', 'HomeController@hiw');
Route::name('imprimer')->get('/imprimer', 'HomeController@imprimer');
Route::name('conditions_generales')->get('/conditions-generales', 'HomeController@conditions_generales');
Route::name('mentions_legales')->get('/mentions-legales', 'HomeController@mentions_legales');
Route::name('compare_price')->get('/compare-price', 'HomeController@compare_price');
Route::name('contact')->get('/contact', 'HomeController@contact');
Route::name('contrat')->get('/contrat', 'HomeController@contrat');
Route::name('paiement')->post('/paiement', 'HomeController@paiement');

Route::name('import')->get('/import', 'HomeController@import');
Route::name('import')->post('/import', 'HomeController@import');

Route::name('import2')->get('/import2', 'HomeController@import2');
Route::name('import2')->post('/import2', 'HomeController@import2');

Route::name('checkout')->post('/checkout', 'HomeController@checkout');

Route::name('confirme')->get('/confirme/{key}', 'HomeController@confirme');
Route::name('confirme')->post('/confirme/{key}', 'HomeController@confirme');

Route::name('reservation')->post('/reservation', 'HomeController@reservation');
Route::name('pay')->post('/pay', 'HomeController@pay');

Route::name('confirmepayement')->post('/confirmepayement', 'HomeController@confirmepayement');

Route::name('send_mail')->post('/send_mail/{type}/{id}', 'HomeController@send_mail');

Route::name('recap')->get('/recap', 'HomeController@recap');
Route::name('recap')->post('/recap', 'HomeController@recap');

Route::name('voucher')->get('/voucher/{id}', 'HomeController@voucher');
