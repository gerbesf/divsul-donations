<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed ">

    <div class="m-header">
        <a class="mobile-menu d-lg-none" id="mobile-collapse" href="#!"><span></span></a>
        <a href="{{ route('admin') }}" class="b-brand">

            <h3 class="m-0 text-dark">  {{ env('APP_NAME') }} </h3>

        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ request()->root() }}/generic-avatar.png" class="img-radius" alt="User-Profile-Image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <ul class="pro-body">
                            <li><a href="{{ route('logout') }}" class="dropdown-item"><i class="feather icon-lock"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>


</header>
<!-- [ Header ] end -->
