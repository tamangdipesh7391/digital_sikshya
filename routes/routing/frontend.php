<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\RegisterSchoolController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/',[FrontendController::class,'index'])->name('home');
Route::any('/register-school',[RegisterSchoolController::class,'create'])->name('register-school');
Route::get('/send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\CollegeRegistrationMail($details));
   
    dd("Email is Sent.");
});