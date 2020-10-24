<div>
    <div>

        <input type="input" class="form-control" wire:model="search" placeholder="Search ">

        <table class="table table-xs mb-0 border-top-0 table-hover">
            <thead class="thead-light">
            <tr>
                <th class=" border-top-0">#</th>
             {{--   <th class=" border-top-0">Status</th>--}}
                <th class=" border-top-0">Nickname</th>
                <th class=" border-top-0 text-rxight">Steam</th>
                <th class=" border-top-0">Tags</th>
               {{-- <th class=" border-top-0">Password</th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($players as $player)
                <tr>
                    <td>{{ $player->id }}</td>
              {{--      <td>
                        {{ $player->status }}
                    </td>--}}
                    <td>
                        <div>{{ $player->nickname }}</div>
                        <code><small>{{ $player->hash }}</small></code>
                    </td>
                    <td class="text-rigxht">
                        <small>Level: </small>
                        @if($player->steam_level==0 && count($player->steam_tags) == 0)
                            <span class=" text-danger">0</span>
                        @elseif($player->steam_level==0 && count($player->steam_tags) >= 1)
                            <span class=" text-warning">0</span>
                        @endif
                        @if($player->steam_level==1)
                            <span class=" text-primary">1</span>
                        @endif
                        @if($player->steam_level==2)
                            <span class=" text-success">2</span>
                        @endif
                    </td>
                    <td>
                        @foreach($player->steam_tags as $tag)
                            @if($tag=="legacy")
                                <span class="badge badge-primary">{{ $tag }}</span>
                            @elseif($tag=="whitelisted")
                                <span class="badge badge-success">{{ $tag }}</span>
                            @elseif($tag=="vac banned")
                                <span class="badge badge-danger">{{ $tag }}</span>
                            @else
                                <span class="badge badge-primary">{{ $tag }}</span>
                            @endif
                        @endforeach
                    </td>
                   {{-- <td>
                        @if($player->password)
                            with password
                        @else
                            without password
                        @endif
                    </td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center bg-light pt-3 ">
            <div class="d-inline-block">
                {{ $players->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
