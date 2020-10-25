<div>

    <div>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Privacy</th>
                <th>Player</th>
                <th>Method</th>
                <th>Declared</th>
                <th>Received</th>
                <th>Created</th>
                <th>Date Confirmed</th>
            </tr>
            </thead>
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
                    <td>{{ $donation->method->name }}</td>
                    <td>{{ $donation->currency }} <b>{{ $donation->amount }}</b></td>
                    <td>
                        @if($donation->amount_received)
                            {{ $donation->currency_received }} <b> {{ $donation->amount_received }}</b>

                            @if(!$donation->confirmation)
                                <div><button class="btn btn-sm btn-success" wire:click="confirmDonation({{ $donation->id }})">Confirm Balance</button></div>
                            @else
                                AGORA SIM
                            @endif
                        @else
                            <a href="{{ route('donation_confirm',['id'=>$donation->id]) }}" class="btn btn-success btn-sm">Confirm Payment</a>

                        @endif

                    </td>
                    <td>{{ $donation->date_created->format(env('APP_DATEFORMAT')) }}</td>
                    <td>{{ $donation->date_confirmed }}</td>
                </tr>
            @endforeach
        </table>

    </div>
</div>
