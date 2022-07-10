<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController as A;

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

//Accounts
Route::get('/accounts', [A::class, 'index'])->name('accounts-index');
Route::get('/accounts/create', [A::class, 'create'])->name('accounts-create');
Route::post('/accounts', [A::class, 'store'])->name('accounts-store');
Route::get('/accounts/edit/{account}', [A::class, 'edit'])->name('accounts-edit');
Route::put('/accounts/{account}', [A::class, 'update'])->name('accounts-update');
Route::delete('/accounts/{account}', [A::class, 'destroy'])->name('accounts-delete');
