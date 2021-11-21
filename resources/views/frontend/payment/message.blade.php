@extends('frontend.master')
@section('content')

    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a>Payment</a></li>

                </ul>
            </div>
        </div>
        <div class="ps-order-tracking">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Payment {{ $message }}</h3>
                    <p>To track your order please enter your Order ID in the box below and press the "Track" button. This
                        was given to youon your receipt and in the confirmation email you should have received.</p>
                </div>
                <div class="ps-section__content">
                    <div class="ps-form--order-tracking">

                        <div class="form-group">
                            <a href="{{ route('home') }}"> <button class="ps-btn ps-btn--fullwidth"
                                    style="font-size: 28px;color:white; background: linear-gradient(120deg, rgb(134 7 19), rgb(255 2 2) 55%, rgb(221 8 8), rgb(255 0 0) 45%);"><i
                                        class="icon-arrow-left"></i> Back to
                                    Shop</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
