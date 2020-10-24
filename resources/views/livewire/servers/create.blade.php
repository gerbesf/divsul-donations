<div>
    <form wire:submit.prevent="submit">

        <h6 class="mt-3">Server Information</h6>

        <div class="form-group">
            <label for="exampleInputEmail1">Name of server</label>
            <input type="text" class="form-control" wire:model="name" placeholder="Ex: Divsul.org - BRA">
            @error('name') <span class="small text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">IP Address</label>
            <input type="text" class="form-control" wire:model="ip_address" placeholder="To find server on Prspy">
            @error('ip_address') <span class="small text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">URI to cd_hash_main.txt</label>
            <input type="text" class="form-control" wire:model="endpoint_cd_hash" placeholder="http://your.cdn/cdhash_main.txt">
            @error('name') <span class="small text-danger">{{ $message }}</span> @enderror
        </div>



        <div class="mb-3">

            <div class="border rounded ">
                <div class="p-3">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input input-primary" value="1" wire:model="endpoint_protected" id="endpoint_protected" checked>
                        <label class="custom-control-label" for="endpoint_protected">Server with http password</label>
                    </div>
                </div>


                @if($endpoint_protected)
                    <div class="p-3 border-top bg-light">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" wire:model="endpoint_username" placeholder="Username">
                        </div>
                    </div>
                    <div class="p-3 border-top bg-light">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" class="form-control" wire:model="endpoint_password" placeholder="Password">
                        </div>
                    </div>
                @endif

            </div>


        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
