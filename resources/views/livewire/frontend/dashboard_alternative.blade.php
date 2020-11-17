<div class="text-white">

    <img src="{{ asset('assets/images/SJ4RbE3.jpg') }}" style="width: 100%">

        <div class="row no-gutters  ">
            <div class="col-md-12" title="{{ __('app.monthly_donations')}}">
                <div class="p-2">
                    @php
                        $color = 'primary';
                        if($month_dontations_amount==0) $color = 'black';
                        if($month_dontations_amount<=$meta) $color = 'warning';
                    @endphp
                    {{--  <h1><span class="fas fa-users text-{{ $color }}"></span> <span class="float-right"> <span class="text-{{ $color }}">{{ $count }}</span></span></h1>--}}
                    <div>
                        <span class="text-uppercase small">{{ __('app.monthly_donations') }}</span>
                    </div>
                    <div>
                        <h2 class="text-{{ $color }}">{{ $currency }} {{ number_format($month_dontations_amount,2,',','.') }}</h2>
                    </div>
                </div>
            </div>
            </div>
            <div class="row no-gutters  ">
                <div class="col-md-12"title="{{ __('app.monthly_goal')}}">
                    <div class="p-2">
                        {{--<h1><span class="fas fa-star  "></span></h1>--}}
                        <h1 class="float-right"><span class="fas fa-adn   text-white"></span></h1>
                        <div>
                            <span class="text-uppercase small ">{{ __('app.monthly_goal') }}</span>
                        </div>
                        <div>
                            <h2 class="text-white">{{ $currency }} {{ number_format($meta,2,',','.') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-12">
                @if($amount<=$meta)
                    <div class="p-2">
                        <div>
                            <span class="text-uppercase small text-danger">{{ __('app.total_avaliable') }}</span>
                        </div>
                        <div>
                            <h2 class="text-danger">{{ $currency }} {{ number_format($amount,2,',','.') }}</h2>
                        </div>
                    </div>
                @else
                    <div class="p-2">
                        <div>
                            <span class="text-uppercase small ">{{ __('app.total_avaliable') }}</span>
                        </div>
                        <div>
                            <h2 class="text-white">{{ $currency }} {{ number_format($amount,2,',','.') }}</h2>
                        </div>
                    </div>
                @endif
            </div>
            </div>
            @if($pending_donations)
            @endif
        </div>

    <div class="row no-gutters">
        <div class="col-md-12">
            <div class="p-2">
                <a href="{{ route('how_to_donate') }}" target="_blank" class="btn btn-block btn-dark">Doar agora</a>
            </div>
        </div>
    </div>

    @if($pending_donations)
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="p-2">
                    <b class=" py-2 mb-0 pb-0 text-left font-weight-bolder t "> {{ __('app.waiting_payment') }} ({{ $pending_donations }})</b>
                    <div class=" small">{{ __('app.waiting_payment_description') }}</div>
                </div>
            </div>
        </div>

        @foreach($pending_donations_amount as $currencys=>$items)
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="row no-gutters no-gutters ">
                        <div class="col-6 text-right pr-lg-1">{{ $currencys }}</div>
                        <div class="col-6 pl-1 font-weight-bolder">{{ number_format(collect($items)->sum('amount'),2,',','.') }} <span class="fa fa-refresh"></span> </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

</div>
