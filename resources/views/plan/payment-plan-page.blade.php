<x-header/>

<h2>TOTAL : {{$prix}}</h2>


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
                        <form role="form" method="POST" id="paymentForm" action="/plan/purchase/{{$plan}}/{{$time}}">
                            @csrf
                            <div class="mb-4">
                                <label for="username">Nom complet sur la carte</label>
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
                            <button class="subscribe btn btn-primary btn-block mt-4" type="submit">Payer : {{$prix}} €</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer/>
