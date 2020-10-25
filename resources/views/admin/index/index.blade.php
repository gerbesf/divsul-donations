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



    <h4>Donations <a href="{{ route('donations_admin') }}">new</a> </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-normal">Pending</h3>
                    @livewire('widgets.donations-card-total-pending')
                    <a href="{{ route('donations_admin') }}?confirmed=false">Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-normal">Confirmed</h3>
                    @livewire('widgets.donations-card-total-confirmed')
                    <a href="{{ route('donations_admin') }}?confirmed=true">Details</a>
                </div>
            </div>
        </div>
    </div>

    <h4>Comunity</h4>

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
