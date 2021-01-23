@extends('tpl-page')

{{--页面特定的Header信息--}}
@include('admin.xmind.edit.header')

{{--页面Content--}}
@section('content')

    <div class="title-container">
        <p class="editor-title">{{$project->name}}</p>
        <button class="editor-title-menu" id="menu-save" onclick="save()">保存</button>
        <button class="editor-title-menu" id="menu-export-img" onclick="exportImage()">导出为图片</button>
        <button class="editor-title-menu" id="menu-export-md" onclick="exportMarkdown()">导出为Markdown</button>
        <button class="editor-title-menu" id="menu-export-xmind" onclick="exportXMind()">导出为XMind</button>
        <button class="editor-title-menu" id="menu-import-xmind" onclick="document.getElementById('xmind-input').click();">导入XMind</button>
        <input class="editor-title-menu" type="file" id="xmind-input" accept=".xmind"/>
    </div>

    <div ng-app="kityminderApp" ng-controller="MainController">
        <kityminder-editor on-init="initEditor(editor, minder)"></kityminder-editor>
    </div>

@endsection
