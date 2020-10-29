<div>
    <div>

        <form wire:submit.prevent="submit">

            <h6 class="mt-3">Description</h6>

            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" class="form-control" wire:model="description" placeholder="Ex: DDOS Protection">
                @error('description') <span class="small text-danger">{{ $message }}</span> @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Amount</label>
                <input type="text" class="form-control" wire:model="amount" placeholder="">
                @error('amount') <span class="small text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>


        </form>
    </div>

</div>
