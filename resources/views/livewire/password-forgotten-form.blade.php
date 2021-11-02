<div class="editable-wrapper">
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="input-wrapper mb-4">
            <label class="mb-1" for="email">{{__('User.email')}}</label>
            <input type="email" id="email" name="email" class="form-control border-0 py-2"  value="{{$old_email ?? ''}}" required autofocus>
            <span class="d-block fs-7 fw-light pt-1 text-end text-primary d-none" id="email-error"></span>
            @if(count($errors) > 0)
                @foreach( $errors->all() as $message )
                    <span class="d-block fs-7 fw-light pt-1 text-end text-primary" id="email-error">{{$message}}</span>
                @endforeach
            @endif
        </div>
        @if(!$waiting)
            <div class="btn-wrapper d-flex gap-4 mt-4">
                <button type="submit" class="btn btn-primary w-100" id="verification_button">
                    {{__('User.reset_password')}}
                </button>
            </div>
        @else
            <div class="btn-wrapper d-flex gap-4 mt-4">
                <button wire:poll.1000ms="tick" type="button" class="btn btn-disabled w-100" id="verification_button" disabled>
                    {{__('User.reset_password')}} ({{$timer}} s.)
                </button>
            </div>
        @endif

        @if ($status)
            <div class="text-center" id="success">
                <a href="#" class="text-decoration-none"><span class="d-block text-success">{{$status}}</span></a>
            </div>
        @endif
    </form>

    <div class="auth-action d-flex justify-content-center mt-4">
        <a href="{{route('login')}}">{{__('User.already_have_an_account')}}</a>
    </div>
</div>
