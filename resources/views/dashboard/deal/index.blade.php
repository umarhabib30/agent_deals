@extends('layouts.dashboard')
@section('content')
    <div class="col-md-10 px-5 mt-5">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-12">
                <div class="light-green p-3 deals">
                    <p>Recent Deals</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Date</th>
                                <th scope="col">Reference # </th>
                                <th scope="col">Client</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deals as $deal)
                                <tr>
                                    <th scope="row"></th>
                                    <td>{{ $deal->closing_date ? \Carbon\Carbon::parse($deal->closing_date)->format('d-m-y') : '-' }}</td>
                                    <td>INV-0123</td>
                                    <td>{{ $deal->client_name }}</td>
                                    <td>${{ $deal->commission_amount }}</td>
                                    <td>{{ $deal->deal_status }}</td>
                                    <td>
                                        <a href="#" class="btn btn-green">View Details</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
