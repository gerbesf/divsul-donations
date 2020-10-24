@extends('admin.layout.app')
@section('content')
    <div class="row">
        <!-- [ Dashboard ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6 d-flex align-items-center mb-4">
                    <h1 class="d-inline-block font-weight-normal mb-0">Welcome</h1>
                </div>
            </div>
        </div>
        <!-- [ Dashboard ] end -->
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-normal">Players</h3>
                    @livewire('widgets.players-card-totals')
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-normal">Admins</h3>
                    @livewire('widgets.admins-card-totals')
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-normal">Servers</h3>
                    @livewire('widgets.servers-card-totals')
                </div>
            </div>
        </div>
    </div>



@endsection
