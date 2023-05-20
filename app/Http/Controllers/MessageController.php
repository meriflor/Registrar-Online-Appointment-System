<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function viewMessage(){
        return view('admin-dashboard.message');
    }
    public function store(Request $request)
{
    $message = new Message();
    $message->fullname = $request->input('fullname');
    $message->email = $request->input('email');
    $message->message = $request->input('message');
    $message->save();
    
    return redirect()->back()->with('success', 'Message sent successfully!');
}
}
