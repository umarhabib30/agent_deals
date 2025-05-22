@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.deal.update') }}" method="POST" class="p-4">
        @csrf
       <input type="hidden" name="deal_id" id="" value="{{ $deal->id }}">

        <div class="card mb-4">
            <div class="card-header">
                <h4>Project Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Project Type</label>
                        <input type="text" class="form-control" name="project_type"
                            value="{{ $deal->project_type ?? 'Off plan' }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Project Name</label>
                        <input type="text" class="form-control" name="project_name"
                            value="{{ $deal->project_name ?? '' }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Developer</label>
                        <select class="form-control" name="developer">
                            @php
                                $developers = [
                                    'emaar',
                                    'damac',
                                    'ellington',
                                    'meeras',
                                    'mira',
                                    'nakheel',
                                    'azizi',
                                    'binghatti',
                                    'omniyat',
                                    'dar-global',
                                    'majid-al-futtaim',
                                ];
                            @endphp
                            @foreach ($developers as $developer)
                                <option value="{{ $developer }}"
                                    {{ ($deal->developer ?? '') == $developer ? 'selected' : '' }}>
                                    {{ ucfirst($developer) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city" value="{{ $deal->city ?? '' }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">State/Province</label>
                        <input type="text" class="form-control" name="state" value="{{ $deal->state ?? '' }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="project_description" id="" cols="30" class="form-control">{{ $deal->project_description }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h4>Agent Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Agent Name</label>
                        <input type="text" class="form-control" name="agent_name" value="{{ $deal->agent_name ?? '' }}"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Brokerage Name</label>
                        <input type="text" class="form-control" name="brokerage_name" readonly
                            value="{{ $deal->brokerage_name ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Brokerage License Number</label>
                        <input type="text" class="form-control" name="brokerage_license_no" readonly
                            value="{{ $deal->brokerage_license_no ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $deal->email ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $deal->phone ?? '' }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h4>Banking Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">SWIFT/BIC Number</label>
                        <input type="text" class="form-control" name="swift_number"
                            value="{{ $deal->swift_number ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">IBAN Number</label>
                        <input type="text" class="form-control" name="iban_number"
                            value="{{ $deal->iban_number ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Account Holder Name</label>
                        <input type="text" class="form-control" name="account_holder_name"
                            value="{{ $deal->account_holder_name ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Bank Country</label>
                        <input type="text" class="form-control" name="bank_country"
                            value="{{ $deal->bank_country ?? '' }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h4>Client Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Client Name</label>
                        <input type="text" class="form-control" name="client_name"
                            value="{{ $deal->client_name ?? '' }}" required>
                    </div>
                    <div class="col-md-12 mb-3">
    <label class="form-label">
        Is your client going to put down the initial 20% plus 4% DLD (Dubai Land Department) Fee?
    </label> <br>

    <label class="custom-control custom-radio custom-control-inline">
        <input type="radio" name="is_dld" value="true" class="custom-control-input"
            @if ((string)$deal->is_dld === 'true') checked @endif>
        <span class="custom-control-label">Yes</span>
    </label>

    <label class="custom-control custom-radio custom-control-inline">
        <input type="radio" name="is_dld" value="false" class="custom-control-input"
            @if ((string)$deal->is_dld === 'false') checked @endif>
        <span class="custom-control-label">No</span>
    </label>
</div>

                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h4>Financial Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Project Value</label>
                        <input type="number" class="form-control" name="project_value" id="projectValue"
                            value="{{ $deal->project_value ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Commission Percentage</label>
                        <input type="number" step="" class="form-control" name="commission_percentage" id="commissionPercentage"
                            value="{{ $deal->commission_percentage ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Commission Amount</label>
                        <input type="number" step="0.01" class="form-control" name="commission_amount" id="commissionAmount" readonly
                            value="{{ $deal->commission_amount ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Deal Status</label>
                        <select class="form-control" name="deal_status">
                            <option value="In Progress"
                                {{ ($deal->deal_status ?? '') == 'In Progress' ? 'selected' : '' }}>
                                In Progress
                            </option>
                            <option value="Accepted" {{ ($deal->deal_status ?? '') == 'Accepted' ? 'selected' : '' }}>
                                Accepted
                            </option>
                            <option value="Declined" {{ ($deal->deal_status ?? '') == 'Declined' ? 'selected' : '' }}>
                                Declined
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Closing Date</label>
                        <input type="date" class="form-control" name="closing_date"
                            value="{{ $deal->closing_date ?? '' }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end">
            <a href="{{ route('admin.deals') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Deal</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            function calculateCommission() {
                const projectValue = parseFloat($('#projectValue').val()) || 0;
                const commissionPercentage = parseFloat($('#commissionPercentage').val()) || 0;
                const commissionAmount = (projectValue * commissionPercentage) / 100;

                // Update commission amount field with calculated value
                $('#commissionAmount').val(commissionAmount.toFixed(2));
            }

            // Add event listeners for input changes
            $('#projectValue, #commissionPercentage').on('input', function() {
                calculateCommission();
            });
        });
    </script>
@endsection
