<div>


    <form class="my-5" wire:submit.prevent="doLogin">
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" wire:model="username" placeholder="Ex. Ferreira">
            @error('username') <span class="text-danger small">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" wire:model="password">
            @error('password') <span class="text-danger small">{{ $message }}</span> @enderror

        </div>
        @if (session()->has('message'))
            <div class="alert alert-primary">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block mb-4" wire:disabled="logging">Login</button>
        </div>
    </form>
</div>

