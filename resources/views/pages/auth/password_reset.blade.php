@extends('master')

@section('title', 'Reset password')

@section('content')

<x-breadcrumbs />

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <div class="contact__content">
                    <div class="contact__form">
                        <h5>Reset password</h5>

                        <form action="{{route('password.update')}}" method="POST">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="email">Email</label>
                            <input type="text" name="email" class="required @error('email') is-invalid @enderror" value="{{old('email')}}">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="password">New password</label>
                            <input type="password" name="password" class="required @error('password') is-invalid @enderror">

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="password_confirmation">Confirm password</label>
                            <input type="password" name="password_confirmation" class="required @error('password_confirmation') is-invalid @enderror">

                            <button type="submit" class="site-btn">Reset password</button>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Contact Section End -->
@endsection