<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\RegisterSchoolController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

use App\Mail\CollegeRegistrationMail;
Route::get('/',[FrontendController::class,'index'])->name('home');
Route::any('/register-school',[RegisterSchoolController::class,'create'])->name('register-school');
Route::get('/send-mail', function () {
   
   
   
    Mail::to('tamangdipesh7391@gmail.com')->send(new CollegeRegistrationMail());
   if(Mail::failures()){
    dd("Email is not Sent.");

   }else{
           dd("Email is Sent.");

   }
});
Route::get('/subjects/{id}',[FrontendController::class,'subjects'])->name('subjects');
Route::get('/subject-level/{gid}/{sid}',[FrontendController::class,'subjectLevel'])->name('subject-level');
Route::get('/subject-content/{gid}/{sid}/{lid}',[FrontendController::class,'subjectContent'])->name('subject-content');
Route::get('/content-details/{gid}/{sid}/{lid}',[FrontendController::class,'ContentDetails'])->name('content-details');





