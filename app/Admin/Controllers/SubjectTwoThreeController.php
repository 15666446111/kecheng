<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\SubjectTwoThree;
use App\Server\UploadVideo;
use Encore\Admin\Controllers\AdminController;


class SubjectTwoThreeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '科二科三管理';


    protected $templateGroupId = 'f243b306b8d9f669c3bd8c0eb3be09bc';


    protected $storageLocation = 'outin-ee7a5015d52911ea917f00163e1a625e.oss-cn-shanghai.aliyuncs.com';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SubjectTwoThree());

        $grid->model()->latest();
        
        $grid->column('id', __('索引'));

        $grid->column('title', __('标题'));

        $grid->column('areas.title', __('区域'));

        $grid->column('subject', __('所属科目'))->using(['2' => '科目二', '3' => '科目三'])->dot([2 => 'success', 3 => 'danger'],'default');

        $grid->column('cars.title', __('车型'));

        $grid->column('video_url', __('视频地址'))->help('此地址为点播加密地址');

        $grid->column('thumb', __('封面图片'))->image('', 50);

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
        $show = new Show(SubjectTwoThree::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('subject', __('Subject'));
        $show->field('video_url', __('Video url'));
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
        $form = new Form(new SubjectTwoThree());

        $form->text('title', __('标题'))->required();

        $form->select('area_id', __('区域'))->options(\App\SubjectTwoThreeArea::pluck('title', 'id'))->required();

        $form->select('subject', __('科目'))->options([2=> '科目二', 3=> '科目三'])->required();

        $form->select('car_id', __('车型'))->options(\App\Car::pluck('title', 'id')->toArray())->required();

        $form->hidden('video_url', __('视频'));

        $form->text('video_url', __('视频地址'))->required()->help('阿里云点播服务的视频ID');

        $form->file('thumb', __('封面'))->required()->uniqueName()->move('qcby/images');

        $form->text('description', __('描述'))->help('此视频的简单描述');

        //$form->ignore(['video']);

        // 在表单提交前调用
        /*$form->submitted(function (Form $form) {

            $videofile          = request('video');

            $cateId             = request('subject') == 2 ? '1000172509' : '1000172510';

            $data = array(
                    'title'         => request('title'), 
                    'fileName'      => $videofile->getClientOriginalName(), 
                    'description'   => request('description'), 
                    'coverURL'      => '封面', 
                    'cateId'        => $cateId, 
                    'tags'          => '标签', 
                    'templateGroupId' => $this->templateGroupId, 
                    'storageLocation' => $this->storageLocation,
                );
            
            $AttachmentAction   = new UploadVideo();

            $dataid = $AttachmentAction->localUploadLocalVideo($data, 1, $videofile);

            $form->video_url = $dataid['data'];

        });*/

        return $form;
    }
}
