@extends('master')

@section('title', 'Register')

@section('content')

<x-breadcrumbs />

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">

            <div class="contact__form">
                <h5>Register</h5>

                <form action="{{route('register.request')}}" method="POST" class="row">
                    @csrf

                    <div class="col-lg-6 col-md-6">

                        <div class="row">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name"
                                       class="@error('first_name') is-invalid @enderror"
                                       value="{{old('first_name')}}">
                            </div>

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="surname">Surname</label>
                                <input type="text" name="surname"
                                       class="@error('surname') is-invalid @enderror"
                                       value="{{old('surname')}}">
                            </div>
                        </div>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="email">Email</label>
                        <input type="text" name="email"
                               class="@error('email') is-invalid @enderror"
                               value="{{old('email')}}">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="password">Password</label>
                        <input type="password" name="password"
                               class="@error('password') is-invalid @enderror"
                               value="">

                        <label for="password_confirmation">Confirm password</label>
                        <input type="password" name="password_confirmation">

                        <button type="submit" class="site-btn">Register</button>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
</section>
<!-- Contact Section End -->
@endsection