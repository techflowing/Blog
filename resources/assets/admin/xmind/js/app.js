/**
 * 初始化调用
 */
(function () {
    angular.module('kityminderApp', ['kityminderEditor'])
        // .config(function (configProvider) {
        //     configProvider.set('imageUpload', '../server/imageUpload.php');
        // })
        .controller('MainController', function ($scope) {
            $scope.initEditor = function (editor, minder) {
                window.editor = editor;
                window.minder = minder;
            };
        });
})();

/**
 * 保存编辑状态
 */
function save() {
    let loading = layer.load(1, {
        shade: [0.1, '#fff'] // 0.1透明度的白色背景
    });
    window.editor.minder.exportData('json').then(function (content) {
        let data = {content: content};

        $.ajax({
            type: 'POST',
            data: JSON.stringify(data),
            dataType: "json",
            url: "/admin/xmind/detail/save/" + window.project.id,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                layer.close(loading);
                if (data.errCode === 0) {
                    layer.msg("保存成功")
                } else {
                    layer.msg("保存失败：" + data.msg);
                }
            },
            error: function (error) {
                layer.close(loading);
                layer.msg("保存失败，请稍后重试");
            }
        });
    })
}

/**
 * 导出为Markdown
 */
function exportMarkdown() {
    window.editor.minder.exportData('markdown').then(function (content) {
        let blob = new Blob([content]);
        let a = document.createElement("a"); // 建立标签，模拟点击下载
        a.download = window.project.name + '.md';
        a.href = URL.createObjectURL(blob);
        a.click();
    })
}

/**
 * 导出为图片
 */
function exportImage() {
    window.editor.minder.exportData('png').then(function (content) {
        let blob = dataURLtoBlob(content);
        let a = document.createElement("a"); // 建立标签，模拟点击下载
        a.download = window.project.name + '.png';
        a.href = URL.createObjectURL(blob);
        a.click();
    })
}

/**
 * base64转换为图片blob
 */
function dataURLtoBlob(dataurl) {
    let arr = dataurl.split(',');
    //注意base64的最后面中括号和引号是不转译的
    let _arr = arr[1].substring(0, arr[1].length - 2);
    let mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(_arr),
        n = bstr.length,
        u8arr = new Uint8Array(n);
    while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
    }
    return new Blob([u8arr], {
        type: mime
    });
}

/**
 * DomReady后加载数据
 */
$(document).ready(function () {
    window.editor.minder.importJson(JSON.parse(window.project.content));
});
