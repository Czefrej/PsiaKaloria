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
            <button id="submit" class="btn btn-success d-md-block d-none mt-4" >
                <div class="spinner hidden" id="spinner"></div>
                <span id="button-text">Złóż zamówienie</span>
            </button>

            <div id="payment-message" class="hidden"></div>
        </form>

    </div>
</div>

@push('after-scripts')
    <script>

        // A reference to Stripe.js initialized with a fake API key.
        const stripe = Stripe("pk_test_51JKf2OGrivn86OaPn2cKDpyCkXgP3K3HDjeJYMBJPXTniIXYA1Ia5ZNb1gj8CJx9Wz8WA1pPACztH6oWRrxaTf5Q00rivkH4rG",{
            locale: 'pl'
        });

        let elements;
        var data;
        var email;
        var country;
        var name;

        window.addEventListener('initPayment', event => {
            data = { payment: event.detail.payment , user:event.detail.user};
            initialize();
            checkStatus();
            document
                .querySelector("#payment-form")
                .addEventListener("submit", handleSubmit);
        });

        window.addEventListener('passData',event=>{
            email = event.detail.email;
            country = event.detail.country;
            name = event.detail.name;
        });

        // Fetches a payment intent and captures the client secret
        async function initialize() {
            console.log(data);
            const { clientSecret } = await fetch("/create", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ data }),
            }).then((r) => r.json());

            elements = stripe.elements({ clientSecret });

            const paymentElement = elements.create("payment",{
                fields: {
                    billingDetails: {
                        name: 'never',
                        email: 'never',
                        address: {
                            country: 'never'
                        }
                    }
                }});
            paymentElement.mount("#payment-element");
        }

        async function handleSubmit(e) {
            e.preventDefault();
            console.log(@this.call('test'))
            setLoading(true);
            const { error } = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: "http://localhost:8001/order",
                    payment_method_data:{
                        billing_details: {
                            name: name,
                            email: "wiktor.jeffery@gmail.com",
                            address: {
                                country: "PL"
                            }
                        }
                    }
                },
            });

            // This point will only be reached if there is an immediate error when
            // confirming the payment. Otherwise, your customer will be redirected to
            // your `return_url`. For some payment methods like iDEAL, your customer will
            // be redirected to an intermediate site first to authorize the payment, then
            // redirected to the `return_url`.
            if (error.type === "card_error" || error.type === "validation_error") {
                showMessage(error.message);
            } else {
                showMessage("An unexpected error occured.");
            }

            setLoading(false);
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
            } else {
                document.querySelector("#submit").disabled = false;
                document.querySelector("#spinner").classList.add("hidden");
                document.querySelector("#button-text").classList.remove("hidden");
            }
        }
    </script>
@endpush
