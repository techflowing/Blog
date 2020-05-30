{{--header名字不许变，包含特定业务需要的Header信息--}}
@section('header')
    <link rel="stylesheet" href="{{ mix('static-blog/css/app.css') }}">
    <script src="{{ asset('static-blog/js/app.js') }}"></script>
    <script src="{{ asset('static-third/layer/layer.js') }}"></script>
    <script src="{{ asset('static-third/paginator/bootstrap-paginator.min.js') }}"></script>

    <script type="text/javascript">
        window.pageCount = '{{$pageCount}}';
    </script>
@endsection
