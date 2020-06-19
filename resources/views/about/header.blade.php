{{--header名字不许变，包含特定业务需要的Header信息--}}
@section('header')
    <link rel="stylesheet" href="{{ asset('static-third/editormd/css/editormd.css') }}">
    <link rel="stylesheet" href="{{ mix('static-about/css/app.css') }}">

    <script src="{{ asset('static-third/editormd/editormd.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/marked.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/prettify.min.js') }}"></script>

    <script type="text/javascript">
        window.aboutMe = @json($aboutMe);
        window.aboutSite = @json($aboutSite)
    </script>

@endsection
