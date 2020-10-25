@extends('frontend.layout.app')
@section('main')

    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navbar ] start -->
    <nav class="navbar pcoded-header navbar-expand-lg navbar-light header-primary">
        <div class="container">
            <div class="m-header">
                <!-- <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a> -->
                <a href="/" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    Logo
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
                        <a href="/">Início</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
                                Doações
                            </a>
                            <div class="dropdown-menu profile-notification dropdown-menu-right">
                                <ul class="pro-body">
                                    <li><a href="#" class="dropdown-item"><i class="fas fa-circle"></i> Como doar</a></li>
                                    <li><a href="#" class="dropdown-item"><i class="fas fa-circle"></i> Registrar doação</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/">Historico</a>
                    </li>
                    <li class="nav-item">
                        <a href="/">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a href="/">Contato</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- [ navbar ] end -->

    <!-- [ navbar ] start -->
    <header class="l-header bg-dark meta-header">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 col-sm-12">
                    <div class="py-5">
                        <div class="py-5">
                       <h4 class="text-uppercase font-weight-normal text-white">Seja bem vindo a central de doações da Divsul.org </h4>
                       <h1 class="text-white f-40 font-weight-light my-4 ">
                           Ajude a manter a sua comunidade unida!
                       </h1>
                       <button type="button" class="btn btn-light px-md-4">{{ __('Doar agora') }}</button>
                       <button type="button" class="btn btn-link px-md-4 text-white">{{ __('Como funciona') }}</button>
                   </div>
                </div>
                </div>
            </div>
        </div>
    </header>

    @livewire('frontend.balance-dashboard')

    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <hr class="my-5">
                </div>
                <div class="col-md-7 text-center text-md-left">
                    <ul class="list-inline mb-5 ">
                        <li class="list-inline-item">{{ env('APP_NAME') }}</li>
                    </ul>
                </div>
                <div class="col-md-5 text-center text-md-right">
                    <div> 2015-{{ date('Y') }} Divsul.</div>
                </div>
            </div>
        </div>
    </section>

@endsection
