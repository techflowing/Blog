@section('header-start')
    <title>{{ $article->name }}</title>
@endsection
{{--header名字不许变，包含特定业务需要的Header信息--}}
@section('header')

    <link rel="stylesheet" href="{{ asset('static-third/editormd/css/editormd.css') }}">
    {{--复用wiki详情页面的markdown 样式--}}
    <link rel="stylesheet" href="{{ mix('static-wiki/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('static-blog/css/app.css') }}">

    <script src="{{ asset('static-third/editormd/editormd.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/marked.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/prettify.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/raphael.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/underscore.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/sequence-diagram.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/flowchart.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/jquery.flowchart.min.js') }}"></script>

    <script type="text/javascript">
        window.article = @json($article)
    </script>

@endsection
