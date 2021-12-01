@extends('merchant.master')
@section('content')
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>MY SHOP</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form id="demo-form2" action="{{ route('merchant.update.shop') }}" method="POST"
                            data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            @csrf


                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Shop
                                    Name
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" value="{{ $shop->name }}" name="name"
                                        class="form-control " placeholder="Desi Shop">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Shop
                                    Logo
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="logos" class="form-control image file pb-34 ">
                                    <img class="img-responsive avatar-view"
                                        src="{{ asset('storage/merchant/logo/') }}/{{ $shop->logo }}" alt="Avatar"
                                        title="Change the avatar"
                                        style="width:100%;height:220px;border: 1.5px solid #ded8d8;">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">NID
                                    Front
                                    Picture
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="nid_fronts" class="form-control image file pb-34 ">
                                    <img class="img-responsive avatar-view"
                                        src="{{ asset('storage/merchant/nid_front/') }}/{{ $shop->nid_front }}"
                                        alt="Avatar" title="Change the avatar"
                                        style="width:100%;height:161px;border:1.5px solid #ded8d8">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label  btn col-md-3 col-sm-3 label-align" for="first-name">NID
                                    Back
                                    Picture
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="nid_backs" class="form-control image file pb-34 ">
                                    <img class="img-responsive avatar-view"
                                        src="{{ asset('storage/merchant/nid_back/') }}/{{ $shop->nid_back }}"
                                        alt="Avatar" title="Change the avatar"
                                        style="width:100%;height:161px;border:1.5px solid #ded8d8">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Whatsapp
                                    Number
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" name="whatsapp_number" class="form-control "
                                        value="{{ $shop->whatsapp_number }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Telegram
                                    Number
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" name="telegram_number" class="form-control "
                                        value="{{ $shop->telegram_number }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Facebook
                                    Page
                                    Link
                                    <sup class="required">Optional</sup>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" name="fb_page" class="form-control "
                                        value="{{ $shop->fb_page }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Shop
                                    Address/Location
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" name="address" value="{{ $shop->address }}"
                                        class="form-control " placeholder="Uttara,Dhaka-1230,Bangladesh">
                                </div>
                            </div>


                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3" style="padding-top: 20px; text-align: center;">
                                    <button class="btn btn-round  btn-danger">Cancel</button>

                                    <button type="submit" class="btn btn-round  btn-success">Update</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
