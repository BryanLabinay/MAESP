<?php

use App\Http\Controllers\ActivityLogCTRL;
use App\Models\Barangay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Console\Scheduling\Event;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\ServiceWpage;
use App\Http\Controllers\MediaResourcesWpage;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\NotificationCTRL;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ForumController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BarangayController;
use App\Http\Controllers\Admin\CropAssessmentCTRL;
use App\Http\Controllers\Admin\MarketPricesCTRL;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\NewsUpdatesController;
use App\Http\Controllers\Admin\PestDiseaseController;
use App\Http\Controllers\Admin\SeedFertilizerCTRL;
use App\Http\Controllers\Admin\ExportPDFController;
use App\Http\Controllers\Barangay\ActivityLogController;
use App\Http\Controllers\Barangay\MediaCtrl;
use App\Http\Controllers\Barangay\CroppingController;
use App\Http\Controllers\Barangay\ExportController;
use App\Http\Controllers\Barangay\FarmersControlller;
use App\Http\Controllers\Barangay\NewsUpdateController;
use App\Http\Controllers\Barangay\ServicesController;

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

// For Barangay
Route::post('/barangay/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');

// For Admin
Route::post('/admin/notifications/{id}/read', [NotificationCTRL::class, 'markNotificationAsRead'])->name('notif');

Route::post('/notifications/{id}/read', [NotificationCTRL::class, 'markNotificationAsRead']);





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
    Route::get('/View/farmer/{user_id}', [BarangayController::class, 'farmerView'])->name('farmer.view');

    // PDF and Excel
    Route::get('/brgy/export-pdf', [ExportPDFController::class, 'exportBarangayPDF'])->name('brgy.export.pdf');
    Route::get('/brgy/export-excel', [ExportPDFController::class, 'exportBarangayExcel'])->name('brgy.export.excel');

    // Brgy. Account
    Route::get('/Brgy/Account', [BarangayController::class, 'account'])->name('brgy.create');
    Route::post('/Store/Brgy-Account', [BarangayController::class, 'storeBrgyAcct'])->name('barangays.account');
    // Cropping
    Route::get('/Crop-Assessment', [CropAssessmentCTRL::class, 'index'])->name('crop');
    // Services
    Route::get('/Services', [ServiceController::class, 'index'])->name('service');
    Route::resource('/service', ServiceController::class);
    Route::get('/Services/List', [ServiceController::class, 'list'])->name('service.list');
    Route::get('/services/{service}/content/create', [ServiceController::class, 'createContentForm'])
        ->name('service.create');
    Route::post('/services/{service}/content', [ServiceController::class, 'storeContent'])->name('service.content.store');



    // Forum
    Route::get('/Forum', [ForumController::class, 'forum'])->name('forum');

    Route::post('/reactions', [ReactionController::class, 'store'])->name('reactions.store');

    // MEDIA RESOURCES
  // Media-related routes
Route::get('/Media-Resources', [MediaController::class, 'index'])->name('media.index');
Route::post('/media', [MediaController::class, 'store'])->name('media.store');
Route::post('/media-add', [MediaController::class, 'storeMedia'])->name('add-media');
Route::get('/Media', [MediaController::class, 'media'])->name('media');
Route::get('/media-content/{id}', [MediaController::class, 'content'])->name('media.content');


    // ACTIVITY LOG
    Route::get('/Activity-Log', [ActivityLogCTRL::class, 'index']);

    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
});


//service from user
Route::get('/services/{id}', [ServiceWpage::class, 'index'])->name('user.service');

//media resources from user
Route::get('/media/{id}', [MediaResourcesWpage::class, 'show'])->name('user.media');




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

    // Brgy export
    Route::get('/farmers/export-pdf', [ExportController::class, 'exportFarmersPDF'])->name('farmers.export.pdf');
    Route::get('/farmers/export-excel', [ExportController::class, 'exportFarmersExcel'])->name('farmers.export.excel');

    //Services
    Route::get('/services/{id}', [ServicesController::class, 'index'])->name('brgy.service');

    //Media Resources
    Route::get('/media/{id}', [MediaCtrl::class, 'index'])->name('brgy.media');


    // NEWS & UPDATES
    Route::get('/News&Reports', [NewsUpdateController::class, 'index']);

    // ACTIVITY LOG
    Route::get('/Activity-log', [ActivityLogController::class, 'index']);
});
