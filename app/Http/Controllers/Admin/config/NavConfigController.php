<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use App\Model\Admin\HomeNavMenu;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

/**
 * 网站配置控制器
 * Class NavConfigController
 * @package App\Http\Controllers\Admin
 */
class NavConfigController extends Controller
{
    /**
     * 表单对象，包含新增、删除等操作
     */
    use ModelForm;

    /**
     * 首页菜单管理
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content->title('首页菜单配置')
            ->body($this->navMenuList());
    }

    /**
     * 新建菜单
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content->title('新建菜单配置')
            ->body($this->form());
    }

    /**
     * 编辑数据
     * @param $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->title("编辑菜单配置")
            ->body($this->form()->edit($id));
    }

    /**
     * 菜单列表
     */
    public function navMenuList()
    {
        $grid = new Grid(new HomeNavMenu());

        $grid->name('菜单名称');
        $grid->path('路由路径');
        $grid->order('顺序')->sortable();
        $grid->target('打开方式')->display(function ($target) {
            switch ($target) {
                case HomeNavMenu::$TYPE_TARGET_SELF:
                    return "<span class='label label-success'>原窗口</span>";
                case HomeNavMenu::$TYPE_TARGET_BLANK:
                    return "<span class='label label-warning'>新窗口</span>";
                default:
                    return "<span class='label label-default'>未知-非法</span>";
            }
        });
        $grid->created_at('创建时间')->date('Y-m-d');

        $grid->disableExport();
        $grid->disableFilter();
        $grid->disableColumnSelector();

        $grid->actions(function ($actions) {
            // 去掉查看
            $actions->disableView();
        });
        return $grid;
    }

    /**
     * 新建菜单表单
     */
    private function form()
    {
        $form = new Form(new HomeNavMenu());

        $form->text('name', "菜单名称")->required();
        $form->text('path', '路由路径')->required();
        $form->radio('target', '打开方式')
            ->options([HomeNavMenu::$TYPE_TARGET_SELF => '原窗口', HomeNavMenu::$TYPE_TARGET_BLANK => '新窗口'])
            ->default(HomeNavMenu::$TYPE_TARGET_SELF)
            ->required();
        $form->number('order', "显示顺序")
            ->default(1)
            ->min(0)
            ->max(100)
            ->required();

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
