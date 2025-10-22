<?php

use Illuminate\Support\Facades\Route;

// backend controllers
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\SubscriberController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\EnquiryController;
use App\Http\Controllers\backend\AdditionalPageController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\AmenityController;
use App\Http\Controllers\backend\TypeController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\backend\AwardController;
use App\Http\Controllers\backend\DirectorController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CarrierController;
use App\Http\Controllers\backend\MediaPressController;
use App\Http\Controllers\backend\ImportantLinkController;


// frontend controllers
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\frontBlogController;
use App\Http\Controllers\frontend\FrontAdditionalPageController;
use App\Http\Controllers\frontend\FrontProjectController;
use App\Http\Controllers\frontend\DirectorsController;

//-------------------------------------------------------------------------
use App\Models\Page;
use Illuminate\Support\Facades\Artisan;


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
Route::get('/clear-all', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return 'All caches cleared';
});

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/about-us',[AboutController::class,'index'])->name('about.us');
Route::get('/about-us/chairman-message',[AboutController::class,'chairmanMessage'])->name('chairman.message');
Route::get('/about-us/md-message',[AboutController::class,'mdMessage'])->name('md.message');
Route::get('/directors',[DirectorsController::class,'index'])->name('directors');


Route::get('/about-us/awards',[AboutController::class,'awards'])->name('awards');
Route::get('/projects',[FrontProjectController::class,'index'])->name('projects');
Route::get('/city/{url}',[FrontProjectController::class,'projectCitywise'])->name('project.citywise');
Route::get('/brand/{url}',[FrontProjectController::class,'projectBrandwise'])->name('project.brandwise');
Route::get('/type/{url}',[FrontProjectController::class,'projectTypewise'])->name('project.typewise');

Route::get('/project/{slug}',[FrontProjectController::class,'projectDetails'])->name('project.details');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact-enquiry', [ContactController::class, 'enquiry'])->name('enquiry');

Route::get('/blog',[frontBlogController::class,'index'])->name('blog');
Route::get('/blog/{slug}',[frontBlogController::class,'blogDetails'])->name('blog.details');

Route::get('/search',[HomeController::class,'searchProject'])->name('search.project');

Route::post('/subscribe-news-letter', [HomeController::class, 'subscribeNewsLetter'])->name('subscribe.news.letter');


Route::get('/{slug}', [HomeController::class, 'additionalPage'])->name('additional.page');

// Admin login route
Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('logedin', [LoginController::class, 'logedin'])->name('admin.logedin');

    Route::middleware(['auth','admin'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

        // Manage user
        Route::get('/add-user', [UserController::class, 'addUser'])->name('admin.add.user');
        Route::post('/store-user', [UserController::class, 'stroeUser'])->name('admin.store.user');

        Route::get('/list-user', [UserController::class, 'listUser'])->name('admin.list.user');
        // get data
        Route::get('/get-user-data', [UserController::class, 'getUserData'])->name('admin.get.user.data');
        // get data
        Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('admin.edit.user');
        Route::post('/edit-store-user/{id}', [UserController::class, 'editStoreUser'])->name('admin.edit.store.user');
        Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('admin.delete.user');

        // Manage Slider
        Route::get('/add-slider', [SliderController::class, 'addSlider'])->name('admin.add.slider');
        Route::post('/store-slider', [SliderController::class, 'stroeSlider'])->name('admin.store.slider');
        Route::get('/list-slider', [SliderController::class, 'listSlider'])->name('admin.list.slider');
        Route::get('/edit-slider/{id}', [SliderController::class, 'editSlider'])->name('admin.edit.slider');
        Route::post('/edit-store-slider/{id}', [SliderController::class, 'editStoreSlider'])->name('admin.edit.store.slider');
        Route::get('/delete-slider/{id}', [SliderController::class, 'deleteSlider'])->name('admin.delete.slider');

        // Blog
        Route::get('/add-blog', [BlogController::class, 'addBlog'])->name('admin.add.blog');
        Route::post('/store-blog', [BlogController::class, 'storeBlog'])->name('admin.store.blog');
        Route::get('/list-blog', [BlogController::class, 'listBlog'])->name('admin.list.blog');
        Route::get('/get-list-blog', [BlogController::class, 'getlistData'])->name('admin.get.list.blog');
        Route::get('/edit-blog/{id}', [BlogController::class, 'editBlog'])->name('admin.edit.blog');
        Route::post('/edit-store-blog/{id}', [BlogController::class, 'editStoreBlog'])->name('admin.edit.store.blog');
        Route::get('/delete-blog/{id}', [BlogController::class, 'deleteBlog'])->name('admin.delete.blog');

        // Testimonial
        Route::get('/add-testimonial', [TestimonialController::class, 'addTestimonial'])->name('admin.add.testimonial');
        Route::post('/store-testimonial', [TestimonialController::class, 'storeTestimonial'])->name('admin.store.testimonial');
        Route::get('/list-testimonial', [TestimonialController::class, 'listTestimonial'])->name('admin.list.testimonial');
        Route::get('/get-list-testimonial', [TestimonialController::class, 'getlistTestimonial'])->name('admin.get.list.testimonial');
        Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'editTestimonial'])->name('admin.edit.testimonial');
        Route::post('/edit-store-testimonial/{id}', [TestimonialController::class, 'editStoreTestimonial'])->name('admin.edit.store.testimonial');
        Route::get('/delete-testimonial/{id}', [TestimonialController::class, 'deleteTestimonial'])->name('admin.delete.testimonial');


        // Manage Additional Page
        Route::get('/add-page', [PageController::class, 'addPage'])->name('admin.add.page');
        Route::post('/store-page', [PageController::class, 'stroePage'])->name('admin.store.page');
        Route::get('/list-page', [PageController::class, 'listPage'])->name('admin.list.page');
        Route::get('/edit-page/{id}', [PageController::class, 'editPage'])->name('admin.edit.page');
        Route::post('/edit-store-page/{id}', [PageController::class, 'editStorePage'])->name('admin.edit.store.page');
        Route::get('/delete-page/{id}', [PageController::class, 'deletePage'])->name('admin.delete.page');

        // Manage Subscriber
        Route::get('/list-subscriber', [SubscriberController::class, 'listSubscriber'])->name('admin.list.subscriber');
        Route::get('/delete-subscriber/{id}', [SubscriberController::class, 'deleteSubscriber'])->name('admin.delete.subscriber');

        // Manage Setting
        Route::get('/manage-setting', [SettingController::class, 'manageSetting'])->name('admin.manage.setting');
        Route::post('/update-setting', [SettingController::class, 'updateSetting'])->name('admin.update.setting');

        // Enquiry
        Route::get('/contact-enquiry', [EnquiryController::class, 'contactEnquiry'])->name('admin.contact.enquiry');

        // Carrier
        Route::get('/list-carrier', [CarrierController::class, 'listCarrier'])->name('admin.list.carrier');

        // Manage Additional
        Route::get('/add-additional-page', [AdditionalPageController::class, 'addPage'])->name('admin.add.additional.page');
        Route::post('/store-additional-page', [AdditionalPageController::class, 'stroePage'])->name('admin.store.additional.page');
        Route::get('/list-additional-page', [AdditionalPageController::class, 'listPage'])->name('admin.list.additional.page');
        Route::get('/edit-additional-page/{id}', [AdditionalPageController::class, 'editPage'])->name('admin.edit.additional.page');
        Route::post('/edit-store-additional-page/{id}', [AdditionalPageController::class, 'editStorePage'])->name('admin.edit.store.additional.page');
        Route::get('/delete-additional-page/{id}', [AdditionalPageController::class, 'deletePage'])->name('admin.delete.additional.page');

        // Manage user
        Route::get('/add-web-story', [WebStoryMasterController::class, 'addWebStory'])->name('admin.add.story');
        Route::post('/store-web-story', [WebStoryMasterController::class, 'stroeWebStory'])->name('admin.store.story');

        // Manage Award
        Route::get('/add-award', [AwardController::class, 'addAward'])->name('admin.add.award');
        Route::post('/store-award', [AwardController::class, 'stroeAward'])->name('admin.store.award');
        Route::get('/list-award', [AwardController::class, 'listAward'])->name('admin.list.award');
        Route::get('/edit-award/{id}', [AwardController::class, 'editAward'])->name('admin.edit.award');
        Route::post('/edit-store-award/{id}', [AwardController::class, 'editStoreAward'])->name('admin.edit.store.award');
        Route::get('/delete-award/{id}', [AwardController::class, 'deleteAward'])->name('admin.delete.award');

        // Manage Categories
        Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('admin.add.category');
        Route::post('/store-category', [CategoryController::class, 'storeCategory'])->name('admin.store.category');
        Route::get('/list-category', [CategoryController::class, 'listCategory'])->name('admin.list.category');
        Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('admin.edit.category');
        Route::post('/edit-store-category/{id}', [CategoryController::class, 'editStoreCategory'])->name('admin.edit.store.category');
        Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.delete.category');

        // Manage Products
        Route::get('/add-product', [ProductController::class, 'addProduct'])->name('admin.add.product');
        Route::post('/store-product', [ProductController::class, 'storeProduct'])->name('admin.store.product');
        Route::get('/list-product', [ProductController::class, 'listProduct'])->name('admin.list.product');
        Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('admin.edit.product');
        Route::post('/edit-store-product/{id}', [ProductController::class, 'editStoreProduct'])->name('admin.edit.store.product');
        Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('admin.delete.product');

        // Manage Directors
        Route::get('/add-director', [DirectorController::class, 'addProfile'])->name('admin.add.director');
        Route::post('/store-director', [DirectorController::class, 'stroeProfile'])->name('admin.store.director');
        Route::get('/list-director', [DirectorController::class, 'listProfile'])->name('admin.list.director');
        Route::get('/edit-director/{id}', [DirectorController::class, 'editProfile'])->name('admin.edit.director');
        Route::post('/edit-store-director/{id}', [DirectorController::class, 'editStoreProfile'])->name('admin.edit.store.director');
        Route::get('/delete-director/{id}', [DirectorController::class, 'deleteProfile'])->name('admin.delete.director');

        // Media/Press
        Route::get('/add-media-press', [MediaPressController::class, 'addMediaPress'])->name('admin.add.media_press');
        Route::post('/store-media-press', [MediaPressController::class, 'storeMediaPress'])->name('admin.store.media_press');
        Route::get('/list-media-press', [MediaPressController::class, 'listMediaPress'])->name('admin.list.media_press');
        Route::get('/edit-media-press/{id}', [MediaPressController::class, 'editMediaPress'])->name('admin.edit.media_press');
        Route::post('/edit-store-media-press/{id}', [MediaPressController::class, 'editStoreMediaPress'])->name('admin.edit.store.media_press');
        Route::get('/delete-media-press/{id}', [MediaPressController::class, 'deleteMediaPress'])->name('admin.delete.media_press');

        // Important Links
        Route::get('/add-important-link', [ImportantLinkController::class, 'addImportantLink'])->name('admin.add.important_link');
        Route::post('/store-important-link', [ImportantLinkController::class, 'storeImportantLink'])->name('admin.store.important_link');
        Route::get('/list-important-link', [ImportantLinkController::class, 'listImportantLink'])->name('admin.list.important_link');
        Route::get('/edit-important-link/{id}', [ImportantLinkController::class, 'editImportantLink'])->name('admin.edit.important_link');
        Route::post('/edit-store-important-link/{id}', [ImportantLinkController::class, 'editStoreImportantLink'])->name('admin.edit.store.important_link');
        Route::get('/delete-important-link/{id}', [ImportantLinkController::class, 'deleteImportantLink'])->name('admin.delete.important_link');

        // Admin logout
        Route::get('admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
    });
});

