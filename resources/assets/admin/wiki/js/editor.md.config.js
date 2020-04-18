$(document).ready(function () {
    // 禁止页面滚动
    $('body').css('overflow-x', 'hidden').css('overflow-y', 'hidden');
    let height = $(window).height();
    $(".editormd-body").css('height', height + 'px');
});

// editor md 编辑器初始化
(function (window) {

    window.isEditorChange = false;
    // 忽略当次变化，一次有效
    window.ignoreEditorChange = false;

    window.editor = editormd("editormd", {
        path: "/static-third/editormd/lib/",
        placeholder: "本编辑器支持Markdown编辑，左边编写，右边预览",
        imageUpload: true,
        imageFormats: ["jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG"],
        imageUploadURL: "/admin/wiki/upload/img",
        htmlDecode: true,
        emoji: true,
        tocStartLevel: 1,
        tocm: true,
        theme: "dark",
        previewTheme: "dark",
        editorTheme: "pastel-on-dark",
        toolbarIcons: [
            "save", "|",
            "undo", "redo", "|",
            "bold", "del", "italic", "quote", "|",
            "h1", "h2", "h3", "h4", "h5", "h6", "|",
            "list-ul", "list-ol", "hr", "|",
            "link", "reference-link", "image", "code", "preformatted-text", "code-block", "table", "datetime", "emoji", "html-entities", "pagebreak", "|",
            "goto-line", "watch", "preview", "fullscreen", "clear", "search", "|",
            "help", "info"
        ],
        toolbarIconsClass: {
            bold: "fa-bold"
        },
        toolbarIconTexts: {
            bold: 'a'
        },
        toolbarCustomIcons: {
            save: '<a href="javascript:;" title="保存" id="markdown-save" class="disabled"> <i class="fa fa-save" name="save"></i></a>',
        },
        toolbarHandlers: {
            save: function (cm, icon, cursor, selection) {
                if ($("#markdown-save").hasClass('change')) {
                    $("#form-editormd").submit();
                }
            }
        },
        onload: function () {
            editor.setToolbarAutoFixed(false);
        },
        onchange: function () {
            setEditorChangeStatus();
        }
    });
})(window);

function setEditorChangeStatus() {
    if (window.ignoreEditorChange) {
        window.ignoreEditorChange = false;
        return;
    }
    let node = getCurSelectedNode();
    if (node == null || node.isParent === true) {
        editor.setValue("请选择 '文档' 后再开始编辑！");
        clearEditorChangeStatus();
        return;
    }
    window.isEditorChange = true;
    $("#markdown-save").removeClass('disabled').addClass('change');
}

function clearEditorChangeStatus() {
    window.isEditorChange = false;
    $("#markdown-save").removeClass('change').addClass('disabled');
}
