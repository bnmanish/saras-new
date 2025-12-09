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
use App\Http\Controllers\backend\BlogCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CarrierController;
use App\Http\Controllers\backend\MediaPressController;
use App\Http\Controllers\backend\ImportantLinkController;
use App\Http\Controllers\backend\OurTeamController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\backend\GalleryCategoryController;
use App\Http\Controllers\backend\QualityAssuranceController;
use App\Http\Controllers\backend\DealershipEnquiryController;
use App\Http\Controllers\backend\ImportantContactController;
use App\Http\Controllers\backend\TenderController;
use App\Http\Controllers\backend\MilkPurchasePriceChartController;
use App\Http\Controllers\backend\MilkSalePriceChartController;
use App\Http\Controllers\backend\BeneficiaryController;
use App\Http\Controllers\backend\FooterController;
use App\Http\Controllers\backend\LoginLogController;


// frontend controllers
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\frontBlogController;
use App\Http\Controllers\frontend\FrontAdditionalPageController;
use App\Http\Controllers\frontend\FrontProjectController;
use App\Http\Controllers\frontend\DirectorsController;
use App\Http\Controllers\frontend\DealershipEnquiryController as FrontendDealershipEnquiryController;
use App\Http\Controllers\frontend\FrontProductCotroller;
use App\Http\Controllers\frontend\FrontTenderController;
use App\Http\Controllers\frontend\GalleryController as FrontendGalleryController;
use App\Http\Controllers\frontend\MediaPressController as FrontendMediaPressController;

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
Route::get('/products', [FrontProductCotroller::class, 'index'])->name('products');
Route::get('/products/{categorySlug}', [FrontProductCotroller::class, 'category'])->name('products.category');
Route::get('/product/{slug}', [FrontProductCotroller::class, 'details'])->name('products.details');
Route::get('/tenders', [FrontTenderController::class, 'index'])->name('tenders');
Route::get('/milk-purchase-price-chart', [FrontTenderController::class, 'milkPurchasePriceChart'])->name('milk.purchase.price.chart');
Route::get('/milk-sale-price-chart', [FrontTenderController::class, 'milkSalePriceChart'])->name('milk.sale.price.chart');
Route::get('/beneficiaries', [FrontTenderController::class, 'beneficiaries'])->name('beneficiaries');
Route::get('/quality-assurance', [FrontTenderController::class, 'qualityAssurance'])->name('quality.assurance');

// Script Management Routes
Route::get('/scripts', [App\Http\Controllers\Backend\ScriptController::class, 'index'])->name('scripts.index');
Route::get('/scripts/create', [App\Http\Controllers\Backend\ScriptController::class, 'create'])->name('scripts.create');
Route::post('/scripts/store', [App\Http\Controllers\Backend\ScriptController::class, 'store'])->name('scripts.store');
Route::get('/scripts/edit/{id}', [App\Http\Controllers\Backend\ScriptController::class, 'edit'])->name('scripts.edit');
Route::post('/scripts/update/{id}', [App\Http\Controllers\Backend\ScriptController::class, 'update'])->name('scripts.update');
Route::post('/scripts/destroy/{id}', [App\Http\Controllers\Backend\ScriptController::class, 'destroy'])->name('scripts.destroy');
Route::get('/important-links', [FrontTenderController::class, 'importantLinks'])->name('important.links');

// Gallery routes
Route::get('/gallery', [FrontendGalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/category/{categorySlug}', [FrontendGalleryController::class, 'index'])->name('gallery.category');

// Blog routes
Route::get('/blog', [frontBlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [frontBlogController::class, 'blogDetails'])->name('blog.details');

// Media Press routes
Route::get('/media-press', [FrontendMediaPressController::class, 'index'])->name('media.press');

Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-enquiry', [ContactController::class, 'enquiry'])->name('enquiry');
Route::post('/subscribe-newsletter', [HomeController::class, 'subscribeNewsLetter'])->name('subscribe.newsletter');
Route::post('/submit-distributor-enquiry', [FrontendDealershipEnquiryController::class, 'submitDistributorForm'])->name('submit.distributor.enquiry');

Route::post('/{slug}', [HomeController::class, 'additionalPages'])->name('additional.page');

// Redirect login to admin login
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

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

        // Blog Category
        Route::get('/add-blog-category', [BlogCategoryController::class, 'addBlogCategory'])->name('admin.add.blog_category');
        Route::post('/store-blog-category', [BlogCategoryController::class, 'storeBlogCategory'])->name('admin.store.blog_category');
        Route::get('/list-blog-category', [BlogCategoryController::class, 'listBlogCategory'])->name('admin.list.blog_category');
        Route::get('/edit-blog-category/{id}', [BlogCategoryController::class, 'editBlogCategory'])->name('admin.edit.blog_category');
        Route::post('/edit-store-blog-category/{id}', [BlogCategoryController::class, 'editStoreBlogCategory'])->name('admin.edit.store.blog_category');
        Route::get('/delete-blog-category/{id}', [BlogCategoryController::class, 'deleteBlogCategory'])->name('admin.delete.blog_category');

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
        Route::get('/delete-product-image/{id}', [ProductController::class, 'deleteProductImage'])->name('admin.delete.product.image');

        // Manage Directors
        Route::get('/add-director', [DirectorController::class, 'addProfile'])->name('admin.add.director');
        Route::post('/store-director', [DirectorController::class, 'stroeProfile'])->name('admin.store.director');
        Route::get('/list-director', [DirectorController::class, 'listProfile'])->name('admin.list.director');
        Route::get('/edit-director/{id}', [DirectorController::class, 'editProfile'])->name('admin.edit.director');
        Route::post('/edit-store-director/{id}', [DirectorController::class, 'editStoreProfile'])->name('admin.edit.store.director');
        Route::get('/delete-director/{id}', [DirectorController::class, 'deleteProfile'])->name('admin.delete.director');

        // Login Logs
        Route::get('/login-logs', [LoginLogController::class, 'index'])->name('admin.login.logs');
        Route::get('/login-logs-data', [LoginLogController::class, 'getData'])->name('admin.login.logs.data');
        Route::get('/login-logs-export', [LoginLogController::class, 'export'])->name('admin.login.logs.export');

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

        // Our Team
        Route::get('/add-our-team', [OurTeamController::class, 'addOurTeam'])->name('admin.add.our_team');
        Route::post('/store-our-team', [OurTeamController::class, 'storeOurTeam'])->name('admin.store.our_team');
        Route::get('/list-our-team', [OurTeamController::class, 'listOurTeam'])->name('admin.list.our_team');
        Route::get('/edit-our-team/{id}', [OurTeamController::class, 'editOurTeam'])->name('admin.edit.our_team');
        Route::post('/edit-store-our-team/{id}', [OurTeamController::class, 'editStoreOurTeam'])->name('admin.edit.store.our_team');
        Route::get('/delete-our-team/{id}', [OurTeamController::class, 'deleteOurTeam'])->name('admin.delete.our_team');

        // Quality Assurance
        Route::get('/add-quality-assurance', [QualityAssuranceController::class, 'addQualityAssurance'])->name('admin.add.quality_assurance');
        Route::post('/store-quality-assurance', [QualityAssuranceController::class, 'storeQualityAssurance'])->name('admin.store.quality_assurance');
        Route::get('/list-quality-assurance', [QualityAssuranceController::class, 'listQualityAssurance'])->name('admin.list.quality_assurance');
        Route::get('/edit-quality-assurance/{id}', [QualityAssuranceController::class, 'editQualityAssurance'])->name('admin.edit.quality_assurance');
        Route::post('/edit-store-quality-assurance/{id}', [QualityAssuranceController::class, 'editStoreQualityAssurance'])->name('admin.edit.store.quality_assurance');
        Route::get('/delete-quality-assurance/{id}', [QualityAssuranceController::class, 'deleteQualityAssurance'])->name('admin.delete.quality_assurance');

        // Dealership Enquiry
        Route::get('/list-dealership-enquiry', [DealershipEnquiryController::class, 'listEnquiries'])->name('admin.list.dealership_enquiry');

        // Important Contacts
        Route::get('/add-important-contact', [ImportantContactController::class, 'addContact'])->name('admin.add.important_contact');
        Route::post('/store-important-contact', [ImportantContactController::class, 'storeContact'])->name('admin.store.important_contact');
        Route::get('/list-important-contacts', [ImportantContactController::class, 'listContacts'])->name('admin.list.important_contacts');
        Route::get('/edit-important-contact/{id}', [ImportantContactController::class, 'editContact'])->name('admin.edit.important_contact');
        Route::put('/update-important-contact/{id}', [ImportantContactController::class, 'updateContact'])->name('admin.update.important_contact');
        Route::get('/delete-important-contact/{id}', [ImportantContactController::class, 'deleteContact'])->name('admin.delete.important_contact');

        // Tenders
        Route::get('/add-tender', [TenderController::class, 'addTender'])->name('admin.add.tender');
        Route::post('/store-tender', [TenderController::class, 'storeTender'])->name('admin.store.tender');
        Route::get('/list-tenders', [TenderController::class, 'listTenders'])->name('admin.list.tenders');
        Route::get('/edit-tender/{id}', [TenderController::class, 'editTender'])->name('admin.edit.tender');
        Route::put('/update-tender/{id}', [TenderController::class, 'updateTender'])->name('admin.update.tender');
        Route::get('/delete-tender/{id}', [TenderController::class, 'deleteTender'])->name('admin.delete.tender');

        // Milk Purchase Price Charts
        Route::get('/add-milk-purchase-price-chart', [MilkPurchasePriceChartController::class, 'addMilkPurchasePriceChart'])->name('admin.add.milk_purchase_price_chart');
        Route::post('/store-milk-purchase-price-chart', [MilkPurchasePriceChartController::class, 'storeMilkPurchasePriceChart'])->name('admin.store.milk_purchase_price_chart');
        Route::get('/list-milk-purchase-price-charts', [MilkPurchasePriceChartController::class, 'listMilkPurchasePriceCharts'])->name('admin.list.milk_purchase_price_charts');
        Route::get('/edit-milk-purchase-price-chart/{id}', [MilkPurchasePriceChartController::class, 'editMilkPurchasePriceChart'])->name('admin.edit.milk_purchase_price_chart');
        Route::put('/update-milk-purchase-price-chart/{id}', [MilkPurchasePriceChartController::class, 'updateMilkPurchasePriceChart'])->name('admin.update.milk_purchase_price_chart');
        Route::get('/delete-milk-purchase-price-chart/{id}', [MilkPurchasePriceChartController::class, 'deleteMilkPurchasePriceChart'])->name('admin.delete.milk_purchase_price_chart');

        // Milk Sale Price Charts
        Route::get('/add-milk-sale-price-chart', [MilkSalePriceChartController::class, 'addMilkSalePriceChart'])->name('admin.add.milk_sale_price_chart');
        Route::post('/store-milk-sale-price-chart', [MilkSalePriceChartController::class, 'storeMilkSalePriceChart'])->name('admin.store.milk_sale_price_chart');
        Route::get('/list-milk-sale-price-charts', [MilkSalePriceChartController::class, 'listMilkSalePriceCharts'])->name('admin.list.milk_sale_price_charts');
        Route::get('/edit-milk-sale-price-chart/{id}', [MilkSalePriceChartController::class, 'editMilkSalePriceChart'])->name('admin.edit.milk_sale_price_chart');
        Route::put('/update-milk-sale-price-chart/{id}', [MilkSalePriceChartController::class, 'updateMilkSalePriceChart'])->name('admin.update.milk_sale_price_chart');
        Route::get('/delete-milk-sale-price-chart/{id}', [MilkSalePriceChartController::class, 'deleteMilkSalePriceChart'])->name('admin.delete.milk_sale_price_chart');

        // Beneficiaries
        Route::get('/add-beneficiary', [BeneficiaryController::class, 'addBeneficiary'])->name('admin.add.beneficiary');
        Route::post('/store-beneficiary', [BeneficiaryController::class, 'storeBeneficiary'])->name('admin.store.beneficiary');
        Route::get('/list-beneficiaries', [BeneficiaryController::class, 'listBeneficiaries'])->name('admin.list.beneficiaries');
        Route::get('/edit-beneficiary/{id}', [BeneficiaryController::class, 'editBeneficiary'])->name('admin.edit.beneficiary');
        Route::put('/update-beneficiary/{id}', [BeneficiaryController::class, 'updateBeneficiary'])->name('admin.update.beneficiary');
        Route::get('/delete-beneficiary/{id}', [BeneficiaryController::class, 'deleteBeneficiary'])->name('admin.delete.beneficiary');

        // Gallery Category
        Route::get('/add-gallery-category', [GalleryCategoryController::class, 'addGalleryCategory'])->name('admin.add.gallery_category');
        Route::post('/store-gallery-category', [GalleryCategoryController::class, 'storeGalleryCategory'])->name('admin.store.gallery_category');
        Route::get('/list-gallery-category', [GalleryCategoryController::class, 'listGalleryCategory'])->name('admin.list.gallery_category');
        Route::get('/edit-gallery-category/{id}', [GalleryCategoryController::class, 'editGalleryCategory'])->name('admin.edit.gallery_category');
        Route::post('/edit-store-gallery-category/{id}', [GalleryCategoryController::class, 'editStoreGalleryCategory'])->name('admin.edit.store.gallery_category');
        Route::get('/delete-gallery-category/{id}', [GalleryCategoryController::class, 'deleteGalleryCategory'])->name('admin.delete.gallery_category');

        // Gallery
        Route::get('/add-gallery', [GalleryController::class, 'addGallery'])->name('admin.add.gallery');
        Route::post('/store-gallery', [GalleryController::class, 'storeGallery'])->name('admin.store.gallery');
        Route::get('/list-gallery', [GalleryController::class, 'listGallery'])->name('admin.list.gallery');
        Route::get('/edit-gallery/{id}', [GalleryController::class, 'editGallery'])->name('admin.edit.gallery');
        Route::post('/edit-store-gallery/{id}', [GalleryController::class, 'editStoreGallery'])->name('admin.edit.store.gallery');
        Route::get('/delete-gallery/{id}', [GalleryController::class, 'deleteGallery'])->name('admin.delete.gallery');
        Route::post('/delete-gallery-image/{id}', [GalleryController::class, 'deleteGalleryImage'])->name('admin.delete.gallery_image');
        Route::post('/reorder-gallery-images', [GalleryController::class, 'reorderGalleryImages'])->name('admin.reorder.gallery_images');

        // Footer Sections
        Route::get('/add-footer-section', [FooterController::class, 'addSection'])->name('admin.add.footer.section');
        Route::post('/store-footer-section', [FooterController::class, 'storeSection'])->name('admin.store.footer.section');
        Route::get('/list-footer-sections', [FooterController::class, 'listSections'])->name('admin.list.footer.sections');
        Route::get('/edit-footer-section/{id}', [FooterController::class, 'editSection'])->name('admin.edit.footer.section');
        Route::post('/update-footer-section/{id}', [FooterController::class, 'updateSection'])->name('admin.update.footer.section');
        Route::get('/delete-footer-section/{id}', [FooterController::class, 'deleteSection'])->name('admin.delete.footer.section');

        // Footer Links
        Route::get('/add-footer-link', [FooterController::class, 'addLink'])->name('admin.add.footer.link');
        Route::post('/store-footer-link', [FooterController::class, 'storeLink'])->name('admin.store.footer.link');
        Route::get('/list-footer-links', [FooterController::class, 'listLinks'])->name('admin.list.footer.links');
        Route::get('/edit-footer-link/{id}', [FooterController::class, 'editLink'])->name('admin.edit.footer.link');
        Route::post('/update-footer-link/{id}', [FooterController::class, 'updateLink'])->name('admin.update.footer.link');
        Route::get('/delete-footer-link/{id}', [FooterController::class, 'deleteLink'])->name('admin.delete.footer.link');

        // Admin logout
        Route::get('admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
    });
});

