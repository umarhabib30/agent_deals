<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Illuminate\Http\Request;

class AdminDealController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Deals',
            'active' => 'deals',
            'deals' => Deal::latest()->get(),
        ];
        return view('admin.deal.index', $data);
    }

    public function details($id)
    {
        $data = [
            'title' => 'Deal Details',
            'active' => 'deals',
            'deal' => Deal::findOrFail($id),
        ];
        return view('admin.deal.details', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Deal',
            'active' => 'deals',
            'deal' => Deal::findOrFail($id),
        ];
        return view('admin.deal.edit', $data);
    }

    public function update(Request $request)
    {
        try {
            // dd($request);
            $deal = Deal::find($request->deal_id);
            $deal->update($request->all());
            return redirect()->route('admin.deals')->with('success', 'Deal updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
