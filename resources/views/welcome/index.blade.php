@extends('tpl-page')

@include('welcome.header')

@section('content')
    <div class="circle-container">
        <div class="outer-circle" onclick="window.open('/navigation','_self')">
            <div class="inner-circle">
            </div>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
@endsection
