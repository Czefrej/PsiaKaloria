@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="title text-center mb-4 d-md-block d-block my-5">
                        <img src="{{ asset('images/smile_icon.svg') }}" alt="">
                        <h2 class="mt-5">{{__('User.confirm_your_email')}}</h2>
                        <p class="mt-4 mb-5 fw-light">{{__('User.thank_you_for_registration')}}</p>
                    </div>
                </div>
                <div class="clear-both"></div>
                <div class="col-md-4">
                    <div class="text-center">
                        <a href="#" class="text-decoration-none"><span class="d-block text-muted">{{__('User.no_mail')}}</span></a>
                    </div>
                    <form method="post" action="{{route('verification.send')}}">
                        @csrf
                        <div>
                            <button type="submit" class="btn btn-primary w-100" id="verification_button">{{__('User.send_again')}}</button>
                        </div>
                        @if (session('status'))
                            <div class="text-center" id="success">
                                <a href="#" class="text-decoration-none"><span class="d-block text-success">{{session('status')}}</span></a>
                            </div>
                        @endif
                        <div class="text-center d-none" id="success">
                            <a href="#" class="text-decoration-none"><span class="d-block text-success" id="success-message"></span></a>
                        </div>
                        <div class="text-center d-none" id="error">
                            <a href="#" class="text-decoration-none"><span class="d-block text-primary" id="error-message"></span></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script>
    var timerId = 0;

    jQuery(document).ready(function(){
        jQuery('#verification_button').click(function(e){
            e.preventDefault();
            if(timerId===0) {
                timerId = setTimer();
                $.ajaxSetup({
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ route('verification.send') }}",
                    method: 'post',
                    dataType:'JSON',
                    success: function(result, textStatus, xhr){
                        if(xhr.status < 400){
                            $("#error").addClass('d-none');
                            $("#success").removeClass('d-none');
                            $("#success-message").html(result.status);
                        }else{
                            $("#success").addClass('d-none');
                            $("#error").removeClass('d-none');
                            $("#error-message").html("("+result.status+") ");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log(jqXHR);
                        console.log(errorThrown);
                        seconds = 20
                        $("#success").addClass('d-none');
                        $("#error").removeClass('d-none');
                        if(jqXHR.status === 429)
                            $("#error-message").html("("+jqXHR.status+") "+'{{__('Exceptions.429')}}');
                        else $("#error-message").html("("+jqXHR.status+") "+errorThrown);
                        var interval = setInterval(function () {
                            seconds--;

                            if(seconds===0){
                                $("#error").addClass('d-none');
                                clearInterval(interval);
                            }

                        }, 1000);
                    }
                });
            }
        });
    });

    function setTimer(){
        var seconds = 60;
        $("#verification_button").addClass("btn-disabled").removeClass("btn-primary");
        $("#verification_button").html('{{__('User.send_again')}} ('+seconds+' sek.)');
        return setInterval(function () {
            seconds--;
            if (seconds === 0) {
                $("#verification_button").html('{{__('User.send_again')}}');
                $("#verification_button").removeClass("btn-disabled").addClass("btn-primary");
                $("#success").addClass('d-none');
                var temp = timerId;
                timerId = 0;
                clearInterval(temp);
            }else{
                $("#verification_button").html('{{__('User.send_again')}} ('+seconds+' sek.)');
            }
        }, 1000);
    }
    </script>
@endpush

