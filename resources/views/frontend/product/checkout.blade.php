@extends('frontend.master')
@section('content')

    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('product.cart') }}">Cart</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
        <div class="ps-checkout ps-section--shopping" style="padding:40px 0">
            <div class="container">
                <div class="ps-section__header" style="padding-bottom: 40px">
                    <h1>Checkout</h1>
                </div>
                <div class="ps-section__content">
                    <form class="ps-form--checkout" action="{{ route('payment') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">
                                <div class="ps-form__billing-info">
                                    <h3 class="ps-form__heading">Delivery Information</h3>





                                    <div class="form-group">
                                        <label>Name<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control  @error('name') is-invalid @enderror" type="text"
                                                @if (Hel::deliveryDetails(Auth::user()->id))
                                            value="{{ Hel::deliveryDetails(Auth::user()->id)->name }}"
                                            @endif
                                            required name="name">
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Phone<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control  @error('phone') is-invalid @enderror" required
                                                type="text" name="phone" @if (Hel::deliveryDetails(Auth::user()->id))
                                            value="{{ Hel::deliveryDetails(Auth::user()->id)->phone }}"
                                            @endif>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Country<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <select id="country" name="country_code"
                                                class="form-control @error('country') is-invalid @enderror" required>

                                                <option selected value='880'>
                                                    @if (Hel::deliveryDetails(Auth::user()->id))
                                                        {{ Hel::deliveryDetails(Auth::user()->id)->country }}
                                                    @else Select Country
                                                    @endif
                                                </option>
                                            </select>
                                        </div>

                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>State/Distirct<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <select id="state" name="state"
                                                class="form-control @error('state') is-invalid @enderror" required>
                                                <option selected
                                                    value=' @if (Hel::deliveryDetails(Auth::user()->id))
                                                                            {{ Hel::deliveryDetails(Auth::user()->id)->state }}@endif'>
                                                    @if (Hel::deliveryDetails(Auth::user()->id))
                                                        {{ Hel::deliveryDetails(Auth::user()->id)->state }}
                                                    @else Select State/Division
                                                    @endif

                                                </option>
                                            </select>
                                        </div>
                                        <div id="country_3">
                                            <input type="hidden" name="country" @if (Hel::deliveryDetails(Auth::user()->id))
                                            value="{{ Hel::deliveryDetails(Auth::user()->id)->country }}"
                                            @endif >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control  @error('address') is-invalid @enderror" required
                                                type="text" name="address" @if (Hel::deliveryDetails(Auth::user()->id))
                                            value="{{ Hel::deliveryDetails(Auth::user()->id)->address }}"
                                            @endif>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Order Notes</label>
                                        <div class="form-group__content">
                                            <textarea class="form-control  @error('note') is-invalid @enderror" required
                                                rows="7" name="note"
                                                placeholder="Notes about your order, e.g. special notes for delivery."> @if (Hel::deliveryDetails(Auth::user()->id))
                                                                               {{ Hel::deliveryDetails(Auth::user()->id)->note }}
                                                                    @endif</textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
                                <div class="ps-form__total">
                                    <h3 class="ps-form__heading">Your Order</h3>
                                    <div class="content">
                                        <div class="ps-block--checkout-total">
                                            <div class="ps-block__header">

                                            </div>
                                            <div class="ps-block__content">
                                                <table class="table ps-block__products">
                                                    <tbody>
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach ($carts as $item)


                                                            <tr style="border-top:0; ">
                                                                <td style="border-top:0; "><a
                                                                        href="#">{{ $item->product->product_name }}
                                                                        × {{ $item->qty }}</a>

                                                                </td>
                                                                <td style="border-top:0; ">
                                                                    {{ Currency::mc('BDT', round($item->qty * round($item->product->price + $item->product->service_charge, 1), 1)) }}
                                                                </td>
                                                            </tr>@php
                                                                $total = $total + round($item->qty * round($item->product->price + $item->product->service_charge, 1), 1);
                                                            @endphp

                                                        @endforeach
                                                        <tr style="border-top:0; ">
                                                            <td style="border-top:1px solid red; ">
                                                                <h4>Total</h4>
                                                            </td>
                                                            <td style="border-top:1px solid red; ">
                                                                <h4> {{ Currency::mc('BDT', $total) }} </h4>
                                                            </td>
                                                        </tr>
                                                        <tr style="border-top:0; ">
                                                            <td style="border-top:0; ">
                                                                <h4>Cash On Delivery(90%) </h4>
                                                            </td>
                                                            <td style="border-top:0px; ">
                                                                <h4> {{ Currency::mc('BDT', Hel::percentage($total, 90)) }}
                                                                </h4>
                                                            </td>
                                                        </tr>
                                                        <tr style="border-top:0; ">
                                                            <td style="border-top:0; ">
                                                                <h4>Advanced Pay(10%) </h4>
                                                            </td>
                                                            <td style="border-top:0px; ">
                                                                <h4> {{ Currency::mc('BDT', Hel::percentage($total, 10)) }}
                                                                </h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>


                                                <input type="hidden"
                                                    value="{{ Currency::mc('BDT', Hel::percentage($total, 10)) }}"
                                                    name="toris">
                                            </div>
                                        </div><button class="ps-btn ps-btn--fullwidth" type="submit"
                                            style="font-size: 28px;color:white; background: linear-gradient(120deg, rgb(134 7 19), rgb(255 2 2) 55%, rgb(221 8 8), rgb(255 0 0) 45%);">Payment
                                            {{ Currency::mc('BDT', Hel::percentage($total, 10)) }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('frontend/js/country_list/country.js') }}"></script>
@endsection
