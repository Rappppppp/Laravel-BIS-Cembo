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

    $Official_Admin = 'role:Barangay Official,Admin';
    $ContentManager_Admin = 'role:Content Manager,Admin';
    $Admin = 'role:Admin';

    // Admin / Brgy Official - User Tables
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin.index')->middleware('auth', $Official_Admin);
    // This part is only accessed by Admin
    Route::get('/admin/get/{id}', [AdminController::class, 'getUser'])
        ->middleware('auth', $Admin);
    Route::put('/admin/update/{id}', [AdminController::class, 'updateUser'])
        ->name('admin.user_update')
        ->middleware('auth', $Admin);
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])
        ->name('admin.delete')
        ->middleware('auth', $Admin);

    // Charts
    Route::get('/admin/charts', [AdminController::class, 'charts'])->name('admin.charts')->middleware('auth', $Official_Admin);

    // Add/Edit/Delete Barangay Officials - Admin only
    Route::get('/admin/officials', [AdminController::class, 'barangayOfficials'])
        ->name('admin.officials')
        ->middleware('auth', $Admin);
    Route::post('/admin/officials/add', [AdminController::class, 'addBarangayOfficials'])
        ->name('admin.officials.add')
        ->middleware('auth', $Admin); // Will switch back to admin
    Route::delete('/admin/officials/remove/{id}', [AdminController::class, 'removeBarangayOfficial'])
        ->name('admin.officials.remove')
        ->middleware('auth', $Admin);

    // Facebook Posts
    Route::get('/admin/posts', [FacebookController::class, 'index'])->name('admin.posts')->middleware('auth', $Official_Admin);
    Route::post('/admin/posts/post', [FacebookController::class, 'addPosts'])->name('admin.posts.post')->middleware('auth', $Official_Admin);
    Route::delete('/admin/posts/{facebookID}', [FacebookController::class, 'deletePost'])->name('admin.posts.delete')->middleware('auth', $Official_Admin);

    // Document Requests
    Route::get('/admin/document-requests', [AdminController::class, 'documentRequests'])->name('admin.documentRequests')->middleware('auth', $Official_Admin);
    Route::put('/documents/update/{id}', [DocumentController::class, 'update'])->name('documents.update');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.delete');
    Route::get('/admin/document-requests/{document_type}/{document_id}/{barangay_id}', [AdminController::class, 'documentShow'])->name('admin.documentShow')->middleware('auth', $Official_Admin);

    // Complaint Requests
    Route::get('/admin/complaint-requests', [AdminController::class, 'complaintRequests'])->name('admin.complaintRequests')->middleware('auth', $Official_Admin);
    Route::put('/complaints/update/{id}', [ComplaintController::class, 'update'])->name('complaints.update');
    Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])->name('complaints.delete');
    Route::get('/admin/complaint-requests/{id}', [AdminController::class, 'complaintShow'])->name('admin.complaintShow')->middleware('auth', $Official_Admin);

    // SEND EMAIL - COMPLAINTS
    Route::put('/complaintApproved/send/{id}', [NotifyEmailController::class, 'complaintApproved'])->name('complaintApproved.send');
    Route::put('/complaintDenied/send/{id}', [NotifyEmailController::class, 'complaintDenied'])->name('complaintDenied.send');
    Route::put('/requestApproved/send/{id}', [NotifyEmailController::class, 'approve'])->name('requestApproved.send');
    Route::put('/requestDenied/send/{id}', [NotifyEmailController::class, 'denied'])->name('requestDenied.send');

    // CONTENT MANAGER
    Route::get('/contents/complaint', [AdminController::class, 'complaint'])->name('contents.complaint')->middleware('auth', $ContentManager_Admin);


    // DONT REMOVE THIS LINE
    Route::middleware(['auth', $Official_Admin])->resource('admin', AdminController::class);
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