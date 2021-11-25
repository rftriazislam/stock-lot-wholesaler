@extends('merchant.master')
@section('css')
    <link href="{{ asset('backend') }}/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"
        rel="stylesheet">
    <style>
        /* .colorpicker.colorpicker-hidden{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       } */

    </style>
@endsection
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
                        <h2>Product Add</h2>
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <br />
                        <form id="demo-form2" action="{{ route('merchant.save.product') }}" method="POST"
                            data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            @csrf

                            <div class="borderr pb_179">
                                <h5 style="text-align: center;padding-top: 9px">Select Category & SubCategory</h5>
                                <hr>
                                <div class="form-group item">

                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="category">Category
                                        Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">

                                        <select class="form-control" id="category" required name="category_id">
                                            <option>Select Category</option>

                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>

                                </div>
                                <div class="form-group item">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align"
                                        for="subcategory">SubCategory
                                        Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">

                                        <select class="form-control" required id="subcategory" name="subcategory_id">
                                            <option>Select SubCategory</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="borderr pb_288">
                                <h5 style="text-align: center;padding-top: 9px">Product Details</h5>
                                <hr>
                                <div class="item form-group">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align"
                                        for="product_name">Product
                                        Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="product_name" required="required" name="product_name"
                                            class="form-control " placeholder="Samsung j2"
                                            value="{{ old('product_name') }}" autofocus autocomplete>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="product_id">Product
                                        ID
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="product_id" name="product_id" disabled
                                            value="{{ $product_id }}" class="form-control image file pb-34 "
                                            placeholder="J2">
                                        <input type="hidden" name="product_id" value="{{ $product_id }}">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align"
                                        for="description">Product
                                        Description
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea required="required" class="form-control "
                                            placeholder="Samsung Mobile Phone " id="description"
                                            name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="borderr pb_564">
                                <h5 style="text-align: center;padding-top: 9px">Product Size & Color</h5>
                                <hr>




                                <div class="item form-group">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="cor3">Product
                                        Size
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="input-group hdtuto control-group lst increment3">
                                            <input type="text" name="size[]" id="cor3" class=" demo3 form-control" multiple
                                                placeholder="XL">

                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_color3" type="button"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                            </div>

                                        </div>


                                        <div class="clone3 hide" style="display:none">
                                            <div class="hdtuto control-group lst input-group" id="remove"
                                                style="margin-top:10px">
                                                <input type="text" name="size[]" id="cor4" class=" form-control" multiple>
                                                <div class="input-group-btn">
                                                    <button id="button" class="btn btn-danger btn_danger3" type="button"><i
                                                            class="fldemo glyphicon glyphicon-remove"></i>
                                                        Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group item">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="unit">Unit

                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">

                                        <select class="form-control" id="unit" required name="unit">
                                            <option value="">None</option>
                                            <option value="KG">KG</option>
                                            <option value="LITER">LITER</option>
                                            <option value="PCS">PCS</option>
                                            <option value="GM">GM</option>
                                            <option value="ML">ML</option>
                                            <option value="INCH">INCH</option>
                                            <option value="BOX">BOX</option>
                                            <option value="DOZEN">DOZEN</option>
                                            <option value="SET">SET</option>
                                            <option value="PAIRS">PAIRS</option>
                                            <option value="OTHERS">OTHERS</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class=" item form-group ">
                                    <label class="control-label btn col-md-3 col-sm-3 label-align "
                                        for="colorr">Color</label>
                                    <div class="col-md-6 col-sm-6  ">
                                        <input type="text" id="colorr" class="demo1 form-control" name="color"
                                            value="#5367ce" />
                                       <p id="color" style="height: 61px;width: 83px;background: red;"></p> 
                                    </div>

                                </div> --}}

                                <div class="item form-group">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="cor">Product
                                        Color
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="input-group hdtuto control-group lst increment2">
                                            <input type="text" name="color[]" id="cor" class=" demo1 form-control" multiple
                                                value="#5367ce">

                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_color" type="button"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                            </div>
                                        </div>


                                        <div class="clone2 hide" style="display:none">
                                            <div class="hdtuto control-group lst input-group" id="remove"
                                                style="margin-top:10px">
                                                <input type="text" name="color[]" id="cor2" class=" form-control" multiple
                                                    value="#5367ce">
                                                <div class="input-group-btn">
                                                    <button id="button" class="btn btn-danger btn_danger" type="button"><i
                                                            class="fldemo glyphicon glyphicon-remove"></i>
                                                        Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label  btn col-md-3 col-sm-3 label-align"
                                        for="stock">Stock/Quantity
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="stock" name="stock" required="required"
                                            value="{{ old('stock') }}" autofocus autocomplete placeholder="1000"
                                            class="form-control image file pb-34 ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="mini_order">Minimum
                                        Orders

                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="mini_order" value="{{ old('mini_order') }}" autofocus
                                            autocomplete required="required" name="mini_order" class="form-control "
                                            placeholder="10">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label  btn col-md-3 col-sm-3 label-align" for="order_note">Order
                                        Note
                                        <sup class="required">option</sup>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea required="required" id="order_note" placeholder="X,XL,M,ML,M,L Color "
                                            autofocus autocomplete class="form-control "
                                            name="order_note"> {{ old('order_note') }}</textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="borderr pb_695">
                                <h5 style="text-align: center;padding-top: 9px">Product Price & Picture,Video</h5>
                                <hr>
                                <div class="item form-group">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="price">Reseller
                                        Price
                                        <sup class="required" style="color: red">
                                            {{ Auth::user()->currency }}</sup>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="price" required="required" min="1" name="price"
                                            class="form-control " placeholder="8400 {{ Auth::user()->currency }}">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="prsice">Affiliate
                                        &
                                        Service Charge(<b style="color: red">5%</b>)
                                        <sup class="required" style="color: red"></sup>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="prsice" required="required" disabled class="form-control "
                                            value="42.5 {{ Auth::user()->currency }}">
                                        <input type="hidden" id="prsice2" required="required" name="service_charge"
                                            class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="discount1">Minimum
                                        Retail Price

                                        <sup class="required" style="color: red">{{ Auth::user()->currency }}
                                        </sup>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="discount1" required="required" min="1"
                                            name="min_retail_price" class="form-control " placeholder="8500">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="discount2">Maximum
                                        Retail Price

                                        <sup class="required" style="color: red">{{ Auth::user()->currency }}
                                        </sup>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="discount2" required="required" min="1"
                                            name="max_retail_price" class="form-control " placeholder="9990">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="files">Main
                                        Picture
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="input-group hdtuto control-group ">
                                            <input type="file" name="main_picture" class=" form-control" multiple
                                                required>


                                        </div>

                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="files">Add More
                                        Picture
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="input-group hdtuto control-group lst increment">
                                            <input type="file" name="files[]" class="myfrm form-control" multiple>

                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_success" type="button"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                            </div>
                                        </div>
                                        <div class="clone hide" style="display:none">
                                            <div class="hdtuto control-group lst input-group" id="remove"
                                                style="margin-top:10px">
                                                <input type="file" name="files[]" class="myfrm form-control">
                                                <div class="input-group-btn">
                                                    <button id="button" class="btn btn-danger" type="button"><i
                                                            class="fldemo glyphicon glyphicon-remove"></i>
                                                        Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label  btn col-md-3 col-sm-3 label-align" for="video_link">Video
                                        Link
                                        <sup class="required">option</sup>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="video_link" name="video_link"
                                            value="{{ old('video_link') }}" autofocus autocomplete
                                            placeholder="https://www.youtube.com/watch?v=yKS8v6HUIss"
                                            class="form-control image file pb-34 ">
                                    </div>
                                </div>

                                <div class="form-group item">
                                    <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="status">Status

                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">

                                        <select class="form-control" id="status" required name="status">
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
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
@section('js')
    <script src="{{ asset('backend') }}/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js">
    </script>


    <script>
        $('.demo1').mouseenter(function() {
            $('#color').css('background', $(this).val());
        })

        $(document).ready(function() {
            $(".btn_success").click(function() {
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents("#remove").remove();
            });

        });

        $(document).ready(function() {
            //--------------------------------------------color---------------
            $(".btn_color").click(function() {
                var color = $('#cor').val();
                $('#cor2').val(color);
                $('#cor2').css({
                    'background': color,
                    'color': 'white'
                });
                var lsthmtl = $(".clone2").html();
                $(".increment2").after(lsthmtl);


            });


            $("body").on("click", ".btn_danger", function() {
                $(this).parents("#remove").remove();
            });
            //--------------------------------------------color---------------
        });

        $(document).ready(function() {
            //--------------------------------------------size---------------
            $(".btn_color3").click(function() {
                var lsthmtl = $(".clone3").html();
                $(".increment3").after(lsthmtl);

            });


            $("body").on("click", ".btn_danger3", function() {
                $(this).parents("#remove").remove();
            });
        });

        $(document).ready(function() {
            //--------------------------------------------size---------------

            $("#price").keyup(function() {
                var value = $('#price').val();

                var p = (value * 5) / 100;
                $('#prsice').val(p);
                $('#prsice2').val(p);
            });

        });




        $('#category').change(function() {
            var category_id = $(this).val();

            if (category_id) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-subcategory-list') }}?category_id=" + category_id,


                    success: function(res) {

                        if (res) {
                            $("#subcategory").empty();
                            $("#subcategory").append('<option value="">Select List</option>');
                            $.each(res, function(key, value) {
                                $("#subcategory").append('<option value="' + key + '">' +
                                    value +
                                    '</option>');
                            });

                        } else {
                            $("#subcategory").empty();

                        }
                    }
                });
            } else {

                $("#subcategory").empty();

            }
        });
    </script>
@endsection
