<div class="editable-wrapper">
    <form wire:submit.prevent="submit">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="input-wrapper mb-4">
            <label class="mb-1">Typ</label>
            <select wire:model="role" class="form-select border-0 py-2" required>
                @if(Auth::user()->role == "admin")
                    <option value="shelter">Schronisko</option>
                    <option value="moderator">Moderator</option>
                @elseif(Auth::user()->role == "moderator")
                    <option value="shelter">Schronisko</option>
                @endif
            </select>
            @error('role') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
        </div>
        <div class="input-wrapper mb-4">
            <label class="mb-1">ID użytkownika</label>
            <input type="text" class="form-control border-0 py-2" wire:model="username" name="username" value="{{$username}}" disabled>
            @error('username') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror

        </div>
        <div class="input-wrapper mb-4">
            <label class="mb-1">Adres e-mail</label>
            <input type="email" class="form-control border-0 py-2" wire:model="email" name="email" value="{{$email}}" required>
            @error('email') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror

        </div>
        <div class="btn-wrapper d-flex gap-4">
            <a href="{{route('account.settings')}}" class="btn btn-primary-light w-50">Anuluj</a>
            <button type="submit" class="btn btn-primary w-50">Zapisz zmiany</button>
        </div>
    </form>
</div>
