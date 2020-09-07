<?php

namespace App\Admin\Controllers;

use App\Security;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SecurityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '安全驾驶_课件管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Security());
        $grid->model()->latest();
        $grid->column('id', __('索引'))->sortable();
        $grid->column('title', __('标题'));
        $grid->column('thumb', __('封面'));
        $grid->column('media', __('媒体'));

        $grid->column('active', __('状态'))->switch();

        $grid->column('sectionMaintain.section_title', __('所属节'));

        $grid->column('views', __('观看人数'))->label();

        $grid->column('factorys', __('收藏人数'))->label();

        $grid->column('sort', __('排序'))->sortable()->editable();
        
        $grid->column('created_at', __('创建时间'));

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
        $show = new Show(Security::findOrFail($id));

        $show->field('title', __('标题'));
        $show->field('thumb', __('封面'))->image();
        $show->field('media', __('媒体'));
        $show->field('active', __('状态'));
        $show->field('section_id', __('所属节'));
        $show->field('views', __('观看人数'));
        $show->field('factorys', __('收藏人数'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('修改时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Security());

        $form->text('title', __('标题'));

        $form->select('province', '所属章')->options(\App\ChapterSecurity::where('chapter_open', '1')->get()->pluck('chapter_title', 'id'))->load('section_id', '/getSectionSec');

        $form->select('section_id', '所属节');


        $form->image('thumb', __('封面'))->uniqueName()->move('qcby/images');
        $form->file('media', __('媒体'))->uniqueName()->move('qcby/video');;
        $form->switch('active', __('状态'))->default(1);
        
        $form->number('views', __('观看人数'))->default(1);
        $form->number('factorys', __('收藏人数'))->default(1);

         $form->number('sort', __('排序权重'))->default(1);
         
        //$form->saving(function (Form $form) {
            $form->ignore(['province']);
        //});


        return $form;
    }
}
