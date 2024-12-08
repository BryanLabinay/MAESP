<?php

use App\Http\Controllers\ActivityLogCTRL;
use App\Models\Barangay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Console\Scheduling\Event;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ForumController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BarangayController;
use App\Http\Controllers\Admin\CropAssessmentCTRL;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\NewsUpdatesController;
use App\Http\Controllers\Barangay\ActivityLogController;
use App\Http\Controllers\Barangay\CroppingController;
use App\Http\Controllers\Barangay\FarmersControlller;
use App\Http\Controllers\Barangay\NewsUpdateController;

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
Route::middleware(['auth', 'admin'])->prefix('Admin')->group(function () {
    // Event
    Route::get('/Event', [EventController::class, 'event'])->name('event');
    Route::post('/Event', [EventController::class, 'storeEvent'])->name('store.event');

    // Brgy.Offices
    // Route::get('/Brgy', [EventController::class, 'brgy'])->name('brgy');
    Route::get('/Brgy', [BarangayController::class, 'show'])->name('barangays.index');
    Route::post('/add-brgy', [BarangayController::class, 'store'])->name('store.brgy');
    // Route::get('edit/{id}', [BarangayController::class, 'editbrgy'])->name('edit.brgy');
    Route::get('/details/{user_id}', [BarangayController::class, 'barangaydetails'])->name('brgy.details');
    // Brgy. Account
    Route::get('/Brgy/Account', [BarangayController::class, 'account'])->name('brgy.create');
    Route::post('/Store/Brgy-Account', [BarangayController::class, 'storeBrgyAcct'])->name('barangays.account');
    // Cropping
    Route::get('/Crop-Assessment', [CropAssessmentCTRL::class, 'index'])->name('crop');
    // Services
    Route::get('/Services', [ServiceController::class, 'index'])->name('service');
    Route::resource('/service', ServiceController::class);
    Route::get('/Services/List', [ServiceController::class, 'list'])->name('service.list');

    // Forum
    Route::get('/Forum', [ForumController::class, 'forum'])->name('forum');

    Route::post('/reactions', [ReactionController::class, 'store'])->name('reactions.store');

    // MEDIA RESOURCES
    Route::get('/Media-Resources', [MediaController::class, 'index'])->name('media.index');
    Route::resource('/media', MediaController::class);

    // NEWS $ UPDATE
    // Weather & Updates
    Route::get('/Weather_Updates', [NewsUpdatesController::class, 'indexWeather']);

    // Pest & Disease Alerts
    Route::get('/Pest&Disease', [NewsUpdatesController::class, 'indexPest']);

    // Market Prices
    Route::get('/Market_Prices', [NewsUpdatesController::class, 'indexMarket']);

    // Seed & Fertilizer
    Route::get('/Seed_Fertilizer', [NewsUpdatesController::class, 'indexSeed']);

    // ACTIVITY LOG
    Route::get('/Activity-Log', [ActivityLogCTRL::class, 'index']);
});




// para sa barangay roles
Route::middleware(['auth', 'barangay'])->prefix('barangay')->group(function () {
    // Logout
    // Route::post('logout', [BarangayController::class, 'destroy'])
    //     ->name('logout');
    // FARMERS
    Route::get('/add-farmers', [FarmersControlller::class, 'index'])->name('add.farmers');
    Route::get('/list-farmers', [FarmersControlller::class, 'show'])->name('list.farmers');
    Route::post('/store-farmers', [FarmersControlller::class, 'store'])->name('store.farmers');

    // Cropping
    // Route::get('/add-cropping-reports', [CroppingController::class, 'create'])->name('add.cropping');
    Route::get('/cropping-reports', [CroppingController::class, 'create'])->name('cropping.reports');

    Route::get('/list-cropping reports', [CroppingController::class, 'index'])->name('list.cropping');
    Route::post('/store-cropping', [CroppingController::class, 'store'])->name('store.cropping');



    // NEWS & UPDATES
    Route::get('/News&Reports', [NewsUpdateController::class, 'index']);

    // ACTIVITY LOG
    Route::get('/Activity-log', [ActivityLogController::class, 'index']);
});
