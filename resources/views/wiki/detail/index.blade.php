@extends('tpl-page')

@include('wiki.detail.header')

@section('content')

    <div class="page-container">

        @include('wiki.detail.sidebar')

        <div class="main-content">
            @include('wiki.detail.content')
        </div>
    </div>

    {{--不能放head里！！！--}}
    <script src="{{ mix('static-wiki/js/app.js') }}"></script>

@endsection
