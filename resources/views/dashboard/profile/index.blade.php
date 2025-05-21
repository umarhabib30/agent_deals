@extends('layouts.dashboard')
@section('content')
  <div class="col-md-10 px-5 mt-5">
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" p-3 deals">
                                <p>Settings</p>
                                <span>Manage your profile details</span>
                            </div>
                        </div>
                    </div>
                    <div class="profile-card row align-items-center px-5">
                        <div class="col-md-3 text-center">
                            @if ($user->profile_image)
                            <div class="avatar-circle"> <img src="{{ asset($user->profile_image) }}" width="80px" alt="" style="border-radius: 100px" class="selected_profile"></div>
                            @else
                            <div class="avatar-circle"></div>
                            @endif
                            <div class="profile-name">{{ $user->full_name }}</div>
                        </div>
                        <div class="col-md-1 d-none d-md-flex justify-content-center">
                            <div class="divider"></div>
                        </div>
                        <div class="col-md-8 mt-3 mt-md-0">
                            <p style="color: #71717A;">
                                <i class="fa-solid fa-user me-2"></i>Real Estate Agent
                            </p>
                            <p style="color: #71717A;">
                                <i class="fa-solid fa-envelope me-2"></i>{{ $user->email }}
                            </p>
                            <p style="color: #71717A;">
                                <i class="fa-solid fa-calendar-check me-2"></i>Member since {{ Carbon\Carbon::parse($user->created_at)->format('d-m-y') }}
                            </p>
                        </div>
                    </div>
                    <div class="py-4 mt-5" style="border: 1px solid #eee;border-radius: 5px;">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-liks active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="fa-solid fa-user me-2"></i>Account</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-liks" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="fa-solid fa-lock me-2"></i>Security</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-liks" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false"><i class="fa-solid fa-check me-2"></i>Verification</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <p class="fw-bold h-24 mb-2">Account Information</p>
                                <p class="fw-bold h-14 light-gray-1">Edit your profile information and email.</p>
                                <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="TextInput" class="form-label">Full Name</label>
                                        <input type="text" name="full_name" id="TextInput" class="form-controls" value="{{ $user->full_name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="TextInput2" class="form-label">Email Address</label>
                                        <input type="email" readonly id="TextInput2" class="form-controls" value="{{ $user->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="TextInput3" class="form-label">Upload a photo <i class="fa-solid fa-upload"></i></label>
                                        <input style="display: none;" type="file" id="TextInput3" class="form-controls" name="profile_image">
                                    </div>

                                    <button type="submit" class="btn btn-green" style="padding: 15px 40px">Update Profile</button>
                                </form>
                            </div>

                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <p class="fw-bold h-24 mb-2">Password</p>
                                <p class="fw-bold h-14 light-gray-1">Protect your account change your password regularly.</p>
                                <form action="{{ route('account.password') }}" method="POST" id="password_form">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="TextInput" class="form-label">Current Password</label>
                                        <input type="text" name="current_password" id="current_password" class="form-controls">
                                    </div>
                                    <div class="mb-3">
                                        <label for="TextInput2" class="form-label">New Password</label>
                                        <input type="text" name="password" id="new_password" class="form-controls">
                                    </div>
                                    <div class="mb-3">
                                        <label for="TextInput3" class="form-label">Confirm New Password</label>
                                        <input type="text" name="password_confirmation" id="new_password_confirm" class="form-controls">
                                    </div>

                                    <button type="submit" class="btn btn-green" style="padding: 15px 40px" id="submit_password_form">Change Password</button>
                                </form>
                            </div>

                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab" tabindex="0">
                                <p class="fw-bold h-24 mb-2">Identity Verification</p>
                                <p class="fw-bold h-14 light-gray-1">Verify your identity to get paid on time.</p>
                                <div class="verify-box w-50">
                                    <div class="d-flex justify-content-between ">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="{{ asset('assets/images/svg/Overlay.svg') }}">
                                            </div>
                                            <div class="ms-4">
                                                <p class="mb-0 fw-bold">Phone Number Verification</p>
                                                <p class="mb-0">Verify your phone number</p>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn-danger btn">Not Verified</button>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn-green btn">Verify Phone Number</button>
                                    </div>
                                </div>
                                <div class="verify-box w-50 mt-4">
                                    <div class="d-flex justify-content-between ">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="{{ asset('assets/images/svg/Overlay (1).svg') }}">
                                            </div>
                                            <div class="ms-4">
                                                <p class="mb-0 fw-bold">Emirates ID Verification</p>
                                                <p class="mb-0">Verify your identity with your Emirates ID</p>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn-danger btn">Not Verified</button>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn-green btn">Verify Emirates ID</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-5">
                        <p class="fw-bold h-15">© 2025 Agents First</p>
                    </div>
                    <div class="col-md-7 d-flex justify-content-end">
                        <p class="fw-bold h-15">If you have an inquiry, we’d be happy to hear from you..</p>
                        <p class="fw-bold h-15 ms-4">Support@agentsfirst.com</p>
                        <p class="fw-bold h-15 ms-4">+971 55 351 9609</p>
                    </div>
                </div>
            </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        // update account
        $('#TextInput3').on('change', function(e) {
                const input = this;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('.selected_profile').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
        });

        // change password
        $('body').on('click','#submit_password_form',function(e){
            e.preventDefault();
            let current_password = $('#current_password').val();
            let new_password_confirm = $('#new_password_confirm').val();
            let new_password = $('#new_password').val();

            if(!current_password){
               toastr.error('Please insert current password');
               return;
            }

            if(!new_password){
                toastr.error('Please insert new password');
                return;
            }

            if(!new_password_confirm){
                toastr.error('Please insert confirm password');
                return;
            }

            if(new_password != new_password_confirm){
                toastr.error('New password does not match with confirm password');
                return;
            }

            $('#password_form').submit();
        });
    });
</script>
@endsection
