<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());
        $grid->model()->latest();
        $grid->column('id', __('索引'));

        $grid->column('avatar', __('头像'))->image('', 40);

        $grid->column('name', __('昵称'));

        $grid->column('blance', __('余额'))->label('info');

        $grid->column('provinces', __('省份'));

        $grid->column('city', __('城市'));

        $grid->column('last_ip', __('ip'));

        $grid->column('last_time', __('时间'));

        //$grid->column('email', __('邮箱'));
        //$grid->column('email_verified_at', __('Email verified at'));
        //$grid->column('password', __('Password'));
        //$grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('创建时间'));
        //$grid->column('updated_at', __('Updated at'));

        $grid->disableCreateButton();

        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            $filter->column(1/4, function ($filter) {
                $filter->like('name', '昵称');
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
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
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
