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
use App\Http\Controllers\backend\CityController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\AmenityController;
use App\Http\Controllers\backend\TypeController;
use App\Http\Controllers\backend\ProjectController;

// frontend controllers
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\frontBlogController;
use App\Http\Controllers\frontend\FrontAdditionalPageController;
use App\Http\Controllers\frontend\FrontProjectController;
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


        // Manage City
        Route::get('/add-city', [CityController::class, 'addCity'])->name('admin.add.city');
        Route::post('/store-city', [CityController::class, 'stroeCity'])->name('admin.store.city');
        Route::get('/list-city', [CityController::class, 'listCity'])->name('admin.list.city');
        Route::get('/edit-city/{id}', [CityController::class, 'editCity'])->name('admin.edit.city');
        Route::post('/edit-store-city/{id}', [CityController::class, 'editStoreCity'])->name('admin.edit.store.city');
        Route::get('/delete-city/{id}', [CityController::class, 'deleteCity'])->name('admin.delete.city');


        // Manage Brand
        Route::get('/add-brand', [BrandController::class, 'addBrand'])->name('admin.add.brand');
        Route::post('/store-brand', [BrandController::class, 'stroeBrand'])->name('admin.store.brand');
        Route::get('/list-brand', [BrandController::class, 'listBrand'])->name('admin.list.brand');
        Route::get('/edit-brand/{id}', [BrandController::class, 'editBrand'])->name('admin.edit.brand');
        Route::post('/edit-store-brand/{id}', [BrandController::class, 'editStoreBrand'])->name('admin.edit.store.brand');
        Route::get('/delete-brand/{id}', [BrandController::class, 'deleteBrand'])->name('admin.delete.brand');

        // Manage Amenity
        Route::get('/add-amenity', [AmenityController::class, 'addAmenity'])->name('admin.add.amenity');
        Route::post('/store-amenity', [AmenityController::class, 'stroeAmenity'])->name('admin.store.amenity');
        Route::get('/list-amenity', [AmenityController::class, 'listAmenity'])->name('admin.list.amenity');
        Route::get('/edit-amenity/{id}', [AmenityController::class, 'editAmenity'])->name('admin.edit.amenity');
        Route::post('/edit-store-amenity/{id}', [AmenityController::class, 'editStoreAmenity'])->name('admin.edit.store.amenity');
        Route::get('/delete-amenity/{id}', [AmenityController::class, 'deleteAmenity'])->name('admin.delete.amenity');

        // Manage Type
        Route::get('/add-type', [TypeController::class, 'addType'])->name('admin.add.type');
        Route::post('/store-type', [TypeController::class, 'stroeType'])->name('admin.store.type');
        Route::get('/list-type', [TypeController::class, 'listType'])->name('admin.list.type');
        Route::get('/edit-type/{id}', [TypeController::class, 'editType'])->name('admin.edit.type');
        Route::post('/edit-store-type/{id}', [TypeController::class, 'editStoreType'])->name('admin.edit.store.type');
        Route::get('/delete-type/{id}', [TypeController::class, 'deleteType'])->name('admin.delete.type');


        // Manage Project
        Route::get('/add-project', [ProjectController::class, 'addProject'])->name('admin.add.project');
        Route::post('/store-project', [ProjectController::class, 'stroeProject'])->name('admin.store.project');
        Route::get('/list-project', [ProjectController::class, 'listProject'])->name('admin.list.project');
        Route::get('/edit-project/{id}', [ProjectController::class, 'editProject'])->name('admin.edit.project');
        Route::post('/edit-store-project/{id}', [ProjectController::class, 'editStoreProject'])->name('admin.edit.store.project');
        Route::get('/delete-project/{id}', [ProjectController::class, 'deleteProject'])->name('admin.delete.project');
        Route::post('/delete-project-slider', [ProjectController::class, 'deleteProjectSlider'])->name('admin.delete.project.slider');
        Route::post('/delete-project-floorplan', [ProjectController::class, 'deleteProjectFloorPlan'])->name('admin.delete.project.floor.plan');


        // Admin logout
        Route::get('admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
    });
});

