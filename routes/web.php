<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name("homepage")->middleware(["WithAuth"]);

Route::any("/login", [AuthController::class, "login"])
    ->name('login')
    ->middleware(["noAuth"]);
Route::any("/logout", [AuthController::class, "logout"])
    ->name('logout')
    ->middleware(["WithAuth"]);

Route::get("/", function() {
    return view("frontend.index");
})->name("index");


Route::get("/add", function() {
    return view("frontend.add");
})->name("add");


Route::get("/detail/{id}", function() {
    return view("frontend.detail");
})->name("detail");