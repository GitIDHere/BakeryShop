@extends('master')

@section('title', 'Password reset')

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
                        <form action="{{route('password.email')}}" method="POST">
                            @csrf

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="email">Email</label>
                            <input type="text" name="email" class="required @error('email') is-invalid @enderror" value="{{old('email')}}">

                            <button type="submit" class="site-btn">Send Password Reset Link</button>
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