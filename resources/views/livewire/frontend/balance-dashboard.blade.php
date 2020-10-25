<div>


    <section class="p-3">
        <div class="container">
            <div class="row">
                <div class="card card-body">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <div>
                                <span class="text-uppercase small text-muted">Meta Mensal</span>
                            </div>
                            <div>
                                <h1 class="text-primary">{{ $currency }} {{ number_format($meta,2,',','.') }}</h1>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <span class="text-uppercase small text-muted">Doações</span>
                            </div>
                            <div>
                                @if($month_dontations==0)
                                    <h1 class="text-danger">{{ $currency }} {{ number_format($month_dontations,2,',','.') }}</h1>
                                @elseif($month_dontations<=$meta)
                                    <h1 class="text-warning">{{ $currency }} {{ number_format($month_dontations,2,',','.') }}</h1>
                                @else
                                    <h1 class="text-success">{{ $currency }} {{ number_format($month_dontations,2,',','.') }}</h1>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <span class="text-uppercase small text-muted">Aguardando confirmação</span>
                            </div>
                            <div>
                                <h1 class="text-muted">{{ $pending_donations }}</h1>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <span class="text-uppercase small text-muted">Em caixa</span>
                            </div>
                            <div>
                                <h1 class="text-success">{{ $currency }} {{ number_format($amount,2,',','.') }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
