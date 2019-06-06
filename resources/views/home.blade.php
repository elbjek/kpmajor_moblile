@extends('layouts.app')

@section('content')
<div class="container">
    <div class="home-wrapper">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="search">
            <search-bar></search-bar>
        </div>
        <div class="latest-products">
            <new-products></new-products>
        </div>
        <div class="products-list">
            <products-list></products-list>
        </div>
    </div>
</div>
@endsection
