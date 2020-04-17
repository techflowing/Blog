@extends('tpl-page')

@include('errors.header')

{{--页面Content--}}
@section('content')

    <div class="errors-container">
        <div class="errors-content">
            <h1 class="error-code">@yield('code')</h1>
            <h2 class="error-message">@yield('message')</h2>
        </div>
    </div>
@endsection
