<div>

    @if($balance)
        <div class="pcoded-content container">


            <div class="pb-3 text-center">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link @if( request()->get('balance') == 'all') active @endif text-uppercase" href="{{ route('history') }}?balance=all">{{ __('app.tab_all_records') }}</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if( request()->get('balance') == 'increment') active @endif text-uppercase"  href="{{ route('history') }}?balance=increment">{{ __('app.tab_donations') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if( request()->get('balance') == 'decrement') active @endif text-uppercase"  href="{{ route('history') }}?balance=decrement">{{ __('app.tab_expenses') }}</a>
                    </li>
                </ul>

            </div>
            <div class="table-responsive">
                <table class="table border  rounded bg-white shadow table-borderless table-striped">
                    <thead>
                    <tr>
                        <th class="text-lg-right"  style="max-width:155px">{{ ucfirst(__('app.date')) }}</th>
                        {{--<th  class=" " style="width:55px"></th>--}}
                        <th  class=" " style="min-width: 100px" > {{ ucfirst(__('app.amount')) }}</th>
                        <th style="width: 50%"> {{ ucfirst(__('app.description')) }}</th>
                    </tr>
                    </thead>
                    @if( !count($balance) )
                        <tr>
                            <td colspan="3" class="text-center">{{ __('app.empty_results') }}</td>
                        </tr>
                    @endif
                    @foreach($balance as $item_confirmed)
                        <tr>
                            <td class="text-right align-middle ">
                                {{ \Carbon\Carbon::parse($item_confirmed->timestamp)->format(env('APP_DATEFORMAT') ?: 'Y-m-d H:i') }}
                            </td>

                            @if($item_confirmed->action=='increment')
                                {{--    <td class="text-success align-middle text-center " >
                                        <span class="font-weight-bolder text-success"> <span class="fas fa-arrow-up f-10"></span></span>
                                    </td>--}}
                                <td class="text-success text-success font-weight-normal align-middle font-weight-bold ">
                                    + R$ {{ number_format($item_confirmed->amount,2) }}
                                </td>
                            @else
                                {{--<td class="text-danger align-middle text-center " >
                                    <span class="font-weight-bolder text-danger"> <span class="fas fa-arrow-down f-10"></span></span>
                                </td>--}}
                                <td class=" text-danger font-weight-normal align-middle  font-weight-bold">
                                    - R$ {{ number_format($item_confirmed->amount,2) }}
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
                                        <span> {{ $item_confirmed->description }}</span>
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
                <div class="text-center pt-3 ">
                    <div class="d-inline-block f-10 font-weight-bolder">
                        {{ $balance->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(isset($donations) && count($donations))
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
