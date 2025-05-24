@extends('layouts.dashboard')
@section('content')
<div class="col-md-10 px-md-4 px-sm-0">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="hero">
                <h1 style="color:#000000;font-weight:400;">Deals</h1>
                <p style="color:#000000;font-weight:400;font-size:16px;">View all your deals in one place</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-12">
            <div class="light-green p-3 deals">
                <p>Recent Deals</p>
                <div class="table-responsive-x">
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
                                <td>{{ $deal->closing_date ? \Carbon\Carbon::parse($deal->closing_date)->format('d-m-y') : '-' }}
                                </td>
                                <td>{{ $deal->reference_number }}</td>
                                <td>{{ $deal->client_name }}</td>
                                <td>${{ $deal->project_value }}</td>
                                <td>{{ $deal->deal_status }}</td>
                                <td>
                                    <a href="#" deal-id={{ $deal->id }} class="btn btn-green deal_details">View
                                    Details</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- deal details model --}}
    <div class="modal fade modal-right" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-right">

        <div class="modal-content" style="height: 100%;">
            <div class="modal-header" style="border-bottom: 0px !important;">
                <div class="w-100">
                    <div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mt-3">
                        <h3 class=>Review Details</h3>

                    </div>
                </div>
            </div>
            <div class="modal-body">

                <form id="multi-step-form">

                    <!-- Step 5 form fields here -->
                    <div class="step step-5">

                        <div class="card p-3 border-0">
                            <h5 class="mb-4">Project Details</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong class="light-gray-1">Project Type</strong>
                                    <p class="fw-bold"> Off plan</p>
                                </div>
                                <div class="col-md-6">
                                    <strong class="light-gray-1">Project Name</strong>
                                    <p class="fw-bold"> SkyView</p>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <strong class="light-gray-1">Developer</strong>
                                    <p class="fw-bold"> Emaar</p>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <strong class="light-gray-1">Location</strong>
                                    <p class="fw-bold"> Dubai, Dubai</p>
                                </div>
                            </div>
                        </div>
                        <!-- Agent Information -->
                        <div class="card p-3 border-0">
                            <h5 class="mb-4">Agent Information</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong class="light-gray-1">Agent Name</strong>
                                    <p class="fw-bold"></p>
                                </div>
                                <div class="col-md-6">
                                    <strong class="light-gray-1">Brokerage</strong>
                                    <p class="fw-bold"> Huz Properties</p>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <strong class="light-gray-1">Brokerage License</strong>
                                    <p class="fw-bold"> 1414879</p>
                                </div>
                            </div>
                        </div>
                        <!-- Banking Information -->
                        <div class="card p-3 border-0">
                            <h5 class="mb-4">Banking Information <span class="required">*</span>
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong class="light-gray-1">Account Holder Name</strong>
                                    <span class="required">Required</span>
                                </div>
                                <div class="col-md-6">
                                    <strong class="light-gray-1">SWIFT/BIC Number</strong>
                                    <span class="required">Required</span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <strong class="light-gray-1">IBAN Number</strong>
                                    <span class="required">Required</span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <strong class="light-gray-1">Bank Country</strong>
                                    <span class="required">Required</span>
                                </div>
                            </div>
                        </div>
                        <!-- Client Information -->
                        <div class="card p-3 border-0">
                            <h5 class="mb-4">Client Information</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong class="light-gray-1">Client Name</strong>
                                    <p class="fw-bold"></p>
                                </div>
                                <div class="col-md-6">
                                    <strong class="light-gray-1">Client Paying Initial Fees (20% + 4% DLD)</strong>
                                    <p class="fw-bold"> No</p>
                                </div>
                            </div>
                        </div>
                        <!-- Financial Details -->
                        <div class="card p-3 border-0">
                            <h5 class="mb-4">Financial Details</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong class="light-gray-1">Project Value</strong>
                                    <p class="fw-bold"> $NaN</p>
                                </div>
                                <div class="col-md-6">
                                    <strong class="light-gray-1">Commission</strong>
                                    <p class="fw-bold"> $NaN (%)</p>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <strong class="light-gray-1">Deal Status</strong>
                                    <p class="fw-bold"> In Progress</p>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <strong class="light-gray-1">Closing Date</strong>
                                    <p class="fw-bold"> May 17th, 2025</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outlined" data-bs-dismiss="modal">Back</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.btn-outlined').click(function() {
            $('#exampleModal').modal('hide');
        });

        $('body').on('click', '.deal_details', function(e) {
            e.preventDefault();
            var dealId = $(this).attr('deal-id');
            $.ajax({
                url: "{{ url('deal/details') }}/" + dealId,
                type: 'GET',
                success: function(response) {
                    if (response.status) {
                        const data = response.data;

                        // Project Details
                        $('.step-5 .card:eq(0) .row').html(`
                            <div class="col-md-6">
                            <strong class="light-gray-1">Project Type</strong>
                            <p class="fw-bold">${data.project_type || '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            <div class="col-md-6">
                            <strong class="light-gray-1">Project Name</strong>
                            <p class="fw-bold">${data.project_name || '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                            <strong class="light-gray-1">Developer</strong>
                            <p class="fw-bold">${data.developer || '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                            <strong class="light-gray-1">Location</strong>
                            <p class="fw-bold">${(data.city && data.state) ? `${data.city}, ${data.state}` : '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            `);

                        // Agent Information
                        $('.step-5 .card:eq(1) .row').html(`
                            <div class="col-md-6">
                            <strong class="light-gray-1">Agent Name</strong>
                            <p class="fw-bold">${data.agent_name || '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            <div class="col-md-6">
                            <strong class="light-gray-1">Brokerage</strong>
                            <p class="fw-bold">${data.brokerage_name || '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                            <strong class="light-gray-1">Brokerage License</strong>
                            <p class="fw-bold">${data.brokerage_license_no || '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            `);

                        // Banking Information
                        $('.step-5 .card:eq(2) .row').html(`
                            <div class="col-md-6">
                            <strong class="light-gray-1">Account Holder Name</strong>
                            <p class="fw-bold">${data.account_holder_name || '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            <div class="col-md-6">
                            <strong class="light-gray-1">SWIFT/BIC Number</strong>
                            <p class="fw-bold">${data.swift_number || '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                            <strong class="light-gray-1">IBAN Number</strong>
                            <p class="fw-bold">${data.iban_number || '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                            <strong class="light-gray-1">Bank Country</strong>
                            <p class="fw-bold">${data.bank_country || '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            `);

                        // Client Information
                        $('.step-5 .card:eq(3) .row').html(`
                            <div class="col-md-6">
                            <strong class="light-gray-1">Client Name</strong>
                            <p class="fw-bold">${data.client_name || '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            <div class="col-md-6">
                            <strong class="light-gray-1">Client Paying Initial Fees (20% + 4% DLD)</strong>
                            <p class="fw-bold">${data.is_dld === 'true' ? 'Yes' : 'No'}</p>
                            </div>
                            `);

                        // Financial Details
                        $('.step-5 .card:eq(4) .row').html(`
                            <div class="col-md-6">
                            <strong class="light-gray-1">Project Value</strong>
                            <p class="fw-bold">$${parseFloat(data.project_value || 0).toLocaleString()}</p>
                            </div>
                            <div class="col-md-6">
                            <strong class="light-gray-1">Commission</strong>
                            <p class="fw-bold">$${parseFloat(data.commission_amount || 0).toLocaleString()} (${data.commission_percentage}%)</p>
                            </div>
                            <div class="col-md-6 mt-3">
                            <strong class="light-gray-1">Deal Status</strong>
                            <p class="fw-bold">${data.deal_status || '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            <div class="col-md-6 mt-3">
                            <strong class="light-gray-1">Closing Date</strong>
                            <p class="fw-bold">${data.closing_date ? new Date(data.closing_date).toLocaleDateString('en-US', {
                                month: 'long',
                                day: 'numeric',
                                year: 'numeric'
                            }) : '<span style="color: #dc3545;">Not provided</span>'}</p>
                            </div>
                            `);

                        $('#exampleModal').modal('show');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
});
});
</script>
@endsection