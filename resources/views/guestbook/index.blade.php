@extends('tpl-page')

{{--页面特定的Header信息--}}
@include('guestbook.header')

{{--页面Content--}}
@section('content')

    <div class="guest-book-container">

        <div class="fill-and-overflow-auto">
            <form autocomplete="off">
                <div class="col-sm-8 col-lg-8 col-sm-offset-2 valine-container" id="vcomments">
                </div>
            </form>
        </div>

        <div class="guest-book-footer-container">
            @include('tpl-footer')
        </div>
    </div>

    <script>
        new Valine({
            el: '#vcomments',
            appId: '{{config('valine_app_id','Qbo9OXrWmbsahg21m7A4VKIx-gzGzoHsz')}}',
            appKey: '{{config('valine_app_key','DMbLvtMz659xtt1skJwTK6UG')}}',
            placeholder: '{{config('valine_placeholder',"道友请举手发言")}}',
            avatar: '{{config('valine_avatar','wavatar')}}',
            pageSize: '{{config('valine_page_size',20)}}',
        })
    </script>

    <link rel="stylesheet" href="{{ mix('static-guestbook/css/app.css') }}">

@endsection
