<?php

namespace App\Http\Controllers\Admin\XMind;

use App\Http\Controllers\Controller;
use App\Model\XMind\XMind;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

/**
 * 思维导图后台管理控制器
 * Class XMindAdminController
 * @package App\Http\Controllers\Admin\XMind
 */
class XMindAdminController extends Controller
{

    /**
     * 表单对象，包含新增、删除等操作
     */
    use ModelForm;

    /**
     * 首页，显示导图列表
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content->title("思维导图")
            ->body($this->xMindList());
    }

    /**
     * 创建新项目
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content->title("新建导图")
            ->body($this->form());
    }

    /**
     * 编辑项目
     * @param Content $content
     * @param $id
     * @return Content
     */
    public function edit(Content $content, $id)
    {
        return $content->header('编辑项目')
            ->body($this->form()->edit($id));
    }

    /**
     * 思维导图列表
     */
    private function xMindList()
    {
        $grid = new Grid(new XMind());
        $grid->name('名称');
        $grid->created_at('创建时间')->date('Y-m-d');
        $grid->updated_at('修改时间')->date('Y-m-d');

        $grid->actions(function ($actions) {

            $href = "/admin/xmind/edit/" . $actions->row->id;
            $actions->append("<a href=$href target='_blank'><i class='fa fa-paper-plane'></i></a>");

            // 去掉查看
            $actions->disableView();
        });

        $grid->disableFilter();
        $grid->disableRowSelector();
        $grid->disableExport();
        $grid->disableColumnSelector();
        return $grid;
    }

    /**
     * 创建项目的表单
     */
    private function form()
    {
        $form = new Form(new XMind());

        $form->text('name', "名称")->required();

        $form->footer(function ($footer) {
            // 去掉`查看`checkbox
            $footer->disableViewCheck();

            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();

            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();
        });

        return $form;
    }
}
