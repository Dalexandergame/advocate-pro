<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'AdvocatePRO') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/checkout.css') }}" rel="stylesheet">
  <style>
    body {
      font-family: 'Nunito', sans-serif;
      background-color: gray;

    }
  </style>

</head>

<body>
<!-- card payment Modal -->
    <div class="modal-content" style="width: 796px; height: 350px; margin-left: 28%; margin-top:100px">

        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.href='{{ url('./') }}'">
                <span aria-hidden="true" style="font-size: 50px;">&times;</span>
            </button>
            <div class="ml-5">
                <form method="POST" action="{{ route('pay.post', $mission->id) }}" class="card-form mt-3 mb-3">
                    @csrf

                    <div class="mb-3 ml-3"><strong>Total:</strong> {{$mission->cout}} Dhs</div>
                    <input type="hidden" name="payment_method" class="payment-method">
                    <input class="StripeElement mb-4 ml-3" name="card_holder_name" placeholder="Card holder name" required>
                    <div class="col-lg-6 col-md-8">
                        <div id="card-element"></div>
                    </div>
                    <div class="mt-3 ml-4" id="card-errors" role="alert"></div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary pay px-3 ml-3">
                            Payez
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#btnx").click(function() {
            $("#infosuser").toggle();
            $("#btnx").toggle();
        });
    });
    </script>

    <script>
        let stripe = Stripe("{{ env('STRIPE_KEY') }}")
        let elements = stripe.elements()
        let style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        }
        let card = elements.create('card', {style: style})
        card.mount('#card-element')
        let paymentMethod = null
        $('.card-form').on('submit', function (e) {
            $('button.pay').attr('disabled', true)
            if (paymentMethod) {
                return true
            }
            stripe.confirmCardSetup(
                "{{ $intent->client_secret }}",
                {
                    payment_method: {
                        card: card,
                        billing_details: {name: $('.card_holder_name').val()}
                    }
                }
            ).then(function (result) {
                if (result.error) {
                    $('#card-errors').text(result.error.message)
                    $('button.pay').removeAttr('disabled')
                } else {
                    paymentMethod = result.setupIntent.payment_method
                    $('.payment-method').val(paymentMethod)
                    $('.card-form').submit()
                }
            })
            return false
        })
    </script>
</body>