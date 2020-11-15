<div>

    <div class="card">

        <table class="table border-0 mb-0">
            <thead>
            <tr>
                <th class="border-top-0">ID</th>
                <th class="border-top-0">Status</th>
                <th class="border-top-0">Privacy</th>
                <th class="border-top-0">Player</th>
                <th class="border-top-0">Method</th>
                <th class="border-top-0">Declared</th>
                <th class="border-top-0">Received</th>
                <th class="border-top-0">Created</th>
                @if( request()->get('confirmed') == 'true')
                <th class="border-top-0">Date Confirmed</th>
                @endif
                <th class="border-top-0">Action</th>
            </tr>
            </thead>
            @if( count($donations)==0)
                <tr>
                    <td>Empty</td>
                </tr>
            @endif
            @foreach($donations as $donation)
                <tr>
                    <td>{{ $donation->id }}</td>
                    <td>
                        @if($donation->confirmed)
                            <span class="badge badge-success">Confirmed</span>
                        @else
                            <span class="badge badge-danger">Pending</span>
                        @endif
                    </td>
                    <td>
                        @if($donation->hide_profile)
                            <span class="badge badge-dark">Private</span>
                        @else
                            <span class="badge badge-primary">Public</span>
                        @endif
                    </td>
                    <td>{{ $donation->profile->nickname }}</td>
                    <td>
                        <div>{{ $donation->method->name }}</div>
                        <div><small>{{ $donation->email }}</small></div>
                    </td>
                    <td>{{ $donation->currency }} <b>{{ $donation->amount }}</b></td>
                    <td>
                        @if($donation->amount_received)
                            {{ $donation->currency_received }} <b> {{ number_format($donation->amount_received )}}</b>
                        @else
                            @livewire('donations.input-set-amount',['id'=>$donation->id])
                        @endif

                    </td>

                    <td>{{ $donation->date_created->format(env('APP_DATEFORMAT')) }}</td>
                    @if( request()->get('confirmed') == 'true')
                    <td>{{ $donation->date_confirmed }}</td>
                    @endif
                    <td style="white-space: nowrap">
                        @if(!$donation->confirmed)
                            @if($donation->amount_received)
                            <span><button class="btn btn-sm btn-success" wire:click="confirmDonation({{ $donation->id }})">Confirm Payment</button></span>
                            @endif
                            <span><button class="btn btn-sm btn-danger" wire:click="denyDonation({{ $donation->id }})">Deny Payment</button></span>
                        @else
                            @if(!$donation->confirmation)
                                <a href="{{ route('donation_confirm',['id'=>$donation->id]) }}" class="btn btn-success btn-sm">Force Balance</a>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
</div>
