@extends('frontend.layout.app')
@section('main')


    <section>
        <div class="pcoded-content container">
            @livewire('frontend.balance-dashboard')
        </div>
    </section>

    <section>
        <div class=" ">
            <div class="pcoded-content container">

                <div class="row no-gutters justify-content-center  ">
                    <div class=" col-md-11 col-xl-8 ">
                        <div class="bg-white rounded border p-4 ">
                            <div class="row justify-content-center ">
                                <div class="col-md-8 ">
                                    <div class=" ">
                                        <h1 class="text-success font-weight-bolder mt-4 ">
                                            {{ __('app.help_title') }}
                                        </h1>
                                        <h2 class=" text-secondary font-weight-normal">{{ __('app.help_description') }}</h2>
                                        <div class="pt-4">
                                            <div>
                                                <a href="{{route('how_to_donate')}}" class="btn btn-success btn-lg btn-block px-md-4">{{ __('app.donate_now') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4  d-none d-md-inline-block">
                                    <div class="w- m-auto">
                                        <img src="{{ asset('assets/images/SJ4RbE3.jpg') }}" class="w-100 rounded">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
