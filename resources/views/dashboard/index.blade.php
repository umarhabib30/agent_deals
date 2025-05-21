@extends('layouts.dashboard')
@section('content')
    <div class="col-md-10 px-5">
        <div class="row mt-5">
            <div class="col-md-12 d-flex justify-content-end mt-5">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    data-bs-whatever="@getbootstrap"class="btn btn-green">Submit Deal</button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="light-green d-flex justify-content-between p-3 border-radius">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('assets/images/svg/deal.svg')}}">
                    </div>
                    <div>
                        <p class="light-gray mb-0">Total Deals</p>
                        <p class="mb-0">1234</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 lasdkf">
                <div class="light-green d-flex justify-content-between p-3 border-radius">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('assets/images/svg/sale.svg')}}">
                    </div>
                    <div>
                        <p class="light-gray mb-0">Total Sales</p>
                        <p class="mb-0">AED 1234</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 lasdkf">
                <div class="light-green d-flex justify-content-between p-3 border-radius">
                    <div class="d-flex align-items-center">

                        <img src="{{asset('assets/images/svg/payout.svg')}}">
                    </div>
                    <div>
                        <p class="light-gray mb-0">Last Pay-out</p>
                        <p class="mb-0">$1234</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 lasdkf">
                <div class="light-green d-flex justify-content-between p-3 border-radius">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('assets/images/svg/revenue.svg')}}">
                    </div>
                    <div>
                        <p class="light-gray mb-0">Total Revenue</p>
                        <p class="mb-0">$1234</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="light-green revenue-chart p-3 border-radius">
                    <p>Sales & Revenue</p>
                    <div id="chartContainer">
                        <canvas id="areaChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4 lasdkf">
                <div class="light-green p-3 border-radius" style="height: 600px;overflow: scroll;">
                    <div class=" activity-sec">
                        <p>Recent Activity</p>
                    </div>
                    <div class="active432">
                        <p class="mb-0">We’ve reviewed your deal, but it couldn’t be approved right now. Check your email
                            for details, or reach out to support. We’re here to help.</p>
                        <hr class="light-gray my-2">
                        <div class="text-red">
                            2 days ago
                        </div>
                    </div>
                    <div class="active432 mt-4">
                        <p class="mb-0">Your deal submission has been reviewed and approved. You’ll receive your
                            commission shortly—check your email for details.</p>
                        <hr class="light-gray my-2">
                        <div class="text-green">
                            2 days ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- model to add new deal --}}
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 800px !important; height: 1400px;">
            <div class="modal-content" style="height: 100%;">
                <div class="modal-header" style="border-bottom: 0px !important;">
                    <div class="w-100">
                        <div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div>
                            <h5 class="modal-title text-center fw-bold h-24" id="exampleModalLabel">Deal Submission</h5>
                            <p class=" text-center fw-900 light-gray-1 h-14">Submit your deal details to get your commission advance. Fill in all required fields.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="progress px-1" style="height: 3px;">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="step-container d-flex justify-content-between">
                        <div class="step-circle" onclick="displayStep(1)"><i class="fa-solid fa-paperclip me-2"></i> Details</div>
                        <div class="step-circle" onclick="displayStep(2)"><i class="fa-solid fa-user me-2"></i>Agent</div>
                        <div class="step-circle" onclick="displayStep(3)"><i class="fa-solid fa-user me-2"></i>Client</div>
                        <div class="step-circle" onclick="displayStep(4)"><i class="fa-solid fa-dollar-sign me-2"></i>Financial</div>
                        <div class="step-circle" onclick="displayStep(5)"><i class="fa-solid fa-check me-2"></i>Preview</div>
                    </div>
                    <form id="multi-step-form"  action="{{ route('deal.store') }}" method="POST">
                        @csrf
                        <!-- Step 1 form fields here -->
                        <div class="step step-1">
                            <h3  class="mb-5">Project Details</h3>
                            <div class="mb-3">
                                <label for="field1" class="form-label">Project Type</label>
                                <input type="text" class="form-controls w-100 fw-bold" value="Off plan" id="field1" name="project_type" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="field1" class="form-label">Project Name</label>
                                <input type="text" class="form-controls w-100" id="field1" placeholder="Enter project name" name="project_name">
                            </div>
                            <div class="mb-3">
                                <label for="field1" class="form-label">Developer</label>
                                <select class="form-controls w-100" name="developer">
                                    <option value="emaar" selected>Emaar</option>
                                    <option value="damac">Damac</option>
                                    <option value="ellington">Ellington</option>
                                    <option value="meeras">Meeras</option>
                                    <option value="mira">Mira</option>
                                    <option value="nakheel">Nakheel</option>
                                    <option value="azizi">Azizi</option>
                                    <option value="binghatti">Binghatti</option>
                                    <option value="omniyat">Omniyat</option>
                                    <option value="dar-global">Dar Global</option>
                                    <option value="majid-al-futtaim">Majid Al Futtaim</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="field1" class="form-label">City</label>
                                <input type="text" class="form-controls fw-bold w-100" id="field1" value="" name="city">
                            </div>
                            <div class="mb-3">
                                <label for="field1" class="form-label">State/Province</label>
                                <input type="text" class="form-controls fw-bold w-100" id="field1" value="" name="state">
                            </div>
                            <div class="mb-3">
                                <label for="field1" class="form-label">Project Description</label>
                                <textarea rows="5" class="form-controls w-100" name="project_description"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-green next-step">Next <i class="fa-solid fa-chevron-right me-2"></i></button>
                            </div>
                        </div>
                        <!-- Step 2 form fields here -->
                        <div class="step step-2">
                            <h3 class="mb-5">Agent Information</h3>

                            <div class="mb-3">
                                <label for="agentName" class="form-label text-danger">*</label>
                                <label for="agentName" class="form-label">Agent Name</label>
                                <input name="agent_name" type="text" class="form-controls w-100" id="agentName" placeholder="Enter your full name" required>
                            </div>
                            <div class="row">
                                <!-- Brokerage Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="brokerageName" class="form-label">Brokerage Name</label>
                                    <input type="text" class="form-controls w-100" id="brokerageName" name="brokerage_name" value="Livstate Real Estate Brokerage L.L.C" readonly>
                                    <small class="text-muted">Pre-filled with your registered brokerage</small>
                                </div>
                                <!-- Brokerage License Number -->
                                <div class="col-md-6 mb-3">
                                    <label for="licenseNumber" class="form-label">Brokerage License Number</label>
                                    <input type="text" class="form-controls w-100" id="licenseNumber" value="" name="brokerage_license_no" readonly>
                                    <small class="text-muted">Pre-filled with your registered license number</small>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-controls w-100" id="email" name="email" placeholder="Enter your email address">
                                </div>
                                <!-- Phone -->
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-controls w-100" id="phone" name="phone" placeholder="Enter your phone number">
                                </div>
                            </div>
                            <hr>
                            <!-- Banking Information Header -->
                            <div class="mb-3">
                                <h5>Banking Information</h5>
                                <p>
                                    <span class="text-danger">Required</span>
                                    <span class="text-dark">for commission payment processing - all fields must be filled</span>
                                </p>
                            </div>
                            <div class="row">
                                <!-- SWIFT/BIC Number -->
                                <div class="col-md-6 mb-3">
                                    <label for="swift" class="form-label"><span class="text-danger">*</span> SWIFT/BIC Number</label>
                                    <input type="text" class="form-controls w-100" id="swift" placeholder="Enter SWIFT/BIC number" name="swift_number" required>
                                    <small class="text-muted">Bank identifier code (8-11 characters)</small>
                                </div>
                                <!-- IBAN Number -->
                                <div class="col-md-6 mb-3">
                                    <label for="iban" class="form-label"><span class="text-danger">*</span>  IBAN Number</label>
                                    <input type="text" class="form-controls w-100" id="iban" placeholder="Enter IBAN number" name="iban_number" required>
                                    <small class="text-muted">International bank account number</small>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Account Holder Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="accountHolder" class="form-label"><span class="text-danger">*</span> Account Holder Name</label>
                                    <input type="text" class="form-controls w-100" id="accountHolder" placeholder="Enter account holder's full name" name="account_holder_name" required>
                                    <small class="text-muted">The name on the bank account that will receive payment</small>
                                </div>
                                <!-- Bank Country -->
                                <div class="col-md-6 mb-3">
                                    <label for="bankCountry" class="form-label"><span class="text-danger">*</span> Bank Country</label>
                                    <input type="text" class="form-controls w-100" id="bankCountry" placeholder="Enter bank country" name="bank_country" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-outlined prev-step"><i class="fa-solid fa-chevron-left me-2"></i>Previous</button>
                                <button type="button" class="btn btn-green next-step">Next<i class="fa-solid fa-chevron-right ms-2"></i></button>
                            </div>
                        </div>
                        <!-- Step 3 form fields here -->
                        <div class="step step-3">
                            <h3 class="mb-5">Client Information</h3>

                            <div class="mb-3">
                                <label for="agentName" class="form-label">Client Name</label>
                                <input type="text" class="form-controls w-100" id="agentName" placeholder="Enter client's full name" name="client_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="agentName" class="form-label">Is your client going to put down the initial 20% plus 4% DLD (Dubai Land Department) Fee?</label>
                            </div>
                            <div class="mb-3">
                                <label for="yes" class="form-label">
                                    <input type="radio" id="yes" name="is_dld" value="true"> Yes
                                </label>
                                <label for="no" class="form-label ms-5">
                                    <input type="radio" id="no" name="is_dld" value="false"> No
                                </label>
                            </div>
                            <p class="h-14 fw-bold light-gray-1">This is required for eligibility for immediate commission payout</p>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-outlined prev-step"><i class="fa-solid fa-chevron-left me-2"></i>Previous</button>
                                <button type="button" class="btn btn-green next-step">Next<i class="fa-solid fa-chevron-right ms-2"></i></button>
                            </div>
                        </div>
                        <!-- Step 4 form fields here -->
                        <div class="step step-4">
                            <h3>Financial Details</h3>

                            <div class="row mt-5">
                                <!-- Project Value -->
                                <div class="col-md-6 mb-3">
                                    <label for="projectValue" class="form-label">Project Value</label>
                                    <input type="text" class="form-control" id="projectValue" placeholder="Enter project value" name="project_value">
                                </div>
                                <!-- Commission Percentage -->
                                <div class="col-md-6 mb-3">
                                    <label for="commissionPercentage" class="form-label">Commission Percentage</label>
                                    <input type="text" class="form-control" id="commissionPercentage" placeholder="Enter commission percentage" name="commission_percentage">
                                </div>
                            </div>
                            <div class="row">
                                <!-- Commission Amount -->
                                <div class="col-md-6 mb-3">
                                    <label for="commissionAmount" class="form-label">Commission Amount</label>
                                    <input type="text" class="form-control" id="commissionAmount" placeholder="Enter commission amount" name="commission_amount">
                                </div>
                                <!-- Deal Status -->
                                <div class="col-md-6 mb-3">
                                    <label for="dealStatus" class="form-label">Deal Status</label>
                                    <select class="form-select" id="dealStatus" name="deal_status">
                                        <option selected>In Progress</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Closing Date -->
                            <div class="mb-3">
                                <label for="closingDate" class="form-label">Closing Date</label>
                                <input type="date" class="form-control" id="closingDate" value="" value="closing_date">
                            </div>


                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-outlined prev-step"><i class="fa-solid fa-chevron-left me-2"></i>Previous</button>
                                <button type="button" class="btn btn-green next-step">Next<i class="fa-solid fa-chevron-right ms-2"></i></button>
                            </div>
                        </div>
                        <!-- Step 5 form fields here -->
                        <div class="step step-5">
                            <h3 class="mb-5">Review Details</h3>

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
                                <button type="button" class="btn btn-outlined prev-step">Back</button>
                                <button type="submit" class="btn btn-green">Submit Deal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- model end --}}

@endsection
