@extends('merchant.master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>MY SHOP</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>MY SHOP <small>Activity report</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view"
                                        src="{{ asset('public/storage/merchant/logo/') }}/{{ $merchant->logo }}"
                                        alt="Avatar" title="Change the avatar"
                                        style="width:100%;height:220px;border: 1.5px solid #ded8d8;">
                                </div>
                            </div>
                            <h3>{{ $merchant->name }}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $merchant->address }}
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> As a Merchant
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-external-link user-profile-icon"></i>
                                    <a target="_blank">{{ Auth::user()->email }}</a>
                                </li>
                                <li>
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                    &nbsp;&nbsp;<b>{{ $merchant->whatsapp_number }}</b>
                                </li>
                                <li>
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                    &nbsp;&nbsp;<b>{{ $merchant->telegram_number }}</b>
                                </li>
                                <li>
                                    <i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;<b>
                                        {{ $merchant->fb_page }}</b>
                                </li>
                            </ul>

                            <a class="btn btn-success"
                                href="{{ route('shop.view', [$merchant->user_id, $merchant->name]) }}"
                                style="color:white"><i class="fa fa-edit m-right-xs"></i>Live
                                Preview</a>
                            <a class="btn btn-info"
                                href="{{ route('merchant.shop.edit', [$merchant->id, $merchant->name, $merchant->user_id]) }}"
                                style="color:white"><i class="fa fa-edit m-right-xs"></i>Edit/Update
                            </a>

                            <br />
                            <div class="profile_img" style="margin-bottom: 7px;margin-top: 9px;">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view"
                                        src="{{ asset('public/storage/merchant/nid_front/') }}/{{ $merchant->nid_front }}"
                                        alt="Avatar" title="Change the avatar"
                                        style="width:100%;height:161px;border:1.5px solid #ded8d8">
                                </div>
                            </div>
                            <div class="profile_img" style="margin-bottom: 7px;margin-top: 9px;">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view"
                                        src="{{ asset('public/storage/merchant/nid_back/') }}/{{ $merchant->nid_back }}"
                                        alt="Avatar" title="Change the avatar"
                                        style="width:100%;height:161px;border:1.5px solid #ded8d8">
                                </div>
                            </div>


                        </div>
                        <div class="col-md-9 col-sm-9 ">


                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist"
                                    style="background:white;border-bottom:0;">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab"
                                            role="tab" data-toggle="tab" aria-expanded="true">Recent Buyer</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab"
                                            id="profile-tab" data-toggle="tab" aria-expanded="false">Product Sale</a>
                                    </li>

                                </ul>
                                <div id="myTabContent" class="tab-content"
                                    style="padding-left: 23px;border: 1px solid #e2dddd;">
                                    <div role="tabpanel" class="tab-pane active " id="tab_content1"
                                        aria-labelledby="home-tab">

                                        <!-- start recent activity -->
                                        <ul class="messages">
                                            <li>
                                                <img src="{{ asset('backend') }}/images/img.jpg" class="avatar"
                                                    alt="Avatar">
                                                <div class="message_date" style="padding-right: 10px;">
                                                    <h3 class="date text-info">24</h3>
                                                    <p class="month">May</p>
                                                </div>
                                                <div class="message_wrapper">
                                                    <h4 class="heading">MR JSON Roy</h4>
                                                    <blockquote class="message">Product Name</blockquote>
                                                    <br />
                                                    <p class="url">
                                                        <span class="fs1 text-info" aria-hidden="true"
                                                            data-icon=""></span>
                                                        <a href="#"><i class="fa fa-paperclip"></i>Quentity 12
                                                        </a>
                                                    </p>
                                                </div>
                                            </li>


                                        </ul>
                                        <!-- end recent activity -->

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2"
                                        aria-labelledby="profile-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>

                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th class="hidden-phone">Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td>Shirt</td>
                                                    <td>102</td>
                                                    <td class="hidden-phone">12.12.2021</td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <!-- end user projects -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
