<?php

namespace App\Admin\Controllers\article;

use App\Http\Controllers\Controller;
use App\Model\blog\Article;
use App\Model\blog\ArticleCategory;
use App\Model\blog\ArticleTag;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

/**
 * 文章管理控制器
 * Class BlogController
 * @package App\Admin\Controllers\blog
 */
class ArticleController extends Controller
{

    /**
     * 首页
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content->title("文章管理")
            ->body($this->articleList());
    }

    /**
     * 新建文章页面
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content->title("新建文章")
            ->body($this->createArticle());
    }

    /**
     * 文章列表展示
     * @return Grid
     */
    private function articleList()
    {
        $grid = new Grid(new Article());
        $grid->title('标题');
        $grid->category()->name('分类')->display(function ($category) {
            return "<span class='label label-info'>{$category}</span>";
        });
        $grid->tags('标签')->display(function ($tags) {
            $tags = array_map(function ($role) {
                return "<span class='label label-success'>{$role['name']}</span>";
            }, $tags);

            return join('&nbsp;', $tags);
        });

        $grid->created_at('创作时间')->date('Y-m-d');

        $grid->disableExport();
        $grid->disableColumnSelector();
        return $grid;
    }

    /**
     * 新建文章
     */
    private function createArticle()
    {
        $form = new Form(new Article());

        $form->tab('文章信息', function ($form) {
            $form->text('title', '文章标题')->required();

            $form->checkbox('tags', "文章标签")->options(ArticleTag::all()->pluck('name', 'id'));

            $form->select('cate', '文章分类')->options(ArticleCategory::all()->pluck('name', 'id'))->required();

            $form->textarea('description', '文章描述')->required();
        })->tab("文章内容", function ($form) {
            $form->editormd('文章内容');
        });

        $form->footer(function ($footer) {
            // 去掉`查看`checkbox
            $footer->disableViewCheck();

            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();

            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();
        });

        // $form->setAction('article/blogs');

        return $form;
    }
}
