<div>

    @if($balance)
        <div class="container">
            <h4 class="py-3 text-left font-weight-bolder text-center">  <span class="fas fa-calendar-check mr-1"></span> {{ __('app.this_month') }}</h4>
            <div class="table-responsive">
                <table class="table border font-weight-normal small table-sm rounded table-sm m-0 bg-white shadow table-borderless table-striped">
                    <thead>
                    <tr>
                        <th class="text-lg-right"  style="width:55px">Date</th>
                        <th  class=" " style="width:55px"></th>
                        <th  class=" " style="width:155px">Amount</th>
                        <th>Player</th>
                    </tr>
                    </thead>
                    @if( count($balance) == 0 )
                        <tr>
                            <td colspan="4" class="text-center">{{ __('app.empty_results') }}</td>
                        </tr>

                    @endif
                    @foreach($balance as $item_confirmed)
                        <tr>
                            <td class="text-right align-middle ">
                                {{ \Carbon\Carbon::parse($item_confirmed->timestamp)->format(env('APP_DATEFORMAT')) }}
                            </td>

                        @if($item_confirmed->action=='increment')
                                <td class="text-success align-middle text-center " >
                                    <span class="font-weight-bolder text-success"> <span class="fas fa-arrow-up f-10"></span></span>
                                </td>
                                <td class="text-success text-success font-weight-normal align-middle ">
                                    R$ {{ number_format($item_confirmed->amount,2) }}
                                </td>
                            @else
                                <td class="text-danger align-middle text-center " >
                                    <span class="font-weight-bolder text-danger"> <span class="fas fa-arrow-down f-10"></span></span>
                                </td>
                                <td class=" text-danger font-weight-normal align-middle ">
                                    R$ {{ number_format($item_confirmed->amount,2) }}
                                </td>
                            @endif

                                <td class="align-middle ">
                                    @if($item_confirmed->donation)
                                        @if( $item_confirmed->donation->hide_profile == true)
                                            <span class="fas fa-user-secret text-dark"></span>
                                            <span class=" text-dark">{{ __('app.private_donation') }}</span>
                                        @else
                                            <span class="fas fa-user-circle text-primary"></span>
                                            <span class="f text-primary">{{ $item_confirmed->donation->profile->nickname }}</span>
                                        @endif
                                    @else
                                        <div> {{ $item_confirmed->description }}</div>
                                    @endif
                                </td>
                          {{--  <td class=" align-middle border-left">
                                @if($item_confirmed->donation)
                                    <div class="">D-{{ $item_confirmed->donation->id }}</div>
                                @endif
                            </td>--}}
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endif

    @if(count($donations))
        <hr class="my-5 ">
        <div class="container">

            <h4 class="py-3 text-left font-weight-bolder text-center">  <span class="fas fa-spinner mr-1"></span> {{ __('app.pending_confirmation') }}</h4>
            <div class="table-responsive">
                <table class="table border font-weight-normal small table-sm rounded table-sm m-0 bg-white shadow table-borderless table-striped">
                    <thead>
                    <tr>
                        <th>Player</th>
                        <th class="border-right text-lg-right">Created</th>
                        <th colspan="2" class=" border-left">Payment</th>
                        <th class="text-center">Declared</th>
                    </tr>
                    </thead>
                    @foreach($donations as $donation)
                        <tr>
                            <td class="align-middle">
                                @if( $donation->hide_profile == true)
                                    <span class="badge badge-dark">{{ __('app.private_donation') }}</span>
                                @else
                                    <span class="fas fa-user-circle text-primary"></span>
                                    <span class="f text-primary">{{ $donation->profile->nickname }}</span>
                                @endif
                            </td>
                            <td class="align-middle border-right text-lg-right">
                                {{ $donation->date_created->format('d/m/Y') }}
                            </td>
                            <td class="text-center align-middle border-left bg-white">
                                <div class="">
                                    <img src="{{ $donation->method->logo }}" style="max-height: 25px;">
                                </div>
                            </td>
                            <td class="align-middle  bg-white">
                                {{ $donation->method->name }}
                            </td>
                            <td style="width: 132px;" class="text-primary align-middle text-center bg-white">
                                {{ $donation->currency }}
                                {{ number_format($donation->amount,2) }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="text-center pt-3 ">
            <div class="d-inline-block f-10 font-weight-bolder">
                {{ $donations->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    @endif

</div>
