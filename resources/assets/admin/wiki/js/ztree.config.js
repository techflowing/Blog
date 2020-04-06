var zTreeObj;
// zTree 的参数配置，深入使用请参考 API 文档（setting 配置详解）
var setting = {
    view: {
        // 不显示连接线
        showLine: false,
        // 关闭双击展开
        dblClickExpand: false
    },
    data: {
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
    var zTree = $.fn.zTree.getZTreeObj("treeDemo");
    zTree.expandNode(treeNode);
}

$(document).ready(function () {
    zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, window.wiki_doc_catalog);
});
