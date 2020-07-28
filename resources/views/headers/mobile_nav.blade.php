@section('mobile_nav')
<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>

    <x-nav-basket-widget isMobile="true" />

    <div class="offcanvas__logo">
        <a href="/"><img src="img/logo.png" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        <a href="{{route('user.login')}}">Login</a>
        <a href="#">Register</a>
    </div>
</div>
<!-- Offcanvas Menu End -->
@endsection