<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Stock-Lot</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend')}}/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/plugins/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/plugins/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/plugins/lightGallery-master/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/market-place-4.css">
       @yield('css')
  </head>
  <body>
  
@include('frontend.include.header')

@yield('content')
@include('frontend.include.footer')

    <script src="{{asset('frontend')}}/plugins/jquery.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/nouislider/nouislider.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/popper.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/masonry.pkgd.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/isotope.pkgd.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/jquery.matchHeight-min.js"></script>
    <script src="{{asset('frontend')}}/plugins/slick/slick/slick.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/slick-animation.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/select2/dist/js/select2.full.min.js"></script>
    <script src="{{asset('frontend')}}/plugins/gmap3.min.js"></script>
    <!-- custom scripts-->
    <script src="{{asset('frontend')}}/js/main.js"></script>
       @yield('js')
  </body>
</html>