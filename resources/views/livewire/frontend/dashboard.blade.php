<div>


    <section class="">{{--
        @if($pending_donations)
            <div class="row  mb-3">
                <div class="col-md-3">
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
--}}

        @php
            $color = 'primary';
            if($month_dontations_amount==0) $color = 'black';
            if($month_dontations_amount<=$meta) $color = 'primary';
        @endphp
        <dl>
           <dt>{{ __('app.monthly_donations') }}</dt>
           <dd><h4 class="text-{{ $color }}">{{ $currency }} {{ number_format($month_dontations_amount,2,',','.') }}</h4></dd>
        </dl>

        <dl>
           <dt>{{ __('app.monthly_goal') }}</dt>
           <dd><h4 class="">{{ $currency }} {{ number_format($meta,2,',','.') }}</h4></dd>
        </dl>

        @if($amount<=0)
            <dl>
               <dt>{{ __('app.total_avaliable') }}</dt>
               <dd><h4 class="text-white">{{ $currency }} {{ number_format($amount,2,',','.') }}</h4></dd>
            </dl>
        @else
            <dl>
                <dt>{{ __('app.total_avaliable') }}</dt>
                <dd><h4 class="  @if($amount==0) text-dark @elseif($amount<=$meta) text-danger @else text-success @endif  ">{{ $currency }} {{ number_format($amount,2,',','.') }}</h4></dd>
            </dl>
        @endif


    </section>


</div>
