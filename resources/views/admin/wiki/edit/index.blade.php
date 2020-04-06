<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wiki编辑</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
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

</head>
<body>
<div id="wiki-edit-container" class="page-container">
    {{--侧边栏--}}
    <div id="wiki-sidebar" class="sidebar-menu">
        <div class="sidebar-menu-inner">
            <header class="logo-env">
                <div class="logo">
                    <p>目录</p>
                </div>
                <div class="settings-icon">
                    <p>新建文档</p>
                </div>
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
                    <textarea style="display:none;"> Hello，开始创作吧44 </textarea>
                </div>
            </div>
        </form>
    </div>
</div>

{{--不能放head里！！！--}}
<script src="{{ mix('static-admin/wiki/js/app.js') }}"></script>

</body>
</html>
