<?php

namespace App\Admin\Controllers\navigation;

use App\Http\Controllers\Controller;
use App\Model\navigation\Category;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Layout\Content;

/**
 * 网站分类管理
 * Class CategoryController
 * @package App\Admin\Controllers\navigation
 */
class CategoryController extends Controller
{
    /**
     * 表单对象，包含新增、删除等操作
     */
    use ModelForm;

    /**
     * 展示所有分类
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {

        return $content->header('分类管理')
            ->body(Category::tree());
    }

    /**
     * 新增分类
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content->header('新增分类')
            ->body($this->form());
    }

    /**
     * 编辑分类
     * @param Content $content
     * @param $id 分类ID
     * @return Content
     */
    public function edit(Content $content, $id)
    {
        return $content->header('编辑分类')
            ->body($this->form()->edit($id));
    }

    /**
     * 创建表单
     * 参见：https://laravel-admin.org/docs/zh/model-form
     * @return Form
     */
    public function form()
    {
        $form = new Form(new Category);

        $form->select('parent_id', '父级')
            ->options(Category::selectOptions())
            ->rules('required');
        $form->text('title', '标题')
            ->rules('required|max:50')
            ->placeholder('不得超过50个字符');
        $form->icon('icon', '图标')
            ->default('fa-star-o')
            ->rules('required|max:20');

        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete();
            $tools->disableView();
        });

        $form->footer(function ($footer) {
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
            $footer->disableCreatingCheck();
        });
        return $form;
    }
}
