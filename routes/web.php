<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

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

route::get('/',[homeController::class,'index']);
route::get('/home',[homeController::class,'redirect'])->middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/add_doctor_view',[adminController::class,'addview'])->name('add_doctor_view');

route::post('upload_doctor',[adminController::class,'upload'])->name('upload_doctor');
route::post('appointment',[homeController::class,'appointment'])->name('appointment');
route::get('My_Appoinment',[homeController::class,'My_Appoinment'])->name('My_Appoinment');
route::get('cancel_appointment/{id}',[homeController::class,'cancel_appointment'])->name('cancel_appointment');
route::get('show_appointment',[adminController::class,'show_appointment'])->name('show_appointment');
route::get('approve/{id}',[adminController::class,'approve'])->name('approve');
route::get('canceled/{id}',[adminController::class,'canceled'])->name('canceled');

route::get('show_doctor',[adminController::class,'show_doctor'])->name('show_doctor');
route::get('delete_doctor/{id}',[adminController::class,'delete_doctor'])->name('delete_doctor');

route::get('update_doctor/{id}',[adminController::class,'update_doctor'])->name('update_doctor');
route::post('edit_doctor/{id}',[adminController::class,'edit_doctor'])->name('edit_doctor');

route::get('email_view/{id}',[adminController::class,'email_view'])->name('email_view');

route::post('send_email/{id}',[adminController::class,'send_email'])->name('send_email');


// 3:16:00 => send enail 3 point
