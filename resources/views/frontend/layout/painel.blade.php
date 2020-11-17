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

<body style="background: #2f2f2f; width: 212px; padding: 0; margin: 0">

@yield('main')

@livewireScripts
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" />
@yield('js-footer')
</body>

</html>
