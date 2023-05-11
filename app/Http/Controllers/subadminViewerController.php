<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use App\Models\Announcement;
use App\Models\Appointment;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;

use App\Notifications\AppRemarksUpdate;

class subadminViewerController extends Controller
{
    // public function viewSubadmin(Request $request){
    //     return view('subadmin-dashboard.');
    // }

    public function viewAdminRecords(Request $request){
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
}
