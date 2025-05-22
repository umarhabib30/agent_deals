@extends('layouts.admin')
@section('content')
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
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deals as $deal)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($deal->closing_date)->format('d-m-y') }}</td>
                                        <td>{{ $deal->reference_number }}</td>
                                        <td>{{ $deal->client_name }}</td>
                                        <td>{{ $deal->project_value }}</td>
                                        <td>{{ $deal->deal_status }}</td>
                                        <td><a href="{{ route('admin.deal.details', $deal->id) }}" class="btn btn-primary">Details</a></td>
                                        <td><a href="{{ route('admin.deal.edit', $deal->id) }}" class="btn btn-primary">Edit</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
@endsection
