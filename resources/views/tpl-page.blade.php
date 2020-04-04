<!DOCTYPE html>
<html lang="zh">
{{--整个站点公共页面header--}}
@include('common-header')
<body class="page-body">
{{--顶部导航数据--}}
@include('nav')
{{--页面Content数据，交由具体页面填充--}}
<div class="page-content">
    @yield('content')
</div>
</body>
</html>
