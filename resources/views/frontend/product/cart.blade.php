@extends('frontend.master')


@section('content')
    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop-default.html">Shop</a></li>
                    <li>Whishlist</li>
                </ul>
            </div>
        </div>
        <div class="ps-section--shopping ps-shopping-cart" style="padding:40px 0">
            <div class="container">
                <div class="ps-section__header" style="padding-bottom: 40px">
                    <h1>Shopping Cart</h1>
                </div>
                <div class="ps-section__content" id=carrt>

                </div>

                <div class="ps-section__footer">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 " id="cart">


                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 " id="total">

                            {{-- <form class="ps-form--download-app">
                <div class="form-group--nest">
                    <input class="form-control" type="text" placeholder="number">
                    <button class="ps-btn btn-info">Apply</button>
                </div>
            </form> --}}


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@section('js')
    <script>
        $(document).ready(function() {
            showcart();
        });

        function plus(id) {
            const pd_id = $('#pd_id' + id).val();
            const price = $('#price' + id).val();
            const maxprice = $('#price' + id).attr('max');
            const tprice = +price + 1;
            if (maxprice > tprice) {
                showcart(pd_id, tprice)
                $('#price' + id).val(tprice);
            }
        }

        function minus(id) {
            const pd_id = $('#pd_id' + id).val();
            const price = $('#price' + id).val();
            const minprice = $('#price' + id).attr('min');
            const tprice = +price - 1;
            if (tprice >= minprice) {
                showcart(pd_id, tprice)
                $('#price' + id).val(tprice);
            }
        }

        function showcart(id = null, qty = null) {
            var id = id;
            var qty = qty;
            // console.log()
            $.ajax({
                url: "{{ route('show.cart') }}",
                type: "POST",
                data: {
                    id: id,
                    qty: qty,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data) {
                    $('#cart').html(data.output);
                    $('#total').html(data.total);

                },
                error: function(data) {
                    alert("fail");
                }
            });
        }

        function removed(id) {
            var id = id;
            $.ajax({
                url: "{{ route('removed.cart') }}",
                type: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data) {
                    showcart();
                    totalitem();
                },
                error: function(data) {
                    alert("fail");
                }
            });
        }
    </script>
@endsection
@endsection
