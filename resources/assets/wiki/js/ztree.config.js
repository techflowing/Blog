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
            isParent: "isParent"
        },
        // 使用简单数据
        simpleData: {
            enable: true,
            idKey: "id",
            pIdKey: "parentId",
            rootPId: 0
        }
    },
    edit: {
        enable: false,
    },
    callback: {
        beforeClick: onZTreeBeforeClick,
        onClick: onZTreeClick,
    }
};

/**
 * 目录树捕获点击事件监听
 */
function onZTreeBeforeClick(treeId, treeNode, clickFlag) {
    // 判断是否当前 文档 Node 重复点击
    let curNode = getCurSelectedNode();
    return !(curNode !== null && curNode.isParent === false && treeNode.id === curNode.id);
}

/**
 * 目录树单击事件, 逻辑待优化
 */
function onZTreeClick(e, treeId, treeNode) {
    if (treeNode.isParent) {
        zTreeObj.expandNode(treeNode);
    } else {
        loadContent(treeNode)
    }
}

/**
 * 加载文档内容，加载失败弹窗重新加载
 * @param treeNode
 */
function loadContent(treeNode, expandNode = false) {
    let loading = layer.load(1, {
        shade: [0.1, '#fff'] // 0.1透明度的白色背景
    });
    $.get("/wiki/content/" + window.wiki_project_id + "/" + treeNode.id)
        .done(function (res) {
            layer.close(loading);
            if (res.errCode === 0) {
                if (expandNode) {
                    zTreeObj.expandNode(treeNode.getParentNode(), true)
                }
                showMarkdownContent(treeNode.name, res.data.content);
            } else {
                showLoadContentConfirm(treeNode);
            }
        })
        .fail(function () {
            layer.close(loading);
            showLoadContentConfirm(treeNode);
        });

    // 内容加载失败，弹窗提示重新加载
    function showLoadContentConfirm(treeNode) {
        layer.confirm('文档加载失败，点击重新加载', {
            btn: ['确定', '取消'],
        }, function (index) {
            layer.close(index);
            loadContent(treeNode)
        });
    }
}

/**
 * 获取当前被选中的节点数据
 */
function getCurSelectedNode() {
    let nodes = zTreeObj.getSelectedNodes();
    if (nodes == null || nodes.length === 0) {
        return null;
    }
    node = nodes[0];
    console.log("当前选中的：" + node.name);
    return node;
}

/**
 * 展示Markdown 内容
 * @param title
 * @param content
 */
function showMarkdownContent(title, content) {

    // 设置文章标题
    $('#doc-title').html(title);
    // 有重复设置问题，设置前先清除之前元素
    $('#editormd-html-view').empty();


    editormd.markdownToHTML("editormd-html-view", {
        markdown: content,
        htmlDecode: "style,script,iframe",
        tocm: true,
        tocContainer: "#editormd-toc-container",
        emoji: false,
        taskList: true,
        tex: true,
        flowChart: true,
        sequenceDiagram: true,
    });
}

/**
 * 获取第一篇文档内容
 */
function getFirstDocContent() {
    let treeNode = getFirstLeafNode();
    if (treeNode === null) {
        return
    }
    loadContent(treeNode, true);
}

/**
 * 获取第一个叶子节点
 */
function getFirstLeafNode() {
    let nodes = zTreeObj.getNodes();
    if (nodes === null || nodes.length === 0) {
        return null;
    }
    let leaf;
    for (let node of nodes) {
        leaf = getLeafNode(node);
        if (leaf !== null) {
            return leaf;
        }
    }

    /**
     * 递归获取第一个叶子节点
     */
    function getLeafNode(treeNode) {
        if (treeNode === null) {
            return null;
        }
        if (!treeNode.isParent) {
            return treeNode;
        } else {
            for (let node of treeNode.children) {
                let result = getLeafNode(node);
                if (result !== null) {
                    return result;
                }
            }
        }
        return null;
    }

}

$(document).ready(function () {

    // 设置文档名称
    $('#project-name').html(window.wiki_project.name);

    // 初始化目录树结构
    zTreeObj = $.fn.zTree.init($("#wiki-catalog-tree"), setting, window.wiki_doc_catalog);

    // 获取第一个文档节点的内容
    getFirstDocContent();
});
