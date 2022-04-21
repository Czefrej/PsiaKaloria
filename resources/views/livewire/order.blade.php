<div>
        <div class="container">
            <div class="row mt-5">
                <div class="col-4">
                    <div class="progress-item active"></div>
                    <span>Twój koszyk</span>
                </div>
                <div class="col-4">
                    <div class="progress-item active"></div>
                    <span>Dostawa i płatność</span>
                </div>
                <div class="col-4">
                    <div class="progress-item"></div>
                    <span>Gotowe</span>
                </div>
            </div>
            <div class="row mt-4 mb-5">

                <div class="col-lg-8">
                    <div wire:key="guest-shelter-form">
                        <div class="card p-4">
                            <div class="title d-flex align-items-center">
                                <h2 class="m-0">Wspierane schronisko</h2>
                            </div>
                            <div class="input-wrapper mt-4">
                                <label class="fw-light">Wybierz z listy schronisko, które chciałbyś wesprzeć naszą karmą.</label>
                                <select class="form-select border-0 py-2 mt-4" wire:model="shelter_id">
                                    @foreach($shelters as $s)
                                        <option value="{{$s->id}}">{{$s->name}} </option>
                                    @endforeach
                                </select>
                                @error('shelter_id') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="card p-4 mt-4">
                            <div class="title d-flex align-items-center">
                                <h2 class="m-0">Twoje dane</h2>
                                <span class="text-muted ms-5 d-md-block d-none">Masz konto? Zaloguj się</span>
                                <span class="text-muted ms-5 d-md-block d-none"><a href="#" wire:click.prevent="fillForm">Wypełnij.</a></span>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    {{--                <div class="checkbox-wrapper">--}}
                                    {{--                    <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" name="invoice" wire:model="company">--}}
                                    {{--                    <label for="styled-checkbox-1">Chcę otrzymać fakture</label>--}}
                                    {{--                </div>--}}
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="btn-group mt-4 d-flex gap-4">
                                                <a href="#" class="btn @if($company) btn-gray-outline @else btn-primary-outline @endif" wire:click.prevent="setCompanyPurchase(false)">osoba prywatna</a>
                                                <a href="#" class="btn @if($company) btn-primary-outline @else btn-gray-outline @endif" wire:click.prevent="setCompanyPurchase(true)">firma</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input hidden wire:model="company">
                            @if($company)
                                <div class="row mt-4">
                                    <div class="col-md-6 col-12">
                                        <div class="input-wrapper">
                                            <label class="fw-light">Nazwa firmy</label>
                                            <input type="text" class="form-control border-0 py-2" wire:model.lazy="company_name">
                                            @error('company_name') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-md-0 mt-3">
                                        <div class="input-wrapper">
                                            <label class="fw-light">NIP</label>
                                            <input type="text" class="form-control border-0 py-2" wire:model.lazy="tax_id">
                                            @error('tax_id') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row mt-4">
                                    <div class="col-md-6 col-12">
                                        <div class="input-wrapper">
                                            <label class="fw-light">Imię</label>
                                            <input type="text" class="form-control border-0 py-2" wire:model.lazy="name">
                                            @error('name') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-md-0 mt-3">
                                        <div class="input-wrapper">
                                            <label class="fw-light">Nazwisko</label>
                                            <input type="text" class="form-control border-0 py-2" wire:model.lazy="surname">
                                            @error('surname') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row mt-4">
                                <div class="col-md-6 col-12">
                                    <div class="input-wrapper">
                                        <label class="fw-light">Adres e-mail</label>
                                        <input type="email" class="form-control border-0 py-2" wire:model.lazy="email">
                                        @error('email') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mt-md-0 mt-3">
                                    <div class="input-wrapper">
                                        <label class="fw-light">Numer telefonu</label>
                                        <input type="text" class="form-control border-0 py-2" wire:model.lazy="phone">
                                        @error('phone') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="title d-flex align-items-center mt-4">
                                <h2 class="m-0">Adres</h2>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6 col-12">
                                    <div class="input-wrapper">
                                        <label class="fw-light">Ulica i numer</label>
                                        <input type="text" class="form-control border-0 py-2" wire:model.lazy="address">
                                        @error('address') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2 col-5 mt-md-0 mt-3">
                                    <div class="input-wrapper">
                                        <label class="fw-light">Kod pocztowy</label>
                                        <input type="text" class="form-control border-0 py-2" wire:model.lazy="postal">
                                        @error('postal') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-7 mt-md-0 mt-3">
                                    <div class="input-wrapper">
                                        <label class="fw-light">Miejscowość</label>
                                        <input type="text" class="form-control border-0 py-2" wire:model.lazy="city">
                                        @error('city') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mt-md-0 mt-3">
                                    <div class="input-wrapper mt-md-4 mt-0">
                                        <label class="fw-light">Kraj</label>
                                        <select class="form-select border-0 py-2" wire:model="country">
                                            <option value="PL">Polska</option>
                                        </select>
                                        @error('country') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                {{--            <div class="col-md-6 col-12 mt-md-0 mt-3">--}}
                                {{--                <div class="input-wrapper mt-md-4 mt-0">--}}
                                {{--                    <label class="fw-light">Kraj</label>--}}
                                {{--                    <input type="text" class="form-control border-0 py-2">--}}
                                {{--                </div>--}}
                                {{--            </div>--}}
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" wire:model="register">
                                    <label for="styled-checkbox-2">Chcę założyć konto, a zarazem zgadzam oświadczam, że zapoznałem się z Polityką prywatności i Warunkami Umowy Psia Kaloria <img src="{{ asset('images/info_icon.svg') }}" alt=""></label>

                                    @if($register)
                                        <div class="row mt-4">
                                            <div class="col-md-6 col-12">
                                                <div class="input-wrapper">
                                                    <label class="fw-light">Hasło</label>
                                                    <input type="password" wire:model.lazy="password" class="form-control border-0 py-2">
                                                    @error('password') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mt-md-0 mt-3">
                                                <div class="input-wrapper">
                                                    <label class="fw-light">Potwierdź hasło</label>
                                                    <input type="password" wire:model.lazy="password_confirmation" class="form-control border-0 py-2">
                                                    @error('password_confirmation') <span class="d-block fs-7 fw-light pt-1 text-end text-primary">{{$message}}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @livewire('delivery-method-form',['donation'=>$donation,'country_cca2'=>'PL'],key('delivery_method'))

                    @livewire('payment-method-form',['donation'=>$donation,'country_cca2'=>'PL'],key('payment_method'))

                    <div class="card p-4 mt-4 pb-4 pt-5">
                        <label class="mb-2">Informacje do zamówienia <span class="text-muted ps-2">(opcjonalnie)</span></label>
                        <textarea wire:model.debounce.1000ms="note" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>

                <div class="col-lg-4 mt-lg-0 mt-md-4 mt-4">
                    <div class="card py-4 px-4">
                        <div class="title">
                            <h2>Podsumowanie</h2>
                        </div>
                        <div class="d-flex gap-4 mt-4 total-item">
                            <span class="text-muted">Rodzaj</span>
                            <span>jednorazowy zakup</span>
                        </div>
                        <div class="d-flex gap-4 mt-3 total-item">
                            <span class="text-muted">Wysyłka</span>
                            <span>1-2 dni robocze</span>
                        </div>
                        <div class="d-flex gap-4 mt-3 total-item">
                            <span class="text-muted">Wartość <br> produktów</span>
                            <span>{{$price}} zł</span>
                        </div>
                        <div class="d-flex gap-4 mt-3 total-item">
                            <span class="text-muted">Dostawa</span>
                            <span>@if($delivery != null) @if($delivery_price == 0) gratis @else {{$delivery_price}} zł @endif @else Wybierz sposób dostawy @endif</span>
                        </div>
                        {{--        <div class="d-flex gap-4 mt-3 total-item">--}}
                        {{--            <span class="text-muted">Rabat</span>--}}
                        {{--            <span class="text-primary">-19,80 zł</span>--}}
                        {{--        </div>--}}
                        <div class="d-flex justify-content-between mt-4 align-items-center">
                            <span class="fs-5 fw-light">Łącznie do zapłaty</span>
                            <span class="fs-4 fw-bold">{{$price + $delivery_price}} zł</span>
                        </div>
                        <form id="payment-form">
                            <div id="payment-element">
                                <!--Stripe.js injects the Payment Element-->
                            </div>
                            <button id="submit" class="btn @if($buy_button) btn-primary @else btn-disabled @endif d-md-block d-none mt-4 w-100"  @if(!$buy_button) disabled @endif>
                                <div class="spinner hidden" id="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>
                                <span id="button-text">Złóż zamówienie</span>
                            </button>

                            <div id="payment-message" class="hidden"></div>
                        </form>
                    </div>
                </div>

{{--                @livewire('order-summary',['subscription'=>$subscription,'donation'=>$donation])--}}
            </div>
        </div>
        <div class="container d-md-none sticky-btn-wrapper position-sticky bottom-0">
            <div class="bg-white pt-4 pb-4 px-4">
                <button class="btn btn-success d-block w-100" @if(!$buy_button) disabled @endif>Złóż zamówienie</button>
            </div>
        </div>
</div>

@push('after-scripts')
    <script>

        // A reference to Stripe.js initialized with a fake API key.
        const stripe = Stripe("pk_test_51JKf2OGrivn86OaPn2cKDpyCkXgP3K3HDjeJYMBJPXTniIXYA1Ia5ZNb1gj8CJx9Wz8WA1pPACztH6oWRrxaTf5Q00rivkH4rG",{
            locale: 'pl'
        });

        let elements;
        let data;
        let ready = false;

        window.addEventListener('initPayment', event => {
            data = { dp:event.detail.dp , user:event.detail.user, idempotent_id:@this.idempotent_id, donation:@this.donation, sh_id:@this.shelter_id, note:@this.note, company_purchase:@this.company, email:@this.email};
            setLoading(true);
            initialize();
            checkStatus();
        });

        document
            .querySelector("#payment-form")
            .addEventListener("submit", handleSubmit);


        // Fetches a payment intent and captures the client secret
        async function initialize() {
            ready = false;
            const { clientSecret } = await fetch("/create", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ data }),
            }).then((r) =>{
                return r.json();
            });

            elements = stripe.elements({ clientSecret });

            const paymentElement = elements.create("payment",{
                fields: {
                    billingDetails: {
                        name: 'never',
                        email: 'never',
                        address: {
                            country: 'never',
                            postalCode: 'never'
                        },
                        phone: 'never'
                    }
                }});
            paymentElement.mount("#payment-element");
            setLoading(false);
            ready=true;
        }

        async function handleSubmit(e) {
            e.preventDefault();
            if(ready) {
                if (@this.valid) {
                    setLoading(true);
                    const {error} = await stripe.confirmPayment({
                        elements,
                        confirmParams: {
                            // Make sure to change this to your payment completion page
                            return_url: '{{ route('fulfill-order') }}',
                            shipping: {
                                address: {
                                    city: @this.shelter_city,
                                    country: @this.shelter_country,
                                    line1: @this.shelter_address,
                                    postal_code: @this.shelter_postal,
                                },
                                name: @this.shelter_name,
                                carrier: @this.dp,
                                phone: @this.shelter_phone,
                            },
                            payment_method_data: {
                                billing_details: {
                                    name: @this.fullname,
                                    email: @this.email,
                                    address: {
                                        country: @this.country,
                                        line1: @this.address,
                                        line2: @this.tax_number,
                                        city: @this.city,
                                        postal_code: @this.postal

                                    },
                                    phone: @this.phone
                                },
                            }
                        }
                    });

                    // This point will only be reached if there is an immediate error when
                    // confirming the payment. Otherwise, your customer will be redirected to
                    // your `return_url`. For some payment methods like iDEAL, your customer will
                    // be redirected to an intermediate site first to authorize the payment, then
                    // redirected to the `return_url`.
                    if (error.type === "card_error" || error.type === "validation_error") {
                        alert(error.message);
                        showMessage(error.message);
                    } else {
                        alert(error.message);
                        showMessage("An unexpected error occured.");
                    }

                    initialize();
                    setLoading(false);
                } else {
                    initialize();
                    checkStatus();
                }

            }
        }

        // Fetches the payment intent status after payment submission
        async function checkStatus() {
            const clientSecret = new URLSearchParams(window.location.search).get(
                "payment_intent_client_secret"
            );
            if (!clientSecret) {
                return;
            }

            const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

            switch (paymentIntent.status) {
                case "succeeded":
                    showMessage("Payment succeeded!");
                    break;
                case "processing":
                    showMessage("Your payment is processing.");
                    break;
                case "requires_payment_method":
                    showMessage("Your payment was not successful, please try again.");
                    break;
                default:
                    showMessage("Something went wrong.");
                    break;
            }
        }

        // ------- UI helpers -------

        function showMessage(messageText) {
            const messageContainer = document.querySelector("#payment-message");

            messageContainer.classList.remove("hidden");
            messageContainer.textContent = messageText;

            setTimeout(function () {
                messageContainer.classList.add("hidden");
                messageText.textContent = "";
            }, 4000);
        }

        // Show a spinner on payment submission
        function setLoading(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("#submit").disabled = true;
                document.querySelector("#spinner").classList.remove("hidden");
                document.querySelector("#button-text").classList.add("hidden");
                document.querySelector("#submit").classList.remove("btn-primary");
                document.querySelector("#submit").classList.add("btn-disabled");
            } else {
                document.querySelector("#submit").disabled = false;
                document.querySelector("#spinner").classList.add("hidden");
                document.querySelector("#button-text").classList.remove("hidden");
                document.querySelector("#submit").classList.remove("btn-disabled");
                document.querySelector("#submit").classList.add("btn-primary");
            }
        }
    </script>
@endpush
