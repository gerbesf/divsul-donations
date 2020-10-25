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
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ request()->root() }}/assets/images/favicon.png" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ request()->root() }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ request()->root() }}/css/app.css">
    <script src="{{ request()->root() }}/assets/js/vendor-all.min.js"></script>

    @livewireStyles

</head>

<body class="">



<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<section>
    <nav class="navbar pcoded-header navbar-expand-lg navbar-dark bg-black header-dark ">
        <div class="container">
            <div class="m-header">
                <!-- <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a> -->
                <a href="/" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="https://www.divsul.org/logo-xs.png">
                </a>
                <a href="#!" class="mob-toggler">
                    <i class="feather icon-more-vertical"></i>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a href="/">{{ __('menu.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('how_to_donate') }}">{{ __('menu.how_to_donate') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('send_confirmation') }}">{{ __('menu.send_confirmation') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('history') }}">{{ __('menu.history') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}">{{ __('menu.contact') }}</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
                                <span class="flag-icon flag-icon-{{ session()->get('locale') }}"></span>
                            </a>
                            <div class="dropdown-menu profile-notification dropdown-menu-right">
                                <ul class="pro-body">
                                    <li><a class="dropdown-item" href="{{ url('locale/us') }}" ><span class="flag-icon flag-icon-us"></span> Global</a></li>
                                    <li><a class="dropdown-item" href="{{ url('locale/br') }}" ><span class="flag-icon flag-icon-br"></span> Brazil</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

</section>
<header class=" headerpos-fixed bg-muted meta-header">
    <div class="container">
        <div class="col-sm-12 text-center">
            <h1 class="text-dark"> {{ __('app.'.$title) }}</h1>
            <p class="mb-0 text-secondary"> {{ __('app.'.$description) }}</p>
        </div>
    </div>
</header>

@yield('main')

   <div class="container">
       <div class="row no-gutters">
           <div class="col-md-6">
               <div class="p-4">
                   <small>{{ env('APP_NAME') }}</small>
               </div>
           </div>
           <div class="col-md-6 text-lg-right">
               <div class="p-4">

               </div>
           </div>
       </div>
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
