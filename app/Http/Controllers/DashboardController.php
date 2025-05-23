<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Deal;
use App\Models\Payout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        // Get current and last year
        $currentYear = Carbon::now()->year;
        $lastYear = Carbon::now()->subYear()->year;

        // Query for current year monthly data
        $currentYearData = Deal::where('created_by', Auth::user()->id)
            ->whereYear('created_at', $currentYear)
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as deal_count'),
                DB::raw('SUM(project_value) as sales'),
                DB::raw('SUM(commission_amount) as revenue')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        // Query for last year monthly data
        $lastYearData = Deal::where('created_by', Auth::user()->id)
            ->whereYear('created_at', $lastYear)
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as deal_count'),
                DB::raw('SUM(project_value) as sales'),
                DB::raw('SUM(commission_amount) as revenue')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        // Prepare arrays for chart
        $monthlyData = [
            'currentYear' => [
                'sales' => array_fill(1, 12, 0),
                'revenue' => array_fill(1, 12, 0)
            ],
            'lastYear' => [
                'sales' => array_fill(1, 12, 0),
                'revenue' => array_fill(1, 12, 0)
            ]
        ];

        // Fill current year data
        foreach ($currentYearData as $month => $data) {
            $monthlyData['currentYear']['sales'][$month] = (float)$data->sales;
            $monthlyData['currentYear']['revenue'][$month] = (float)$data->revenue;
        }

        // Fill last year data
        foreach ($lastYearData as $month => $data) {
            $monthlyData['lastYear']['sales'][$month] = (float)$data->sales;
            $monthlyData['lastYear']['revenue'][$month] = (float)$data->revenue;
        }


        $data = [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'user' => Auth::user(),
            'deal_count' => Deal::where('created_by', Auth::user()->id)->count(),
            'total_sales' => Deal::where('created_by', Auth::user()->id)->sum('project_value'),
            'total_commission' => Deal::where('created_by', Auth::user()->id)->sum('commission_amount'),
            'activites' => Activity::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get(),
            'last_payout' => Payout::where('user_id', Auth::user()->id)->latest()->first(),
            'monthlyData' => $monthlyData, // Add monthly data for chart
            'currentYear' => $currentYear,
            'lastYear' => $lastYear,
        ];

        return view('dashboard.index', $data);
    }
}
