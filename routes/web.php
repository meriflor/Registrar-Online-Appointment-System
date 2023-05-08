<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\announcementController;
use App\Http\Controllers\courseController;
use App\Http\Controllers\faqsController;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\AdminCheck;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UsersCalendarController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\formController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AlreadyLoggedIn;
use App\Http\Controllers\AppointmentSlotController;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Auth\Events\Logout;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([AuthCheck::class,AlreadyLoggedIn::class])->group(function () {
    // Route::get('/dashboard', [CustomAuthController::class, 'appointment'])->name('appointment');
    Route::get('/dashboard', [UserController::class, 'viewUser'])->name('user-dashboard');
    Route::get('/appointment-records', [UserController::class, 'viewUserAppointments']);
    Route::get('/notification', [UserController::class, 'viewUserNotification']);
    Route::get('/edit-profile', [UserController::class, 'viewUserEditProfile'])->name('edit-profile');
    Route::get('/settings', [UserController::class, 'viewUserSettings']);
});

Route::middleware([AuthCheck::class, AdminCheck::class])->prefix('dashboard-admin')->group(function () {
    Route::get('dashboard',[adminController::class,'viewAdminRecords'])->name('dashboard-admin');
    // Route::get('dashboard/request/{id}', [adminController::class, viewAdminRequest])
    Route::post('announcement-store',[announcementController::class,'storeAnnouncement'])->name('announcement-store');
    Route::post('faq-store',[faqsController::class,'storeFaq'])->name('faq-store');
    
    //Admin Functions and content
    Route::get('request/{date}',[adminController::class,'viewAdminRequest'])->name('request');
    Route::post('create-form',[formController::class,'createForm'])->name('create-form'); 
    Route::any('config',[formController::class,'viewForm'])->name('config');
    Route::get('message',[MessageController::class,'viewMessage']);
    Route::get('announcement',[announcementController::class,'viewAnnouncementAdmin']);
    Route::get('faqs',[faqsController::class,'viewFaqAdmin']);
    Route::get('request-reschedule',[adminController::class,'viewAllResched']);
    Route::get('request-all', [adminController::class,'viewAllRequest']);

    //Admin Forms Function
    // Route::get('forms/{form}/edit', [FormController::class, 'edit'])->name('forms.edit');
    // Route::put('forms/{form}', [FormController::class, 'update'])->name('forms.update');
    // Route::delete('forms/{form}', [FormController::class,'destroy'])->name('forms.destroy');
    
});

    //Login and Registraion - Personal Information
    Route::post('/registration-user',[CustomAuthController::class,'registerUser'])->name('registration-user');  
    Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
    Route::get('/logout',[CustomAuthController::class,'logout'])->name('logout');
    Route::post('/updateProfile', [CustomAuthController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/bookAppointment',[CustomAuthController::class,'bookAppointment'])->name('bookAppointment');

    //Working in announcements -> temporary
    Route::get('/',[announcementController::class,'showAnnouncement'])->name('announcement');
    Route::get('announcement',[announcementController::class,'dashboardAnnouncement'])->name('announcement.dashboard');


    //faqs sa user side dapit -> temporary
    Route::get('/faqs',[faqsController::class,'index'])->name('faqs');
    

    //Para ni sa Crud sa calendar -> wala pani sure,, test rani
    Route::get('appointment_slots', [AppointmentSlotController::class, 'events'])->name('appointment_slots.events');
    // Route::post('/appointment_slots', [AppointmentSlotController::class, 'store']);
    Route::post('/appointment_slots', [AppointmentSlotController::class, 'store'])->name('appointment_slots.store');
    Route::put('/appointment_slots/{appointmentSlot}', [AppointmentSlotController::class, 'update']);
    Route::delete('/appointment_slots/{appointmentSlot}', [AppointmentSlotController::class, 'destroy']);


    //Bookings Status
    Route::get('bookings/{id}', [adminController::class, 'viewApp']);
    Route::put('acceptStatus', [adminController::class, 'updateStatusAccept'])->name('acceptStatus');
    Route::put('doneStatus', [adminController::class, 'updateStatusDone'])->name('doneStatus');
    Route::put('claimedStatus', [adminController::class, 'updateStatusClaimed'])->name('claimedStatus');
    Route::put('reschedule-request', [UserController::class, 'reschedAppointment'])->name('reschedule');

    Route::get('form/{id}',[formController::class,'viewOneForm']);  
    Route::put('edit-form',[formController::class,'editForm'])->name('editform');
    Route::delete('form/delete/{id}',[formController::class,'delete'])->name('deleteform');  

    Route::get('announcement/{id}',[announcementController::class,'viewOneAnnouncement']);  
    Route::put('edit-announcement',[announcementController::class,'editAnnouncement'])->name('editannouncement');
    Route::delete('announcement/delete/{id}',[announcementController::class,'delete'])->name('deleteannouncement');  

    //testing -> course
    Route::post('store-course',[courseController::class,'storeCourse'])->name('store-course');
    Route::put('edit-course',[courseController::class,'editCourse'])->name('editcourse');
    Route::delete('course/delete/{id}',[courseController::class,'delete'])->name('deletecourse');  

    //testing -> faqs
    Route::get('faq/{id}',[faqsController::class,'viewOneFaq']);  
    Route::put('edit-faq',[faqsController::class,'editFaq'])->name('editfaq');
    Route::delete('faq/delete/{id}',[faqsController::class,'delete'])->name('deletefaq');  


    Route::delete('/appointment_slots/{appointmentSlot}', [AppointmentSlotController::class, 'destroy'])->name('appointment_slots.destroy');
    Route::put('appointment_slots/edit/{id}', [AppointmentSlotController::class, 'edit'])->name('slot.edit');

    Route::delete('appointment/delete/{id}',[CustomAuthController::class,'cancel_appointment'])->name('cancelappointment');  
    Route::put('appointment/remarks', [adminController::class,'updateRemark'])->name('appointmentremarks');
    