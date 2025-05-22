@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{-- <h3 class="mb-0">Deal Details</h3> --}}
                    <a href="{{ route('admin.deals') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <!-- Project Details -->
                    <div class="card p-3 border-0">
                        <h5 class="mb-4">Project Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <strong class="light-gray-1">Project Type</strong>
                                <p class="fw-bold">{{ $deal->project_type }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong class="light-gray-1">Project Name</strong>
                                <p class="fw-bold">{{ $deal->project_name }}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <strong class="light-gray-1">Developer</strong>
                                <p class="fw-bold">{{ $deal->developer }}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <strong class="light-gray-1">Location</strong>
                                <p class="fw-bold">{{ $deal->city ." " . $deal->state }}</p>
                            </div>
                            <div class="col-md-12 mt-3">
                                 <strong class="light-gray-1">Description</strong>
                                <p class="">{{ $deal->project_description }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Agent Information -->
                    <div class="card p-3 border-0">
                        <h5 class="mb-4">Agent Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <strong class="light-gray-1">Agent Name</strong>
                                <p class="fw-bold">{{ $deal->agent_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong class="light-gray-1">Brokerage</strong>
                                <p class="fw-bold">{{ $deal->brokerage_name }}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <strong class="light-gray-1">Brokerage License</strong>
                                <p class="fw-bold">{{ $deal->brokerage_license_no }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Banking Information -->
                    <div class="card p-3 border-0">
                        <h5 class="mb-4">Banking Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <strong class="light-gray-1">Account Holder Name</strong>
                                <p class="fw-bold">{{ $deal->account_holder_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong class="light-gray-1">SWIFT/BIC Number</strong>
                                <p class="fw-bold">{{ $deal->swift_number }}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <strong class="light-gray-1">IBAN Number</strong>
                                <p class="fw-bold">{{ $deal->iban_number }}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <strong class="light-gray-1">Bank Country</strong>
                                <p class="fw-bold">{{ $deal->bank_country }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Client Information -->
                    <div class="card p-3 border-0">
                        <h5 class="mb-4">Client Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <strong class="light-gray-1">Client Name</strong>
                                <p class="fw-bold">{{ $deal->client_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong class="light-gray-1">Client Paying Initial Fees (20% + 4% DLD)</strong>
                                <p class="fw-bold">{{ $deal->client_paying_fees ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Financial Details -->
                    <div class="card p-3 border-0">
                        <h5 class="mb-4">Financial Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <strong class="light-gray-1">Project Value</strong>
                                <p class="fw-bold">${{ number_format($deal->project_value, 2) }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong class="light-gray-1">Commission</strong>
                                <p class="fw-bold">${{ number_format($deal->commission_amount, 2) }} ({{ $deal->commission_percentage }}%)</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <strong class="light-gray-1">Deal Status</strong>
                                <p class="fw-bold">{{ $deal->deal_status }}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <strong class="light-gray-1">Closing Date</strong>
                                <p class="fw-bold">{{ Carbon\Carbon::parse($deal->closing_date)->format('d-m-y')  }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
