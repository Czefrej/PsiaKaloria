@extends('layout.main')

@section('content')

    <div class="account-wrapper mt-md-5 mt-3 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="title text-center mb-4 d-md-block d-block my-5">
                        <h2 class="mt-3">Nie pamiętasz hasła?</h2>
                        <p class="my-5">Na podany adres wyślemy Ci instrukcję resetowania hasła.</p>
                    </div>
                </div>
                <div class="clear-both"></div>
                <div class="col-md-4">
                    <div class="editable-wrapper">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="input-wrapper mb-4">
                                <label class="mb-1" for="email">Adres e-mail</label>
                                <input type="email" id="email" name="email" class="form-control border-0 py-2"  value="{{old('email')}}" required autofocus>
                                <span class="d-block fs-7 fw-light pt-1 text-end text-primary d-none" id="email-error"></span>
                                @if(count($errors) > 0)
                                    @foreach( $errors->all() as $message )
                                        <span class="d-block fs-7 fw-light pt-1 text-end text-primary d-none" id="email-error">{{$message}}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="btn-wrapper d-flex gap-4 mt-4">
                                <button type="submit" class="btn btn-primary w-100" id="reset_button">Resetuj hasło</button>
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

                        <div class="auth-action d-flex justify-content-center mt-4">
                            <a href="{{route('login')}}">Masz już konto? Zaloguj się</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script>
        var timerId = 0;

        jQuery(document).ready(function(){
            jQuery('#reset_button').click(function(e){
                e.preventDefault();
                if (!$('#email').val()){
                    $("#email-error").removeClass('d-none');
                    $("#email-error").html("Wprowadź email");
                    return false;
                }
                $("#email-error").addClass('d-none');

                if(timerId===0) {
                    timerId = setTimer();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "{{ route('password.email') }}",
                        method: 'post',
                        data: {
                            email: $('#email').val()
                        },
                        success: function(result){
                            $("#error").addClass('d-none');
                            $("#success").removeClass('d-none');
                            $("#success-message").html("Instrukcje resetu hasła zostały wysłane emailem.");
                        },
                        error: function(jqXHR, textStatus, errorThrown, a){
                            seconds = 3

                            $.each(jqXHR.responseJSON.errors, function(key,value) {
                                console.log(key+" "+value);
                                $("#"+key+"-error").removeClass('d-none');
                                $("#"+key+"-error").html('<br>'+value);
                            });

                            if(("+jqXHR.status+") === 429){
                                $("#success").addClass('d-none');
                                $("#error").removeClass('d-none');
                                $("#error-message").html("("+jqXHR.status+") "+errorThrown+" "+a);

                                var interval = setInterval(function () {
                                    seconds--;

                                    if(seconds===0){
                                        $("#error").addClass('d-none');
                                        clearInterval(interval);
                                    }

                                }, 1000);
                            }
                        }
                    });
                }
            });
        });

        function setTimer(){
            var seconds = 60;
            $("#reset_button").addClass("btn-disabled").removeClass("btn-primary");
            $("#reset_button").html('Resetuj hasło ('+seconds+' sek.)');
            return setInterval(function () {
                seconds--;
                if (seconds === 0) {
                    $("#reset_button").html('Resetuj hasło');
                    $("#reset_button").removeClass("btn-disabled").addClass("btn-primary");
                    $("#success").addClass('d-none');
                    var temp = timerId;
                    timerId = 0;
                    clearInterval(temp);
                }else{
                    $("#reset_button").html('Resetuj hasło ('+seconds+' sek.)');
                }
            }, 1000);
        }
    </script>
@endpush

