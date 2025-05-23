@extends('layouts.admin')
@section('content')
    <div class="">
        <div class="card">
            <div class="card-header">
                <h4>Add new payout</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.deal.payouts.store') }}" method="POST" enctype="multipart/form-data" id="password_form">
                    @csrf
                    <input type="hidden" name="deal_id" id="" value="{{ $deal_id }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Image <small>(Optional)</small></label>
                            <input type="file" class="form-control" id="image" name="image" >
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" id="password_update" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- table --}}
     <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Reference#</th>
                                    <th>Client</th>
                                    <th>Amount</th>
                                    <th>image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payouts as $payout)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($payout->created_at)->format('d-m-y') }}</td>
                                        <td>{{ $payout->reference_number }}</td>
                                        <td>{{ $payout->client }}</td>
                                        <td>{{ $payout->amount }}</td>
                                        <td><img src="{{ asset($payout->image) }}" alt="" style="width: 40px"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
