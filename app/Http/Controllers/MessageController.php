<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function viewMessage(){
        return view('admin-dashboard.message');
    }
}
