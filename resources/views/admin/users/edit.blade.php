@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="card">
            {{-- <div class="card-header">
                <h4>Edit User Information</h4>
            </div> --}}
            <div class="card-body">
                <form action="{{ route('admin.user.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="" value="{{ $user->id }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            @if ($user->profile_image)
                                <div class="mb-2">
                                    <img src="{{ asset($user->profile_image) }}" alt="Profile" class="img-thumbnail"
                                        width="100">
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="profile_image" class="form-label">Emirates ID Image</label>
                            @if ($user->emirate_id_image)
                                <div class="mb-2">
                                    <img src="{{ asset($user->emirate_id_image) }}" alt="Profile" width="100">
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="first_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                value="{{ $user->full_name }}" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}" required>
                        </div>



                        <div class="col-md-4 mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $user->phone }}" required>
                        </div>

                        <div class="col-md-2 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_phone_verified"
                                    name="is_phone_verified" {{ $user->is_phone_verified ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_phone_verified">Phone Verified</label>
                            </div>
                        </div>

                        <div class="col-md-2 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_emirate_verified"
                                    name="is_emirate_verified" {{ $user->is_emirate_verified ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_emirate_verified">Emirates ID Verified</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update User</button>
                        <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h4>Update User Password</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user.password') }}" method="POST" enctype="multipart/form-data" id="password_form">
                    @csrf
                    <input type="hidden" name="id" id="" value="{{ $user->id }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="password_confirmation"
                                required>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" id="password_update" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>
    $(document).ready(function(){

        $('body').on('click','#password_update',function(e){
            e.preventDefault();
            let password = $('#password').val();
            let confirm_password = $('#confirm_password').val();

            if(password != confirm_password){
                toastr.error('Password and Confirm Password do not match');
            }else{
                $('#password_form').submit();
            }
        });

    });
</script>
@endsection
