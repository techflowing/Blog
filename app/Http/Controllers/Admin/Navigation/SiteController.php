<?php

namespace App\Http\Controllers\Admin\Navigation;

use App\Http\Controllers\Controller;
use App\Model\navigation\Category;
use App\Model\navigation\Site;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

/**
 * 网站管理
 * Class SiteController
 * @package App\Admin\Controllers\navigation
 */
class SiteController extends Controller
{
    use HasResourceActions;

    /**
     * 展示所有网站
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('网站管理')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑网站')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('新增网站')
            ->body($this->form());
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Site::findOrFail($id));

        $show->id('ID');
        $show->order('顺序');
        $show->category_id('分类');
        $show->title('标题');
        $show->thumb('图标');
        $show->describe('Describe');
        $show->url('Url');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * 网站列表展示
     * @return Grid
     */
    private function grid()
    {
        $grid = new Grid(new Site);

        // $grid->id('ID');
        $grid->order('顺序');
        $grid->category()->title('分类');
        $grid->title('标题');
        $grid->describe('描述')->limit(40);
        $grid->url('地址');

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();

            $categories = Category::query()->pluck('title', 'id');
            $filter->equal('category_id', '分类')->select($categories);

            $filter->like('title', '标题');
        });

        $grid->disableExport();
        $grid->disableColumnSelector();
        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    private function form()
    {
        $form = new Form(new Site);

        $form->select('category_id', '分类')
            ->options(Category::selectOptions())
            ->rules('required');
        $form->text('title', '标题')
            ->attribute('autocomplete', 'off')
            ->rules('required|max:50');
        $form->text('order', '顺序')
            ->attribute('min', 1)
            ->attribute('max', 10000);
        $form->text('describe', '描述')
            ->attribute('autocomplete', 'off')
            ->rules('required|max:300');
        $form->url('url', '地址')
            ->attribute('autocomplete', 'off')
            ->rules('required|max:250');

        $form->footer(function ($footer) {
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
            $footer->disableCreatingCheck();
        });

        return $form;
    }
}
