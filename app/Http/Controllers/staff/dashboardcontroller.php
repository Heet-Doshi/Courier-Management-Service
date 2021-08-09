<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class dashboardcontroller extends Controller
{
    public function index(){
        
        return view('staff.dashboard');
    }

}
