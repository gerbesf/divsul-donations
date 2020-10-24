@extends('admin.layout.app')
@section('content')

    <div class="row">
        <div class="col-sm-6 d-flex align-items-center mb-4">
            <h1 class="d-inline-block font-weight-normal ">Create a new server</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                @livewire('servers.create')
            </div>
        </div>
    </div>

@endsection
