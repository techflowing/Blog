@section('header')

    <link rel="stylesheet" href="{{ asset('static-third/editormd/css/editormd.css') }}">
    <link rel="stylesheet" href="{{ mix('static-admin/wiki/css/app.css') }}">

    <script src="{{ asset('static-third/ztree/js/jquery.ztree.core.min.js') }}"></script>
    <script src="{{ asset('static-third/ztree/js/jquery.ztree.exedit.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/editormd.js') }}"></script>
    <script src="{{ asset('static-third/layer/layer.js') }}"></script>

    <script type="text/javascript">
        // 去除转义字符，转换JSON对象为JS对象
        window.wiki_project = JSON.parse('{!!$wiki_project !!}');
        window.wiki_project_id = wiki_project.id;
        window.wiki_doc_catalog = JSON.parse('{!! $doc_catalog !!}');
    </script>

@endsection
