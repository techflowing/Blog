@foreach($categories as $category)

    @if(count($category->sites) != 0)

        <h4 class="navigation-category"><i class="linecons-tag" style="margin-right: 7px;"
                                           id="{{ $category->title }}"></i>{{ $category->title }}</h4>

        @php

            $mediaStore = config('mediastore.name');

            foreach ($category->sites->chunk(4) as $sites){
            echo '<div class="row">';

                foreach($sites as $site){
                    echo <<<EOF
                    <div class="col-sm-3">
                        <div class="xe-widget xe-conversations box2 label-info" onclick="window.open('$site->url', '_blank')">
                            <div class="xe-comment-entry">
                                <div class="xe-comment">
                                    <a href="#" class="xe-user-name overflowClip_1">
                                        $site->title
                                    </a>
                                    <p class="overflowClip_2">$site->describe</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    EOF;
                }

                echo '</div>';
            }
        @endphp

    @endif

    <br>
@endforeach
