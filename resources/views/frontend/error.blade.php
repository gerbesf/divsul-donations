@extends('frontend.layout.app')
@section('main')
    <section style="min-height: 100vh">
        <div class=" container">

            @if(request()->get('message'))

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card card-body py-5">

                            <div><img class="rounded" src="/404.jpg"></div>

                            @if(request()->get('message')=="not_found")

                                <h4 class="text-dark">{{ __('app.error.not_found') }}</h4>
                                <p class="lead text-muted">{{ __('app.error.not_found_description') }}</p>

                            @endif

                        </div>

                    </div>
                </div>


            @endif
        </div>
    </section>
@endsection
