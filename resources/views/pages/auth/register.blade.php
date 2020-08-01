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
                    </div>

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

                        @error('address_line_one')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="address_line_one">Address line 1</label>
                        <input type="text" name="address_line_one"
                               class="@error('address_line_one') is-invalid @enderror"
                               value="{{old('address_line_one')}}">

                        @error('address_line_two')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="address_line_two">Address line 2</label>
                        <input type="text" name="address_line_two"
                               class="@error('address_line_two') is-invalid @enderror"
                               value="{{old('address_line_two')}}">

                        @error('city')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="city">City</label>
                        <input type="text" name="city"
                               class="@error('city') is-invalid @enderror"
                               value="{{old('city')}}">

                        @error('postcode')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="postcode">Postcode</label>
                        <input type="text" name="postcode"
                               class="@error('postcode') is-invalid @enderror"
                               value="{{old('postcode')}}">

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