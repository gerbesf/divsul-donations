<div>

    <div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <h4>Details</h4>
                <div class="card card-bodyx">
                    <table class="table table-sm table-borderless m-0">
                        <tr>
                            <td class="bg-light text-right">ID</td>
                            <td>{{ $id_donation }}</td>
                        </tr>
                        <tr>
                            <td class="bg-light text-right">Created</td>
                            <td>{{ $entity->date_created->format(env('APP_DATEFORMAT')) }}</td>
                        </tr>
                        <tr>
                            <td class="bg-light text-right">Currency</td>
                            <td>{{ $entity->currency }}</td>
                        </tr>
                        <tr>
                            <td class="bg-light text-right">Amount</td>
                            <td> <b>{{ number_format($entity->amount,2) }}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        @if($has_confirmed)
            <div class="row justify-content-center">

                <div class="col-md-6">
                    <div class="alert alert-success alert-inverse">
                        Payment has confirmed:
                        <h4 class="text-success"> {{ $entity->date_confirmed->format(env('APP_DATEFORMAT')) }}</h4>
                    </div>
                </div>
            </div>

        @else

            <div class="row justify-content-center">

                <div class="col-md-6">
                    <h4>Confirm Amount</h4>
                    <div class="card card-body">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" wire:model="amount_received" class="form-control">
                        </div>
                    </div>

                    @if($amount_received)

                        <div class="card card-body brder-success ">
                            <div class="text-center mb-2">Please Check amount</div>
                            <div class="row">
                                <div class="col-md-6 text-muted font-weight-bolder lead text-right"> {{ $entity->currency_received }} {{ number_format($amount_received,2) }}</div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-block" wire:click="confirmPayment">Confirm donation</button>

                    @endif


                </div>
            </div>

        @endif



    </div>

</div>
