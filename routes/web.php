<?php
// front-end controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdmissionFormController;

// back-end controller
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TopbarController;
use App\Http\Controllers\BrandingController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InstituteHistoryController;
use App\Http\Controllers\UserMessageController;
use App\Http\Controllers\PrincipalMessageController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\BlogNewsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HeroSliderController;
use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;

// User Web API Routes
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware('auth:sanctum');
Route::get('/logout', [UserController::class, 'UserLogout'])->middleware('auth:sanctum');
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware('auth:sanctum');
Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware('auth:sanctum');

// Teacher Web API Routes
Route::post("/create-teacher",[TeacherController::class,'TeacherCreate'])->middleware('auth:sanctum');
Route::get("/list-teacher",[TeacherController::class,'TeacherList'])->middleware('auth:sanctum');
Route::post("/delete-teacher",[TeacherController::class,'TeacherDelete'])->middleware('auth:sanctum');
Route::post("/teacher-by-id",[TeacherController::class,'TeacherByID'])->middleware('auth:sanctum');
Route::post("/update-teacher",[TeacherController::class,'TeacherUpdate'])->middleware('auth:sanctum');



// Topbar Web API Routes
Route::post("/create-topbar",[TopbarController::class,'TopbarCreate'])->middleware('auth:sanctum');
Route::get("/list-topbar",[TopbarController::class,'TopbarList'])->middleware('auth:sanctum');
Route::post("/topbar-by-id",[TopbarController::class,'TopbarByID'])->middleware('auth:sanctum');
Route::post("/update-topbar",[TopbarController::class,'TopbarUpdate'])->middleware('auth:sanctum');
Route::post("/delete-topbar",[TopbarController::class,'TopbarDelete'])->middleware('auth:sanctum');




// Branding Web API Routes
Route::post("/create-branding",[BrandingController::class,'BrandingCreate'])->middleware('auth:sanctum');
Route::get("/list-branding",[BrandingController::class,'BrandingList'])->middleware('auth:sanctum');
Route::post("/branding-by-id",[BrandingController::class,'BrandingByID'])->middleware('auth:sanctum');
Route::post("/update-branding",[BrandingController::class,'BrandingUpdate'])->middleware('auth:sanctum');
Route::post("/delete-branding",[BrandingController::class,'BrandingDelete'])->middleware('auth:sanctum');




// Section Web API Routes
Route::post("/create-section",[SectionController::class,'SectionCreate'])->middleware('auth:sanctum');
Route::get("/list-section",[SectionController::class,'SectionList'])->middleware('auth:sanctum');
Route::post("/section-by-id",[SectionController::class,'SectionByID'])->middleware('auth:sanctum');
Route::post("/update-section",[SectionController::class,'SectionUpdate'])->middleware('auth:sanctum');
Route::post("/delete-section",[SectionController::class,'SectionDelete'])->middleware('auth:sanctum');





// Section Web API Routes
Route::post("/create-group",[GroupController::class,'GroupCreate'])->middleware('auth:sanctum');
Route::get("/list-group",[GroupController::class,'GroupList'])->middleware('auth:sanctum');
Route::post("/group-by-id",[GroupController::class,'GroupByID'])->middleware('auth:sanctum');
Route::post("/update-group",[GroupController::class,'GroupUpdate'])->middleware('auth:sanctum');
Route::post("/delete-group",[GroupController::class,'GroupDelete'])->middleware('auth:sanctum');




// User Message Web API Routes
// Mail Send Route
Route::post('/contact',[UserMessageController::class,'send'])->name('contact');
Route::get("/list-user-message",[UserMessageController::class,'UserMessageList'])->middleware('auth:sanctum');
Route::post("/user-message-by-id",[UserMessageController::class,'UserMessageByID'])->middleware('auth:sanctum');
Route::post("/delete-user-message",[UserMessageController::class,'UserMessageDelete'])->middleware('auth:sanctum');




// Footer Web API Routes
Route::post("/create-footer",[FooterController::class,'FooterCreate'])->middleware('auth:sanctum');
Route::get("/list-footer",[FooterController::class,'FooterList'])->middleware('auth:sanctum');
Route::post("/footer-by-id",[FooterController::class,'FooterByID'])->middleware('auth:sanctum');
Route::post("/update-footer",[FooterController::class,'FooterUpdate'])->middleware('auth:sanctum');
Route::post("/delete-footer",[FooterController::class,'FooterDelete'])->middleware('auth:sanctum');






//Back-End Page Routes
Route::view('/','pages.front-end-page.home.home-page');
Route::view('/userLogin','pages.auth.login-page')->name('login');
Route::view('/userRegistration','pages.auth.registration-page');
Route::view('/sendOtp','pages.auth.send-otp-page');
Route::view('/verifyOtp','pages.auth.verify-otp-page');
Route::view('/resetPassword','pages.auth.reset-pass-page');
Route::view('/userProfile','pages.dashboard.profile-page');
Route::view('/dashboardSummary','pages.dashboard.dashboard-page');
Route::view('/teacherPage','pages.dashboard.teacher-page');
Route::view('/topbarPage','pages.dashboard.topbar-page');
Route::view('/brandingPage','pages.dashboard.branding-page');
Route::view('/footerPage','pages.dashboard.footer-page');
Route::view('/sectionPage','pages.dashboard.section-page.section');
Route::view('/groupPage','pages.dashboard.group-page.group');
Route::view('/userMessage','pages.dashboard.usermessage-page.usermessage');





// front-end-page Route
//

Route::get('/home',[HomeController::class,'HomePage']);
Route::get('/topbar-list',[TopbarController::class,'index']);
Route::get('/branding-list',[BrandingController::class,'index']);


Route::get('/admission-form',[AdmissionFormController::class,'AdmissionFormPage']);

Route::view('/vice-Principal-message','pages.front-end-page.home.vice-principals-message-page');
Route::view('/class-routing','pages.front-end-page.class-routing.class-routing-page');
Route::view('/notice','pages.front-end-page.notice-page.class-notice-page');
Route::view('/principal-message','pages.front-end-page.introduction.principals-message-page');
Route::view('/teachers-information','pages.front-end-page.introduction.teachers-information-page');
Route::view('/institute-gallary','pages.front-end-page.media.institute-gallary');
Route::view('/contact-us','pages.front-end-page.contact.contact-page');












// ismail work bellow



// Institute History API Routes
Route::post("/create-institute-history",[InstituteHistoryController::class,'InstituteHistoryCreate'])->middleware('auth:sanctum');
Route::get("/list-institute-history",[InstituteHistoryController::class,'InstituteHistoryList'])->middleware('auth:sanctum');
Route::post("/delete-institute-history",[InstituteHistoryController::class,'InstituteHistoryDelete'])->middleware('auth:sanctum');
Route::post("/institute-history-by-id",[InstituteHistoryController::class,'InstituteHistoryByID'])->middleware('auth:sanctum');
Route::post("/update-institute-history",[InstituteHistoryController::class,'InstituteHistoryUpdate'])->middleware('auth:sanctum');


// Principal Message API Routes
Route::get("/list-principal-message",[PrincipalMessageController::class,'PrincipalMessageList'])->middleware('auth:sanctum');
Route::post("/principal-message-by-id",[PrincipalMessageController::class,'PrincipalMessageByID'])->middleware('auth:sanctum');
Route::post("/create-principal-message",[PrincipalMessageController::class,'PrincipalMessageCreate'])->middleware('auth:sanctum');
Route::post("/delete-principal-message",[PrincipalMessageController::class,'PrincipalMessageDelete'])->middleware('auth:sanctum');
Route::post("/update-principal-message",[PrincipalMessageController::class,'PrincipalMessageUpdate'])->middleware('auth:sanctum');

// Photo Gallery API Routes
Route::get("/list-photo-gallery",[PhotoGalleryController::class,'PhotoGalleryList'])->middleware('auth:sanctum');
Route::post("/photo-gallery-by-id",[PhotoGalleryController::class,'PhotoGalleryByID'])->middleware('auth:sanctum');
Route::post("/create-photo-gallery",[PhotoGalleryController::class,'PhotoGalleryCreate'])->middleware('auth:sanctum');
Route::post("/delete-photo-gallery",[PhotoGalleryController::class,'PhotoGalleryDelete'])->middleware('auth:sanctum');
Route::post("/update-photo-gallery",[PhotoGalleryController::class,'PhotoGalleryUpdate'])->middleware('auth:sanctum');

// Blog News API Routes
Route::get("/list-blog-news",[BlogNewsController::class,'BlogNewsList'])->middleware('auth:sanctum');
Route::post("/create-blog-news",[BlogNewsController::class,'BlogNewsCreate'])->middleware('auth:sanctum');
Route::post("/delete-blog-news",[BlogNewsController::class,'BlogNewsDelete'])->middleware('auth:sanctum');
Route::post("/update-blog-news",[BlogNewsController::class,'BlogNewsUpdate'])->middleware('auth:sanctum');
Route::post("/blog-news-by-id",[BlogNewsController::class,'BlogNewsByID'])->middleware('auth:sanctum');

// Hero Slider API Routes
Route::get("/list-hero-slider",[HeroSliderController::class,'HeroSliderList'])->middleware('auth:sanctum');
Route::post("/create-hero-slider",[HeroSliderController::class,'HeroSliderCreate'])->middleware('auth:sanctum');
Route::post("/delete-hero-slider",[HeroSliderController::class,'HeroSliderDelete'])->middleware('auth:sanctum');
Route::post("/hero-slider-by-id",[HeroSliderController::class,'HeroSliderByID'])->middleware('auth:sanctum');
Route::post("/update-hero-slider",[HeroSliderController::class,'HeroSliderUpdate'])->middleware('auth:sanctum');

// Class API Routes
Route::get("/list-class",[ClassController::class,'ClassList'])->middleware('auth:sanctum');
Route::post("/create-class",[ClassController::class,'ClassCreate'])->middleware('auth:sanctum');
Route::post("/delete-class",[ClassController::class,'ClassDelete'])->middleware('auth:sanctum');
Route::post("/class-by-id",[ClassController::class,'ClassByID'])->middleware('auth:sanctum');
Route::post("/update-class",[ClassController::class,'ClassUpdate'])->middleware('auth:sanctum');


// Page Routes
Route::view('/institutionHistoryPage','pages.dashboard.institute-history-page');
Route::view('/principalMessagePage','pages.dashboard.principal-message-page');
Route::view('/photoGalleryPage','pages.dashboard.photo-gallery-page');
Route::view('/bolgNewsPage','pages.dashboard.blog-news-page');
Route::view('/heroSliderPage','pages.dashboard.hero-slider-page');
Route::view('/classPage','pages.dashboard.class-page');
