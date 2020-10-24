<!DOCTYPE html>
<html lang="en">

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
    <meta name="author" content="Ferreira - Divsul.org" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ Request::root() }}/assets/images/favicon.png" type="image/x-icon">

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ Request::root() }}/assets/css/plugins/dataTables.bootstrap4.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ Request::root() }}/assets/css/style.css">
    <script src="{{ Request::root() }}/assets/js/vendor-all.min.js"></script>

    @livewireStyles

</head>
<body class="">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
@include('admin.layout.sidebar')
@include('admin.layout.header')

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content container">
        @yield('main')
        @yield('content')
    </div>
</div>

<!-- Warning Section start -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade
        <br/>to any of the following web browsers to access this website.
    </p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (11 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
@livewireScripts

<!-- Required Js -->
<script src="{{ Request::root() }}/assets/js/plugins/bootstrap.min.js"></script>
<script src="{{ Request::root() }}/assets/js/pcoded.min.js"></script>

<!-- datatable Js -->
<script src="{{ Request::root() }}/assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="{{ Request::root() }}/assets/js/plugins/dataTables.bootstrap4.min.js"></script>
<script>
    $('#usertable').DataTable();
</script>


</body>

</html>
