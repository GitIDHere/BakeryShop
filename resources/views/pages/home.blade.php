@extends('master')

@section('title', 'Home')

@section('content')
    @include('partials.home._category_selection')
    @include('partials.home._fresh_new_products')
    @include('partials.home._services')
    @include('partials.home._suggestions')
@endsection
