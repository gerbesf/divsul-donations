<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar dashboard-nav menu-light menupos-fixed ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Dashboard</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-tachometer-alt"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-cash-register"></i></span><span class="pcoded-mtext">Donations</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="#">Pending</a></li>
                        <li><a href="#">Confirmed</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Comunity</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('players') }}" class="nav-link ">
                        <span class="pcoded-micon"><i class="fas fa-user"></i></span>
                        <span class="pcoded-mtext">Players</span>
                    </a>
                </li>
{{--
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-users"></i></span><span class="pcoded-mtext">Clans</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="#">Actives</a></li>
                        <li><a href="#">Create</a></li>
                    </ul>
                </li>--}}

                <li class="nav-item pcoded-menu-caption">
                    <label>Settings</label>
                </li>

                <li class="nav-item">
                    <a href="{{ route('servers') }}" class="nav-link ">
                        <span class="pcoded-micon"><i class="fas fa-database"></i></span>
                        <span class="pcoded-mtext">Servers</span>
                    </a>
                </li>


            </ul>

          {{--  <div class="card text-center">
                <div class="card-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="far fa-life-ring f-40"></i>
                    <h6 class="mt-3">Help?</h6>
                    <p>Please contact us on our email for need any support</p>
                    <a href="#!" target="_blank" class="btn btn-primary btn-sm text-white m-0">Support</a>
                </div>
            </div>
--}}
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
