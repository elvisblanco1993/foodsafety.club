<?php

use App\Http\Livewire\Web\Signup;
use App\Jobs\PullFDADataJob;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return view('website.home');
});

Route::get('about', function() {
    return view('website.about');
});

Route::get('thank-you', function() {
    if (!session()->has('subscribed')) {
        return redirect('/');
    }
    session()->remove('subscribed');
    return view('website.thank-you');
})->name('thank-you');

Route::get('/refresh', function(){
    PullFDADataJob::dispatch();
});

Route::get('/unsubscribe', function(){
    return view('website.unsubscribe');
})->name('unsubscribe');

Route::get('/terms-of-service', function(){
    return view('website.terms');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
