<div>


    <section class="">
        <div class="">
            <div class="container-fluid">
                <div class="row  justify-content-center ">
                    <div class="col-md-3">
                        <div class=" @if($month_dontations_amount==0) bg-dark @elseif($month_dontations_amount<=$meta) bg-warning @else bg-success @endif p-3 mb-3 rounded-lg py-4 text-">
                            <h1 class="text-white"><span class="fas fa-users  text-white"></span> <span class="float-right">{{ $count }}</span></h1>
                            <div>
                                <span class="text-uppercase small text-white">{{ __('app.monthly_donations') }}</span>
                            </div>
                            <div>
                                @if($month_dontations_amount==0)
                                    <h1 class="text-white">{{ $currency }} {{ number_format($month_dontations_amount,2,',','.') }}</h1>
                                @elseif($month_dontations_amount<=$meta)
                                    <h1 class="text-white">{{ $currency }} {{ number_format($month_dontations_amount,2,',','.') }}</h1>
                                @else
                                    <h1 class="text-white">{{ $currency }} {{ number_format($month_dontations_amount,2,',','.') }}</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-primary p-3 rounded-lg mb-3 py-4 text-">
                            <h1><span class="fas fa-star  text-white"></span></h1>
                            <div>
                                <span class="text-uppercase small text-white">{{ __('app.monthly_goal') }}</span>
                            </div>
                            <div>
                                <h1 class="text-white">{{ $currency }} {{ number_format($meta,2,',','.') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">

                        @if($amount<=0)
                            <div class=" bg-danger   p-3 rounded-lg mb-3 py-4 text-">
                                <h1><span class="fas fa-book-dead   text-white"></span></h1>

                                <div>
                                    <span class="text-uppercase small text-white">{{ __('app.total_avaliable') }}</span>
                                </div>
                                <div>
                                    <h1 class="text-white">{{ $currency }} {{ number_format($amount,2,',','.') }}</h1>
                                </div>
                            </div>
                        @else

                            <div class="  @if($amount==0) bg-dark @elseif($amount<=$meta) bg-warning @else bg-success @endif   p-3 rounded-lg mb-3 py-4 text-">
                                <h1><span class="fas fa-check-circle   text-white"></span></h1>

                                <div>
                                    <span class="text-uppercase small text-white">{{ __('app.total_avaliable') }}</span>
                                </div>
                                <div>
                                    <h1 class="text-white">{{ $currency }} {{ number_format($amount,2,',','.') }}</h1>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($pending_donations)
                    @endif
                </div>
                @if($pending_donations)
                    <div class="row justify-content-center">
                        <div class="col-md-5">

                            <div class="py-5">

                                <h4 class="py-3 text-left font-weight-bolder text-center">  <span class="fas fa-spy mr-1"></span>{{ __('app.waiting_payment') }} ({{ $pending_donations }})</h4>

                                        @foreach($pending_donations_amount as $currency=>$items)
                                    <div class="bg-white border rounded-lg mb-3">
                                        <div class="py-1 text-secondary">
                                            <div class="row no-gutters  py-2">
                                                <div class="col-md-6 text-right pr-1">{{ $currency }}</div>
                                                <div class="col-md-6 pl-1 font-weight-bolder">{{ number_format(collect($items)->sum('amount'),2,',','.') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>



</div>
