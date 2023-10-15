<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Favicons --><link rel="icon" href="{{ asset('images/icon-logo.png') }}" sizes="192x192">
     <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ "لوحة التحكم - ".($title ?? "") }}
    </title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <!-- Font Awesome Icons -->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">


    @livewireStyles
    <!-- CSS Files -->
    @vite([ 'resources/js/app.js','resources/scss/argon-dashboard.scss','resources/js/custom.js'])


    <link rel="stylesheet" href="{{ asset('assets/css/custom-argon.css') }}">

    <style>


        .h-64{
            width: 100% !important;
        }
        img{
            width: 100%;
        }
        .hidden{
            display: none;
        }
    </style>


</head>

<body  class="{{ $class ?? '' }} ">



    @auth
        {{-- @if (in_array(request()->route()->getName(), ['sign-in-static', 'sign-up-static', 'login', 'register', 'recover-password', 'rtl', 'virtual-reality']))
            @yield('content')
        @else
            @if (!in_array(request()->route()->getName(), ['profile', 'profile-static']))
                <div class="min-height-300 bg-primary position-absolute w-100"></div>
            @elseif (in_array(request()->route()->getName(), ['profile-static', 'profile']))
                <div class="top-0 position-absolute w-100 min-height-300" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
                    <span class="mask bg-primary opacity-6"></span>
                </div>
            @endif --}}


            <div class="min-height-300 bg-secondary position-absolute w-100"></div>

            @include('backend.components.sidenav')
            <main class="overflow-hidden main-content position-relative border-radius-lg">
                <!-- Navbar -->
                <nav class="px-0 mx-4 shadow-none navbar navbar-main navbar-expand-lg border-radius-xl " id="navbarBlur"
                    data-scroll="false">
                    <div class="px-3 py-1 container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol dir="rtl" class="px-0 pt-1 pb-0 mb-0 bg-transparent breadcrumb ">
                                <li class="text-sm breadcrumb-item ps-2"><a class="text-white opacity-5" href="javascript:;">لوحة
                                        القيادة</a></li>
                                <li class="text-sm text-white breadcrumb-item active" aria-current="page">{{ ($title ?? "") }}</li>
                            </ol>
                        </nav>
                        <div class="px-0 mt-2 collapse navbar-collapse mt-sm-0" id="navbar">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div dir="rtl" class="input-group">
                                    <span class="input-group-text text-body"><i class="fas fa-search"
                                            aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="أكتب هنا...">
                                </div>
                            </div>
                            <ul class="navbar-nav me-auto ms-0 justify-content-end">
                                <li class="nav-item d-flex align-items-center">
                                    <a href="javascript:;" class="px-0 text-white nav-link font-weight-bold">
                                        <i class="fa fa-user me-sm-1"></i>
                                        <span class="d-sm-inline d-none">يسجل دخول</span>
                                    </a>
                                </li>
                                <li class="nav-item d-xl-none pe-3 d-flex align-items-center">
                                    <a href="javascript:;" class="p-0 text-white nav-link" id="iconNavbarSidenav">
                                        <div class="sidenav-toggler-inner">
                                            <i class="bg-white sidenav-toggler-line"></i>
                                            <i class="bg-white sidenav-toggler-line"></i>
                                            <i class="bg-white sidenav-toggler-line"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="px-3 nav-item d-flex align-items-center">
                                    <a href="javascript:;" class="p-0 text-white nav-link">
                                        <i class="cursor-pointer fa fa-cog fixed-plugin-button-nav"></i>
                                    </a>
                                </li>
                                <li class="nav-item dropdown ps-2 d-flex align-items-center">
                                    <a href="javascript:;" class="p-0 text-white nav-link" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="cursor-pointer fa fa-bell"></i>
                                    </a>
                                    <ul class="px-2 py-3 dropdown-menu me-sm-n4" aria-labelledby="dropdownMenuButton">
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <div class="py-1 d-flex">
                                                    <div class="my-auto">
                                                        <img src="/img/team-2.jpg" class="avatar avatar-sm ms-3 ">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-1 text-sm font-weight-normal">
                                                            <span class="font-weight-bold">New message</span> from Laur
                                                        </h6>
                                                        <p class="mb-0 text-xs text-secondary">
                                                            <i class="fa fa-clock me-1"></i>
                                                            13 minutes ago
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <div class="py-1 d-flex">
                                                    <div class="my-auto">
                                                        <img src="/img/small-logos/logo-spotify.svg"
                                                            class="avatar avatar-sm bg-gradient-dark ms-3 ">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-1 text-sm font-weight-normal">
                                                            <span class="font-weight-bold">New album</span> by Travis Scott
                                                        </h6>
                                                        <p class="mb-0 text-xs text-secondary">
                                                            <i class="fa fa-clock me-1"></i>
                                                            1 day
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <div class="py-1 d-flex">
                                                    <div class="my-auto avatar avatar-sm bg-gradient-secondary ms-3">
                                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                                            <title>credit-card</title>
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                                    fill-rule="nonzero">
                                                                    <g transform="translate(1716.000000, 291.000000)">
                                                                        <g transform="translate(453.000000, 454.000000)">
                                                                            <path class="color-background"
                                                                                d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                                opacity="0.593633743"></path>
                                                                            <path class="color-background"
                                                                                d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-1 text-sm font-weight-normal">
                                                            Payment successfully completed
                                                        </h6>
                                                        <p class="mb-0 text-xs text-secondary">
                                                            <i class="fa fa-clock me-1"></i>
                                                            2 days
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                @yield('content')
                </main>

                @include('backend.components.fixed-plugin')

    @endauth

    <!--   Core JS Files   -->

    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl/js/jquery.min.js') }} "></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->

    {{-- <script src="{{ asset('assets/js/argon-dashboard.js') }}"></script>
     --}}
     @livewireScripts
    @stack('js');
</body>

</html>
