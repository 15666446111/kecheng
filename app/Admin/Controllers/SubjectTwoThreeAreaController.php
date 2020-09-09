<?php

namespace App\Admin\Controllers;

use App\SubjectTwoThreeArea;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SubjectTwoThreeAreaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '区域管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SubjectTwoThreeArea());

        $grid->column('prov_id', __('省份'));
        $grid->column('city_id', __('城市'));
        $grid->column('title', __('标题'));
        $grid->column('thumb', __('缩略图'));
        $grid->column('desc', __('描述'));
        $grid->column('study_count', __('学习次数'));
        $grid->column('favouer_count', __('收藏次数'));
        $grid->column('open', __('状态'))->switch();
        $grid->column('sort', __('排序'))->sortable()->editable();
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));

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
        $show = new Show(SubjectTwoThreeArea::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('prov_id', __('Prov id'));
        $show->field('city_id', __('City id'));
        $show->field('title', __('Title'));
        $show->field('thumb', __('Thumb'));
        $show->field('desc', __('Desc'));
        $show->field('study_count', __('Study count'));
        $show->field('favouer_count', __('Favouer count'));
        $show->field('open', __('Open'));
        $show->field('sort', __('Sort'));
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
        $form = new Form(new SubjectTwoThreeArea());

        $form->select('prov_id', __('省份'))->options(\App\Province::pluck('name as title', 'id'))->load('city_id', '/api/city')->required();

        $form->select('city_id', __('城市'))->required();

        $form->text('title', __('标题'))->required();

        $form->image('thumb', __('缩略图'))->move('sub23/area')->uniqueName()->required();

        $form->text('desc', __('描述'))->required();

        $form->number('study_count', __('学习次数'))->value(3000);

        $form->number('favouer_count', __('收藏次数'))->value(3000);

        $form->switch('open', __('开启状态'))->default(1);

        $form->number('sort', __('排序权重'))->default(1);

        return $form;
    }
}
