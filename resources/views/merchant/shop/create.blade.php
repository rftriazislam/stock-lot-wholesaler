@extends('merchant.master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <p>Form Elements</p>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
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
                        <h2>MY SHOP</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <br />
                        <form id="demo-form2" action="{{ route('merchant.save.shop') }}" method="POST"
                            data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            @csrf


                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Shop
                                    Name
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" name="name"
                                        class="form-control " placeholder="Desi Shop">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Shop
                                    Logo
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="logo" required="required"
                                        class="form-control image file pb-34 ">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">NID
                                    Front
                                    Picture
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="nid_front" required="required"
                                        class="form-control image file pb-34 ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label  btn col-md-3 col-sm-3 label-align" for="first-name">NID
                                    Back
                                    Picture
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="nid_back" required="required"
                                        class="form-control image file pb-34 ">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Whatsapp
                                    Number
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" name="whatsapp_number"
                                        class="form-control " placeholder="+88011111111">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Telegram
                                    Number
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" name="telegram_number"
                                        class="form-control " placeholder="+88011111111">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Facebook
                                    Page
                                    Link
                                    <sup class="required">Optional</sup>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" name="fb_page"
                                        class="form-control " placeholder="www.facebook.com/example">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Shop
                                    Address/Location
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" name="address"
                                        class="form-control " placeholder="Uttara,Dhaka-1230,Bangladesh">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-round  btn-danger" type="reset">Cancel</button>

                                    <button type="submit" class="btn btn-round  btn-success">Save</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
