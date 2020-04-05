{{--header名字不许变，包含特定业务需要的Header信息--}}
@section('header')
    <link rel="stylesheet" href="static-third/ztree/css/zTreeStyle.css">
    <script src="static-third/ztree/js/jquery.ztree.core.min.js"></script>
    <SCRIPT LANGUAGE="JavaScript">
        var zTreeObj;
        // zTree 的参数配置，深入使用请参考 API 文档（setting 配置详解）
        var setting = {};
        // zTree 的数据属性，深入使用请参考 API 文档（zTreeNode 节点数据详解）
        var zNodes = [
            {
                name: "test1", open: true, children: [
                    {name: "test1_1"}, {name: "test1_2"}]
            },
            {
                name: "test2", open: true, children: [
                    {name: "test2_1"}, {name: "test2_2"}]
            }
        ];
        $(document).ready(function () {
            zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
        });
    </SCRIPT>

@endsection
