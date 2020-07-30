<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

@yield('mobile_nav')

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="/"><img src="img/logo.png" alt=""></a>
                </div>
            </div>

            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="/shop">Shop</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        @if (\Illuminate\Support\Facades\Auth::check())
                            <a href="{{\Illuminate\Support\Facades\Auth::logout()}}">Logout</a>
                        @else
                            <a href="{{route('show_login_form')}}">Login</a>
                            <a href="{{route('show_register_form')}}">Register</a>
                        @endif
                    </div>
                    <x-nav-basket-widget/>
                </div>
            </div>
        </div>

        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>

    </div>
</header>
<!-- Header Section End -->