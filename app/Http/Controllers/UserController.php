<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Announcement;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
class UserController extends Controller
{
    public function viewUser(){
        $user = array();
        $appointments = Appointment::all();
        $forms = Form::all();

        if (Session::has('loginId')) {
        $user = User::where('id','=',Session::get('loginId'))->first();
        $user_id = session('loginId');
        $appointments = Appointment::where('user_id', $user_id)
              ->orderBy('created_at', 'desc')
              ->with(['user' => function ($query) {
                    $query->select('id', 'firstName','lastName','middleName','email','suffix');
              }, 'form' => function ($query) {
                    $query->select('id', 'name','fee');
              }])
              ->get();
        }

        $firstName = $user ? $user->firstName : null;
        $lastName = $user ? $user->lastName : null;
        $middleName = $user ? $user->middleName : null;
        $suffix = $user ? $user->suffix : null;
        $address = $user ? $user->address : null;
        $school_id = $user ? $user->school_id : null;
        $cell_no = $user ? $user->cell_no : null;
        $civil_status = $user ? $user->civil_status : null;
        $email = $user ? $user->email : null;
        $birthdate = $user ? $user->birthdate : null;
        $status = $user ? $user->status : null;
        $acadYear = $user ? $user->acadYear : null;
        $gradYear = $user ? $user->gradYear : null;
        $gender = $user ? $user->gender : null;
        $course = $user ? $user->course : null;

        $user_id = session('loginId');
        $pending = Appointment::whereNotIn('status', ['Claimed'])
                                ->where('user_id', $user_id)->get();
        
        $announcements = Announcement::orderBy('created_at', 'desc')->take(5)->get();
        $bookings = Booking::all();

        return view('appointment.content.dashboard', compact('firstName','lastName','middleName','suffix','address','school_id','cell_no','civil_status','email','birthdate','gender','status', 'acadYear', 'gradYear', 'course',
        'forms',
        'appointments', 'pending', 'announcements', 'bookings', 'user'
        ));
    }

    public function viewUserAppointments(){
        $user = array();
        $appointments = Appointment::all();
        $forms = Form::all();

        if (Session::has('loginId')) {
        $user = User::where('id','=',Session::get('loginId'))->first();
        $user_id = session('loginId');
      //   $appointments = Appointment::where('user_id', $user_id)
      //         ->orderBy('created_at', 'desc')
      //         ->with(['user' => function ($query) {
      //               $query->select('id', 'firstName','lastName','middleName','email','suffix');
      //         }, 'form' => function ($query) {
      //               $query->select('id', 'name','fee');
      //         }])
      //         ->get();
      //   }
            $appointments = Appointment::with('user', 'form')
                  ->where('user_id', $user_id)
                  ->orderBy('created_at', 'desc')
                  ->get();
            }
        $firstName = $user ? $user->firstName : null;
        $lastName = $user ? $user->lastName : null;
        $middleName = $user ? $user->middleName : null;
        $suffix = $user ? $user->suffix : null;
        $address = $user ? $user->address : null;
        $school_id = $user ? $user->school_id : null;
        $cell_no = $user ? $user->cell_no : null;
        $civil_status = $user ? $user->civil_status : null;
        $email = $user ? $user->email : null;
        $birthdate = $user ? $user->birthdate : null;
        $status = $user ? $user->status : null;
        $acadYear = $user ? $user->acadYear : null;
        $gradYear = $user ? $user->gradYear : null;
        $gender = $user ? $user->gender : null;
        $course = $user ? $user->course : null;

        $user_id = session('loginId');
        $pending = Appointment::whereNotIn('status', ['Claimed'])
                                ->where('user_id', $user_id)->get();
        
        $announcements = Announcement::orderBy('created_at', 'desc')->take(5)->get();
        $bookings = Booking::all();

        return view('appointment.content.appointment-records', compact('firstName','lastName','middleName','suffix','address','school_id','cell_no','civil_status','email','birthdate','gender','status', 'acadYear', 'gradYear', 'course',
        'forms', 'bookings',
        'appointments', 'pending', 'announcements'
        ));
    }

    public function viewUserEditProfile(){
        $user = array();
        $courses = Course::all(); 
        $appointments = Appointment::all();
        $forms = Form::all();

        if (Session::has('loginId')) {
        $user = User::where('id','=',Session::get('loginId'))->first();
        $user_id = session('loginId');
        $appointments = Appointment::where('user_id', $user_id)
              ->orderBy('created_at', 'desc')
              ->with(['user' => function ($query) {
                    $query->select('id', 'firstName','lastName','middleName','email','suffix');
              }, 'form' => function ($query) {
                    $query->select('id', 'name','fee');
              }])
              ->get();
        }

        $firstName = $user ? $user->firstName : null;
        $lastName = $user ? $user->lastName : null;
        $middleName = $user ? $user->middleName : null;
        $suffix = $user ? $user->suffix : null;
        $address = $user ? $user->address : null;
        $school_id = $user ? $user->school_id : null;
        $cell_no = $user ? $user->cell_no : null;
        $civil_status = $user ? $user->civil_status : null;
        $email = $user ? $user->email : null;
        $birthdate = $user ? $user->birthdate : null;
        $status = $user ? $user->status : null;
        $acadYear = $user ? $user->acadYear : null;
        $gradYear = $user ? $user->gradYear : null;
        $gender = $user ? $user->gender : null;
        $course = $user ? $user->course : null;

        $user_id = session('loginId');
        $pending = Appointment::whereNotIn('status', ['Claimed'])
                                ->where('user_id', $user_id)->get();
        
        $announcements = Announcement::orderBy('created_at', 'desc')->take(5)->get();

        $bookings = Booking::all();
        return view('appointment.content.edit-profile', compact('firstName','lastName','middleName','suffix','address','school_id','cell_no','civil_status','email','birthdate','gender','status', 'acadYear', 'gradYear', 'course',
        'forms','bookings',
        'appointments', 'pending', 'announcements','courses' 
        ));
    }
    
    public function viewUserSettings(){
        $user = array();
        $appointments = Appointment::all();
        $forms = Form::all();

        if (Session::has('loginId')) {
        $user = User::where('id','=',Session::get('loginId'))->first();
        $user_id = session('loginId');
        $appointments = Appointment::where('user_id', $user_id)
              ->orderBy('created_at', 'desc')
              ->with(['user' => function ($query) {
                    $query->select('id', 'firstName','lastName','middleName','email','suffix');
              }, 'form' => function ($query) {
                    $query->select('id', 'name','fee');
              }])
              ->get();
        }

        $firstName = $user ? $user->firstName : null;
        $lastName = $user ? $user->lastName : null;
        $middleName = $user ? $user->middleName : null;
        $suffix = $user ? $user->suffix : null;
        $address = $user ? $user->address : null;
        $school_id = $user ? $user->school_id : null;
        $cell_no = $user ? $user->cell_no : null;
        $civil_status = $user ? $user->civil_status : null;
        $email = $user ? $user->email : null;
        $birthdate = $user ? $user->birthdate : null;
        $status = $user ? $user->status : null;
        $acadYear = $user ? $user->acadYear : null;
        $gradYear = $user ? $user->gradYear : null;
        $gender = $user ? $user->gender : null;
        $course = $user ? $user->course : null;

        $user_id = session('loginId');
        $pending = Appointment::whereNotIn('status', ['Claimed'])
                                ->where('user_id', $user_id)->get();
        
        $announcements = Announcement::orderBy('created_at', 'desc')->take(5)->get();

        $bookings = Booking::all();
        return view('appointment.content.settings', compact('firstName','lastName','middleName','suffix','address','school_id','cell_no','civil_status','email','birthdate','gender','status', 'acadYear', 'gradYear', 'course',
        'forms', 'bookings',
        'appointments', 'pending', 'announcements'
        ));
    }

    public function viewUserNotification(){
        $user = array();
        $appointments = Appointment::all();
        $forms = Form::all();

        if (Session::has('loginId')) {
        $user = User::where('id','=',Session::get('loginId'))->first();
        $user_id = session('loginId');
        $appointments = Appointment::where('user_id', $user_id)
              ->orderBy('created_at', 'desc')
              ->with(['user' => function ($query) {
                    $query->select('id', 'firstName','lastName','middleName','email','suffix');
              }, 'form' => function ($query) {
                    $query->select('id', 'name','fee');
              }])
              ->get();
        }

        $firstName = $user ? $user->firstName : null;
        $lastName = $user ? $user->lastName : null;
        $middleName = $user ? $user->middleName : null;
        $suffix = $user ? $user->suffix : null;
        $address = $user ? $user->address : null;
        $school_id = $user ? $user->school_id : null;
        $cell_no = $user ? $user->cell_no : null;
        $civil_status = $user ? $user->civil_status : null;
        $email = $user ? $user->email : null;
        $birthdate = $user ? $user->birthdate : null;
        $status = $user ? $user->status : null;
        $acadYear = $user ? $user->acadYear : null;
        $gradYear = $user ? $user->gradYear : null;
        $gender = $user ? $user->gender : null;
        $course = $user ? $user->course : null;

        $user_id = session('loginId');
        $pending = Appointment::whereNotIn('status', ['Claimed'])
                                ->where('user_id', $user_id)->get();
        
        $announcements = Announcement::orderBy('created_at', 'desc')->take(5)->get();

            //notifications
            $notifications = User::find($user_id)
                  ->notifications()
                  ->orderBy('created_at', 'desc')
                  ->take(10)->get();
            // Mark all notifications as read
            User::find($user_id)->unreadNotifications->markAsRead();

            $bookings = Booking::all();

        return view('appointment.content.notification', compact('firstName','lastName','middleName','suffix','address','school_id','cell_no','civil_status','email','birthdate','gender','status', 'acadYear', 'gradYear', 'course',
        'forms', 'bookings',
        'appointments', 'pending', 'announcements', 'notifications'
        ));
    }

      public function reschedAppointment(Request $request){
            $app_id = $request->input('re_app_id');
            $appointment = Appointment::find($app_id);

            // dd($request->input('re_app_date_input'));
            $appointment->appointment_date = $request->input('re_app_date_input');
            $appointment->remarks = null;
            $appointment->save();

            $bookings = Booking::where('appointment_id', $app_id)->first();
            $bookings->resched = 0;
            $bookings->save();

            $existingNotification = $appointment->user->notifications()
                  ->where('data->notif_type', "remarks")
                  ->where('data->app_id', $app_id)
                  ->first();
            if($existingNotification){
                  $existingNotification->delete();
            }
            return redirect()->back();
      }

      public function notifDelete($id, $notif_type){
            $bookings = Booking::find($id);
            $user = $bookings->user;
            // delete a specific notification by ID (in case code)
            $user->notifications()
                  ->where('data->app_id', $id)
                  ->where('data->notif_type', $notif_type)
                  ->delete();
            return back();
            // // delete all the notifications for the user
            // $user->notifications()->delete();
      }
      
      public function unreadNotif(){
            $user = User::find(session('loginId'));
            $unreadNotifications = $user->notifications()->whereNull('read_at')->count();
            return response()->json(['count' => $unreadNotifications]);
      }
}
