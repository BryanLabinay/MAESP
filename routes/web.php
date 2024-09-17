<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Console\Scheduling\Event;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ForumController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\BarangayController;
use App\Http\Controllers\ReactionController;
use App\Models\Barangay;

Route::post('/Forum/create', [ForumController::class, 'create'])->name('forum.create');
Route::get('/Forum/show', [ForumController::class, 'show'])->name('forum.show');


Route::get('/', function () {
    return view('layouts.userlayout');
    // return redirect()->route('forum.show');
})->name('homepage');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [HomeController::class, 'auth'])
    ->middleware(['auth'])->name('home');



    // For admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Event
    Route::get('/Event', [EventController::class, 'event'])->name('event');
    Route::post('/Event', [EventController::class, 'storeEvent'])->name('store.event');

    // Brgy.Offices
    // Route::get('/Brgy', [EventController::class, 'brgy'])->name('brgy');
    Route::get('/Brgy', [BarangayController::class, 'show'])->name('barangays.index');
    Route::post('/add-brgy', [BarangayController::class, 'store'])->name('store.brgy');
    Route::get('edit/{id}', [BarangayController::class, 'editbrgy'])->name('edit.brgy');

    // Report
    Route::get('/Reports', [ReportController::class, 'report'])->name('report');

    // Forum
    Route::get('/Forum', [ForumController::class, 'forum'])->name('forum');

    Route::post('/reactions', [ReactionController::class, 'store'])->name('reactions.store');

});




// para sa barangay roles
Route::middleware(['auth', 'barangay'])->prefix('barangay')->group(function () {


});
