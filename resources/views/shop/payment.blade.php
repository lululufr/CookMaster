<x-header/>

@php

$carts = App\Models\Carts::where('user_id', auth()->user()->id)->get();

@endphp



@php($tt = 0)

<div class="overflow-x-auto">
    <table class="table">
        <!-- head -->
        <thead>
        <tr>
            <th>Prix :</th>
            <th>Article n°</th>
            <th>Nom : °</th>

        </tr>
        </thead>
        <tbody>
        @foreach($carts as $cart)
            @php($tt += $cart->articles->prix)

        <tr>
            <th>{{$cart->articles->prix}} €</th>
            <td>{{$cart->articles->id}}</td>
            <td>{{$cart->articles->titre}}</td>

        </tr>

        @endforeach

        </tbody>
    </table>
</div>
    @if(auth()->user()->buying_plan == 'master')
        @php($tt =($tt * 0.9))
        <b>TOTAL -10% avec master plan : {{$tt}} € </b>
    @else
        <b>TOTAL : {{$tt}} € </b>
    @endif
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-1/2">
            <div class="bg-white rounded-lg shadow-md p-6">
                <ul class="flex bg-light rounded mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                            <i class="fa fa-credit-card"></i> Carte de crédit
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="nav-tab-card">
                        @foreach (['danger', 'success'] as $status)
                            @if(Session::has($status))
                                <p class="alert alert-{{$status}}">{{ Session::get($status) }}</p>
                            @endif
                        @endforeach
                        <form role="form" method="POST" id="paymentForm" action="{{ url('/pay')}}">
                            @csrf
                            <div class="mb-4">
                                <label for="username">Nom complet (on the card)</label>
                                <input type="text" class="input form-input" name="fullName" placeholder="Full Name">
                            </div>
                            <div class="mb-4">
                                <label for="cardNumber">Numero de carte</label>
                                <div class="flex">
                                    <input type="text" class="form-input" name="cardNumber" placeholder="Card Number">
                                    <div class="input-group-append">
                                        <span class="input-group-text text-muted">
                                            <i class="fab fa-cc-visa fa-lg pr-1"></i>
                                            <i class="fab fa-cc-amex fa-lg pr-1"></i>
                                            <i class="fab fa-cc-mastercard fa-lg"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-1/2 pr-2">
                                    <div class="mb-4">
                                        <label><span class="hidden-xs">date d'expiration</span> </label>
                                        <div class="flex">
                                            <select class="form-input mr-2" name="month">
                                                <option value="">MM</option>
                                                @foreach(range(1, 12) as $month)
                                                    <option value="{{$month}}">{{$month}}</option>
                                                @endforeach
                                            </select>
                                            <select class="form-input" name="year">
                                                <option value="">YYYY</option>
                                                @foreach(range(date('Y'), date('Y') + 10) as $year)
                                                    <option value="{{$year}}">{{$year}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 pl-2">
                                    <div class="mb-4">
                                        <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                                        <input type="number" class="form-input" placeholder="CVV" name="cvv">
                                    </div>
                                </div>
                            </div>
                            <button class="subscribe btn btn-primary btn-block mt-4" type="submit">Payer : {{$tt}} €</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">

    $(function() {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>


<x-footer/>
