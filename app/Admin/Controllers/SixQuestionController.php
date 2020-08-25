<?php

namespace App\Admin\Controllers;

use App\SixQuestion;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SixQuestionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'SixQuestion';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SixQuestion());

        $grid->column('id', __('Id'));
        $grid->column('maintain_id', __('Maintain id'));
        $grid->column('question_id', __('Question id'));
        $grid->column('sort', __('Sort'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(SixQuestion::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('maintain_id', __('Maintain id'));
        $show->field('question_id', __('Question id'));
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
        $form = new Form(new SixQuestion());

        $form->number('maintain_id', __('Maintain id'));
        $form->number('question_id', __('Question id'));
        $form->number('sort', __('Sort'));

        return $form;
    }
}
