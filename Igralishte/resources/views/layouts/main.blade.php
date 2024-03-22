<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        .roundedInput {
            border-radius: 10px;
        }

        .fixed-bottom {
            position: fixed;
            left: 0;
            bottom: 0;

            z-index: 1030;
        }

        .fancyOlive {
            color: #8A8328;
        }

        .fancyOlive:hover {
            color: #8A8328;
        }

        .color-square {
            height: 15px;
            width: 15px;
            display: inline-block;
        }

        .image-preview-container {
            position: relative;
            display: inline-block;
        }

        #image-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        #change-image-btn {
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .custom-input-border-color .form-control:focus {
            border-color: transparent;
            box-shadow: none;
        }

        .logoutIconBorder {
            border-top: 3px solid #F1F1F1;
        }

        @media only screen and (min-width: 768px) {
            .logoutBorder {
                width: 184.99px;
                border-top: 3px solid #F1F1F1;
            }
            .logoutIconBorder {
                border-top: none;
            }
            .fixed-bottom {
                width: 184.99px;
              
            }
        }

        @media only screen and (min-width: 1024px) {
            .logoutBorder {
                width: 200.9px;
            }
            .fixed-bottom {
                width: 200.9px;
            }
        }
    </style>
</head>

<body>
    @php
    $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
    @endphp
    <div id="app" class="container-fluid pr-0 app">
        <div class="row flex-nowrap justify-content-between">

            <div class="flex-sm-column flex-row flex-nowrap min-vh-100 " style="position: relative;">
                <div class="d-flex align-items-center ml-md-2 mb-3">
                    <a href="{{ route('products.index') }}" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                        <img src="{{ asset('storage/' . $admin->image) }}" class="rounded-circle" style="width: 40px" alt="Avatar" />
                    </a>
                    @if(auth()->check())
                    <div class="d-none d-md-block ml-2 mt-2">
                        <p class="mb-0 text-capitalize font-weight-bold">{{ auth()->user()->name }}</p>
                        <small>{{ auth()->user()->email }}</small>
                    </div>
                    @endif
                </div>
                <ul class="nav nav-pills nav-flush flex-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 align-items-center align-items-md-start pl-md-3">
                    <li class="roundedInput col-md-12 px-md-0">
                        <a href="{{ route('products.index') }}" id="clothesButton" class="nav-link my-2 px-2 d-flex font-weight-bold text-secondary align-items-center" @if($currentRoute=='products.index' ) @style('background-color: #FFDBDB;') @endif>
                            <x-clothes-button />
                            <p class="d-none d-md-block ml-1 mb-0 py-md-2 p-lg-2">Vintage Облека</p>
                        </a>
                    </li>
                    <li class="roundedInput col-md-12 px-md-0">
                        <a href="{{ route('discounts.index') }}" id="discountButton" class="nav-link my-2 px-2 d-flex font-weight-bold text-secondary align-items-center roundedInput" @if($currentRoute=='discounts.index' ) @style('background-color: #FFDBDB;') @endif>
                            <x-discount-button />
                            <p class="d-none d-md-block ml-1 mb-0 py-md-2 p-lg-2">Попусти / промо</p>
                        </a>
                    </li>
                    <li class="roundedInput col-md-12 px-md-0">
                        <a href="{{ route('brands.index') }}" id="brandButton" class="nav-link my-2 px-2 d-flex font-weight-bold text-secondary align-items-center roundedInput" @if($currentRoute=='brands.index' ) @style('background-color: #FFDBDB;') @endif>
                            <x-brand-button />
                            <p class="d-none d-md-block ml-1 mb-0 py-md-2 p-lg-2">Брендови</p>
                        </a>
                    </li>
                    <li class="roundedInput col-md-12 px-md-0">
                        <a href="{{ route('admin.profile.edit') }}" id="profileButton" class="nav-link my-2 px-2 d-flex font-weight-bold text-secondary align-items-center roundedInput" @if($currentRoute=='admin.profile.edit' || $currentRoute=='admin.profile.editPassword' ) @style('background-color: #FFDBDB;') @endif>
                            <x-profile-button />
                            <p class="d-none d-md-block ml-1 mb-0 py-md-2 p-lg-2">Профил</p>
                        </a>
                    </li>
                </ul>
                <div class=" fixed-bottom ">
                    <a href="{{ route('logout') }}" class="d-flex align-items-center logoutBorder  link-dark text-decoration-none " id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <div class="logoutIconBorder p-2"><x-logout-button /></div>
                        <p class="d-none d-md-flex ml-2 mb-0 font-weight-bold text-secondary">Одјави се</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="col-sm-12 col-md-9 mt-3">
                @yield('content')
            </div>
        </div>

    </div>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    @yield('scripts')
</body>

</html>