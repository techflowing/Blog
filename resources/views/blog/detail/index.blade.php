@extends('tpl-page')

{{--页面特定的Header信息--}}
@include('blog.detail.header')

{{--页面Content--}}
@section('content')
    <div class="page-container">
        <div class="col-sm-10 col-lg-10 col-sm-offset-1 blog-detail-container">
            <div class="col-sm-9 editormd-view-body blog-detail-content">
                <p class="doc-detail-title" id="doc-title">{{$article->name}}</p>
                <div class="markdown-body editormd-preview-theme-dark" id="editormd-html-view">
                    <textarea style="display:none;" name="test-editormd-markdown-doc">###Hello world!</textarea>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3 editormd-toc blog-detail-toc">
                <p class="doc-toc-title">目录</p>
                <div id="editormd-toc-container">
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        editormd.markdownToHTML("editormd-html-view", {
            markdown: window.article.content,
            htmlDecode: "style,script,iframe",
            tocm: true,
            tocContainer: "#editormd-toc-container",
            emoji: true,
            taskList: true,
            tex: true,
            flowChart: true,
            sequenceDiagram: true,
        });
    </script>

@endsection
