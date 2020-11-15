@extends('frontend.layout.app')
@section('main')

    <div class="container" style="min-height: 70vh">
        <div class="row justify-content-center ">
            <div class=" col-md-4">


                <div class="card card-body">

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('send_register') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label><span class="text-danger">*</span> {{ __('app.donation_method') }}</label>
                            <select class="form-control" name="id_method">
                                <option disabled selected>{{ __('app.donation_method') }}</option>
                                @foreach(\App\Models\DonationsMethods::get() as $method)
                                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                                @endforeach
                            </select>
                            @error('id_method')
                            <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> {{ __('app.currency') }}</label>
                            <select class="form-control" name="currency">
                                <option disabled selected>Select</option>
                                @foreach($currencies as $key=>$name)
                                    <option value="{{ $key }}">{{ $key }} - {{ $name }}</option>
                                @endforeach
                            </select>
                            @error('currency')
                            <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('app.email') }}</label>
                            <input name="email" type="email" class="form-control" placeholder="Your Donation Amount" >
                            @error('email')
                            <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label><span class="text-danger">*</span> {{ __('app.donation_amount') }}</label>
                            <input name="amount" class="form-control money2" placeholder="Your Donation Amount" >
                            @error('amount')
                            <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> {{ __('app.hash') }}  </label>
                            <input name="hash" class="form-control " placeholder="Your Hash ID" >
                            @error('amount')
                            <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="pb-1">
                            <div>{{ __('app.privacy') }}</div>
                            <input type="checkbox" name="hide_profile" id="hide_profile" class="checkbox" value="true" >
                            <label for="hide_profile">{{ __('app.hide_profile') }}</label>

                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-block">Register</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection
@section('js-footer')
    <script>

        (function( $ ) {
            $(function() {
                // O seu código com dolar aqui
                $('.money2').mask("#.##0,00", {reverse: true});
            });
        })(jQuery);

    </script>
@endsection
