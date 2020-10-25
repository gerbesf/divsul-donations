@extends('admin.layout.app')
@section('content')

    <div class="row">
        <div class="col-sm-6 d-flex align-items-center mb-4">
            <h1 class="d-inline-block font-weight-normal ">Register Expense </h1>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
         @livewire('donations.register-expense')
        </div>
    </div>

@endsection
