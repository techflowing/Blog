let $createDocument = $('#create-document');
let $createDocumentDir = $('#create-document-dir');
let $createDocumentActionBtn = $('#create-document-action-btn');
let $createDocumentDirActionBtn = $('#create-document-dir-action-btn');
let createDocumentFormError = $createDocument.find('#error-message');
let createDocumentDirFormError = $createDocument.find('#dir-error-message');

$createDocument.on('shown.bs.modal', function () {
    $createDocument.find("input[name='name']").focus();
});

$createDocumentDir.on('shown.bs.modal', function () {
    $createDocument.find("input[name='name']").focus();
});

$createDocument.on("hidden.bs.modal", function () {
    $createDocumentActionBtn.button('reset');
});

$createDocumentDir.on("hidden.bs.modal", function () {
    $createDocumentDirActionBtn.button('reset');
});


let zTreeObj;
// zTree 的参数配置，深入使用请参考 API 文档（setting 配置详解）
let setting = {
    view: {
        // 不显示连接线
        showLine: false,
        // 关闭双击展开
        dblClickExpand: false
    },
    data: {
        keep: {
            leaf: true,
            parent: true
        },
        key: {
            isParent: "is_parent"
        },
        // 使用简单数据
        simpleData: {
            enable: true,
            idKey: "id",
            pIdKey: "parent_id",
            rootPId: "#"
        }
    },
    edit: {
        drag: {
            isCopy: false,
            isMove: true,
            prev: true,
            next: true,
            inner: true
        },
        enable: true,
        showRemoveBtn: false,
        showRenameBtn: false
    },
    callback: {
        onClick: onClick
    }
};

function onClick(e, treeId, treeNode) {
    let zTree = $.fn.zTree.getZTreeObj("treeDemo");
    zTree.expandNode(treeNode);
}

$(document).ready(function () {
    // 初始化目录树结构
    console.log(JSON.stringify(window.wiki_doc_catalog));
    zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, window.wiki_doc_catalog);

    $('#create-document-btn').click(function () {
        createDocumentFormError.text('');
        $createDocument.modal('show')
    });
    $('#create-document-dir-btn').click(function () {
        createDocumentDirFormError.text('');
        $createDocumentDir.modal('show')
    })

});
