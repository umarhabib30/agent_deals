@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5 flex-direction">
            <!-- Left Side -->
            <div class="col-lg-6 d-flex flex-column align-items-center px-md-5 px-sm-0">
                <!-- Replace with actual image in your project -->
                <img src="{{ asset('assets/images/header.PNG') }}" class="img-fluid mb-4" alt="Deal illustration" />
                <p class="hero-text text-center">Close deals. Get paid. Same day.</p>

                <div class="how-it-works text-center mt-4 w-100">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/svg/icon1.svg') }}" alt="" width="40" />
                            <h6 class="mt-2">Submit Your Deal</h6>
                            <p class="small">
                                Register and share your sales agreement and key info to get
                                started.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/svg/icon2.svg') }}" alt="" width="40" />
                            <h6 class="mt-2">Get Verified</h6>
                            <p class="small">
                                Submissions are reviewed and advance payments approved within
                                24 hours.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/svg/icon3.svg') }}" alt="" width="40" />
                            <h6 class="mt-2">Commission Paid</h6>
                            <p class="small">
                                Get your commission deposited directly into your account
                                within 24 hours.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side (Form) -->
            <div class="col-lg-6 border-start d-flex flex-column form-section b-bottom">
                <h4>Sign up</h4>
                <p class="text-muted">Get paid faster sign up today</p>

                <form action="{{ url('user/store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="labels"> First Name </label>
                            <input name="first_name" type="text" class="form-control reg-form" value="{{ old('first_name') }}" />
                        </div>
                        <div class="col-md-6">
                            <label class="labels"> Last Name </label>
                            <input name="last_name" type="text" class="form-control reg-form" value="{{ old('last_name') }}" />
                        </div>
                        <div class="col-md-6">
                            <label class="labels"> Email </label>
                            <input name="email" type="email" class="form-control reg-form" value="{{ old('email') }}" />
                        </div>
                        <div class="col-md-6">
                            <label class="labels"> Phone number </label>
                            <input name="phone" type="text" class="form-control reg-form" value="{{ old('phone') }}" />
                        </div>
                        <div class="col-md-6">
                            <label class="labels"> Password </label>
                            <input name="password" type="password" class="form-control reg-form" />
                        </div>
                        <div class="col-md-6">
                            <label class="labels"> Confirm Password </label>
                            <input name="password_confirmation" type="password" class="form-control reg-form" />
                        </div>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="termsCheck" required />
                        <label class="form-check-label" for="termsCheck">
                            I agree to the <a href="{{ route('terms') }}">terms and conditions</a> and
                            <a href="{{ route('privacy') }}">privacy policy</a>.
                        </label>
                    </div>

                    <div class="d-flex justify-content-between mt-4 btn-groups">
                        <a href="{{ route('login') }}" class="btn btn-outline btn-outline-secondary mt-32">Back to log in</a>
                        <button type="submit" class="btn btn-dark-green">Register</button>
                    </div>
                </form>

                <div class="footer-text">
                    <p>If you have an inquiry, we'd be happy to hear from you.</p>
                    <div class="d-flex">
                        <p><img src="{{ asset('assets/images/svg/mail.svg') }}" /> support@agentsfirst.com</p>
                        <p class="ms-3 fdsa32">
                            <img src="{{ asset('assets/images/svg/phone.svg') }}" /> +971 55 252 2322
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
