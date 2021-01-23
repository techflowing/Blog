{{--header名字不许变，包含特定业务需要的Header信息--}}
@section('header')
    <link rel="stylesheet" href="{{ asset('static-xmind/css/app.css') }}">

    <script src="{{asset('static-bower/kity/dist/kity.min.js')}}"></script>
    <script src="{{asset('static-third/layer/layer.js')}}"></script>
    <script src="{{asset('static-xmind/js/kityminder.core.js')}}"></script>
    <script src="{{asset('static-xmind/js/app.js')}}"></script>

    <script type="text/javascript">
        window.current = @json($current);
    </script>

@endsection
