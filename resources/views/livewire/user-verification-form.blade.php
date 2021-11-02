<div>
    <form method="post" action="{{route('verification.send')}}">
        @csrf
        @if(!$waiting)
            <div>
                <button type="submit" class="btn btn-primary w-100" id="verification_button">
                    {{__('User.send_again')}}
                </button>
            </div>
        @else
            <div>
                <button wire:poll.1000ms="tick" type="button" class="btn btn-disabled w-100" id="verification_button" disabled>
                    {{__('User.send_again')}} ({{$timer}} s.)
                </button>
            </div>
        @endif
        @if ($status)
            <div class="text-center" id="success">
                <a href="#" class="text-decoration-none"><span class="d-block text-success">{{$status}}</span></a>
            </div>
        @endif

    </form>
</div>
