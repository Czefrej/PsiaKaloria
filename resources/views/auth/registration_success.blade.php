@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="title text-center mb-4 d-md-block d-block my-5">
                        <img src="{{ asset('images/smile_icon.svg') }}" alt="">
                        <h2 class="mt-5">Potwierdź swój adres e-mail</h2>
                        <p class="mt-4 mb-5 fw-light">Dziękujemy za rejestrację, na Twój adres e-mail wysłaliśmy wiadomość z prośbą o potwierdzenie.</p>
                    </div>
                </div>
                <div class="clear-both"></div>
                <div class="col-md-4">
                    <div class="text-center">
                        <a href="#" class="text-decoration-none"><span class="d-block text-muted">Brak wiadomości?</span></a>
                    </div>
                    <form method="post" action="{{route('verification.send')}}">
                        @csrf
                        <div>
                            <button type="submit" class="btn btn-primary w-100" id="verification_button">Wyślij ponownie</button>
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
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ route('verification.send') }}",
                    method: 'post',
                    success: function(result){
                        $("#error").addClass('d-none');
                        $("#success").removeClass('d-none');
                        $("#success-message").html("Wiadomość została ponownie wysłana na maila.");

                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        seconds = 3
                        $("#success").addClass('d-none');
                        $("#error").removeClass('d-none');
                        $("#error-message").html("("+jqXHR.status+") "+errorThrown);
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
        $("#verification_button").html('Wyślij ponownie ('+seconds+' sek.)');
        return setInterval(function () {
            seconds--;
            if (seconds === 0) {
                $("#verification_button").html('Wyślij ponownie');
                $("#verification_button").removeClass("btn-disabled").addClass("btn-primary");
                $("#success").addClass('d-none');
                var temp = timerId;
                timerId = 0;
                clearInterval(temp);
            }else{
                $("#verification_button").html('Wyślij ponownie ('+seconds+' sek.)');
            }
        }, 1000);
    }
    </script>
@endpush

