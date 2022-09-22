<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title','Home Page')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home.index') }}">@lang('messages.brand')</a>
                <a class="navbar-brand" href="{{ route('admin.home.index') }}">@lang('messages.admin_WECOP')</a>
                <a class="nav-link" href="{{ route('admin.ecoProduct.create') }}">@lang('messages.create_ECO')</a>
                <a class="nav-link" href="{{ route('admin.ecoProduct.list') }}">@lang('messages.list_ECO')</a>
                <a class="nav-link" href="{{ route('admin.notEcoProduct.create') }}">@lang('messages.create_not_ECO')</a>
                <a class="nav-link" href="{{ route('admin.notEcoProduct.list') }}">@lang('messages.list_not_ECO')</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Future Left Side Links -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li style="text-align:right;"> {{Auth::user()->getName()}} </li>
                        <!-- Future authentication Links -->
                    </ul>
                </div>
            </div>
        </nav>
        @include('util.breadcrumbs')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
