<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\Backend\GradeController;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\LevelController;
use App\Http\Controllers\backend\SubjectController;
use App\Http\Controllers\Backend\SubjectLevelController;

Route::group(['prefix' => 'admin-panel'],function(){
    Route::get('/',[HomeController::class,'index'])->name('admin-home');
    Route::get('/register',[HomeController::class,'register'])->name('register');
    Route::get('/logout',[HomeController::class,'logout'])->name('logout');

});

Route::group(['namespace' => 'Backend','prefix' => 'admin-panel'],function(){
    //Grade Route
    Route::any('/add-grade',[GradeController::class,'create'])->name('add-grade');
    Route::get('/manage-grade',[GradeController::class,'index'])->name('manage-grade');
    Route::get('/delete-grade/{id}',[GradeController::class,'destroy'])->name('delete-grade');
    Route::any('/edit-grade/{id}',[GradeController::class,'update'])->name('edit-grade');

    //Subject Route
    Route::any('/add-subject',[SubjectController::class,'create'])->name('add-subject');
    Route::get('/manage-subject',[SubjectController::class,'index'])->name('manage-subject');
    Route::get('/delete-subject/{id}',[SubjectController::class,'destroy'])->name('delete-subject');
    Route::any('/edit-subject/{id?}',[SubjectController::class,'update'])->name('edit-subject');
    Route::any('/subject-status/{id?}',[SubjectController::class,'toggleStatus'])->name('subject-status');


    // Level Only Route
    Route::any('/add-level',[LevelController::class,'create'])->name('add-level');
    Route::get('/manage-level',[LevelController::class,'index'])->name('manage-level');
    Route::get('/delete-level/{id}',[LevelController::class,'destroy'])->name('delete-level');
    Route::any('/edit-level/{id?}',[LevelController::class,'update'])->name('edit-level');
    Route::any('/level-status/{id?}',[LevelController::class,'toggleStatus'])->name('level-status');



    //Subject Level Route
    Route::any('/add-subjectlevel/{id?}',[SubjectLevelController::class,'create'])->name('add-subjectlevel');
    Route::get('/manage-subjectlevel',[SubjectLevelController::class,'index'])->name('manage-subjectlevel');
    Route::get('/delete-subjectlevel/{id}',[SubjectLevelController::class,'destroy'])->name('delete-subjectlevel');
    Route::any('/edit-subjectlevel/{id?}',[SubjectLevelController::class,'update'])->name('edit-subjectlevel');
    Route::any('/subjectlevel-status/{id?}',[SubjectLevelController::class,'toggleStatus'])->name('subjectlevel-status');


    //Subject Content Route
    Route::any('/add-subjectcontent/{id?}',[SubjectLevelController::class,'create'])->name('add-subjectcontent');
    Route::get('/manage-subjectcontent',[SubjectLevelController::class,'index'])->name('manage-subjectcontent');
    Route::get('/delete-subjectcontent/{id}',[SubjectLevelController::class,'destroy'])->name('delete-subjectcontent');
    Route::any('/edit-subjectcontent/{id?}',[SubjectLevelController::class,'update'])->name('edit-subjectcontent');
    Route::any('/subjectcontent-status/{id?}',[SubjectLevelController::class,'toggleStatus'])->name('subjectcontent-status');

    // Ajax route 
    Route::get('/getSubject',[SubjectLevelController::class,'getSubject']);








     // CKeditor Controller 
     Route::post('ckeditor/image_upload', [CkeditorController::class,'upload'])->name('upload');
     
});
