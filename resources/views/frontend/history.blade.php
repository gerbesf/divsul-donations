@extends('frontend.layout.app')
@section('main')
    <section>
        <div class="container ">

            <div class="row">
                <div class="col-md-2">
                    <div class="card card-body card-bordered">
                        @livewire('frontend.dashboard')
                    </div>
                </div>
                <div class="col-md-10">
                    @livewire('frontend.donation')

                </div>
            </div>

        </div>
    </section>

@endsection
