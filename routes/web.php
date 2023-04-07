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

Route::get('/', function(){
    return view('cartao');
});

Route::get('/cartao', function () {
    return view('cartao');
});

Route::get('/boleto', function(){
    return view('boleto');
});

Route::get('/obrigado', function(){
    return view('obrigado');
});

Route::get('/obrigado/{id}', function($id){
    return view('obrigado', [
        'id'    =>  $id
    ]);
});

