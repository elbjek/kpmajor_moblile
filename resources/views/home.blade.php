@extends('layouts.app')

@section('content')
<div class="container">
    <div class="home-wrapper">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <home-blade></home-blade>
        {{-- <passport-authorized-clients></passport-authorized-clients>
        <passport-clients></passport-clients> --}}
</div>
@endsection
