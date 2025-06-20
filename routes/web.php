<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/evenement/{reference}', [HomeController::class, 'event'])->name('event.detail');
Route::get('/evenement/{reference}/invitation/{code}', [HomeController::class, 'invitation'])->name('event.invitation');
Route::post('/evenement/{reference}/invitation/{code}/rsvp', [HomeController::class, 'rsvp'])->name('guest.rsvp');

Route::get('/verifier-invitation', [\App\Http\Controllers\InvitationVerifierController::class, 'form'])->name('invitation.check.form');
Route::post('/verifier-invitation', [\App\Http\Controllers\InvitationVerifierController::class, 'verify'])->name('invitation.check.verify');


Route::get('/event/login', [\App\Http\Controllers\EventLoginController::class, 'showLoginForm'])->name('event.login.form');
Route::post('/event/login', [\App\Http\Controllers\EventLoginController::class, 'login'])->name('event.login');
Route::post('/event/logout', [\App\Http\Controllers\EventLoginController::class, 'logout'])->name('event.logout');

Route::get('/template', [\App\Http\Controllers\HomeController::class, 'template'])->name('template');
Route::get('/{code}/template', [\App\Http\Controllers\HomeController::class, 'template_detail'])->name('template.detail');
