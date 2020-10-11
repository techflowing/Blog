/**
 * 获取文章列表
 * @param page 页码
 */
function getBlogList(page) {
    let loading = layer.load(1, {
        shade: [0.1, '#fff'] // 0.1透明度的白色背景
    });
    $.get("/blog/page/" + page)
        .done(function (res) {
            layer.close(loading);
            if (res.errCode === 0) {
                getBlogListSuccess(res.data)
            } else {
                layer.msg("加载失败，请刷新页面重试")
            }
        })
        .fail(function () {
            layer.close(loading);
            layer.msg("加载失败，请刷新页面重试")
        });
}

/**
 * 获取分页数据成功，操作DOM，刷新数据
 * @param data
 */
function getBlogListSuccess(data) {
    // 清除原有数据
    $('#blog-article-list-body').empty();
    // 添加子元素
    for (let item of data) {
        let title = (item.p_title == null || item.p_title === "") ? item.title : item.p_title + " ➞ " + item.title;
        let dom = "<tr>\n" +
            "<th class='col-sm-8'><a class='blog-article-name' target='_blank' href='" + item.link + "'>" + title + "</a></th>\n" +
            "<th class='col-sm-2'>" + item.category + "</th>\n" +
            "<th class='col-sm-2'>" + item.date + "</th>\n" +
            "</tr>";
        $('#blog-article-list-body').append(dom);
    }
    // 滚动到顶部
    $('.page-content').animate({scrollTop: 0}, 100);
}

$(document).ready(function () {

    $('#blog-article-paginator').bootstrapPaginator({
        currentPage: 1,
        totalPages: window.pageCount,
        size: "normal",
        bootstrapMajorVersion: 3,
        alignment: "right",
        numberOfPages: 10,
        itemTexts: function (type, page, current) {
            switch (type) {
                case "first":
                    return "首页";
                case "prev":
                    return "上一页";
                case "next":
                    return "下一页";
                case "last":
                    return "末页";
                case "page":
                    return page;
            }
        },
        onPageChanged: function (event, oldPage, newPage) {
            getBlogList(newPage)
        }
    });
});
