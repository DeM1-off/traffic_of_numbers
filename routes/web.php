<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account;

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
    return view('layouts/app');
});
Route::get('/account', [Account::class, 'index'])->name('account.index');
Route::get('/account/adduser', [Account::class, 'addUser'])->name('account.adduser');
Route::get('/account/{user}/addnumber', [Account::class, 'addNumber'])->name('account.addnumber');
Route::get('/account/{user}/addbalance', [Account::class, 'addBalance'])->name('account.addbalance');

Route::post('/account', [Account::class, 'storeAccount'])->name('account.storeaccount');
Route::post(  '/account/store', [Account::class, 'storeNumber'])->name('account.storenumber');
Route::post('/account/balance', [Account::class, 'storeBalance'])->name('account.storebalance');


Route::get('/account/{user}', [Account::class, 'show'])->name('account.show');


Route::delete('/account/{user}', [Account::class, 'destroy'])->name('account.destroy');


