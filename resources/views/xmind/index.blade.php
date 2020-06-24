@extends('tpl-page')

{{--页面特定的Header信息--}}
@include('xmind.header')

{{--页面Content--}}
@section('content')
    <div class="xmind-container">
        <div class="col-sm-2 col-lg-2 xmind-list-container">
            @isset($projects)
                @foreach($projects as $item)
                    <p class="xmind-item-name">{{$item->name}}</p>
                @endforeach
            @endisset
        </div>

        <div class="col-sm-10 col-lg-10 xmind-map-container">

            @php
                $curName = '';
                $curContent = '';
            @endphp

            @isset($current)
                @php
                    if (!empty($current)) {
                        $curName = $current->name;
                        $curContent = $current->content;
                    }
                @endphp
            @endisset

            <p class="xmind-name" id="xmind-name"></p>

            <div class="xmind-content" id="xmind-content">

            </div>

            <div class="xmind-zoom-container">
                <img class="xmind-zoom-img" onclick="zoomIn()" src="{{asset('static-xmind/img/zoom-in.png')}}">
                <img class="xmind-zoom-img" onclick="zoomForce()" src="{{asset('static-xmind/img/focus.png')}}">
                <img class="xmind-zoom-img" onclick="zoomOut()" src="{{asset('static-xmind/img/zoom-out.png')}}">
            </div>

            <div class="xmind-footer-container">
                @include('tpl-footer')
            </div>
        </div>
    </div>
@endsection
