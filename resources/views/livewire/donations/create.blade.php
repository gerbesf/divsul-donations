<div>

    <div>
        <div class="row">
            <div class="col-md-6">
                <h3>Sponsor</h3>
                <table class="table border">
                    <tr>
                        <td class="bg-light border-right text-right">Nickname</td>
                        <td>{{ $profile->nickname }}</td>
                    </tr>
                    <tr>
                        <td class="bg-light border-right text-right">Hash</td>
                        <td>{{ $profile->hash }}</td>
                    </tr>
                    <tr>
                        <td class="bg-light border-right text-right">Steam Level</td>
                        <td>{{ $profile->steam_level }}</td>
                    </tr>
                    <tr>
                        <td class="bg-light border-right text-right">Tags</td>
                        <td>{{ implode(' - ',$profile->steam_tags) }}</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6">

                <h3>Donation</h3>
                <div class="form-group">

                    <label>Method</label>
                    <select class="form-control" wire:model="id_method">
                        <option value="0">Select an option</option>
                        @foreach($methods as $method)
                            <option value="{{ $method->id }}">{{ $method->name }}</option>
                        @endforeach
                    </select>

                </div>

                @if($id_method)
                    <div>
                        <h5>Profile</h5> <span class="float-right">
                        @if($hide_profile=='1')
                                <span class="badge badge-dark">Private</span>
                            @else
                                <span class="badge badge-success">Public</span>
                            @endif
                    </span>
                    </div>

                    <div class="pb-4">

                        <div class="custom-control custom-radio">
                            <input type="radio" id="hide_profiletrue" wire:model="hide_profile"  value="1" class="custom-control-input" checked>
                            <label class="custom-control-label" for="hide_profiletrue">Make donation private</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="hide_profilefalse"  wire:model="hide_profile"  value="0" class="custom-control-input">
                            <label class="custom-control-label" for="hide_profilefalse">Public Donation</label>
                        </div>
                    </div>

                    <div>
                        <h5>Payment Status</h5> <span class="float-right">
                        @if($confirmed=='1')
                                <span class="badge badge-success">Confirmed</span>
                            @else
                                <span class="badge badge-warning">Pending</span>
                            @endif
                    </span>
                    </div>
                    <div class="pb-4">

                        <div class="custom-control custom-radio">
                            <input type="radio" id="confirmedtrue" wire:model="confirmed"  value="1" class="custom-control-input" checked>
                            <label class="custom-control-label" for="confirmedtrue">Payment Confirmed</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="confirmedfalse"  wire:model="confirmed"  value="0" class="custom-control-input">
                            <label class="custom-control-label" for="confirmedfalse">Payment Pending</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="@if($currency==$currency_actual) col-md-6 @else col-md-4 @endif">

                            <div class="form-group">
                                <label>Currency</label>

                                <select class="form-control" wire:model="currency">
                                    <option value="0">Select an option</option>
                                    @foreach($currencies as $value=>$name)
                                        <option value="{{ $value }}">{{ $value }} - {{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="@if($currency==$currency_actual) col-md-6 @else col-md-4 @endif">

                            @if($currency)
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" class="form-control" wire:model="amount" id="amount" >
                                </div>
                            @endif

                        </div>
                        @if($currency!=$currency_actual)
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>{{ $currency_actual }} Amount Received</label>
                                    <input type="number" class="form-control" min="0" wire:model="amount_received" id="amount_received" >
                                </div>
                            </div>
                        @endif
                    </div>



                    @if(strlen($amount)>=1)
                        <div class="card card-body brder-success ">

                            <div class="text-center mb-2">Please Check amount</div>
                            <div class="row">
                                <div class="col-md-6 text-muted font-weight-bolder lead text-right">{{ $currency }}</div>
                                @php
                                    try{
                                        number_format($amount,2);
                                    }catch( Exception $exception){
                                        echo 'Ops';
                                    }
                                @endphp
                                <div class="col-md-6 text-success font-weight-bolder lead">{{ number_format($amount,2)  }}</div>
                            </div>
                            @if($currency!=$currency_actual)
                                <div class="row">
                                    <div class="col-md-6 text-muted font-weight-bolder lead text-right">{{ $currency_actual }}</div>
                                    @if($amount_received)
                                        <div class="col-md-6 text-success font-weight-bolder lead">{{ number_format($amount_received,2)  }}</div>
                                    @else
                                        <div class="col-md-6 text-danger font-weight-bolder lead">--</div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="form- text-center">
                            @if($currency!=$currency_actual)
                                @if($amount_received)
                                    <button class="btn btn-success btn-block" wire:click="registerDonation">Register donation</button>
                                @else
                                    <button class="btn btn-light" disabled>Register donation</button>
                                @endif
                            @else
                                <button class="btn btn-success btn-block" wire:click="registerDonation">Register donation</button>
                            @endif
                        </div>


                    @endif

                @endif

            </div>
        </div>
    </div>


</div>
