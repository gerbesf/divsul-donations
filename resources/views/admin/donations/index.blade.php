@extends('admin.layout.app')
@section('content')

    <div class="row">
        <div class="col-sm-6 d-flex align-items-center mb-4">
            <h1 class="d-inline-block font-weight-normal ">Donations</h1>
        </div>
    </div>

    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link @if(!request()->has('confirmed')) active @endif text-uppercase" id="home-tab" href="{{ route('donations_admin') }}" >Create</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(request('confirmed')=='false') active @endif text-uppercase" id="home-tab" href="{{ route('donations_adminq') }}?confirmed=false" >Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(request('confirmed')=='true') active @endif text-uppercase" id="profile-tab" href="{{ route('donations_adminq') }}?confirmed=true" >Confirmed</a>
        </li>
    </ul>

    <div class="row">
        <div class="col-md-12">


            @if(request()->has('confirmed'))
                @livewire('donations.collection',['confirmed'=>request('confirmed')])
            @else

                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-body">
                            <h4>Select a Sponsor</h4>
                            <div>
                                <select class="form-control-lg form-control  js-states  searchProfile">
                                </select>
                                <script>
                                    $(document).ready(function() {
                                        // [ Single Select ]
                                        $(".searchProfile").select2({
                                            theme: "classic",
                                            minimumInputLength: 2,
                                            minimumResultsForSearch: Infinity,
                                            ajax: {
                                                url: '{{ Request::root() }}/admin/donations/players/search',
                                                dataType: 'json',
                                            }
                                        });

                                        $('.searchProfile').on('change', function() {
                                            var data = $(".searchProfile option:selected").val();
                                            $('#btnCreateDonation').removeAttr('disabled');
                                            $("#id_profile").val(data);
                                        })
                                    });
                                </script>
                                <hr>
                                <form action="{{ route('donations_create') }}" method="get">
                                    <input type="hidden" id="id_profile" name="id_profile">
                                    <button class="btn btn-primary" id="btnCreateDonation" disabled type="submit">Continue</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
