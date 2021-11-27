<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Stock Lot || Admin Dashboard </title>

    <!-- Bootstrap -->
    <link href="{{ asset('backend') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('backend') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('backend') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('backend') }}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
        rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('backend') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    @yield('css')
    <!-- Custom Theme Style -->
    <link href="{{ asset('backend') }}/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @include('admin.include.header')
            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                StockLot by <a href="">Codewin IT</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
    </div>



    <!-- jQuery -->
    <script src="{{ asset('backend') }}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('backend') }}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('backend') }}/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{ asset('backend') }}/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="{{ asset('backend') }}/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('backend') }}/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- morris.js -->
    <script src="{{ asset('backend') }}/vendors/raphael/raphael.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/morris.js/morris.min.js"></script>
    <!-- gauge.js -->
    <script src="{{ asset('backend') }}/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('backend') }}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Skycons -->
    <script src="{{ asset('backend') }}/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="{{ asset('backend') }}/vendors/Flot/jquery.flot.js"></script>
    <script src="{{ asset('backend') }}/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="{{ asset('backend') }}/vendors/Flot/jquery.flot.time.js"></script>
    <script src="{{ asset('backend') }}/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="{{ asset('backend') }}/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('backend') }}/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="{{ asset('backend') }}/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="{{ asset('backend') }}/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('backend') }}/vendors/moment/min/moment.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('backend') }}/build/js/custom.min.js"></script>
    @yield('js')
</body>

</html>
