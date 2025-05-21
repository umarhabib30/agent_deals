<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Deals',
            'active' => 'deal',
            'deals' => Deal::where('created_by',Auth::user()->id)->get(),
            'user' => Auth::user(),
        ];

        return view('dashboard.deal.index', $data);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['created_by'] = Auth::user()->id;

            Deal::create($data);
            return redirect()->back()->with('success', 'Deal Submitted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
