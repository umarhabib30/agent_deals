<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">

    {{-- toastr cdns --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('style')

    <title>{{ $title }}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light px-3">
        <div class="container-fluid">
            <button class="btn dropdown-toggle klsd-5435" style="display: none;" type="button" id="dropdownMenuButton2"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bars" style="font-size: 25px;"></i>
            </button>
            <!-- Wrapper -->
            <div class="sidebar-wrapper klsd-5435" style="display: none;">

                <!-- Overlay -->
                <div class="sidebar-overlay"></div>

                <!-- Sidebar -->
                <div class="sidebar-menu">
                        <button class="close-sidebar"><i class="fa-solid fa-xmark"></i></button>
                    <div class="sidebar-header">
                        <div class="user-info">
                            @if ($user->profile_image)
                            <img src="{{ asset($user->profile_image) }}" class="profile-img">
                            @else
                            <img src="{{ asset('assets/images/svg/user.jpg.svg') }}" class="profile-img">
                            @endif
                            <div class="user-details">
                                <h2>{{ $user->first_name }}</h2>
                                <p>Real estate agent</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="sidebar-links">
                        <a href="{{ route('dashboard') }}" class="nav-link @if ($active == 'dashboard') active @endif">
                            <i class="fa-solid fa-table-columns"></i> Dashboard
                        </a>
                        <a href="{{ route('deals') }}" class="nav-link @if ($active == 'deal') active @endif">
                            <i class="fa-solid fa-list-ul"></i> Deals
                        </a>
                        <a href="{{ route('profile') }}" class="nav-link @if ($active == 'profile') active @endif">
                            <i class="fa-solid fa-user"></i> Profile
                        </a>
                    </div>
                </div>
            </div>
            
            <a class="navbar-brand fdafaf fgsdf-8473" href="{{ route('dashboard') }}">
                
            </a>
            <div>
                <ul class="nav nav-4234" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a style="text-decoration: none;" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item ms-3" role="presentation">
                        <a style="text-decoration: none;" href="{{ route('deals') }}">Deals</a>
                    </li>
                </ul>
            </div>
            <div class="dropdown"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    @if ($user->profile_image)
                    <img src="{{ asset($user->profile_image) }}" alt="" style="width: 70px; border-radius: 100px;">
                    @else
                    <span class="fsadfas">{{ substr($user->full_name, 0, 1) }}</span>
                    @endif
                    <span class="ms-2 me-3 fdasf-948" style="font-size: 20px;">{{ $user->full_name }}</span><i
                        class="fas fa-bars fdasf-948"></i></button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#" style="font-weight: 700;">Account</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i><span>
                                Profile </span></a></li>
                    <hr>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                class="fa-solid fa-right-from-bracket"></i><span>Log out</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid px-3 h-100">
        <div class="row">
            <div class="col-md-2 light-green jfgksgjk-483" style="margin-top: -68px;">
                <a class="navbar-brand fdafaf fgsdf-8473" href="{{ route('dashboard') }}">
                <img class="logo" src="{{ asset('assets/images/logo_small2.svg') }}" style="width: 25%;padding: 20px;">
            </a>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="mt-2">

                        <ul class="navbar-nav" style="flex-direction: column;">
                            <li class="nav-item">
                                <div style="display: flex; align-items: center;">
                                    <div>
                                        @if ($user->profile_image)
                                        <img style="width: 75px; border-radius: 100px"
                                            src="{{ asset($user->profile_image) }}">
                                        @else
                                        <img style="width: 75px" src="{{ asset('assets/images/svg/dummy_profile.png ') }}">
                                        @endif
                                    </div>
                                    <div class="user">
                                        <h2>{{ $user->first_name }}</h2>
                                        <p>Real estate agent</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="sidebar">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link  @if ($active == 'dashboard') active @endif"><i
                                    class="@if ($active == 'dashboard') active-icon @endif fa-solid fa-table-columns"></i>Dashboard</a>
                            <a href="{{ route('deals') }}" class="nav-link @if ($active == 'deal') active @endif"><i
                                    class="@if ($active == 'deal') active-icon @endif fa-solid fa-list-ul"></i>Deals</a>
                            <a href="{{ route('profile') }}"
                                class="nav-link @if ($active == 'profile') active @endif"><i
                                    class="@if ($active == 'profile') active-icon @endif fa-solid fa-user"></i>Profile</a>
                        </div>
                    </div>
                </nav>
            </div>
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/f5eb8f10bc.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    @yield('script')
    <script>
        $(document).ready(function() {
            $('#dropdownMenuButton2').on('click', function(e) {
                e.stopPropagation();
                $('.sidebar-menu').addClass('active');
                $('.sidebar-overlay').show();
            });

            $('.sidebar-overlay, .close-sidebar').on('click', function() {
                $('.sidebar-menu').removeClass('active');
                $('.sidebar-overlay').hide();
            });
        });
    </script>
</body>

</html>
