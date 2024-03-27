<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\PdfController;
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
});

Route::get('/login', function () {
    return redirect(route('filament.admin.auth.login'));
})->name('login');

Route::middleware(['web'])->group(function() {

    Route::get('/pdf/bookings/vehicle/{id}', [PdfController::class, 'getVehicleBookingForm'])->name('pdf.bookings.vehicle.index');

    Route::get('/approval/{token}', [ApprovalController::class, 'approves'])->name('approval');
    Route::get('approval/resend/token/{id}', [ApprovalController::class, 'resend'])->name('resend_approval_link');
});