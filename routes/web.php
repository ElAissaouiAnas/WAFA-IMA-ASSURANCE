<?php
use Illuminate\Support\Facades\DB;

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
/* Route::get("/test",function(){
    //return Session::get("chargeId");
    //return Session::get("signature");
    //return DB::select(DB::raw("SHOW COLUMNS FROM contrats"));
    //return DB::select("SHOW TABLES");
    //return DB::table("users")->get();
    //return DB::table("payments")->get();
    return DB::table("contrats")->get();
    return DB::table("a_users")->get();
    return DB::table("assurances")->get();
}); */
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
Route::name('paiement')->post('/paiement', 'HomeController@paiement');//->post
                        
Route::name('import')->get('/import', 'HomeController@import');
Route::name('import')->post('/import', 'HomeController@import');

Route::name('import2')->get('/import2', 'HomeController@import2');
Route::name('import2')->post('/import2', 'HomeController@import2');

Route::name('checkout')->post('/checkout', 'HomeController@checkout');
//commun between all payment method
Route::name('confirme')->get('/confirme/{key}', 'HomeController@confirm');
Route::name('confirme')->post('/confirme/{key}', 'HomeController@confirm');

//====================================================
//====================================================
//Created By Salah-Eddine
//Email:  19mansour94@gmail.com
Route::name("payzone.checkout")->post("/payzone/checkout","PayzoneController@checkout");
Route::name("payzone.success")->get("/payzone/success","PayzoneController@success");
//callback function is not working
//Route::name("payzone.callback")->get("/payzone/callback","PayzoneController@callback");
Route::name("payzone.callback")->post("/payzone/callback","PayzoneController@callback");
//======================================================
//======================================================

Route::name('reservation')->post('/reservation', 'HomeController@reservation');
Route::name('pay')->post('/pay', 'HomeController@pay');

Route::name('confirmepayement')->post('/confirmepayement', 'HomeController@confirmepayement');

Route::name('send_mail')->post('/send_mail/{type}/{id}', 'HomeController@send_mail');

Route::name('recap')->get('/recap', 'HomeController@recap');
Route::name('recap')->post('/recap', 'HomeController@recap');

Route::name('voucher')->get('/voucher/{id}', 'HomeController@voucher');
