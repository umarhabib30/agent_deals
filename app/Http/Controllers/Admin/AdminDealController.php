<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Deal;
use App\Models\Payout;
use Carbon\Carbon;
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
            $deal = Deal::find($request->deal_id);
            $activity = Activity::where('deal_id', $deal->id)->first();
            $accepted_data =[
                        'user_id' => $deal->created_by,
                        'deal_id' => $deal->id,
                        'date' => Carbon::now(),
                        'message' => 'Your deal submission has been reviewed and approved. You’ll receive your commission shortly—check your email for details.',
                        'status' => true,
            ];

            $declined_data =[
                        'user_id' => $deal->created_by,
                        'deal_id' => $deal->id,
                        'date' => Carbon::now(),
                        'message' => 'We’ve reviewed your deal, but it couldn’t be approved right now. Check your email for details, or reach out to support. We’re here to help.',
                        'status' => false,
            ];

            if($request->deal_status == 'Accepted'){
                if($activity){
                    if($activity->status != true){
                        Activity::create($accepted_data);
                    }
                }else{
                    Activity::create($accepted_data);
                }
            }

            if($request->deal_status == 'Declined'){
                if($activity){
                    if($activity->status != false){
                        Activity::create($declined_data);
                    }
                }else{
                    Activity::create($declined_data);
                }
            }
            $deal->update($request->all());
            return redirect()->route('admin.deals')->with('success', 'Deal updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function payouts($id){
        $data = [
            'title' => 'Deal Payouts',
            'active' => 'deals',
            'payouts' => Payout::where('deal_id', $id)->latest()->get(),
            'deal_id'=> $id,
        ];
        return view('admin.deal.payout', $data);
    }

    public function payoutsStore(Request $request){

        if($request->hasFile('image')){
            $path = ImageHelper::saveImage($request->image, 'payouts');
        }else{
            $path = null;
        }

        $deal = Deal::find($request->deal_id);

        Payout::create([
            'user_id' => $deal->created_by,
            'deal_id' => $deal->id,
            'amount' => $request->amount,
            'image' => $path,
            'reference_number' => $deal->reference_number,
            'client' => $deal->client_name,
        ]);

        return redirect()->back()->with('success', 'Payout added successfully');
    }
}
