@extends('merchant.master')
@section('content')
    <!-- page content -->

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Contacts Design</h3>
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



        <div class="row">
            <div class="x_panel">
                <div class="x_content">



                    @foreach ($order as $item)

                        <div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Digital Strategist</i></h4>
                                    <div class="left col-md-7 col-sm-7">
                                        <h2>Nicole Pearson</h2>
                                        <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-building"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Phone #: </li>
                                        </ul>
                                    </div>
                                    <div class="right col-md-5 col-sm-5 text-center">
                                        <img src="{{ asset('backend') }}/images/img.jpg" alt=""
                                            class="img-circle img-fluid">
                                    </div>
                                </div>
                                <div class=" profile-bottom text-center">
                                    <div class=" col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class=" col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($order as $item)

                        <div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Digital Strategist</i></h4>
                                    <div class="left col-md-7 col-sm-7">
                                        <h2>Nicole Pearson</h2>
                                        <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-building"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Phone #: </li>
                                        </ul>
                                    </div>
                                    <div class="right col-md-5 col-sm-5 text-center">
                                        <img src="{{ asset('backend') }}/images/img.jpg" alt=""
                                            class="img-circle img-fluid">
                                    </div>
                                </div>
                                <div class=" profile-bottom text-center">
                                    <div class=" col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class=" col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
