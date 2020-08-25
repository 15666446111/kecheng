<?php

namespace App\Admin\Controllers;

use App\City;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '城市管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new City());
        $grid->model()->latest();
        $grid->column('id', __('索引'));
        $grid->column('name', __('城市'));
        $grid->column('code', __('编码'));
        $grid->column('province_id', __('省份id'));
        $grid->column('open', __('状态'))->switch();
        $grid->column('created_at', __('创建时间'));
        //$grid->column('updated_at', __('Updated at'));

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
        $show = new Show(City::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('code', __('Code'));
        $show->field('province_id', __('Province id'));
        $show->field('open', __('Open'));
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
        $form = new Form(new City());

        $form->text('name', __('Name'));
        $form->text('code', __('Code'));
        $form->text('province_id', __('Province id'));
        $form->switch('open', __('Open'))->default(1);

        return $form;
    }
}
