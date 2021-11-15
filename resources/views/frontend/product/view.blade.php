@extends('frontend.master')


@section('content')

    {{-- <header class="header header--mobile header--mobile-product" data-sticky="true">
        <div class="navigation--mobile">
            <div class="navigation__left"><a class="header__back" href="shop-default.html"><i
                        class="icon-chevron-left"></i><strong>Back to Categories</strong></a></div>
            <div class="navigation__right">
                <div class="header__actions">
                    <div class="ps-cart--mini"><a class="header__extra" href="#"><i
                                class="icon-bag2"></i><span><i>0</i></span></a>
                        <div class="ps-cart__content">
                            <div class="ps-cart__items">
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="#"><img
                                                src="{{ asset('frontend') }}/img/products/clothing/7.jpg" alt=""></a>
                                    </div>
                                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i
                                                class="icon-cross"></i></a><a href="product-default.html">MVMTH
                                            Classical Leather Watch In Black</a>
                                        <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                                    </div>
                                </div>
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="#"><img
                                                src="{{ asset('frontend') }}/img/products/clothing/5.jpg" alt=""></a>
                                    </div>
                                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i
                                                class="icon-cross"></i></a><a href="product-default.html">Sleeve Linen
                                            Blend Caro Pane Shirt</a>
                                        <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-cart__footer">
                                <h3>Sub Total:<strong>$59.99</strong></h3>
                                <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a
                                        class="ps-btn" href="checkout.html">Checkout</a></figure>
                            </div>
                        </div>
                    </div>
                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><i class="icon-user"></i></div>
                        <div class="ps-block__right"><a href="my-account.html">Login</a><a
                                href="my-account.html">Register</a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navigation--mobile-product"><a class="ps-btn ps-btn--black" href="shopping-cart.html">Add to cart</a><a
            class="ps-btn" href="checkout.html">Buy Now</a></nav>
    <div class="ps-breadcrumb">
        <div class="ps-container"></div>
    </div> --}}

    @php
    $subcategory_id = $single_product->subcategory_id;
    @endphp
    <div class="ps-page--product">
        <div class="container">
            <div class="ps-product--detail ps-product--full-content">
                <div class="ps-product__header ps-product__box">
                    <div class="ps-product__thumbnail" data-vertical="true">
                        <figure>
                            <div class="ps-wrapper">
                                <div class="ps-product__gallery" data-arrow="true">
                                    <div class="item"><a
                                            href="{{ asset('storage') }}/merchant/product/main/big/{{ $single_product->main_picture }}"><img
                                                src="{{ asset('storage') }}/merchant/product/main/big/{{ $single_product->main_picture }}"
                                                alt=""></a></div>
                                    @foreach ($single_product->files as $item)

                                        <div class="item"><a
                                                href="{{ asset('storage') }}/merchant/product/files/{{ $item['image'] }}"><img
                                                    src="{{ asset('storage') }}/merchant/product/files/{{ $item['image'] }}"
                                                    alt=""></a></div>
                                    @endforeach

                                </div>
                            </div>
                        </figure>
                        <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                            <div class="item"><img
                                    src="{{ asset('storage') }}/merchant/product/main/big/{{ $single_product->main_picture }}"
                                    alt=""></div>
                            @foreach ($single_product->files as $item)

                                <div class="item"><a
                                        href="{{ asset('storage') }}/merchant/product/files/{{ $item['image'] }}"><img
                                            src="{{ asset('storage') }}/merchant/product/files/{{ $item['image'] }}"
                                            alt=""></a></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="ps-product__info">
                        <h1>{{ $single_product->product_name }}</h1>
                        <div class="ps-product__meta">

                            <div class="ps-product__rating">
                                <select class="ps-rating" data-read-only="true">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select><span>(1 review)</span>
                            </div>
                        </div>
                        <h4 class="ps-product__price">{{ $single_product->price + $single_product->service_charge }} BDT
                        </h4>
                        <div class="ps-product__desc">
                            <p>Sold By:<a href="shop-default.html"><strong>
                                        {{ Hel::shop_info($single_product->user_id)->name }}</strong></a></p>
                            <ul class="ps-list--dot">
                                <li>{{ $single_product->order_note }}</li>

                            </ul>
                        </div>
                        <div class="ps-product__variations">
                            <figure>
                                <figcaption>Color</figcaption>
                                @foreach ($single_product->color as $item)

                                    <div class="ps-variant ps-variant--color " style="background: {{ $item['color'] }}">
                                        <span class="ps-variant__tooltip">{{ $item['color'] }}</span>
                                    </div>
                                @endforeach
                            </figure>
                        </div>
                        <div class="ps-product__shopping">
                            <figure>
                                <figcaption>Quantity</figcaption>
                                <div class="form-group--number">
                                    <button class="up"><i class="fa fa-plus"></i></button>
                                    <button class="down"><i class="fa fa-minus"></i></button>
                                    <input class="form-control" type="text" placeholder="1">
                                </div>
                            </figure><a class="ps-btn ps-btn--black" href="#">Add to cart</a><a class="ps-btn"
                                href="#">Buy Now</a>
                            <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i
                                        class="icon-chart-bars"></i></a></div>
                        </div>

                    </div>
                </div>
                <div class="ps-product__content">
                    <h3 class="ps-product__heading">Description</h3>
                    <div class="ps-document">

                        {{-- <p>{{ $single_product->description }}</p><img class="mb-30"
                            src="{{ asset('frontend') }}/img/products/detail/content/description.jpg" alt="">
                        <h5>What do you get</h5> --}}
                        {{ $single_product->description }}
                    </div>
                    <h3 class="ps-product__heading">Specification</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered ps-table ps-table--specification">
                            <tbody>
                                <tr>
                                    <td>Color</td>
                                    <td>Black, Gray</td>
                                </tr>
                                <tr>
                                    <td>Style</td>
                                    <td>Ear Hook</td>
                                </tr>
                                <tr>
                                    <td>Wireless</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Dimensions</td>
                                    <td>5.5 x 5.5 x 9.5 inches</td>
                                </tr>
                                <tr>
                                    <td>Weight</td>
                                    <td>6.61 pounds</td>
                                </tr>
                                <tr>
                                    <td>Battery Life</td>
                                    <td>20 hours</td>
                                </tr>
                                <tr>
                                    <td>Bluetooth</td>
                                    <td>Yes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="ps-product__heading">Vendor</h3>
                    <h4> {{ Hel::shop_info($single_product->user_id)->name }}</h4>
                    <p>Digiworld US, New York’s no.1 online retailer was established in May 2012 with the aim and vision to
                        become the one-stop shop for retail in New York with implementation of best practices both online
                    </p><a href="#">More Products from gopro</a>
                    <h3 class="ps-product__heading">Reviews (1)</h3>
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--average-rating">
                                <div class="ps-block__header">
                                    <h3>4.00</h3>
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>1 Review</span>
                                </div>
                                <div class="ps-block__star"><span>5 Star</span>
                                    <div class="ps-progress" data-value="100"><span></span></div><span>100%</span>
                                </div>
                                <div class="ps-block__star"><span>4 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                </div>
                                <div class="ps-block__star"><span>3 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                </div>
                                <div class="ps-block__star"><span>2 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                </div>
                                <div class="ps-block__star"><span>1 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                </div>
                            </div>
                        </div>
                        @if (Auth::check())
                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                                <form class="ps-form--review" action="index.html" method="get">
                                    <h4>Submit Your Review</h4>
                                    <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
                                    <div class="form-group form-group__rating">
                                        <label>Your rating of this product</label>
                                        <select class="ps-rating" data-read-only="false">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="6"
                                            placeholder="Write your review here"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                            <div class="form-group">
                                                <input class="form-control" type="email" placeholder="Your Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group submit">
                                        <button class="ps-btn">Submit Review</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                    <h3 class="ps-product__heading">Questions and Answers</h3>
                    <div class="ps-block--questions-answers">
                        <h3>Questions and Answers</h3>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Have a question? Search for answer?">
                        </div>
                    </div>
                    <h3 class="ps-product__heading">More Offers</h3>
                    <p>Sorry no more offers available</p>
                </div>
            </div>
            @include('frontend.include.related')


        </div>
    </div>

@endsection
