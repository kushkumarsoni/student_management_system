@extends('layout')
@section('title','Dashboard')
@section('container')

    <div class="page-title">
        <div class="title_left"></div>
        @if(session('success'))
        <h2 class="text-center text-success">{{ session('success') }}</h2>
        @endif
    </div>
    <div class="clearfix"></div>
@endsection
@section('script')
@endsection