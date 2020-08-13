@extends('master')

@section('title', 'Home')

@section('content')
    @include('partials.home._category_selection')
    @include('partials.home._fresh_new_products')
@endsection
