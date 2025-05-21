<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $data =[
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'user' => Auth::user(),
        ];
        return view('dashboard.index',$data);
    }
}
