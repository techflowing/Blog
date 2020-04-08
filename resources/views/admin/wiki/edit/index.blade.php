<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wiki编辑</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="{{ asset('static-common/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ mix('static-common/css/common.css') }}">
    <link rel="stylesheet" href="{{ mix('static-admin/wiki/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('static-third/editormd/css/editormd.css') }}">

    <script src="{{ mix('static-common/js/common.js') }}"></script>
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

    <script type="text/javascript">
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    </script>

</head>
<body>
<div id="wiki-edit-container" class="page-container">
    {{--侧边栏--}}
    <div id="wiki-sidebar" class="sidebar-menu">
        <div class="sidebar-menu-inner">
            <header id="sidebar-menu-top" class="logo-env">
                <p class="col-md-3">目录</p>
                <p class="wiki-create-btn col-md-4" id="create-document-btn">新建文档</p>
                <p class="wiki-create-btn col-md-5" id="create-document-dir-btn">新建文件夹</p>
            </header>
        </div>
        <ul id="treeDemo" class="ztree"></ul>
    </div>
    {{--markdown编辑区--}}
    <div class="wiki-editor-md">
        <form id="form-editormd" method="post" action="">
            <div class="editormd-body">
                <div id="editormd">
                    <input type="hidden" name="doc_id" id="documentId">
                    <textarea style="display:none;"> Hello，开始创作吧 </textarea>
                </div>
            </div>
        </form>
    </div>
</div>


{{--新建文档 Modal--}}
<div class="modal fade" id="create-document" tabindex="-1" role="dialog" aria-labelledby="添加文件" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('wiki.document.create')}}" id="form-document">
                @csrf
                <input type="hidden" name="project_id" value="{{$project_id or ''}}">
                {{--0 表示文档--}}
                <input type="hidden" name="type" value="0">
                <input type="hidden" name="parent_id" value="0">
                {{--Ztree 内节点标识--}}
                <input type="hidden" name="parent_t_id" value="">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">新建文档</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="documentName" class="col-sm-2 control-label" id="inputTitle">名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="documentName" placeholder="文档名称" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="error-message" style="color: #919191; font-size: 13px;"></span>
                    <button type="submit" class="btn btn-primary" id="create-document-action-btn" data-loading-text="提交中...">确定</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--新建文件夹 Model--}}
<div class="modal fade" id="create-document-dir" tabindex="-1" role="dialog" aria-labelledby="添加文件夹" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('wiki.document.create')}}" id="form-document">
                @csrf
                <input type="hidden" name="project_id" value="{{$project_id or ''}}">
                {{--1 表示文件夹--}}
                <input type="hidden" name="type" value="1">
                <input type="hidden" name="parent_id" value="0">
                {{--Ztree 内节点标识--}}
                <input type="hidden" name="parent_t_id" value="">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">新建文件夹</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="documentName" class="col-sm-2 control-label" id="inputTitle">名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="documentName" placeholder="文件夹名称" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="dir-error-message" style="color: #919191; font-size: 13px;"></span>
                    <button type="submit" class="btn btn-primary" id="create-document-dir-action-btn" data-loading-text="提交中...">确定</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                </div>
            </form>
        </div>
    </div>
</div>

<ul class="contextmenu contextmenu-doc">
    <li class="menu-rename"><a>重命名</a></li>
    <li class="menu-delete"><a>删除</a></li>
</ul>

<ul class="contextmenu contextmenu-dir">
    <li class="menu-new-dir"><a>新建文件夹</a></li>
    <li class="menu-new-doc"><a>新建文件</a></li>
    <li class="menu-rename"><a>重命名</a></li>
    <li class="menu-delete"><a>删除</a></li>
</ul>

{{--不能放head里！！！--}}
<script src="{{ mix('static-admin/wiki/js/app.js') }}"></script>

</body>
</html>
