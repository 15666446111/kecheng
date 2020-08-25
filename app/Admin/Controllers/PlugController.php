<?php

namespace App\Admin\Controllers;

use App\Plug;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PlugController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '轮播图管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Plug());
        $grid->model()->latest();
        $grid->column('id', __('索引'));
        $grid->column('name', __('轮播名称'));
        $grid->column('active', __('状态'))->switch();
        $grid->column('types.name', __('所属类型'));
        $grid->column('images', __('图片'))->image('',50, 40);
        $grid->column('sort', __('排序'))->label();
        $grid->column('href', __('链接'))->link();
        $grid->column('created_at', __('创建时间'));

        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            $filter->column(1/4, function ($filter) {
                $filter->like('name', '名称');
            });

            $filter->column(1/4, function ($filter) {
                $filter->equal('type_id', '类型')->select(\App\PlugType::pluck('name', 'id')->toArray());
                //$filter->like('name', '名称');
            });

        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Plug::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('active', __('Active'));
        $show->field('type_id', __('Type id'));
        $show->field('images', __('Images'));
        $show->field('sort', __('Sort'));
        $show->field('href', __('Href'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Plug());

        $form->text('name', __('名称'));
        $form->switch('active', __('状态'))->default(1);
        $form->select('type_id', __('所属位置'))->options(\App\PlugType::where('active', '1')->get()->pluck('name', 'id'));
        $form->image('images', __('图片'))->move('images')->uniqueName();
        $form->number('sort', __('排序'))->default(1)->help('数字越大越靠前...');
        $form->url('href', __('链接'))->default('#');

        return $form;
    }
}
