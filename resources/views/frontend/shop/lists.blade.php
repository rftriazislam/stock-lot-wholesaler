@extends('frontend.master')

@section('content')
    <div class="ps-page--single ps-page--vendor">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Store List</li>
                </ul>
            </div>
        </div>
        <section class="ps-store-list">
            <div class="container">

                <div class="ps-section__wrapper">
                    <div class="ps-section__left">
                        <aside class="widget widget--vendor">
                            <h3 class="widget-title">Search</h3>
                            <input class="form-control" type="text" placeholder="Search...">
                        </aside>
                        <aside class="widget widget--vendor">
                            <h3 class="widget-title">Filter by Category</h3>
                            <div class="form-group">
                                <select class="ps-select">
                                    <option>Lighting</option>
                                    <option>Exterior</option>
                                    <option>Custom Grilles</option>
                                    <option>Wheels & Tires</option>
                                    <option>Performance</option>
                                </select>
                            </div>
                        </aside>
                        <aside class="widget widget--vendor">
                            <h3 class="widget-title">Filter by Location</h3>
                            <div class="form-group">
                                <select class="ps-select">
                                    <option>Chooose Location</option>
                                    <option>Exterior</option>
                                    <option>Custom Grilles</option>
                                    <option>Wheels & Tires</option>
                                    <option>Performance</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="ps-select">
                                    <option>Chooose State</option>
                                    <option>Exterior</option>
                                    <option>Custom Grilles</option>
                                    <option>Wheels & Tires</option>
                                    <option>Performance</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Search by City">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Search by ZIP">
                            </div>
                        </aside>
                    </div>
                    <div class="ps-section__right">
                        <section class="ps-store-box">
                            <div class="ps-section__header">
                                <p>Showing 1 -8 of 22 results</p>
                                <select class="ps-select">
                                    <option value="1">Sort by Newest: old to news</option>
                                    <option value="2">Sort by Newest: New to old</option>
                                    <option value="3">Sort by average rating: low to hight</option>
                                </select>
                            </div>
                            <div class="ps-section__content">
                                <div class="row">
                                    @foreach ($shops as $shop)


                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                            <article class="ps-block--store">
                                                <div class="ps-block__thumbnail bg--cover"
                                                    data-background="{{ asset('storage/merchant/logo') }}/{{ $shop->logo }}">
                                                </div>
                                                <div class="ps-block__content">
                                                    <div class="ps-block__author"><a class="ps-block__user"
                                                            href="{{ route('shop.view', [$shop->user_id, $shop->name]) }}">
                                                            @if ($shop->user_info->image)
                                                                <img style="height: 100px;width: 100px;"
                                                                    src="{{ asset('storage/profile') }}/{{ $shop->user_info->image }}"
                                                                    alt="">
                                                            @endif
                                                        </a><a class="ps-btn"
                                                            href="{{ route('shop.view', [$shop->user_id, $shop->name]) }}">Visit
                                                            Store</a>
                                                    </div>
                                                    <h4>{{ $shop->name }}</h4>
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select>
                                                    <p>{{ $shop->address }}</p>
                                                    <ul class="ps-block__contact">
                                                        <li><i class="icon-envelope"></i><a
                                                                href="mailto:{{ $shop->user_info->email }}">{{ $shop->user_info->email }}</a>
                                                        </li>
                                                        {{-- <li><i class="icon-telephone"></i> (+093) 77-637-3300</li> --}}
                                                    </ul>
                                                    <div class="ps-block__inquiry"><a
                                                            href="{{ route('shop.view', [$shop->user_id, $shop->name]) }}"><i
                                                                class="icon-question-circle"></i> View Products</a></div>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="ps-pagination">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
