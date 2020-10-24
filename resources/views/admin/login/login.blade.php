@extends('admin.layout.clean')
@section('main')
    <div class="auth-wrapper align-items-stretch aut-bg-img aut-bg-img3">
        <div class="flex-grow-1">
            <div class="h-100 d-md-flex align-items-center auth-side-img">
                <div class="col-sm-10 auth-content w-auto">
                </div>
            </div>
            <div class="auth-side-form">
                <div class="auth-content">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="text-center">
                                <img src="assets/images/logo-dark.svg" alt="" class="img-fluid mb-5">
                                <h1 class="f-w-400">Hi there, please log in</h1>
                            </div>

                            @livewire('login')

                        </div>
                    </div>
                </div>
                <div class="footer-cont text-center">
                    <h6 class="mb-0 text-muted">©2015–{{ date('Y') }} - Divsul.org ®</h6>
                </div>
            </div>
        </div>
    </div>


@endsection
