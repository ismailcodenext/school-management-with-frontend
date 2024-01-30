<?php

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TopbarController;
use App\Http\Controllers\BrandingController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InstituteHistoryController;
use Illuminate\Support\Facades\Route;

// User Web API Routes
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware('auth:sanctum');
Route::get('/logout',[UserController::class,'UserLogout'])->middleware('auth:sanctum');
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




// Footer Web API Routes
Route::post("/create-footer",[FooterController::class,'FooterCreate'])->middleware('auth:sanctum');
Route::get("/list-footer",[FooterController::class,'FooterList'])->middleware('auth:sanctum');
Route::post("/footer-by-id",[FooterController::class,'FooterByID'])->middleware('auth:sanctum');
Route::post("/update-footer",[FooterController::class,'FooterUpdate'])->middleware('auth:sanctum');
Route::post("/delete-footer",[FooterController::class,'FooterDelete'])->middleware('auth:sanctum');






// Page Routes
Route::view('/','pages.front-end-page.home-page');
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























// ismail work bellow



// Institute History API Routes
Route::post("/create-institute-history",[InstituteHistoryController::class,'InstituteHistoryCreate'])->middleware('auth:sanctum');
Route::get("/list-institute-history",[InstituteHistoryController::class,'InstituteHistoryList'])->middleware('auth:sanctum');
Route::post("/delete-institute-history",[InstituteHistoryController::class,'InstituteHistoryDelete'])->middleware('auth:sanctum');
Route::post("/institute-history-by-id",[InstituteHistoryController::class,'InstituteHistoryByID'])->middleware('auth:sanctum');
Route::post("/update-institute-history",[InstituteHistoryController::class,'InstituteHistoryUpdate'])->middleware('auth:sanctum');




// Page Routes
Route::view('/institutionHistoryPage','pages.dashboard.institute-history-page');
