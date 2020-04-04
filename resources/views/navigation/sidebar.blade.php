<div class="sidebar-menu toggle-others fixed">
    <div class="sidebar-menu-inner">
        <ul id="main-menu" class="main-menu">
            @foreach ($categories as $categorie)
                <li>
                    @if ($categorie->children_count == 0 && $categorie->parent_id == 0)
                        <a href="#{{ $categorie->title }}" class="smooth">
                            <i class="fa fa-fw {{ $categorie->icon }}"></i>
                            <span class="title">{{ $categorie->title }}</span>
                        </a>
                    @elseif ($categorie->children_count != 0 && $categorie->parent_id == 0)
                        <a href="#">
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
