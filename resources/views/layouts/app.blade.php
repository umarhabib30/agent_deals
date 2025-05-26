<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    @yield('style')
    <title>{{ $title }}</title>
    <style type="text/css">
        @media (min-width: 1400px) {
            .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
                max-width: 1320px;
            }
        }
        .dropdown-menu[data-bs-popper] {
    top: 100%;
    left: -125px !important;
    margin-top: .125rem;
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <div class="container-fluid">

            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="logo" src="{{ asset('assets/images/logo_main2.svg') }}" style="width: 100%;">
            </a>

            <div class="dropdown">
                 @if (Auth::guard('user')->check())
                 <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fas fa-bars"></i>
                 </button>

               @endif
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#" style="font-weight: 700;">Account</a></li>
                    <hr>
                    <li>
                        <a class="dropdown-item" href="{{ url('profile') }}">
                            <i class="fa-solid fa-user"></i>
                            <span>
                                Profile
                            </span>
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Log out</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/f5eb8f10bc.js" crossorigin="anonymous"></script>
@yield('script')
</body>
</html>
