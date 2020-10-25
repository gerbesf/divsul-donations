@extends('admin.layout.app')
@section('content')

    <div class="row">
        <div class="col-sm-6 d-flex align-items-center mb-4">
            <h1 class="d-inline-block font-weight-normal ">Methods</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
                @livewire('donations.donations-methods')
        </div>
    </div>

@endsection
