@extends('merchant.master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Profile</h3>
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
                        <h2>User Profile</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
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
                                        src="{{ asset('public/backend') }}/images/picture.jpg" alt="Avatar"
                                        title="Change the avatar">
                                </div>
                            </div>
                            <h3>{{ Auth::user()->name }}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i>{{ Auth::user()->address }}
                                </li>
                                <li class="m-top-xs">
                                    <i class="fa fa-external-link user-profile-icon"></i>
                                    <a target="_blank">{{ Auth::user()->email }}</a>
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> {{ Auth::user()->country }}
                                </li>
                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> {{ Auth::user()->state }}
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> {{ Auth::user()->balance }}
                                    {{ Auth::user()->currency }}
                                </li>
                            </ul>





                        </div>
                        <div class="col-md-9  col-sm-9 ">


                            <!-- end of user-activity-graph -->

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" style="margin-left: -13px;" class="active"><a
                                            href="#tab_content1" id="home-tab" role="tab" data-toggle="tab"
                                            aria-expanded="true">Profile</a>
                                    </li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane active " id="tab_content1"
                                        aria-labelledby="home-tab">

                                        <!-- start recent activity -->
                                        <ul class="messages">
                                            <li>

                                                <form id="demo-form2" action="{{ route('update.profile') }}" method="POST"
                                                    data-parsley-validate class="form-horizontal form-label-left"
                                                    enctype="multipart/form-data">
                                                    @csrf


                                                    <div class="item form-group">
                                                        <label class="col-form-label btn col-md-3 col-sm-3 "
                                                            for="first-name" style="text-align: left">
                                                            Name
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" id="first-name" required="required"
                                                                name="name" value="{{ Auth::user()->name }}"
                                                                class="form-control " placeholder="Desi Shop">
                                                        </div>
                                                    </div>

                                                    <div class="item form-group">
                                                        <label class="col-form-label btn col-md-3 col-sm-3 "
                                                            style="text-align: left" for="first-name">Email
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="email" id="image" name="email"
                                                                value="{{ Auth::user()->email }}" disabled
                                                                class="form-control image file pb-34 ">
                                                        </div>
                                                    </div>

                                                    <div class="item form-group">
                                                        <label class="col-form-label btn col-md-3 col-sm-3 "
                                                            style="text-align: left" for="first-name">Phone

                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" id="first-name"
                                                                value="{{ Auth::user()->phone }}" disabled
                                                                required="required" name="phone" class="form-control "
                                                                placeholder="+88011111111">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="col-form-label btn col-md-3 col-sm-3 "
                                                            style="text-align: left" for="first-name">Country
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" id="first-name"
                                                                value="{{ Auth::user()->country }}" disabled
                                                                required="required" name="telegram_number"
                                                                class="form-control " placeholder="+88011111111">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="col-form-label btn col-md-3 col-sm-3 "
                                                            style="text-align: left" for="first-name">State

                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" id="first-name" required="required"
                                                                name="fb_page" disabled value="{{ Auth::user()->state }}"
                                                                class="form-control "
                                                                placeholder="www.facebook.com/example">
                                                        </div>
                                                    </div>

                                                    <div class="item form-group">
                                                        <label class="col-form-label  btn col-md-3 col-sm-3 "
                                                            style="text-align: left" for="first-name">Picture
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="file" id="image" name="file" required="required"
                                                                class="form-control image file pb-34 ">
                                                        </div><br>
                                                        <img src="{{ asset('public/storage/profile') }}/{{ Auth::user()->image }}"
                                                            style="height: 60px;width:60px">
                                                    </div>


                                                    <div class="item form-group">
                                                        <label class="col-form-label btn col-md-3 col-sm-3 "
                                                            style="text-align: left" for="first-name">Shop
                                                            Address/Location
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" id="first-name"
                                                                value="{{ Auth::user()->address }}" required="required"
                                                                name="address" class="form-control " placeholder="">
                                                        </div>
                                                    </div>

                                                    <div class="ln_solid"></div>
                                                    <button class="btn btn-info " type="submit" style="color: white"><i
                                                            class="fa fa-edit m-right-xs"></i>Edit/update
                                                        Profile</button>
                                                    <br />

                                                </form>

                                            </li>

                                        </ul>
                                        <!-- end recent activity -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
