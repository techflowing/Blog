@extends('tpl-page')

{{--页面特定的Header信息--}}
@include('blog.header')

{{--页面Content--}}
@section('content')

    <div class="blog-container">
        <div class="fill-and-overflow-auto">
            <div class="col-sm-10 col-lg-10 col-sm-offset-1 blog-main-content">
                <div class="col-sm-9 col-lg-9 blog-article-container">
                    <table class="blog-article-table">
                        <thead>
                        <tr>
                            <th class="col-sm-8">题目</th>
                            <th class="col-sm-2">分类</th>
                            <th class="col-sm-2">日期</th>
                        </tr>
                        </thead>
                        <tbody id="blog-article-list-body">
                        @isset($blogArticle)
                            @foreach($blogArticle as $article)
                                <tr>
                                    <th class='col-sm-8'>
                                        <a class='blog-article-name' href='{{$article->link}}' target='_blank'>{{$article->title}}</a>
                                    </th>
                                    <th class='col-sm-2'>{{$article->category}}</th>
                                    <th class='col-sm-2'>{{$article->date}}</th>
                                </tr>
                            @endforeach
                        @endisset
                        </tbody>
                    </table>

                    <div class="blog-article-paginator-container">
                        <ul id="blog-article-paginator"></ul>
                    </div>

                </div>
                <div class="col-sm-3 col-lg-3 blog-right-container">
                    <div class="user-profile">
                        @php
                            $userAvatar = config('user_avatar','/static-common/img/logo.png');
                            $userSlogin = config('user_slogin','Coding For Fun，代码改变世界');
                            $username = config('username','Laravel');
                        @endphp
                        <img class="user-profile-avatar" src="{{$userAvatar}}">
                        <p class="user-profile-name">{{$username}}</p>
                        <p class="user-profile-slogin">{{$userSlogin}}</p>
                        <div class="user-profile-statistics">
                            <p class="user-profile-statistics-item">{{$blogCount}}<br>文章</p>
                            <p class="user-profile-statistics-item">{{$categoryCount}}<br>分类</p>
                        </div>
                    </div>
                    @isset($category)
                        <div class="category-detail">
                            <p class="category-title">文章分类</p>
                            @foreach($category as $item)
                                <a class="category-item" href="{{route('wiki.document.detail',['project_id'=>$item->id])}}">
                                    <p class="category-item-name">{{$item->name}}</p>
                                    <p class="category-item-count">{{$item->count}}</p>
                                </a>
                            @endforeach
                        </div>
                    @endisset
                </div>
            </div>
        </div>

        <div class="blog-footer-container">
            @include('tpl-footer')
        </div>

    </div>

@endsection
