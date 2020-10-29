<div>

    <div>
        <div class="row">

            @foreach ($servers as $server)

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="d-inline-flex align-items-end justify-content-end">
                                <span class="fas fa-database h1"></span>
                            </div>

                            @if($server->status=="updating")
                               <div>
                                   <div class="spinner-grow spinner-grow-sm" role="status">
                                       <span class="sr-only">Loading...</span>
                                   </div>
                               </div>
                            @endif
                            <h5 class="mt-4 text-dark">{{ $server->name }}</h5>
                            @if($server->endpoint_protected)
                                <small class="text-success"> <span class="fas fa-shield-alt"></span> Protected</small>
                            @else
                                <small class="text-warning"> <span class="fas fa-eye"></span> Public link</small>
                            @endif


                            @if($server->status=="updating")
                               <div> <span class="text-warning">Updating Profiles</span></div>
                            @endif

                            @if($server->status=="active")
                               <div> <span class="text-success">Active</span></div>
                            @endif

                            @if($server->status=="error")
                               <div> <span class="text-danger">Error</span></div>
                            @endif

                            <div class="pt-2 small">
                                Updated at: {{ $server->updated_at->diffForHumans() }}
                            </div>

                        </div>
                        <div class="text-center ">
                            <div class="row justify-content-center no-gutters pb-4">
                                <div class="col-md-4">
                                    <a class="btn btn-xs rounded-0 btn-primary btn-block" href="{{ route('server_modify',['id'=>$server->id]) }}" >
                                      <span class=" fas fa-edit"></span>  Modify</a>
                                </div>{{--
                                <div class="col-md-4">
                                    <a class="btn btn-xs rounded-0 btn-info btn-block" href="#" wire:click="syncServer('{{ $server->id }}')" >
                                        <span class=" fas fa-cloud-download-alt"></span>    Sync </a>
                                </div>--}}
                                <div class="col-md-4">
                                    <a class="btn btn-xs rounded-0 btn-dark btn-block" href=" {{ route('server_destroy',['id'=>$server->id]) }}">
                                        <span class=" fas fa-trash"></span>    Destroy </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        @if(count($servers) == 0)


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body">
                        <div class="">
                            <div class="" role="alert">
                                <h3 class="alert-heading"><i class="fas fa-database"></i> No have servers</h3>
                                <hr>
                                <p class="mb-0"><a href="{{ route('server_create') }}">Click here</a> to create a new Server</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endif

        {{ $servers->links() }}
    </div>

</div>
