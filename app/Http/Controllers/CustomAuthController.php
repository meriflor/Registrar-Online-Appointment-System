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
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;


class CustomAuthController extends Controller
{
 //------------------------------------// Registration & Log-in //--------------------------------------------------------// 
      public function registerUser(Request $request){
            $request->validate([
                  'firstName'=>'required',
                  'lastName'=>'required',
                  'middleName'=>'',
                  'suffix'=>'',
                  'address'=>'required',
                  'school_id'=>'required|unique:users',
                  'cell_no'=>'required|unique:users',
                  'civil_status'=>'required',
                  'email'=>'required|email|unique:users',
                  'birthdate'=>'required',
                  'gender'=>'required',
                  'status'=>'required',
                  'course'=>'required',
                  'acadYear'=>'',
                  'gradYear'=>'',
                  'password'=>'required|min:8',
            ]);
            //Inserting data from the user inputed
            $user = new User();
            $user -> firstName =ucfirst($request->firstName);
            $user -> lastName =ucfirst($request->lastName);
            $user -> middleName =ucfirst($request->middleName);
            $user -> suffix =ucfirst($request->suffix);
            $user -> address = $request->address;
            $user -> school_id = $request ->school_id;
            $user -> cell_no = $request ->cell_no;
            $user->civil_status = $request->input('civil_status');
            $user -> email = $request->email;
            $user->birthdate = $request->input('birthdate');
            $user->status = $request->input('status');
            $user->acadYear = $request->input('acad_year');
            $user->gradYear = $request->input('grad_year');
            $user->gender = $request->input('gender');
            $user->course = $request->input('course');
            $user -> password = Hash::make($request->password);
            $res = $user -> save();

            if($res){
                  return back()-> with ('success','You have registered successfully');
            }else{
                  return back()-> with('fail','Something wrong');
            }

      }


      public function loginUser(Request $request)
      {
      $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
      ]);

      $user = User::where('email', '=', $request->email)->first();

      if ($user) {
            if (Hash::check($request->password, $user->password)) {
                  $request->session()->put('loginId', $user->id);

                  if ($user->role == 1) {
                  return redirect()->route('dashboard-admin');
                  } else {
                  return redirect()->route('user-dashboard');
                  }
            } else {
                  return back()->with('fail', 'Email and password do not match.');
            }
      } else {
            return back()->with('fail', 'This email is not registered.');
      }
      }

      public function logout(){
            if (Session::has('loginId')){
                  Session::pull('loginId');
                  return redirect('/');
            }
      }


//------------------------// Retrieving and passing information to Appointment database and Displaying //-----------------------//
// public function appointment(){ //user-dashboard

//             $user = array();
//             $appointments = Appointment::all();
//             $forms = Form::all();

//             if (Session::has('loginId')) {
//             $user = User::where('id','=',Session::get('loginId'))->first();
//             $user_id = session('loginId');
//             $appointments = Appointment::where('user_id', $user_id)
//                   ->orderBy('created_at', 'desc')
//                   ->with(['user' => function ($query) {
//                   }, 'form' => function ($query) {
//                         $query->select('id', 'name','fee');
//                   }])
//                   ->get();
//             }

//             $firstName = $user ? $user->firstName : null;
//             $lastName = $user ? $user->lastName : null;
//             $middleName = $user ? $user->middleName : null;
//             $suffix = $user ? $user->suffix : null;
//             $address = $user ? $user->address : null;
//             $school_id = $user ? $user->school_id : null;
//             $cell_no = $user ? $user->cell_no : null;
//             $civil_status = $user ? $user->civil_status : null;
//             $email = $user ? $user->email : null;
//             $birthdate = $user ? $user->birthdate : null;
//             $status = $user ? $user->status : null;
//             $acadYear = $user ? $user->acadYear : null;
//             $gradYear = $user ? $user->gradYear : null;
//             $gender = $user ? $user->gender : null;
//             $course = $user ? $user->course : null;

//             $user_id = session('loginId');
//             $pending = Appointment::whereNotIn('status', ['Claimed'])
//                                     ->where('user_id', $user_id)->get();
            
//             $announcements = Announcement::orderBy('created_at', 'desc')->take(5)->get();

//             return view('appointment.appointment', compact('firstName','lastName','middleName','suffix','address','school_id','cell_no','civil_status','email','birthdate','gender','status', 'acadYear', 'gradYear', 'course',
//             'forms',
//             'appointments', 'pending', 'announcements'
//             ));

//  }

 //------------------------------------// Setting up Booking Appointment //--------------------------------------------------------// 
      public function bookAppointment(Request $request){
            $user_id = session('loginId');
            $form = Form::find($request->form_id);

            if (!$form) {
            abort(404);
            }   

            $request->validate([
                  'app_purpose' => 'required',
                  'appointment_date' => 'required',
                  'payment_method' => 'required',
                  'a_transfer' => 'required',
                  'b_transfer' => 'required'
            ]);

            $appointment = new Appointment();
            $appointment->app_purpose = $request->app_purpose;
            $appointment->acad_year = $request ->acad_year;
            $appointment->appointment_date = $request ->appointment_date;
            $appointment->payment_method = $request ->payment_method;

            if ($request->hasFile('proof_of_payment')) {
                  $proof_of_payment = $request->file('proof_of_payment');
                  if ($proof_of_payment->isValid()) {
                        // $pop_storage = $proof_of_payment->store('proof-of-payment');
                        $timestamp = time();
                        $fileName = $timestamp . '_' . $proof_of_payment->getClientOriginalName();
                        $pop_path = $proof_of_payment->move(public_path('images/proof-of-payment'), $fileName);
                        $appointment->proof_of_payment = 'images/proof-of-payment/'.$fileName;
                        // $appointment->proof_of_payment = $pop_storage;
                  } else {
                  return response()->json(['error' => 'Invalid file'], 400);
                  }
            } else {
                  $appointment->proof_of_payment = null;
            }

            $appointment->a_transfer = $request ->a_transfer;
            $appointment->a_transfer_school = $request ->a_transfer_school;
            $appointment->b_transfer = $request ->b_transfer;
            $appointment->b_transfer_school = $request ->b_transfer_school;

            $appointment->status = "Pending";

            $appointment->user_id = $user_id;
            $appointment->form_id = $form->id;

            if ($appointment->save()) {
                  $bookingNumber = 'B' . str_pad($appointment->id, 6, '0', STR_PAD_LEFT);
                  $appointment->booking_number = $bookingNumber;
                  $appointment->save();

                  $booking = new Booking();
                  $booking->user_id = $user_id;
                  $booking->appointment_id = $appointment->id;
                  $booking->save();
      
                  return response()->json(['success' => true, 'message' => 'Appointment booked successfully.']);
            } else {
                  return response()->json(['success' => false, 'message' => 'Appointment booking failed.']);
            }
      }

//-------------------------------// Retrive All Bookings and Displaying//-------------------------------//

// public function bookings()
// {
//       $bookings = Booking::with('user', 'appointment')->get();
//       $users = User::whereIn('id', $bookings->pluck('user_id'))->select('id')->get();
//       $appointments = Appointment::whereIn('id', $bookings->pluck('appointment_id'))->get();
        
//       return view('appointment.showBookings', compact('bookings', 'users', 'appointments'));
// } //pwde nani ma delete

      public function updateProfile(Request $request){
            $user_id = session('loginId');

            $user = User::find($user_id);
            if (!$user) {
                  abort(404);
            }

            $user->firstName = $request->input('editFirstName');
            $user->lastName = $request->input('editLastName');
            $user->middleName = $request->input('editMiddleName');
            $user->suffix = $request->input('editSuffix');
            $user->address = $request->input('editAddress');
            $user->school_id = $request->input('editSchoolID');
            $user->cell_no = $request->input('editCpNo');
            $user->civil_status = $request->input('editCivilStatus');
            $user->email = $request->input('editEmail');
            $user->birthdate = $request->input('editBirthdate');
            $user->status = $request->input('editStatus');
            if ($user->status === 'graduate') {
                  $user->acadYear = null;
                  $user->gradYear = $request->input('editGradYear');
            } else {
                  $user->acadYear = $request->input('editAcadYear');
                  $user->gradYear = null;
            }
            $user->gender = $request->input('editGender');
            $user->course = $request->input('editCourse');
            $user->save();

            return redirect('/dashboard')->with('success', 'User information updated successfully.');
      }

      public function cancel_appointment(Request $request, $id)
      {
            $booking = Booking::where('appointment_id', $id)->first();
            $appointment = Appointment::find($id);
            if($appointment && $appointment->status === "Pending"){
                  if(!$booking){
                        $appointment->delete();
                  }else{
                        $booking->delete();
                        $appointment->delete();
                  }
                  return response()->json([
                        'success' => true,
                        'message' => 'Appointment has been cancelled successfully.',
                  ]);
            }
           
            return response()->json([
                'success' => false,
                'message' => 'Unable to cancel appointment.',
            ]);
      }

}
