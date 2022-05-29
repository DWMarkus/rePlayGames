<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return redirect('/en/login');
});

Route::get('/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'fr'])) { abort(400); }
    App::setLocale($locale);
});

Route::get('/{locale}/home', function ($locale) {
    if (! in_array($locale, ['en', 'fr'])) { abort(400); }
    App::setLocale($locale);
    return view('home');
});

Route::get('/{locale}/login', function ($locale) {
    if (! in_array($locale, ['en', 'fr'])) {
        abort(400);
    }
    App::setLocale($locale);
    return view('auth.login');
});
