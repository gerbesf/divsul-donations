@extends('admin.layout.app')
@section('content')

    <div class="row">
        <div class="col-sm-6 d-flex align-items-center mb-4">
            <h1 class="d-inline-block font-weight-normal ">Modify server</h1>
        </div>

        <div class="col-sm-6 d-flex align-items-center mb-4">
            <a href="{{ route('servers') }}" class="btn d-block ml-auto btn-light"><i class="feather icon-arrow-left mr-2"></i>Back</a>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                @livewire('servers.modify',['server_id'=>$server_id])
            </div>
        </div>
    </div>

@endsection
