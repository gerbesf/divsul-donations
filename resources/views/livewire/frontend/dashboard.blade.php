<div>


    <section class="">
        @if($pending_donations)
            <div class="row  mb-3">
                <div class="col-md-12">
                    <div class="">
                        <h4 class=" py-2 mb-0 pb-0 text-left font-weight-bolder t "> {{ __('app.waiting_payment') }} ({{ $pending_donations }})</h4>
                        <div class=" text-lg-">{{ __('app.waiting_payment_description') }}</div>
                        <div class="py-2">
                            <div class="">
                                @foreach($pending_donations_amount as $currencys=>$items)
                                    <div class="d-inline-block bg-secondary col-2 text-white  rounded ">
                                        <div class="row no-gutters ">
                                            <div class="col-md-6 text-lg-right pr-lg-1">{{ $currencys }}</div>
                                            <div class="col-md-6 pl-lg-1 font-weight-bolder">{{ number_format(collect($items)->sum('amount'),2,',','.') }} <span class="fa fa-refresh"></span> </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row  ">
            <div class="col-md-4" title="{{ __('app.monthly_donations')}}">
                <div class="border bg-white  p-3 mb-3 rounded-lg py-4">
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
            <div class="col-md-4" title="{{ __('app.monthly_goal')}}">
                <div class="border bg-white p-3 rounded-lg mb-3 py-4 text-">
                    {{--<h1><span class="fas fa-star  "></span></h1>--}}
                    <h1 class="float-right"><span class="fas fa-adn   text-white"></span></h1>
                    <div>
                        <span class="text-uppercase small ">{{ __('app.monthly_goal') }}</span>
                    </div>
                    <div>
                        <h2 class="">{{ $currency }} {{ number_format($meta,2,',','.') }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @if($amount<=0)
                    <div class=" bg-danger   p-3 rounded-lg mb-3 py-4 text-">
                        <h1 class="float-right"><span class="fas fa-book-dead   text-white"></span></h1>
                        <div>
                            <span class="text-uppercase small text-white">{{ __('app.total_avaliable') }}</span>
                        </div>
                        <div>
                            <h2 class="text-white">{{ $currency }} {{ number_format($amount,2,',','.') }}</h2>
                        </div>
                    </div>
                @else
                    <div class="  @if($amount==0) bg-dark @elseif($amount<=$meta) bg-warning @else bg-success @endif   p-3 rounded-lg mb-3 py-4 text-">
                        <h1><span class="fas fa-check-circle   text-white"></span></h1>

                        <div>
                            <span class="text-uppercase small text-white">{{ __('app.total_avaliable') }}</span>
                        </div>
                        <div>
                            <h2 class="text-white">{{ $currency }} {{ number_format($amount,2,',','.') }}</h2>
                        </div>
                    </div>
                @endif
            </div>
            @if($pending_donations)
            @endif
        </div>
    </section>


</div>
