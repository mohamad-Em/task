<?php

use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

Route::namespace('user')->group(function(){
    Route::get('index',[UserController::class,'index'])->name('index');
    Route::get('register',[UserController::class,'register'])->name('register');
    Route::post('save',[UserController::class,'save'])->name('save');
    Route::post('login',[UserController::class,'login'])->name('login');
});
Route::group(['middleware' => 'user' , 'namespace' => 'user'],function(){
    Route::get('dashboard',[UserController::class,'dashboard'])->name('dashboard');
    Route::get('info',[UserController::class,'info'])->name('info');
    Route::get('edit/{ID}',[UserController::class,'edit'])->name('edit');
    Route::post('update/{ID}',[UserController::class,'update'])->name('update');
    Route::get('albums',[UserController::class,'albums'])->name('albums');
    Route::get('addAlbum/{ID}',[UserController::class,'addAlbum'])->name('addAlbum');
    Route::post('saveAlbum/{ID}',[UserController::class,'saveAlbum'])->name('saveAlbum');
    Route::get('viewAlbum/{ID}',[UserController::class,'viewAlbum'])->name('viewAlbum');
    Route::get('addPic/{ID}',[UserController::class,'addPic'])->name('addPic');
    Route::post('savePic/{ID}',[UserController::class,'savePic'])->name('savePic');
    Route::get('deleteAlbum/{ID}',[UserController::class,'deleteAlbum'])->name('deleteAlbum');
    Route::get('editPicture/{ID}',[UserController::class,'editPicture'])->name('editPicture');
    Route::post('updatePic/{ID}',[UserController::class,'updatePic'])->name('updatePic');
    Route::get('deletePicture/{ID}',[UserController::class,'deletePicture'])->name('deletePicture');
    Route::get('logout',[UserController::class,'logout'])->name('logout');
});
