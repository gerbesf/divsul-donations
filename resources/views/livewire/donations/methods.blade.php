<div>
    <div class="row">
        <div class="col-md-4">

            <table class="table table-sm border bg-white table-hover">
                <thead class="thead-light">
                <tr>
                    <th class="text-center">Logo</th>
                    <th class="w-50">Name</th>
                    <th>Modify</th>
                </tr>
                </thead>
                @if(count($methods)==0)
                    <tr>
                        <td colspan="3">No have methods</td>
                    </tr>
                @endif
                @foreach($methods as $method)
                <tr>
                    <td class="text-center"><img src="{{ $method->logo }}" style="height: 64px"></td>
                    <td class="align-middle lead">{{ $method->name }}</td>
                    <td class="align-middle"><button class="btn btn-sm btn-primary" wire:click="modify('{{ $method->id }}')">Editar</button></td>
                </tr>
                @endforeach
            </table>

        </div>

        <div class="col-md-8">

            <div class="card card-body">
                @if($modify_id)
                    <h4>Modify Method</h4>
                    <form wire:submit.prevent="updateMethod">
                @else
                    <h4>Create Method</h4>
                        <form wire:submit.prevent="createMethod">
                @endif

                <div class="form-group">
                    <label class="label">Name</label>
                    <input type="text" class="form-control" wire:model="name">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="label">URI from logo</label>
                    <input type="text" class="form-control" wire:model="logo">
                    @error('logo') <span class="error">{{ $message }}</span> @enderror
                </div>


                <div class="form-group">
                    <label class="label">Content Instructions</label>
                    <textarea rows="15" wire:model="content" class="form-control"></textarea>
                    @error('content') <span class="error">{{ $message }}</span> @enderror
                </div>


                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        @if($modify_id)
                            Modify
                        @else
                            Create
                        @endif
                    </button>
                    @if($modify_id)
                        <button class="btn btn-danger" type="button" wire:click="destroy"> Destroy</button>
                    @endif
                </div>

            </form>

        </div>
        </div>
    </div>
</div>
