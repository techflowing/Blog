{{--header名字不许变，包含特定业务需要的Header信息--}}
@section('header')
    <link rel="stylesheet" href="{{asset('static-bower/bootstrap/dist/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('static-bower/codemirror/lib/codemirror.css')}}"/>
    <link rel="stylesheet" href="{{asset('static-bower/hotbox/hotbox.css')}}"/>
    <link rel="stylesheet" href="{{asset('static-bower/kityminder-core/dist/kityminder.core.css')}}"/>
    <link rel="stylesheet" href="{{asset('static-bower/kityminder-editor/dist/kityminder.editor.css')}}"/>
    <link rel="stylesheet" href="{{asset('static-bower/color-picker/dist/color-picker.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('static-admin/xmind/css/app.css')}}"/>

    <script src="{{asset('static-bower/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('static-bower/bootstrap/dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('static-bower/angular/angular.js')}}"></script>
    <script src="{{asset('static-bower/angular-bootstrap/ui-bootstrap-tpls.js')}}"></script>
    <script src="{{asset('static-bower/codemirror/lib/codemirror.js')}}"></script>
    <script src="{{asset('static-bower/codemirror/mode/xml/xml.js')}}"></script>
    <script src="{{asset('static-bower/codemirror/mode/javascript/javascript.js')}}"></script>
    <script src="{{asset('static-bower/codemirror/mode/css/css.js')}}"></script>
    <script src="{{asset('static-bower/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
    <script src="{{asset('static-bower/codemirror/mode/markdown/markdown.js')}}"></script>
    <script src="{{asset('static-bower/codemirror/addon/mode/overlay.js')}}"></script>
    <script src="{{asset('static-bower/codemirror/mode/gfm/gfm.js')}}"></script>
    <script src="{{asset('static-bower/angular-ui-codemirror/ui-codemirror.js')}}"></script>
    <script src="{{asset('static-bower/marked/lib/marked.js')}}"></script>
    <script src="{{asset('static-bower/kity/dist/kity.min.js')}}"></script>
    <script src="{{asset('static-bower/hotbox/hotbox.js')}}"></script>
    <script src="{{asset('static-bower/json-diff/json-diff.js')}}"></script>
    <script src="{{asset('static-bower/color-picker/dist/color-picker.min.js')}}"></script>
    <script src="{{asset('static-bower/kityminder-core/dist/kityminder.core.min.js')}}"></script>
    <script src="{{asset('static-bower/kityminder-editor/dist/kityminder.editor.min.js')}}"></script>

    <script src="{{asset('static-admin/xmind/js/app.js')}}"></script>
    <script src="{{ asset('static-third/layer/layer.js') }}"></script>

    <script type="text/javascript">
        window.project = @json($project);
    </script>

@endsection
