<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class dashboardcontroller extends Controller
{
    public function index(){

        return view('admin.dashboard');
        

    }
}
