<?php

use App\Models\Barangay;
use App\Http\Controllers\NewsWpage;
use App\Http\Controllers\AboutWpage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Console\Scheduling\Event;
use App\Http\Controllers\ServiceWpage;
use App\Http\Controllers\PorfolioWpage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioWpage;
use App\Http\Controllers\ActivityLogCTRL;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransparencyWpage;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\MediaResourcesWpage;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ForumController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MarketPricesCTRL;
use App\Http\Controllers\Admin\NotificationCTRL;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TransparencyCTRL;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BarangayController;
use App\Http\Controllers\Admin\CropAssessmentCTRL;
use App\Http\Controllers\Admin\SeedFertilizerCTRL;
use App\Http\Controllers\Admin\ExportPDFController;
use App\Http\Controllers\Admin\NewsUpdatesController;
use App\Http\Controllers\Admin\PestDiseaseController;
use App\Http\Controllers\Admin\PortfolioCTRL;
use App\Http\Controllers\Barangay\SendReportController;
use App\Http\Controllers\Barangay\MediaCtrl;
use App\Http\Controllers\Barangay\ExportController;
use App\Http\Controllers\Barangay\CroppingController;
use App\Http\Controllers\Barangay\FarmersControlller;
use App\Http\Controllers\Barangay\ServicesController;
use App\Http\Controllers\Barangay\NewsUpdateController;
use App\Http\Controllers\Barangay\ActivityLogController;
use App\Http\Controllers\Barangay\TransparencyController;

Route::post('/Forum/create', [ForumController::class, 'create'])->name('forum.create');
Route::get('/Forum/show', [ForumController::class, 'show'])->name('forum.show');


Route::get('/', function () {
    return view('user.content.main');
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
    Route::get('/services/{service}/content/create', [ServiceController::class, 'createContentForm'])->name('service.create');
    Route::post('/services/{service}/content', [ServiceController::class, 'storeContent'])->name('service.content.store');
    Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->name('edit.service');
    Route::put('/service/update/{id}', [ServiceController::class, 'update'])->name('service.content.update');
    Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.content.destroy');


    //Portfolio
    Route::get('/Portfolio', [PortfolioCTRL::class, 'index'])->name('portfolio');
    Route::post('/form-submit', [PortfolioCTRL::class, 'store'])->name('form.submit');
    Route::get('/portfolio/{id}/edit', [PortfolioCTRL::class, 'edit'])->name('portfolio.edit');
    Route::put('/portfolio/{id}', [PortfolioCTRL::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/{id}', [PortfolioCTRL::class, 'destroy'])->name('portfolio.destroy');


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

    // TRANSPARENCY
    Route::get('/Transparency', [TransparencyCTRL::class, 'index'])->name('trans.index');
    Route::post('/Transparency-add', [TransparencyCTRL::class, 'transparencyTitle'])->name('add-title');
    Route::get('/Transparency-content/{id}', [TransparencyCTRL::class, 'content'])->name('trans.content');
    Route::post('/transparency', [TransparencyCTRL::class, 'store'])->name('content.store');

    // News & Updates
    Route::get('/News-Update', [NewsUpdatesController::class, 'index'])->name('news.index');
    Route::post('/News-add', [NewsUpdatesController::class, 'newsTitle'])->name('news.add');
    Route::get('/News-content/{id}', [NewsUpdatesController::class, 'content'])->name('content');
    Route::post('/news', [NewsUpdatesController::class, 'store'])->name('news.store');

    // ACTIVITY LOG
    Route::get('/Activity-Log', [ActivityLogCTRL::class, 'index']);

    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/brgy-send-reports', [SendReportController::class, 'show'])->name('brgy.reports');
    Route::get('/crop-assessment-details/{user_id}', [SendReportController::class, 'reportsdetails'])->name('brgy.reports-details');
});


//service from user
Route::get('/services/{id}', [ServiceWpage::class, 'index'])->name('user.service');

//media resources from user
Route::get('/media/{id}', [MediaResourcesWpage::class, 'show'])->name('user.media');

//transparency from user
Route::get('/transparency/{id}', [TransparencyWpage::class, 'show'])->name('user.transparency');

Route::get('/news/{id}', [NewsWpage::class, 'show'])->name('user.news');

// Porfolio
Route::get('/Portfolio', [PortfolioWpage::class, 'show'])->name('show.portfolio');

// Contact
Route::get('/Contact', [ContactController::class, 'show'])->name('show.contact');

// About
Route::get('/About', [AboutWpage::class, 'show'])->name('show.about');





// para sa barangay roles
Route::middleware(['auth', 'barangay'])->prefix('barangay')->group(function () {
    // Logout
    // Route::post('logout', [BarangayController::class, 'destroy'])
    //     ->name('logout');



    Route::resource('send-reports', SendReportController::class)->except('show');
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

    //Transparency
    Route::get('/transparency/{id}', [TransparencyController::class, 'index'])->name('brgy.transparency');

    // NEWS & UPDATES
    Route::get('/News&Reports/{id}', [NewsUpdateController::class, 'index'])->name('brgy.news');

    // ACTIVITY LOG
    Route::get('/Activity-log', [ActivityLogController::class, 'index']);
});
