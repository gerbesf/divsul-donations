@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-sm-6 d-flex align-items-center mb-4">
            <h1 class="d-inline-block font-weight-normal ">Servers</h1>
        </div>

        <div class="col-sm-6 d-flex align-items-center mb-4">
            <a href="{{ route('server_create') }}" class="btn d-block ml-auto btn-primary">Add Server</a>
        </div>

    </div>

    @livewire('servers.collection')

@endsection
