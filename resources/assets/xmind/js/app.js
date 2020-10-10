/**
 * 设置思维导图数据
 * @param name 名称
 * @param jsonData JSON 格式数据
 */
function setXMindData(name, jsonData) {

    $("#xmind-name").text(name);

    // console.log("加载内容：" + jsonData);
    let minder = window.minder;
    minder.execCommand('Theme', 'classic');
    minder.importData('json', jsonData);
}

/**
 * 加载指定思维导图数据
 * @param name 标题名称
 */
function loadXMindData(name) {
    if (name === null || name === 'undefined') {
        return
    }

    let loading = layer.load(1, {
        shade: [0.1, '#000']
    });

    $.ajax({
        type: 'GET',
        url: "/xmind/content/" + name,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function (res) {
            layer.close(loading);
            if (res.errCode === 0) {
                // console.log(res.data.content);
                setXMindData(name, res.data.content);
            } else {
                layer.msg("获取内容失败：" + data.msg);
            }
        },
        error: function (error) {
            layer.close(loading);
            layer.msg("获取内容失败，请稍后重试");
        }
    });
}

/**
 * 放大
 */
function zoomIn() {
    window.minder.execCommand('ZoomIn');
}

/**
 * 聚焦
 */
function zoomForce() {
    window.minder.execCommand('camera', window.minder.getRoot(), 600);
}

/**
 * 缩小
 */
function zoomOut() {
    window.minder.execCommand('ZoomOut');
}

/**
 * DomReady后加载数据
 */
$(document).ready(function () {

    // 绑定列表点击事件
    $(".xmind-item-name").click(function () {
        loadXMindData($(this).text().trim())
    });

    window.minder = new kityminder.Minder({
        renderTo: '#xmind-content'
    });
    minder.execCommand('hand');

    setXMindData(window.current.name, window.current.content);
});
