  <header class="header header--standard header--market-place-4" data-sticky="true">
      <div class="header__top" style="color:white;background:black">
          <div class="container">
              <div class="header__left">
                  <p style="color: white">Welcome to Martfury Online Shopping Store !</p>
              </div>
              <div class="header__right">
                  <ul class="header__top-links">
                      <li><a href="#" style="color: white">Store Location</a></li>
                      <li><a href="#" style="color: white">Track Your Order</a></li>
                      <li>
                          <div class="ps-dropdown"><a href="#" style="color: white">US Dollar</a>
                              <ul class="ps-dropdown-menu">
                                  <li><a href="#" style="color: white">Us Dollar</a></li>
                                  <li><a href="#" style="color: white">Euro</a></li>
                              </ul>
                          </div>
                      </li>
                      <li>
                          <div class="ps-dropdown language"><a href="#"><img
                                      src="{{ asset('frontend') }}/img/flag/en.png" alt="">English</a>
                              <ul class="ps-dropdown-menu">
                                  <li><a href="#"><img src="{{ asset('frontend') }}/img/flag/germany.png" alt="">
                                          Germany</a></li>
                                  <li><a href="#"><img src="{{ asset('frontend') }}/img/flag/fr.png" alt="">
                                          France</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <div class="header__content">
          <div class="container">
              <div class="header__content-left"><a class="ps-logo" href="{{ route('home') }}"><img
                          src="{{ asset('frontend') }}/img/logo/2h.png" alt=""></a>
                  <div class="menu--product-categories">
                      <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
                      <div class="menu__content">
                          <ul class="menu--dropdown">
                              @foreach (HelpCat::category_list() as $item)

                                  <li class="menu-item-has-children has-mega-menu">
                                      <a
                                          href="{{ route('product.list.category', [$item->id]) }}">{{ $item->name }}</a>
                                      <div class="mega-menu" style="width: 200px; min-width: 0;">
                                          <div class="mega-menu__column">

                                              <ul class="mega-menu__list" style="width: 200px;">
                                                  @forelse ($item->subcategory as $subcate)
                                                      <li><a
                                                              href="{{ route('product.list.subcategory', [$subcate->id]) }}">{{ $subcate->name }}</a>
                                                      </li>
                                                  @empty
                                                      <li><a>No subcategory</a>
                                                      </li>
                                                  @endforelse
                                              </ul>
                                          </div>

                                      </div>
                                  </li>
                              @endforeach


                              <li><a href="#">About</a>
                              </li>
                              <li><a href="#">Contact</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="header__content-center">
                  <form class="ps-form--quick-search" action="index.html" method="get">
                      <div class="form-group--icon"><i class="icon-chevron-down"></i>
                          <select class="form-control">
                              <option value="1">All</option>

                              @foreach (HelpCat::category_list() as $item)

                                  <option value="{{ $item->id }}"> {{ $item->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <input class="form-control" type="text" placeholder="I'm shopping for...">
                      <button>Search</button>
                  </form>
                  <p><a href="#">Product</a><a href="#">Best Shop</a><a href="#">Best Product</a><a href="#">Top
                          Sale</a><a href="#">Quality</a><a href="#">Wholesale Marketplace</a>
                  </p>
              </div>
              <div class="header__content-right">
                  <div class="header__actions"><a class="header__extra" href="#"><i
                              class="icon-heart"></i><span><i>0</i></span></a>
                      <div class="ps-cart--mini"><a class="header__extra" href="{{ route('product.cart') }}"><i
                                  class="icon-bag2"></i><span><i id="totalitem">@auth
                                          {{ count(session('cart', [])) }}
                                  @else 0 @endauth</i></span></a>

                      <div class="ps-cart__content" id="minicart">

                      </div>
                  </div>
                  <div class="ps-block--user-header">

                      <div class="ps-block__left"><a href="{{ route('login') }}"><i
                                  class="icon-user"></i></a>
                      </div>
                      <div class="ps-block__right " style="padding-top: 8px">
                          @auth
                              <a href="{{ route('login') }}">{{ Auth::user()->name }}</a>

                          @else
                              <a href="{{ route('login') }}">Login</a>
                              <a href="{{ route('register') }}">Register</a>
                          @endauth
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
</header>
<header class="header header--mobile" data-sticky="true" style="background: #08dcd3">
  <div class="header__top">
      <div class="header__left">
          <p>Welcome to Martfury Online Shopping Store !</p>
      </div>
      <div class="header__right">
          <ul class="navigation__extra">
              <li><a href="#">Sell on Martfury</a></li>
              <li><a href="#">Tract your order</a></li>
              <li>
                  <div class="ps-dropdown"><a href="#">US Dollar</a>
                      <ul class="ps-dropdown-menu">
                          <li><a href="#">Us Dollar</a></li>
                          <li><a href="#">Euro</a></li>
                      </ul>
                  </div>
              </li>
              <li>
                  <div class="ps-dropdown language"><a href="#"><img
                              src="{{ asset('frontend') }}/img/flag/en.png" alt="">English</a>
                      <ul class="ps-dropdown-menu">
                          <li><a href="#"><img src="{{ asset('frontend') }}/img/flag/germany.png" alt="">
                                  Germany</a></li>
                          <li><a href="#"><img src="{{ asset('frontend') }}/img/flag/fr.png" alt=""> France</a>
                          </li>
                      </ul>
                  </div>
              </li>
          </ul>
      </div>
  </div>
  <div class="navigation--mobile">
      <div class="navigation__left"><a class="ps-logo" href="index.html"><img
                  src="{{ asset('frontend') }}/img/logo/2h.png" alt=""></a></div>
      <div class="navigation__right">
          <div class="header__actions">
              <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i
                              id="totalitem2">@auth
                                  {{ count(session('cart', [])) }}
                          @else 0 @endauth</i></span></a>
              <div class="ps-cart__content" id="minicart2">

              </div>
          </div>
          <div class="ps-block--user-header">
              <div class="ps-block__left"><a href="{{ route('login') }}"> <i class="icon-user"></i></a>
              </div>
              <div class="ps-block__right"><a href="{{ route('login') }}">Login</a><a
                      href="{{ route('register') }}">Register</a></div>
          </div>
      </div>
  </div>
</div>

</header>
<div class="ps-panel--sidebar" id="cart-mobile">
<div class="ps-panel__header">
  <h3>Shopping Cart</h3>
</div>
<div class="navigation__content">
  <div class="ps-cart--mobile">
      <div class="ps-cart__content">
          <div class="ps-product--cart-mobile">
              <div class="ps-product__thumbnail"><a href="#"><img
                          src="{{ asset('frontend') }}/img/products/clothing/7.jpg" alt=""></a></div>
              <div class="ps-product__content"><a class="ps-product__remove" href="#"><i
                          class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather
                      Watch In Black</a>
                  <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
              </div>
          </div>
      </div>
      <div class="ps-cart__footer">
          <h3>Sub Total:<strong>$59.99</strong></h3>
          <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn"
                  href="checkout.html">Checkout</a></figure>
      </div>
  </div>
</div>
</div>
<div class="ps-panel--sidebar" id="navigation-mobile">
<div class="ps-panel__header">
  <h3>Categories</h3>
</div>
<div class="ps-panel__content">
  <ul class="menu--mobile">





      @foreach (HelpCat::category_list() as $item)

          <li class="menu-item-has-children has-mega-menu"><a
                  href="{{ route('product.list.category', [$item->id]) }}">{{ $item->name }}</a><span
                  class="sub-toggle"></span>
              <div class="mega-menu">
                  <div class="mega-menu__column">


                      @forelse ($item->subcategory as $subcate)
                          <h4><a href="{{ route('product.list.subcategory', [$subcate->id]) }}">{{ $subcate->name }}
                              </a> </h4>
                      @empty
                          <h4> No subcategory</h4>
                      @endforelse
                  </div>

              </div>
          </li>
      @endforeach
      <li><a href="#">Contact</a>
      </li>

  </ul>
</div>
</div>
<div class="navigation--list">
<div class="navigation__content">

  <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i>

      {{-- <span> Categories</span> --}}
  </a>

  <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i>
      {{-- <span>Cart</span> --}}
  </a>
  <a class="navigation__item ps-togglhe--sidebar" href="{{ route('home') }}"><i class="icon-home"></i>
      {{-- <span> Home</span> --}}
  </a>
  <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i>
      {{-- <span>Search</span> --}}
  </a>
  <a class="navigation__item ps-toggle--sidebar" href="#login-mobile"><i class="icon-user"></i>
      {{-- <span> Account</span> --}}
  </a>
</div>
</div>
<div class="ps-panel--sidebar" id="search-sidebar">
<div class="ps-panel__header">
  <form class="ps-form--search-mobile" action="index.html" method="get">
      <div class="form-group--nest">
          <input class="form-control" type="text" placeholder="Search something...">
          <button><i class="icon-magnifier"></i></button>
      </div>
  </form>
</div>
<div class="navigation__content"></div>
</div>
<div class="ps-panel--sidebar" id="login-mobile">

@if (Auth::check())
  <div class="ps-panel__header">
      <h3>My Account</h3>
  </div>
@else
  <div class="ps-panel__header">
      <h3>Login</h3>
  </div>
  <div class="navigation__content">
      <div class="ps-cart--mobile">

          <div class="ps-section__left">
              <div class="ps-form--account ps-tab-rsoot" style="padding-top: 0">
                  <div class="ps-tabs">
                      <div class="ps-tab active" id="sign-in">
                          <form method="POST" action="{{ route('login') }}">
                              @csrf

                              <div class="ps-form__content">
                                  <h5><a href="{{ route('register') }}">Aleady have account? </a></h5>

                                  <div class="form-group">
                                      <input id="email" type="email" class="form-control " name="email"
                                          value="" required="" autocomplete="email" autofocus=""
                                          placeholder="Username or email address">

                                  </div>

                                  <div class="form-group form-forgot">
                                      <input id="password" type="password" class="form-control "
                                          name="password" required="" autocomplete="current-password"
                                          placeholder="Password">

                                      <a href="">Forgot?</a>
                                  </div>


                                  <div class="form-group">
                                      <div class="ps-checkbox">
                                          <input class="form-control" type="checkbox" id="remember-me"
                                              name="remember-me">
                                          <label for="remember-me">Rememeber me</label>
                                      </div>
                                  </div>
                                  <div class="form-group submit">
                                      <button class="ps-btn ps-btn--fullwidth">Login</button>
                                  </div>

                              </div>
                          </form>
                      </div>


                  </div>
              </div>
          </div>


      </div>
  </div>

@endif


</div>

<script>
    totalitem();

    function totalitem() {
        $.ajax({
            url: "{{ route('total-item') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },

            dataType: "json",
            success: function(res) {

                $('#totalitem').text(res.item);
                $('#totalitem2').text(res.item);
                $('#minicart2').html(res.minicart);
            },
            error: function(data) {
                alert("item fail");
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
                totalitem();
            },
            error: function(data) {
                alert("fail");
            }
        });
    }
</script>
