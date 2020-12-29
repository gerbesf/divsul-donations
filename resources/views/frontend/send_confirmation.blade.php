@extends('frontend.layout.app')
@section('main')

    <div class="container" style="min-height: 70vh">
        <div class="row justify-content-center ">
            <div class=" col-xl-6">


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
                            <label>{{ ucfirst(__('app.email')) }}</label>
                            <input name="email" type="email" class="form-control" placeholder="{{ ucfirst(__('app.email_placeholder')) }}" >
                            @error('email')
                            <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> {{ __('app.donation_amount') }}</label>
                            <input name="amount" class="form-control money2" placeholder="{{ ucfirst(__('app.amount_placeholder')) }}" >
                            @error('amount')
                            <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="float-right">
                                <button type="button" class="btn btn-link p-0" data-toggle="modal" data-target="#hashModal">
                                    {{ __('app.how_to') }}
                                </button>
                            </div>
                            <label><span class="text-danger">*</span> {{ __('app.hash') }}  </label>
                            <input name="hash" class="form-control " placeholder="{{ ucfirst(__('app.hash_placeholder')) }}" >
                            @error('hash')
                            <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="pb-1">
                            <div>{{ ucfirst(__('app.privacy')) }}</div>
                            <input type="checkbox" name="hide_profile" id="hide_profile" class="checkbox" value="true" >
                            <label for="hide_profile">{{ ucfirst(__('app.hide_profile')) }}</label>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-block">{{ ucfirst(__('app.send_confirmation')) }}</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="hashModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="">
                    <img src="{{ asset('cdhash.jpg') }}" style="width: 100%">
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
