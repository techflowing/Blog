@extends('tpl-page')

{{--页面特定的Header信息--}}
@include('blog.header')

{{--页面Content--}}
@section('content')

    <div class="page-container">
        <div class="col-sm-10 col-lg-10 col-sm-offset-1 blog-container">
            <div class="col-sm-9 blog-article-container">
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

                @include('tpl-footer')

            </div>
            <div class="user-profile col-sm-3 col-lg-3">

            </div>
        </div>
    </div>

@endsection
