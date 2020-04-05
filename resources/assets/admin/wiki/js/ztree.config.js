var zTreeObj;
// zTree 的参数配置，深入使用请参考 API 文档（setting 配置详解）
var setting = {
    view: {
        // 不显示连接线
        showLine: false,
        // 关闭双击展开
        dblClickExpand: false
    },
    callback: {
        onClick: onClick
    }
};
// zTree 的数据属性，深入使用请参考 API 文档（zTreeNode 节点数据详解）
var zNodes = [
    {
        "name": "父级目录01",
        "open": true,
        "children": [
            {
                "name": "子文件1"
            },
            {
                "name": "子文件2"
            }
        ]
    },
    {
        "name": "父级目录02",
        "open": true,
        "children": [
            {
                "name": "子文件01"
            },
            {
                "name": "子文件夹",
                "children": [
                    {
                        "name": "子文件"
                    }
                ]
            }
        ]
    }
];

function onClick(e, treeId, treeNode) {
    var zTree = $.fn.zTree.getZTreeObj("treeDemo");
    zTree.expandNode(treeNode);
}

$(document).ready(function () {
    zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
});
