@extends('tpl-page')

@include('welcome.header')

@section('content')
    <div class="welcome-container">
        <div class="welcome-center-container">
            <div class="outer-circle" onclick="window.open('/blog','_self')">
                <div class="inner-circle">
                </div>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="welcome-profile-container">
                @php
                    $userSlogin = config('user_slogin','Coding For Fun，代码改变世界');
                @endphp
                <p class="user-profile-slogin">{{$userSlogin}}</p>
            </div>

            @isset($homeMenu)
                <div class="welcome-nav-menu-container">
                    @foreach($homeMenu as $menu)
                        <a class="welcome-nav-menu" href="/{{$menu->path}}">{{$menu->name}}</a>
                    @endforeach
                </div>
            @endisset
        </div>

    </div>

@endsection
