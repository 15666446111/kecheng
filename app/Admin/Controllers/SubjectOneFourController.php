<?php

namespace App\Admin\Controllers;

use App\SubjectOneFour;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use Encore\Admin\Widgets\Table;

use App\Admin\Actions\Import\ImportSubject;         // 导入题库

use App\Admin\Actions\Question\SyncSequention;      // 同步顺序练习
use App\Admin\Actions\Question\SyncSix;             // 同步至保过600题

use App\Admin\Actions\Change\ChangeCars;            // 更新车型
use App\Admin\Actions\Change\ChangeSub;             // 更新科目
class SubjectOneFourController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '科一科四题库';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SubjectOneFour());
        $grid->model()->latest();
        $grid->column('id', __('索引'))->sortable();
        
        $grid->column('title', __('题干'))->display(function ($title) {
            return strip_tags($title);
        })->limit(30)->help('这一列是问题的题干');

        $grid->column('car', __('车型'))->display(function($tags) {
            $tags = \App\Car::whereIn('id', $tags)->pluck('title')->toArray();
            $str  = implode(" | ", $tags);
            return  $str;
        });

        $grid->column('type', __('题型'))->using([ '1' => '单选', '2' => '多选', '3' => '判断'])
                ->dot([ 1 => 'danger', 2 => 'success', '3' => 'primary' ], 'default');

        //$grid->column('category', __('分类'));
        $grid->column('subject', __('科目'))->using([ '1' => '科目一', '4' => '科目四'])->dot([ 1 => 'success', 4 => 'primary'], 'default');

        $grid->column('', '选项')->modal('最新评论', function ($model) {
            
            return new Table(['选项A', '选项B', '选项C', '选项D', '答案', '视频', '音频', '图片'], [
                [
                    $model->option_a, $model->option_b, $model->option_c, $model->option_d, $model->answer, $model->analysis_video, $model->analysis_audio, $model->analysis_image
                ]
            ]);
        });

        $grid->column('analysis', __('解析'))->limit(30);
        $grid->column('jiqiao', __('技巧'))->limit(30);

        $grid->column('sort', __('排序'))->label()->sortable();
        $grid->column('open', __('状态'))->switch();
        $grid->column('created_at', __('创建时间'));


        $grid->tools(function (Grid\Tools $tools) {

            $tools->append(new ImportSubject());    // 导入题库

            $tools->append(new SyncSequention()); // 更新顺序练习
            $tools->append(new SyncSix());      // 保过600题
            $tools->append(new ChangeCars());   // 更新车型
            $tools->append(new ChangeSub());    // 更新科目
        });


        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            $filter->column(1/4, function ($filter) {
                $filter->like('title', '题干');
            });

            $filter->column(1/4, function ($filter) {
                $filter->like('car', '车型')->select(\App\Car::pluck('title', 'id')->toArray());
            });

            $filter->column(1/4, function ($filter) {
                $filter->equal('subject', '科目')->select([1=>'科目一', 4=>'科目四']);
            });

            $filter->column(1/4, function ($filter) {
                $filter->equal('type', '题型')->select([1=>'单选', 2=>'多选', 3=>'判断']);
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
        $show = new Show(SubjectOneFour::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('car', __('Car'));
        $show->field('type', __('Type'));
        $show->field('category', __('Category'));
        $show->field('option_a', __('Option a'));
        $show->field('option_b', __('Option b'));
        $show->field('option_c', __('Option c'));
        $show->field('option_d', __('Option d'));
        $show->field('answer', __('Answer'));
        $show->field('analysis', __('Analysis'));
        $show->field('jiqiao', __('Jiqiao'));
        $show->field('analysis_video', __('Analysis video'));
        $show->field('analysis_audio', __('Analysis audio'));
        $show->field('analysis_image', __('Analysis image'));
        $show->field('sort', __('Sort'));
        $show->field('open', __('Open'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('subject', __('Subject'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SubjectOneFour());

        $form->text('title', __('题干'));

        $form->image('title_pic', __('题干图片'))->move('subject14/images')->uniqueName();

        $form->checkbox('car', __('车型'))->options(\App\Car::pluck('title', 'id'));

        $form->select('type', __('题型'))->options([1=>'单选', 2=>'多选', 3=>'判断']);

        $form->select('subject', __('科目'))->options([1=> '科目一', 4=> '科目四']);
        //$form->number('category', __('Category'))->default(1);

        $form->number('sort', __('排序权重'))->default(1);

        $form->switch('open', __('状态'))->default(1);

        $form->text('option_a', __('答案A'));
        $form->text('option_b', __('答案B'));
        $form->text('option_c', __('答案C'));
        $form->text('option_d', __('答案D'));

        $form->text('answer', __('答案'))->default('A');

        $form->textarea('analysis', __('解析'));
        $form->textarea('jiqiao', __('技巧'));

        $form->text('analysis_video', __('视频解析地址'));
        $form->text('analysis_audio', __('音频解析地址'));
        $form->text('analysis_image', __('帮助图片'));
    
        return $form;
    }
}
