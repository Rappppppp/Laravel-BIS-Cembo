<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\NotifyEmailController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\HomepageController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Dashboard - no longer needed
// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // User - Homepage
    Route::group(['middleware' => ['registration_completed']], function () {
        Route::get('/', [HomepageController::class, 'index'])->name('user.homepage');

        Route::get('/services', function () {
            return view('user.services.index');
        });

        Route::get('/services/agricultural', function () {
            return view('user.services.agricultural');
        });

        Route::get('/services/fire-dept', function () {
            return view('user.services.fire-dept');
        });

        Route::get('/services/health-center', function () {
            return view('user.services.health-center');
        });

        Route::get('/services/maintenance', function () {
            return view('user.services.maintenance');
        });

        Route::get('/aboutus', function () {
            return view('user.aboutus');
        });

        // Request Documents - User
        Route::get('/documents', [DocumentController::class, 'index'])->name('documents');
        Route::get('/documents/{form}', [DocumentController::class, 'showForm'])->name('documents.showForm');
        Route::post('/documents/submit', [DocumentController::class, 'submit'])->name('documents.submit');

        // Request Complaints - User
        Route::get('/complaints', [ComplaintController::class, 'index'])->name('complaints');
        Route::post('/complaints/submit', [ComplaintController::class, 'submit'])->name('complaints.submit');

    });

    $OfficlaAdminsRole = 'role:BarangayOfficial,Admin';
    $admin = 'role:Admin';

    // Admin / Brgy Official - Tables
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin.index')->middleware('auth', $OfficlaAdminsRole);
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');

    // Charts
    Route::get('/admin/charts', [AdminController::class, 'charts'])->name('admin.charts')->middleware('auth', $OfficlaAdminsRole);

    // Add/Edit/Delete Barangay Officials
    Route::get('/admin/officials', [AdminController::class, 'barangayOfficials'])
        ->name('admin.officials')
        ->middleware('auth', $OfficlaAdminsRole);
    Route::post('/admin/officials/add', [AdminController::class, 'addBarangayOfficials'])
        ->name('admin.officials.add')
        ->middleware('auth', $OfficlaAdminsRole); // Will switch back to admin
    Route::delete('/admin/officials/remove/{id}', [AdminController::class, 'removeBarangayOfficial'])
        ->name('admin.officials.remove')
        ->middleware('auth', $OfficlaAdminsRole);

    // Facebook Posts
    Route::get('/admin/posts', [FacebookController::class, 'index'])->name('admin.posts')->middleware('auth', $OfficlaAdminsRole);
    Route::post('/admin/posts/post', [FacebookController::class, 'addPosts'])->name('admin.posts.post')->middleware('auth', $OfficlaAdminsRole);
    Route::delete('/admin/posts/{facebookID}', [FacebookController::class, 'deletePost'])->name('admin.posts.delete')->middleware('auth', $OfficlaAdminsRole);

    // Document Requests
    Route::get('/admin/document-requests', [AdminController::class, 'documentRequests'])->name('admin.documentRequests')->middleware('auth', $OfficlaAdminsRole);
    Route::put('/documents/update/{id}', [DocumentController::class, 'update'])->name('documents.update');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.delete');
    Route::get('/admin/document-requests/{id}', [AdminController::class, 'documentShow'])->name('admin.documentShow')->middleware('auth', $OfficlaAdminsRole);

    // Complaint Requests
    Route::get('/admin/complaint-requests', [AdminController::class, 'complaintRequests'])->name('admin.complaintRequests')->middleware('auth', $OfficlaAdminsRole);
    Route::put('/complaints/update/{id}', [ComplaintController::class, 'update'])->name('complaints.update');
    Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])->name('complaints.delete');

    // SEND EMAIL - COMPLAINTS
    Route::put('/complaintApproved/send/{id}', [NotifyEmailController::class, 'complaintApproved'])->name('complaintApproved.send');
    Route::put('/complaintDenied/send/{id}', [NotifyEmailController::class, 'complaintDenied'])->name('complaintDenied.send');
    Route::put('/requestApproved/send/{id}', [NotifyEmailController::class, 'approve'])->name('requestApproved.send');
    Route::put('/requestDenied/send/{id}', [NotifyEmailController::class, 'denied'])->name('requestDenied.send');

    // DONT REMOVE THIS LINE
    Route::middleware(['auth', $OfficlaAdminsRole])->resource('admin', AdminController::class);
    // DONT REMOVE THIS LINE
});


// Email Verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('user.homepage');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend Verification Email
Route::post('/email/verification-notification', function (Request $request) {
    $user = $request->user();
    $user->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');