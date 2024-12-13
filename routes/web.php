<?php

use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\QuestionController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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



Route::get('admin', function () {
    return redirect()->route('admin.home');
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::prefix('admin')->name('admin.')->middleware('auth','check_user')->group(function() {
        Route::get('home', [HomeController::class, 'index'])->name('home');

        Route::resources([
            'client' => ClientController::class,
            'media' => MediaController::class,
            'slider' =>SliderController::class,
            'service' =>ServiceController::class,
            'file' =>FileController::class,
            'team' =>TeamController::class,
            'work' =>WorkController::class,
            'partner' =>PartnerController::class,
            'hero' =>HeroController::class,
            'project' =>ProjectController::class,
            'question' =>QuestionController::class,
        ]);


        Route::get('/setting',[SettingController::class , 'index'])->name('setting.index');
        Route::post('/setting/update',[SettingController::class , 'update'])->name('setting.update');
        Route::post('/notification/clearAll',[HomeController::class , 'clearAllNotifications'])->name('notification.clearAll');
    });


});
Auth::routes();

Route::view('not_allowed', 'not_allowed');

// Website Routes


Route::get('/', [MainController::class, 'home'])->name('site.index');
Route::get('about', [MainController::class, 'about'])->name('site.about');



Route::get('services', [MainController::class, 'services'])->name('site.services');
Route::get('services/{id}', [MainController::class, 'services_show'])->name('site.services_show');
Route::get('services/{id}/order', [MainController::class, 'services_order'])->name('site.services_order');

Route::get('file', [MainController::class, 'files'])->name('site.files');
Route::get('file/{id}', [MainController::class, 'file_show'])->name('site.file_show');


Route::get('portfolios', [MainController::class, 'portfolios'])->name('site.portfolios');
Route::get('portfolios/{id}', [MainController::class, 'portfolio'])->name('site.portfolio');


Route::get('test_idea', [MainController::class, 'test_idea'])->name('site.test_idea');
Route::post('test_idea', [MainController::class, 'test_idea'])->name('site.test_idea');

Route::post('show-answers', [MainController::class, 'showAnswers'])->name('site.show_answers');
Route::post('select-services', [MainController::class, 'selectServices'])->name('site.select_services');
Route::post('storeServices', [MainController::class, 'storeServices'])->name('site.storeServices');

Route::get('send-mail', [MailController::class, 'send']);
Route::get('contact', [MailController::class, 'contact'])->name('site.contact');
Route::post('contact', [MailController::class, 'contact_data'])->name('site.contact_data');





Route::get('/home', [HomeController::class, 'index'])->name('home');




