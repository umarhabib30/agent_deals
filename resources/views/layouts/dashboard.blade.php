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
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">

    {{-- toastr cdns --}}
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('style')

    <title>{{ $title }}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light px-3">
        <div class="container-fluid">
            <a class="navbar-brand fdafaf" href="#">
                <img class="logo" src="{{ asset('assets/images/logo-dashboard.PNG') }}">
            </a>
            <!-- <div>
                <ul class="nav" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a style="text-decoration: none;" href="">Dashboard</a>
                    </li>
                    <li class="nav-item ms-3" role="presentation">
                        <a style="text-decoration: none;" href="">Deals</a>
                    </li>
                </ul>
            </div> -->
            <div class="dropdown"><button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    @if ($user->profile_image)
                    <img src="{{ asset($user->profile_image) }}" alt="" style="width: 70px; border-radius: 100px;">
                    @else
                    <span class="fsadfas">L</span>
                    @endif
                    <span class="ms-2 me-3" style="font-size: 20px;">{{ $user->full_name }}</span><i class="fas fa-bars"></i></button>
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
            <div class="col-md-2 light-green">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="">

                        <ul class="navbar-nav" style="flex-direction: column;">
                            <li class="nav-item">
                                <div style="display: flex; align-items: center;">
                                    <div>
                                        @if ($user->profile_image)
                                            <img style="width: 75px; border-radius: 100px"
                                                src="{{ asset($user->profile_image) }}">
                                        @else
                                            <img style="width: 75px"
                                                src="{{ asset('assets/images/svg/user.jpg.svg') }}">
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
                            <a href="{{ route('deals') }}"
                                class="nav-link @if ($active == 'deal') active @endif"><i
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

    <script src="{{ asset('assets/js/script.js') }}"></script>
    @yield('script')
</body>

</html>
