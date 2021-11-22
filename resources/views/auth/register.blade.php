@extends('frontend.master')
@section('content')
    <div class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </div>
        <div class="ps-my-account-2">
            <div class="container">
                <div class="ps-section__wrapper">
                    <div class="ps-section__left">
                        <div class="ps-form--account ps-tab-rsoot">
                            <div class="ps-tab-list">


                                @if (!empty($id))
                                    <div style="width:100%;max-width:50%;margin-right:0;padding:20px 15px;"><a href=""
                                            style="font-size:24px;line-height:1em;color:#666;font-weight:600;">Login</a>
                                    </div>
                                    <div style="width:100%;max-width:50%;margin-right:0;padding:20px 15px;"><a href=""
                                            style="font-size:24px;line-height:1em;color:#fcb800;font-weight:600;">Register</a>
                                    </div>

                                @else
                                    <div style="width:100%;max-width:50%;margin-right:0;padding:20px 15px;"><a
                                            href="{{ route('login') }}"
                                            style="font-size:24px;line-height:1em;color:#666;font-weight:600;">Login</a>
                                    </div>
                                    <div style="width:100%;max-width:50%;margin-right:0;padding:20px 15px;"><a
                                            href="{{ route('register') }}"
                                            style="font-size:24px;line-height:1em;color:#fcb800;font-weight:600;">Register</a>
                                    </div>

                                @endif

                            </div>


                            <div class="ps-tabs">



                                <form method="POST" action="{{ route('register') }}">


                                    @csrf



                                    <div class="ps-form__content">
                                        <h5>Register An Account</h5>
                                        <div class="form-group">
                                            <select name="role" class="form-control @error('role') is-invalid @enderror"
                                                value="{{ old('role') }}" required autocomplete="role" autofocus
                                                type="text" placeholder="Merchant or Reseller">
                                                <option selected value=''>Select Role</option>
                                                <option value="merchant">Be a Merchant</option>
                                                <option value="reseller">Be a Reseller/Showroom/Facebook/Whatsapp</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select id="country" name="country_code"
                                                class="form-control @error('country') is-invalid @enderror"
                                                value="{{ old('country_code') }}" required autocomplete="country"
                                                autofocus type="text" placeholder="country">
                                                <option selected value=''>Select Country</option>
                                            </select>


                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <select id="state" name="state"
                                                class="form-control @error('state') is-invalid @enderror"
                                                value="{{ old('state') }}" required autocomplete="country" autofocus
                                                type="text" placeholder="country">
                                                <option selected value=''> Select State/Division</option>
                                            </select>
                                        </div>
                                        {{-- <div class="form-group">
                        <input class="form-control" required type="text" name="distrct" placeholder="Distrct">
                    </div> --}}
                                        <div class="form-group">

                                            <div id="country_3">
                                            </div>
                                            <div id="country_4">
                                            </div>
                                            <div id="country_5">
                                            </div>

                                            <input id="name" class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus required
                                                type="text" name="name" placeholder="Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                required type="email" placeholder="Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="phone" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                                type="phone" required placeholder="Phone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <textarea id="address"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                value="{{ old('address') }}" required autocomplete="address"
                                                placeholder="address" required>{{ old('address') }}</textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">

                                            @if (!empty($id))
                                                <input class="form-control" type="hidden" name="refered_id"
                                                    value="{{ $id }}" placeholder="Affiliate">
                                            @else
                                                <input class="form-control" type="hidden" name="refered_id">
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password" placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="confirm Password">
                                        </div>

                                        <div class="form-group submit">
                                            <button class="ps-btn ps-btn--fullwidth">Register</button>
                                        </div>
                                    </div>
                                </form>

                                <script language="javascript">


                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="ps-section__right">
                        <figure class="ps-section__desc">
                            <figcaption>Sign up today and you will be able to:</figcaption>
                            <p>MartFury Buyer Protection has you covered from click to delivery. Sign up or sign in and you
                                will be able to:</p>
                            <ul class="ps-list">
                                <li><i class="icon-credit-card"></i><span>SPEED YOUR WAY THROUGH CHECKOUT</span></li>
                                <li><i class="icon-clipboard-check"></i><span>TRACK YOUR ORDERS EASILY</span></li>
                                <li><i class="icon-bag2"></i><span>KEEP A RECORD OF ALL YOUR PURCHASES</span></li>
                            </ul>
                        </figure>
                        <div class="ps-section__coupon"><span>$25</span>
                            <aside>
                                <h5>A small gift for your first purchase</h5>
                                <p>Martfury give $25 as a small gift for your first purchase. Welcome to Martfury!</p>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-newsletter">
        <div class="container">
            <form class="ps-form--newsletter" action="do_action" method="post">
                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__left">
                            <h3>Newsletter</h3>
                            <p>Subcribe to get information about products and coupons</p>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__right">
                            <div class="form-group--nest">
                                <input class="form-control" type="email" placeholder="Email address">
                                <button class="ps-btn">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('frontend/js/country_list/country.js') }}"></script>
@endsection
