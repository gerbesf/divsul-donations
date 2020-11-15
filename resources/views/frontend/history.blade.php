@extends('frontend.layout.app')
@section('main')
    <section>
        <div class=" ">
            <header class=" headerpos-fixed bg-muted meta-header">
                <div class="pcoded-content container">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            @livewire('frontend.dashboard')
                        </div>
                    </div>
                </div>
            </header>

            @livewire('frontend.donation')
        </div>
    </section>

@endsection
