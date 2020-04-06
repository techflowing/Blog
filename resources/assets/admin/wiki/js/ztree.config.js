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
            pIdKey: "pId",
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
// zTree 的数据属性，深入使用请参考 API 文档（zTreeNode 节点数据详解）
var zNodes = [
    {"id": 1, "pId": "#", "name": "test1"},
    {"id": 11, "pId": "1", "name": "test11"},
    {"id": 12, "pId": "1", "name": "test12"},
    {"id": 111, "pId": "11", "name": "test111"},
    {"id": 112, "pId": "#", "name": "test112"},
    {"id": 113, "pId": "112", "name": "tesasdtasdasdjksadjsadjkashdjkasd112"}
];

function onClick(e, treeId, treeNode) {
    var zTree = $.fn.zTree.getZTreeObj("treeDemo");
    zTree.expandNode(treeNode);
}

$(document).ready(function () {
    zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
});
