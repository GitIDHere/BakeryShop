@extends('master')

@section('title', 'Login')

@section('content')

<x-breadcrumbs />

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <div class="contact__content">
                    <div class="contact__form">
                        <h5>Login</h5>

                        <form action="{{route('login.request')}}" method="POST">
                            @csrf

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="email">Email</label>
                            <input type="text" name="email" class="@error('email') is-invalid @enderror" value="{{old('email')}}">


                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="email">Password</label>
                            <input type="password" name="password" class="@error('password') is-invalid @enderror" value="{{old('password')}}">

                            @error('remember_me')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="chbx-wrap">
                                <label for="remember_me" class="">Remember me</label>
                                <input class="chbx @error('remember_me') is-invalid @enderror form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            </div>

                            <div class="clear"></div>

                            <div class="row">
                                <div class="col-lg-12">

                                <button type="submit" class="site-btn">Login</button>

                                @if (Route::has('password.request'))
                                    <a class="site-btn" href="{{ route('password.request') }}">Forgot Your Password?</a>
                                @endif
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</section>
<!-- Contact Section End -->
@endsection