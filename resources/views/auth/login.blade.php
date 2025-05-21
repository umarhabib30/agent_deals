@extends('layouts.app')
@section('content')
     <div class="container">
        <div class="row mt-5">
            <!-- Left Side -->
            <div class="col-lg-6 d-flex flex-column align-items-center px-5">
                <!-- Replace with actual image in your project -->
                <img src="{{ asset('assets/images/header.PNG') }}" class="img-fluid mb-4" alt="Deal illustration">
                <p class="hero-text text-center">Close deals. Get paid. Same day.</p>
                <div class="how-it-works text-center mt-4 w-100">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/svg/icon1.svg') }}" alt="" width="40">
                            <h6 class="mt-2">Submit Your Deal</h6>
                            <p class="small">Register and share your sales agreement and key info to get started.</p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/svg/icon2.svg') }}" alt="" width="40">
                            <h6 class="mt-2">Get Verified</h6>
                            <p class="small">Submissions are reviewed and advance payments approved within 24 hours.</p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/svg/icon3.svg') }}" alt="" width="40">
                            <h6 class="mt-2">Commission Paid</h6>
                            <p class="small">Get your commission deposited directly into your account within 24 hours.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Side (Form) -->
            <div class="col-lg-6 border-start d-flex flex-column form-section">
                <h4>Log in</h4>
                <p class="text-muted">Welcome back! Please enter your details to log in.</p>
                <form action="{{ url('authenticate') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="labels"> Email </label>
                            <input name="email" type="email" class="form-control reg-form">
                        </div>
                        <div class="col-md-12">
                            <label class="labels"> Password </label>
                            <input name="password" type="password" class="form-control reg-form">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-4 btn-group">
                        <button type="submit" class="btn btn-dark-green w-100">Login</button>
                    </div>
                </form>
                <div class="mt-5">
                    <p class="text-end">Not registered yet? <a href="{{ route('register') }}">Sign up</a></p>
                </div>
                <div class="footer-text" style="margin-top: 175px;">
                    <p>If you have an inquiry, we'd be happy to hear from you.</p>
                    <div class="d-flex">
                        <p>
                            <img src="{{ asset('assets/images/svg/mail.svg') }}" /> support@agentsfirst.com
                        </p>
                        <p class="ms-3 fdsa32">
                            <img src="{{ asset('assets/images/svg/phone.svg') }} " /> +971 55 252 2322
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
