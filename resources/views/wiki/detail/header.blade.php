@section('header')
    <link rel="stylesheet" href="{{ mix('static-wiki/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('static-third/editormd/css/editormd.css') }}">

    <script src="{{ asset('static-third/ztree/js/jquery.ztree.core.min.js') }}"></script>
    <script src="{{ asset('static-third/layer/layer.js') }}"></script>

    <script src="{{ asset('static-third/editormd/editormd.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/marked.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/prettify.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/raphael.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/underscore.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/sequence-diagram.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/flowchart.min.js') }}"></script>
    <script src="{{ asset('static-third/editormd/lib/jquery.flowchart.min.js') }}"></script>

    <script type="text/javascript">
        // 去除转义字符，转换JSON对象为JS对象
        window.wiki_project = JSON.parse('{!!$wiki_project !!}');
        window.wiki_project_id = wiki_project.id;
        window.wiki_doc_catalog = JSON.parse('{!! $doc_catalog !!}');
    </script>

@endsection
