<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Payout;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $data=[
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'total_revenue' => Deal::sum('project_value'),
            'total_payout' => Payout::sum('amount'),
            'total_deals' => Deal::count(),
            'total_users' => User::count(),
        ];
        return view('admin.dashboard.index',$data);
    }
}
