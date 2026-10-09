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
Route::get('/evenement/{reference}/invitation/{code}/image', [HomeController::class, 'invitationImage'])->name('event.invitation.image');
Route::get('/generate-invitation-image/{reference}/{code}', [HomeController::class, 'generateInvitationImage'])->name('generate.invitation.image');
Route::post('/evenement/{reference}/invitation/{code}/rsvp', [HomeController::class, 'rsvp'])->name('guest.rsvp');

Route::get('/verifier-invitation', [\App\Http\Controllers\InvitationVerifierController::class, 'form'])->name('invitation.check.form');
Route::post('/verifier-invitation', [\App\Http\Controllers\InvitationVerifierController::class, 'verify'])->name('invitation.check.verify');


Route::get('/event/login', [\App\Http\Controllers\EventLoginController::class, 'showLoginForm'])->name('event.login.form');
Route::post('/event/login', [\App\Http\Controllers\EventLoginController::class, 'login'])->name('event.login');
Route::post('/event/logout', [\App\Http\Controllers\EventLoginController::class, 'logout'])->name('event.logout');

Route::get('/template', [\App\Http\Controllers\HomeController::class, 'template'])->name('template');
Route::get('/modeles/jardin-de-promesses', [\App\Http\Controllers\TemplatePreviewController::class, 'jardin'])->name('template.jardin.preview');
Route::get('/{code}/template', [\App\Http\Controllers\HomeController::class, 'template_detail'])->name('template.detail');

// Public JPEG endpoints for link previews; no session or JavaScript required.
Route::get('/partage/mariage.jpg', [\App\Http\Controllers\ShareImageController::class, 'show'])->name('share-image.default');
Route::get('/partage/mariage/{reference}.jpg', [\App\Http\Controllers\ShareImageController::class, 'show'])->name('event.share-image');

Route::get('/modeles/civil-jardin-ambre', [\App\Http\Controllers\CivilInvitationController::class, 'preview'])->name('civil.preview');
Route::get('/modeles/civil-jardin-ambre.jpg', [\App\Http\Controllers\CivilInvitationController::class, 'previewImage'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class, \Illuminate\Session\Middleware\StartSession::class, \Illuminate\View\Middleware\ShareErrorsFromSession::class])->name('civil.preview.image');
Route::get('/civil/{reference}/invitation/{code}', [\App\Http\Controllers\CivilInvitationController::class, 'show'])->name('civil.invitation');
Route::get('/civil/{reference}/invitation/{code}/image.jpg', [\App\Http\Controllers\CivilInvitationController::class, 'image'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class, \Illuminate\Session\Middleware\StartSession::class, \Illuminate\View\Middleware\ShareErrorsFromSession::class])->name('civil.image');
Route::get('/civil/{reference}/invitation/{code}/partager', [\App\Http\Controllers\CivilInvitationController::class, 'share'])->name('civil.share');

Route::get('/modeles/civil-jardin-ambre/decor.jpg', [\App\Http\Controllers\CivilInvitationController::class, 'previewScene'])->name('civil.preview.scene');
Route::get('/civil/{reference}/invitation/{code}/decor.jpg', [\App\Http\Controllers\CivilInvitationController::class, 'scene'])->name('civil.scene');

Route::get('/modeles/civil-jardin-ambre/photo.jpg', [\App\Http\Controllers\CivilInvitationController::class, 'previewPhoto'])->name('civil.preview.photo');
Route::get('/civil/{reference}/invitation/{code}/photo.jpg', [\App\Http\Controllers\CivilInvitationController::class, 'photo'])->name('civil.photo');

Route::get('/civil/{reference}/invitation/{code}/theme-image', [\App\Http\Controllers\CivilInvitationController::class, 'themeImage'])->name('civil.theme-image');
