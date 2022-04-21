<?php

use App\Http\Controllers\MyPage;
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





Route::get("/", [MyPage::class, "showPost"])->name("main");
Route::get("/about", [MyPage::class, "showAbout"])->name("about");
Route::get("/contacts", [MyPage::class, "showContacts"])->name("contacts");
Route::get("/products", [MyPage::class, "showProducts"])->name("products");
Route::get("/licenses", [MyPage::class, "showLicenses"])->name("licenses");

Route::get("/map", [MyPage::class, "showMap"])->name('map');



require __DIR__.'/auth.php';
