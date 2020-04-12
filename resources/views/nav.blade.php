{{--顶部导航--}}
<nav class="navbar horizontal-menu navbar-fixed-top">
    <div class="navbar-inner">

        <!-- Navbar Brand -->
        <div class="navbar-brand">
            <a href="/" class="logo">
                <img src="{{asset('/static-common/img/logo@2x.png')}}" width="120" alt=""/>
            </a>
        </div>

        @php
            $curPath = Request::path();
        @endphp

        @if(count($navMenu) != 0)
            <ul class="navbar-nav">
                @foreach($navMenu as $menu)
                    <li class="{{substr($curPath, 0, strlen($menu->path)) === $menu->path ? 'active' : ''}}">
                        <a target="{{$menu->target == \App\Model\Admin\HomeNavMenu::$TYPE_TARGET_BLANK ? '_black' : '_self'}}"
                           href="/{{$menu->path}}">
                            <span class="title">{{$menu->name}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

</nav>
