<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use App\Models\Announcement;
use App\Models\Appointment;
use App\Models\Booking;
use App\Models\RegistrarStaff;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;

use App\Notifications\AppRemarksUpdate;

class subadminViewerController extends Controller
{
    public function viewSubAdminRecords(Request $request){
        $bookings = Booking::with('user', 'appointment')
                ->where('resched', 0)
                ->whereHas('appointment', function ($query) {
                    $query->where('status', 'claimed');
                })->get();


        $current_day = Carbon::today()->format('F d, Y');
        $todayDocs = Appointment::with('form')->where('appointment_date', '=', $current_day)->get();
        
        $futureDocs = Appointment::with('form')
                ->where('appointment_date', '>',  $current_day)
                ->where('status', 'Pending')
                ->whereHas('bookings', function ($query) {
                    $query->where('resched', 0);
                })
                ->orderBy('appointment_date', 'asc')
                ->get()
                ->groupBy('appointment_date');

        $formFutureCounts = collect([]);

        foreach ($futureDocs as $date => $appointments) {
            $counts = $appointments->groupBy('form.name')->map(function ($appointments) {
                return $appointments->count();
            });


            $formFutureCounts = $formFutureCounts->merge($counts->map(function ($count, $formName) use ($date) {
                return [ 
                    'form_name' => $formName,
                    'date' => $date,
                    'count' => $count
                ];
            }));
        }


        $formFutureCounts = $formFutureCounts->groupBy('form_name');
        
        $formCounts = $todayDocs->groupBy('form.name')->map(function ($appointments) {
            return $appointments->count();
        });
        
        return view('subadmin-dashboard.dashboard', compact('bookings', 'todayDocs', 'futureDocs', 'current_day', 'formCounts'));
    }
    public function viewAdminRequest(Request $request, $date){
        $selectedDate = Carbon::parse($date)->format('F d, Y');

        $pending = Booking::with('user', 'appointment')
                        ->where('resched', 0)
                        ->whereHas('appointment', function($query) use($selectedDate){
                            $query->where('appointment_date', $selectedDate)->where('status', 'Pending');
                        })->get();

        $onprocess = Booking::with('user', 'appointment')
                        ->where('resched', 0)
                        ->whereHas('appointment', function($query) use($selectedDate){
                            $query->where('appointment_date', $selectedDate)->where('status', 'On Process');
                        })->get();

        $ready = Booking::with('user', 'appointment')
                        ->where('resched', 0)
                        ->whereHas('appointment', function($query) use($selectedDate){
                            $query->where('appointment_date', $selectedDate)->where('status', 'Ready to Claim');
                        })->get();

        $claimed = Booking::with('user', 'appointment')
                        ->where('resched', 0)
                        ->whereHas('appointment', function($query) use($selectedDate){
                            $query->where('appointment_date', $selectedDate)->where('status', 'Claimed');
                        })->get();

        return view('subadmin-dashboard.request', compact('pending', 'onprocess', 'ready', 'claimed'));
    }
    public function viewAllRequest(Request $request){
        $bookings = Booking::with('user', 'appointment')
                            ->where('resched', 0)
                            ->whereDoesntHave('appointment', function ($query) {
                                $query->where('status', 'claimed');
                            })->get();
        return view('subadmin-dashboard.request-all', compact('bookings'));
    }
    public function viewAllResched(Request $request){
        $bookings = Booking::with('user', 'appointment')
                            ->where('resched', 1)
                            ->whereDoesntHave('appointment', function ($query) {
                                $query->where('status', 'claimed');
                            })->get();
        return view('subadmin-dashboard.request-resched', compact('bookings'));
    }
}
