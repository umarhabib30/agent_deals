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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>E-ID verification</th>
                                    <th>Member since</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->is_emirate_verified ? 'Verified' : 'Not Verified' }}</td>
                                        <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-y') }}</td>
                                        <td><a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary">Edit</a></td>
                                        <td><a href="{{ route('admin.user.delete', $user->id) }}" user-id="{{ $user->id }}" class="btn btn-danger delete-user">Delete</a></td>
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
@section('script')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.delete-user', function(e) {
                e.preventDefault();
                var id = $(this).attr('user-id');
                var title = "Are you sure?";
                Swal.fire({
                    icon: "warning",
                    title: title,
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        localStorage.clear();
                       window.location.href = "{{url('admin/user/delete')}}/"+id;
                    }
                });
            });
        });
    </script>
@endsection
