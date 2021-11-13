@extends('frontend.master')

@section('css')
    <style>
        @media (min-width: 1200px) {
            .hidee {
                display: none;
            }
        }

        .icon-chevron-right {
            font-size: 35px;
        }

        .icon-chevron-left {
            font-size: 35px;
        }

    </style>
@endsection

@section('content')




    <div id="homepage-6">

        <div class="ps-home-banner">
            <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000"
                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1"
                data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
                data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">

                @foreach (HelpCat::slider() as $item)
                    <div class="ps-banner--market-1" data-background="{{ asset('storage') }}/slider/{{ $item->image }}">
                        <img src="{{ asset('storage') }}/slider/{{ $item->image }}" alt="">

                    </div>
                @endforeach
            </div>
        </div>
        <div class="ps-site-features">
            <div class="container">
                <div class="ps-block--site-features ps-block--site-features-2">
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-rocket"></i></div>
                        <div class="ps-block__right">
                            <h4>Free Delivery</h4>
                            <p>For all oders over $99</p>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-sync"></i></div>
                        <div class="ps-block__right">
                            <h4>90 Days Return</h4>
                            <p>If goods have problems</p>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-credit-card"></i></div>
                        <div class="ps-block__right">
                            <h4>Secure Payment</h4>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-bubbles"></i></div>
                        <div class="ps-block__right">
                            <h4>24/7 Support</h4>
                            <p>Dedicated support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-promotions">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 "><a class="ps-collection"
                            href="shop-default.html"><img src="{{ asset('frontend') }}/img/b3.jpg" alt=""></a>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 "><a class="ps-collection"
                            href="shop-default.html"><img src="{{ asset('frontend') }}/img/b2.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-deal-hot">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block--deal-hot" data-mh="dealhot">
                            <div class="ps-block__header">
                                <h3>Deal hot today</h3>
                                <div class="ps-block__navigation"><a class="ps-carousel__prev"
                                        href=".ps-carousel--deal-hot"><i class="icon-chevron-left"></i></a><a
                                        class="ps-carousel__next" href=".ps-carousel--deal-hot"><i
                                            class="icon-chevron-right"></i></a></div>
                            </div>
                            <div class="ps-product__content">
                                <div class="ps-carousel--deal-hot ps-carousel--deal-hot owl-slider" data-owl-auto="true"
                                    data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false"
                                    data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1"
                                    data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
                                    data-owl-mousedrag="on">
                                    <div class="ps-product--detail ps-product--hot-deal">
                                        <div class="ps-product__header">
                                            <div class="ps-product__thumbnail" data-vertical="true">
                                                <figure>
                                                    <div class="ps-wrapper">
                                                        <div class="ps-product__gallery" data-arrow="true">
                                                            <div class="item"><a
                                                                    href="{{ asset('frontend') }}/img/products/home-6/deal-hot/a-1.jpg"><img
                                                                        src="{{ asset('frontend') }}/img/products/home-6/deal-hot/a-1.jpg"
                                                                        alt=""></a></div>
                                                            <div class="item"><a
                                                                    href="{{ asset('frontend') }}/img/products/home-6/deal-hot/a-2.jpg"><img
                                                                        src="{{ asset('frontend') }}/img/products/home-6/deal-hot/a-2.jpg"
                                                                        alt=""></a></div>
                                                            <div class="item"><a
                                                                    href="{{ asset('frontend') }}/img/products/home-6/deal-hot/a-3.jpg"><img
                                                                        src="{{ asset('frontend') }}/img/products/home-6/deal-hot/a-3.jpg"
                                                                        alt=""></a></div>
                                                        </div>
                                                        <div class="ps-product__badge"><span>Save <br> $280.000</span></div>
                                                    </div>
                                                </figure>
                                                <div class="ps-product__variants" data-item="4" data-md="3" data-sm="3"
                                                    data-arrow="false">
                                                    <div class="item"><img
                                                            src="{{ asset('frontend') }}/img/products/home-6/deal-hot/a-1.jpg"
                                                            alt=""></div>
                                                    <div class="item"><img
                                                            src="{{ asset('frontend') }}/img/products/home-6/deal-hot/a-2.jpg"
                                                            alt=""></div>
                                                    <div class="item"><img
                                                            src="{{ asset('frontend') }}/img/products/home-6/deal-hot/a-3.jpg"
                                                            alt=""></div>
                                                </div>
                                            </div>
                                            <div class="ps-product__info">
                                                <h5>Clothing & Apparel</h5>
                                                <h3 class="ps-product__name">Herschel Leather Duffle Bag In Brown Color</h3>
                                                <div class="ps-product__meta">
                                                    <h4 class="ps-product__price sale">$36.78 <del> $56.99</del></h4>
                                                    <div class="ps-product__rating">
                                                        <select class="ps-rating" data-read-only="true">
                                                            <option value="1">1</option>
                                                            <option value="1">2</option>
                                                            <option value="1">3</option>
                                                            <option value="1">4</option>
                                                            <option value="2">5</option>
                                                        </select><span>(1 review)</span>
                                                    </div>
                                                    <div class="ps-product__specification">
                                                        <p>Status:<strong class="in-stock"> In Stock</strong></p>
                                                    </div>
                                                </div>
                                                <div class="ps-product__expires">
                                                    <p>Expires In</p>
                                                    <ul class="ps-countdown" data-time="July 21, 2021 23:00:00">
                                                        <li><span class="days"></span>
                                                            <p>Days</p>
                                                        </li>
                                                        <li><span class="hours"></span>
                                                            <p>Hours</p>
                                                        </li>
                                                        <li><span class="minutes"></span>
                                                            <p>Minutes</p>
                                                        </li>
                                                        <li><span class="seconds"></span>
                                                            <p>Seconds</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="ps-product__processs-bar">
                                                    <div class="ps-progress" data-value="10"><span
                                                            class="ps-progress__value"></span></div>
                                                    <p><strong>4/79</strong> Sold</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product--detail ps-product--hot-deal">
                                        <div class="ps-product__header">
                                            <div class="ps-product__thumbnail" data-vertical="true">
                                                <figure>
                                                    <div class="ps-wrapper">
                                                        <div class="ps-product__gallery" data-arrow="true">
                                                            <div class="item"><a
                                                                    href="{{ asset('frontend') }}/img/products/home-6/deal-hot/b-1.jpg"><img
                                                                        src="{{ asset('frontend') }}/img/products/home-6/deal-hot/b-1.jpg"
                                                                        alt=""></a></div>
                                                            <div class="item"><a
                                                                    href="{{ asset('frontend') }}/img/products/home-6/deal-hot/b-2.jpg"><img
                                                                        src="{{ asset('frontend') }}/img/products/home-6/deal-hot/b-2.jpg"
                                                                        alt=""></a></div>
                                                            <div class="item"><a
                                                                    href="{{ asset('frontend') }}/img/products/home-6/deal-hot/b-3.jpg"><img
                                                                        src="{{ asset('frontend') }}/img/products/home-6/deal-hot/b-3.jpg"
                                                                        alt=""></a></div>
                                                            <div class="item"><a
                                                                    href="{{ asset('frontend') }}/img/products/home-6/deal-hot/b-4.jpg"><img
                                                                        src="{{ asset('frontend') }}/img/products/home-6/deal-hot/b-4.jpg"
                                                                        alt=""></a></div>
                                                        </div>
                                                        <div class="ps-product__badge"><span>Save <br> $9.000</span></div>
                                                    </div>
                                                </figure>
                                                <div class="ps-product__variants" data-item="4" data-md="3" data-sm="3"
                                                    data-arrow="false">
                                                    <div class="item"><img
                                                            src="{{ asset('frontend') }}/img/products/home-6/deal-hot/b-1.jpg"
                                                            alt=""></div>
                                                    <div class="item"><img
                                                            src="{{ asset('frontend') }}/img/products/home-6/deal-hot/b-2.jpg"
                                                            alt=""></div>
                                                    <div class="item"><img
                                                            src="{{ asset('frontend') }}/img/products/home-6/deal-hot/b-3.jpg"
                                                            alt=""></div>
                                                    <div class="item"><img
                                                            src="{{ asset('frontend') }}/img/products/home-6/deal-hot/b-4.jpg"
                                                            alt=""></div>
                                                </div>
                                            </div>
                                            <div class="ps-product__info">
                                                <h5>Consumer Electrics</h5>
                                                <h3 class="ps-product__name">Evolution Sport Drilled and Slotted Brake Kit
                                                </h3>
                                                <div class="ps-product__meta">
                                                    <h4 class="ps-product__price sale">$97.78 <del> $156.99</del></h4>
                                                    <div class="ps-product__rating">
                                                        <select class="ps-rating" data-read-only="true">
                                                            <option value="1">1</option>
                                                            <option value="1">2</option>
                                                            <option value="1">3</option>
                                                            <option value="1">4</option>
                                                            <option value="2">5</option>
                                                        </select><span>(1 review)</span>
                                                    </div>
                                                    <div class="ps-product__specification">
                                                        <p>Status:<strong class="in-stock"> In Stock</strong></p>
                                                    </div>
                                                </div>
                                                <div class="ps-product__expires">
                                                    <p>Expires In</p>
                                                    <ul class="ps-countdown" data-time="July 21, 2021 23:00:00">
                                                        <li><span class="days"></span>
                                                            <p>Days</p>
                                                        </li>
                                                        <li><span class="hours"></span>
                                                            <p>Hours</p>
                                                        </li>
                                                        <li><span class="minutes"></span>
                                                            <p>Minutes</p>
                                                        </li>
                                                        <li><span class="seconds"></span>
                                                            <p>Seconds</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="ps-product__processs-bar">
                                                    <div class="ps-progress" data-value="60"><span
                                                            class="ps-progress__value"></span></div>
                                                    <p><strong>30/50</strong> Sold</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <aside class="widget widget_best-sale" data-mh="dealhot">
                            <h3 class="widget-title">Top 20 Best Seller</h3>
                            <div class="widget__content">
                                <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000"
                                    data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="1"
                                    data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1"
                                    data-owl-duration="1000" data-owl-mousedrag="on">
                                    <div class="ps-product-group">
                                        <div class="ps-product--horizontal">
                                            <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                                        src="{{ asset('frontend') }}/img/products/home-3/technology/1.jpg"
                                                        alt=""></a></div>
                                            <div class="ps-product__content"><a class="ps-product__title"
                                                    href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>01</span>
                                                </div>
                                                <p class="ps-product__price">105.30</p>
                                            </div>
                                        </div>
                                        <div class="ps-product--horizontal">
                                            <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                                        src="{{ asset('frontend') }}/img/products/home-3/technology/2.jpg"
                                                        alt=""></a></div>
                                            <div class="ps-product__content"><a class="ps-product__title"
                                                    href="product-default.html">Beat Spill 2.0 Wireless Speaker – White</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>01</span>
                                                </div>
                                                <p class="ps-product__price">$125.00 <del>$135.00 </del></p>
                                            </div>
                                        </div>
                                        <div class="ps-product--horizontal">
                                            <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                                        src="{{ asset('frontend') }}/img/products/home-3/technology/3.jpg"
                                                        alt=""></a></div>
                                            <div class="ps-product__content"><a class="ps-product__title"
                                                    href="product-default.html">ASUS Chromebook Flip – 10.2 Inch</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>02</span>
                                                </div>
                                                <p class="ps-product__price sale">$990.00 <del>$1250.00 </del></p>
                                            </div>
                                        </div>
                                        <div class="ps-product--horizontal">
                                            <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                                        src="{{ asset('frontend') }}/img/products/home-3/technology/4.jpg"
                                                        alt=""></a></div>
                                            <div class="ps-product__content"><a class="ps-product__title"
                                                    href="product-default.html">Apple Macbook Retina Display 12”</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>04</span>
                                                </div>
                                                <p class="ps-product__price">$1090.00 <del>$1550.00 </del></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product-group">
                                        <div class="ps-product--horizontal">
                                            <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                                        src="{{ asset('frontend') }}/img/products/home-3/technology/3.jpg"
                                                        alt=""></a></div>
                                            <div class="ps-product__content"><a class="ps-product__title"
                                                    href="product-default.html">ASUS Chromebook Flip – 10.2 Inch</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>02</span>
                                                </div>
                                                <p class="ps-product__price sale">$990.00 <del>$1250.00 </del></p>
                                            </div>
                                        </div>
                                        <div class="ps-product--horizontal">
                                            <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                                        src="{{ asset('frontend') }}/img/products/home-3/technology/4.jpg"
                                                        alt=""></a></div>
                                            <div class="ps-product__content"><a class="ps-product__title"
                                                    href="product-default.html">Apple Macbook Retina Display 12”</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>04</span>
                                                </div>
                                                <p class="ps-product__price">$1090.00 <del>$1550.00 </del></p>
                                            </div>
                                        </div>
                                        <div class="ps-product--horizontal">
                                            <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                                        src="{{ asset('frontend') }}/img/products/home-3/technology/5.jpg"
                                                        alt=""></a></div>
                                            <div class="ps-product__content"><a class="ps-product__title"
                                                    href="product-default.html">Samsung Gear VR Virtual Reality Headset</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>01</span>
                                                </div>
                                                <p class="ps-product__price">$85.00</p>
                                            </div>
                                        </div>
                                        <div class="ps-product--horizontal">
                                            <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                                        src="{{ asset('frontend') }}/img/products/home-3/technology/6.jpg"
                                                        alt=""></a></div>
                                            <div class="ps-product__content"><a class="ps-product__title"
                                                    href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>01</span>
                                                </div>
                                                <p class="ps-product__price">$950.60</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-top-categories">
            <div class="container">
                <h3>Top categories of the month</h3>
                <div class="row">
                    @foreach (HelpCat::category_list() as $item)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
                            <div class="ps-block--category"><a class="ps-block__overlay" href="shop-default.html"></a><img
                                    src="{{ asset('storage') }}/category/big/{{ $item->image }}" alt="">
                                <p>{{ $item->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="ps-categories-box">
            <div class="container">

                @foreach ($product as $item)
                    @if ($item->subcategory_count)

                        <div class="ps-block--categories-box">
                            <div class="ps-block__header">
                                <h3>{{ $item->name }}</h3>
                                <ul>
                                    <li><a href="shop-default.html">New Arrivals</a></li>
                                    <li><a href="shop-default.html">Best Seller</a></li>
                                </ul>
                            </div>
                            <div class="ps-block__content">
                                <div class="ps-block__banner">
                                    <img src="{{ asset('storage') }}/category/big/{{ $item->image }}" alt="">
                                </div> @php
                                    $i = 0;
                                @endphp
                                @foreach ($item->subcategory as $subitem)

                                    @if ($subitem->merchantproduct_count && $i < 8)
                                        <div @if ($i == 7) class="ps-block__item hidee" @else class="ps-block__item"  @endif><a class="ps-block__overlay"
                                                href="shop-default.html"></a>
                                            <img src="{{ asset('storage') }}/subcategory/{{ $subitem->image }}"
                                                alt="">
                                            <p>{{ $subitem->name }} </p><span>Item
                                                {{ $subitem->merchantproduct_count }}</span>
                                        </div>
                                        @php
                                            $i = $i + 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="ps-section__content" style="background-color: #ffffff;">
                            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
                                data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"
                                data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2"
                                data-owl-item-lg="3" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">

                                @foreach ($item->cateproduct as $subitem)
                                    <div class="ps-product">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                                    src="{{ asset('storage') }}/merchant/product/main/small/{{ $subitem->main_picture }}"
                                                    alt="" /></a>
                                            <ul class="ps-product__actions">
                                                <li><a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal"
                                                        data-target="#product-quickview"><i class="icon-eye"></i></a>
                                                </li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="Compare"><i class="icon-chart-bars"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__container"><a class="ps-product__vendor" href="#"></a>
                                            <div class="ps-product__content"><a class="ps-product__title"
                                                    href="product-default.html">{{ $subitem->product_name }}
                                                </a>
                                                {{-- <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>02</span>
                                                </div> --}}
                                                <p class="ps-product__price sale">{{ $subitem->price }} <del>00.00
                                                    </del></p>
                                            </div>
                                            <div class="ps-product__content hover"><a class="ps-product__title"
                                                    href="product-default.html">Anderson Composites – Custom Hood</a>
                                                <p class="ps-product__price sale">{{ $subitem->price }} <del>00.00
                                                    </del></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif
                @endforeach




            </div>
        </div>
    </div>


@endsection
