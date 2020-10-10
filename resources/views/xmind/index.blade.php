@extends('tpl-page')

{{--页面特定的Header信息--}}
@include('xmind.header')

{{--页面Content--}}
@section('content')
    <div class="xmind-container">
        <div class="xmind-list-container sidebar-menu">
            <div class="sidebar-menu-inner">
                @isset($projects)
                    <ul id="main-menu" class="main-menu">
                        @foreach($projects as $item)
                            <li class="has-sub expanded">
                                <a href="#" style="pointer-events: none">
                                    <i class="fa fa-fw {{ $item->icon }}"></i>
                                    <span class="title">{{ $item->title }}</span>
                                </a>
                                <ul style="display: block">
                                    @foreach ($item->xminds as $xmind)
                                        <li>
                                            <a class="smooth xmind-item-name">
                                                <span class="title">{{ $xmind->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                @endisset
            </div>
        </div>

        <div class="xmind-map-container">

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
