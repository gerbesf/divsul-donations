<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>{{ env('APP_NAME') }}</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Ferreira" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ request()->root() }}/assets/images/favicon.png" type="image/x-icon">

    <!-- vendor css -->

    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=2.2.0">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=2.2.0">

    <link rel="stylesheet" href="{{ request()->root() }}/frontend/assets/css/dashlite.css">
    <link rel="stylesheet" href="{{ request()->root() }}/frontend/assets/css/skins/theme-egyptian.css">
    <link rel="stylesheet" href="{{ request()->root() }}/css/app.css">
    <script src="{{ request()->root() }}/assets/js/vendor-all.min.js"></script>

    @livewireStyles

</head>
<body>
<div class="d-flex  flex-column flex-md-row align-items-center p-3 px-md-4 bg-dark border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">
        <a href="/" class="text-white">  <img src="https://www.divsul.org/logo-xs.png"> <span class="d-none d-md-inline-block">Divsul - {{ ucfirst(__('app.donation_center')) }}</span></a>
    </h5>
    <nav class="my-2 my-md-0 mr-md-3 ">
        {{--<a class="p-2 text-dark" href="{{ route('history') }}?balance=all">{{ __('menu.history') }}</a>--}}
        <a class="p-2 text-  text-warning" href="{{ route('how_to_donate') }}">{{ __('menu.how_to_donate') }}</a>
        <a class="p-2 text- d-none d-md-inline-block text-warning" href="{{ route('send_confirmation') }}">{{ __('menu.send_confirmation') }}</a>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <img src="https://raw.githubusercontent.com/yammadev/flag-icons/master/png/{{ strtoupper(app()->getLocale()) }}.png">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/locale/us"><img src="https://raw.githubusercontent.com/yammadev/flag-icons/master/png/US.png"> Global </a>
                <a class="dropdown-item" href="/locale/br"><img src="https://raw.githubusercontent.com/yammadev/flag-icons/master/png/BR.png"> Português</a>
            </div>
    </nav>
</div>
<div class="mb-5 "></div>
<div >
    @yield('main')
</div>
@livewireScripts
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" />
<script src="{{ request()->root() }}/assets/js/plugins/bootstrap.min.js"></script>
<script src="{{ request()->root() }}/assets/js/pcoded.min.js"></script>
<script src="{{ request()->root() }}/assets/js/jquery.mask.min.js"></script>
<script src="{{ request()->root() }}/js/app.js"></script>

@yield('js-footer')
</body>

</html>
