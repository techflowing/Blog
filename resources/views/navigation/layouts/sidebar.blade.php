<div class="sidebar-menu toggle-others fixed">
    <div class="sidebar-menu-inner">
        <header class="logo-env">
            <!-- logo -->
            <div class="logo">
                <a href="/" class="logo-expanded">
                    <img src="{{ asset('static-common/img/logo@2x.png') }}" width="100%" alt=""/>
                </a>
                <a href="/" class="logo-collapsed">
                    <img src="{{ asset('static-common/img/logo-collapsed@2x.png') }}" width="40" alt=""/>
                </a>
            </div>
            <div class="mobile-menu-toggle visible-xs">
                <a href="#" data-toggle="user-info-menu">
                    <i class="linecons-cog"></i>
                </a>
                <a href="#" data-toggle="mobile-menu">
                    <i class="fa-bars"></i>
                </a>
            </div>
        </header>
        <ul id="main-menu" class="main-menu">
            @foreach ($categories as $categorie)
                <li>
                    @if ($categorie->children_count == 0 && $categorie->parent_id == 0)
                        <a href="#{{ $categorie->title }}" class="smooth">
                            <i class="fa fa-fw {{ $categorie->icon }}"></i>
                            <span class="title">{{ $categorie->title }}</span>
                        </a>
                    @elseif ($categorie->children_count != 0 && $categorie->parent_id == 0)
                        <a>
                            <i class="fa fa-fw {{ $categorie->icon }}"></i>
                            <span class="title">{{ $categorie->title }}</span>
                        </a>
                        <ul>
                            @foreach ($categorie->children as $child)
                                <li>
                                    <a href="#{{ $child->title }}" class="smooth">
                                        <span class="title">{{ $child->title }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
