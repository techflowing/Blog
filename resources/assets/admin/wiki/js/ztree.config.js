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

// 创建文档请求回调
$createDocument.find('#form-document').ajaxForm({
    type: "post",
    dataType: "json",
    beforeSubmit: function (formData, jqForm, options) {
        let name = $(jqForm).find("input[name='name']").val();
        if (name === "") {
            createDocumentFormError.text('文档名称不能为空');
            return false;
        }
        $createDocumentActionBtn.button('loading');
        return true;
    },
    success: function (res, statusText, xhr, $form) {
        $createDocumentActionBtn.button('reset');
        if (res.errCode === 0) {
            $createDocument.modal('hide');
            if (res.data.parent_t_id === '') {
                zTreeObj.addNodes(null, res.data);
            } else {
                let node = zTreeObj.getNodeByTId(res.data.parent_t_id);
                zTreeObj.addNodes(node, res.data);
                zTreeObj.expandNode(node, true);
            }
        } else {
            createDocumentFormError.text(res.message);
        }
    }
});

// 创建文件夹请求回调
$createDocumentDir.find('#form-document').ajaxForm({
    type: "post",
    dataType: "json",
    beforeSubmit: function (formData, jqForm, options) {
        let name = $(jqForm).find("input[name='name']").val();
        if (name === "") {
            createDocumentDirFormError.text('文档名称不能为空');
            return false;
        }
        $createDocumentDirActionBtn.button('loading');
        return true;
    },
    success: function (res, statusText, xhr, $form) {
        $createDocumentDirActionBtn.button('reset');
        if (res.errCode === 0) {
            $createDocumentDir.modal('hide');
            if (res.data.parent_t_id === '') {
                zTreeObj.addNodes(null, res.data);
            } else {
                let node = zTreeObj.getNodeByTId(res.data.parent_t_id);
                zTreeObj.addNodes(node, res.data);
                zTreeObj.expandNode(node, true);
            }
        } else {
            createDocumentDirFormError.text(res.message);
        }
    }
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
            rootPId: 0
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
        onClick: onZTreeClick,
        onDrop: onZTreeDrop,
        onRightClick: onZTreeRightClick,
        beforeRename: beforeZTreeRename,
        onRename: onZTreeRename,
    }
};

/**
 * 目录树节点拖拽操作的回调
 * @param treeNodes 被拖拽的节点 JSON 数据集合，数组
 * @param targetNode treeNodes 被拖拽放开的目标节点 JSON 数据对象
 * @param moveType 指定移动到目标节点的相对位置
 *           "inner"：成为子节点，"prev"：成为同级前一个节点，"next"：成为同级后一个节点，如果 moveType = null，表明拖拽无效
 */
function onZTreeDrop(event, treeId, treeNodes, targetNode, moveType) {
    // 获取被拖拽后 节点的所有兄弟节点，并标注序号
    // 当前一次只允许拖拽一个几点，直接取第一个元素
    let treeNode = treeNodes[0];
    let sibling;
    // 判断当前是否在根目录
    if (treeNode.level === 0) {
        sibling = getSiblingSort(zTreeObj.getNodes());
    } else {
        let parentNode = treeNode.getParentNode();
        sibling = getSiblingSort(parentNode.children);
    }
    // 请求数据
    let data = {};
    // 兄弟节点顺序数据
    data.sibling = sibling;
    // 节点id
    data.id = treeNode.id;
    // 父级id
    data.parent_id = treeNode.parent_id;

    // jQuery.post 请求
    let loading = layer.load(1, {
        shade: [0.1, '#fff'] // 0.1透明度的白色背景
    });

    // jQuery POST 请求
    $.post("/admin/wiki/sort/" + window.wiki_project_id, JSON.stringify(data))
        .done(function (res) {
            layer.close(loading);
            if (res.errCode === 0) {
                layer.msg("保存成功");
            } else {
                layer.msg("保存失败" + res.msg);
            }
        })
        .fail(function () {
            layer.close(loading);
            layer.msg("保存排序失败，请刷新页面重试");
        })
}

/**
 * 目录树单击事件
 */
function onZTreeClick(e, treeId, treeNode) {
    let zTree = $.fn.zTree.getZTreeObj("treeDemo");
    zTree.expandNode(treeNode);
}

/**
 * 右键事件监听
 */
function onZTreeRightClick(event, treeId, treeNode) {
    dismissRightMenu();
    if (treeNode == null) {
        return
    }
    // 判断是否是文件夹
    if (treeNode.is_parent) {
        showRightMenu(event, treeId, treeNode, '.contextmenu-dir')
    } else {
        showRightMenu(event, treeId, treeNode, '.contextmenu-doc')
    }
}

/**
 * 重命名操作确认之前监听
 */
function beforeZTreeRename(treeId, treeNode, newName, isCancel) {
    if (isCancel) {
        return true;
    }
    if (newName === '') {
        layer.msg('名称不能为空');
        // 强行恢复原名称
        zTreeObj.cancelEditName();
        return false;
    }
    treeNode.originName = treeNode.name;
    return true;
}

function onZTreeRename(event, treeId, treeNode, isCancel) {
    if (isCancel) {
        return;
    }
    let data = {};
    data.newName = treeNode.name;

    let loading = layer.load(1, {
        shade: [0.1, '#fff'] // 0.1透明度的白色背景
    });
    $.post("/admin/wiki/rename/" + window.wiki_project_id + "/" + treeNode.id, JSON.stringify(data))
        .done(function (res) {
            layer.close(loading);
            if (res.errCode !== 0) {
                zTreeObj.cancelEditName();
                // 改变回原值，originName 为 beforeZTreeRename方法中临时添加的属性
                treeNode.name = treeNode.originName;
                zTreeObj.updateNode(treeNode, false);
                layer.msg("重命名失败：" + res.msg);
            }
        })
        .fail(function () {
            layer.close(loading);
            treeNode.name = treeNode.originName;
            zTreeObj.updateNode(treeNode, false);
            zTreeObj.cancelEditName();
            layer.msg("重命名失败");
        });
}

/**
 * 显示右键菜单
 */
function showRightMenu(event, treeId, treeNode, menu) {
    //Get window size:
    var winWidth = $(document).width();
    var winHeight = $(document).height();
    //Get pointer position:
    var posX = event.pageX;
    var posY = event.pageY;
    //Get contextmenu size:
    var menuWidth = $(menu).width();
    var menuHeight = $(menu).height();
    //Security margin:
    var secMargin = 10;
    //Prevent page overflow:
    if (posX + menuWidth + secMargin >= winWidth && posY + menuHeight + secMargin >= winHeight) {
        //Case 1: right-bottom overflow:
        posLeft = posX - menuWidth - secMargin + "px";
        posTop = posY - menuHeight - secMargin + "px";
    } else if (posX + menuWidth + secMargin >= winWidth) {
        //Case 2: right overflow:
        posLeft = posX - menuWidth - secMargin + "px";
        posTop = posY + secMargin + "px";
    } else if (posY + menuHeight + secMargin >= winHeight) {
        //Case 3: bottom overflow:
        posLeft = posX + secMargin + "px";
        posTop = posY - menuHeight - secMargin + "px";
    } else {
        //Case 4: default values:
        posLeft = posX + secMargin + "px";
        posTop = posY + secMargin + "px";
    }
    // 先移除click 事件，避免重复绑定
    $('.contextmenu').find('li').unbind("click");

    $('.contextmenu').find('.menu-new-dir').click(function () {
        $createDocumentDir.find("input[name='name']").val('');
        $createDocumentDir.find("input[name='parent_id']").val(treeNode.id);
        $createDocumentDir.find("input[name='parent_t_id']").val(treeNode.tId);
        createDocumentDirFormError.text('');
        $createDocumentDir.modal('show')
    });

    $('.contextmenu').find('.menu-new-doc').click(function () {
        $createDocument.find("input[name='name']").val('');
        $createDocument.find("input[name='parent_id']").val(treeNode.id);
        $createDocument.find("input[name='parent_t_id']").val(treeNode.tId);
        createDocumentFormError.text('');
        $createDocument.modal('show')
    });
    $('.contextmenu').find('.menu-delete').click(function () {
        onDeleteMenuClick(treeNode);
    });
    $('.contextmenu').find('.menu-rename').click(function () {
        zTreeObj.cancelEditName();
        zTreeObj.editName(treeNode)
    });

    $(menu).css({
        "left": posLeft,
        "top": posTop
    }).show();
}

/**
 * 删除TreeNode节点
 * @param treeNode
 */
function onDeleteMenuClick(treeNode) {
    if (treeNode == null) {
        return
    }
    if (treeNode.is_parent === true) {
        layer.confirm('删除文件夹将同时删除所有子节点！是否删除？', {
            btn: ['确定', '取消']
        }, function (index) {
            layer.close(index);
            deleteDoc(treeNode)
        });
    } else {
        layer.confirm('确定删除此文档吗？', {
            btn: ['确定', '取消']
        }, function (index) {
            layer.close(index);
            deleteDoc(treeNode)
        });
    }
}

/**
 * 执行删除操作
 */
function deleteDoc(treeNode) {
    let loading = layer.load(1, {
        shade: [0.1, '#fff'] // 0.1透明度的白色背景
    });

    // 遍历获取所有子节点
    let nodes = [];
    let visitLoop = function (treeNode) {
        if (treeNode) {
            nodes.push(treeNode.id);
            if (treeNode.children) {
                for (let node of treeNode.children) {
                    visitLoop(node);
                }
            }
        }
    };
    visitLoop(treeNode);

    $.post("/admin/wiki/delete/" + window.wiki_project_id, JSON.stringify(nodes))
        .done(function (res) {
            layer.close(loading);
            if (res.errCode === 0) {
                zTreeObj.removeNode(treeNode, false);
            } else {
                layer.msg("删除失败，请稍后重试," + res.msg);
            }
        })
        .fail(function () {
            layer.close(loading);
            layer.msg("删除失败，请稍后重试");
        })
}

/**
 * 隐藏ZTree上的右键菜单
 */
function dismissRightMenu() {
    $('.contextmenu-dir').hide();
    $('.contextmenu-doc').hide();
}

/**
 * 构造兄弟节点之间的顺序关系
 * @param nodes 数组，表示同一父节点下的所有兄弟节点
 * @return [] 兄弟节点顺序，包含：id、sort、parent_id 字段
 */
function getSiblingSort(nodes) {
    if (nodes == null) {
        return null;
    }
    let data = [];
    let index = 0;
    for (let node of nodes) {
        data[index++] = {
            'id': node.id,
            'sort': index,
            'parent_id': node.parent_id
        };
    }
    return data;
}

$(document).ready(function () {
    // 初始化目录树结构
    zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, window.wiki_doc_catalog);

    $('#create-document-btn').click(function () {
        $createDocument.find("input[name='name']").val('');
        $createDocument.find("input[name='parent_t_id']").val('');
        createDocumentFormError.text('');
        $createDocument.modal('show')
    });
    $('#create-document-dir-btn').click(function () {
        $createDocumentDir.find("input[name='name']").val('');
        $createDocumentDir.find("input[name='parent_t_id']").val('');
        createDocumentDirFormError.text('');
        $createDocumentDir.modal('show')
    });

    $(document).click(function () {
        dismissRightMenu()
    });
});
