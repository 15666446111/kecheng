<?php

namespace App\Admin\Controllers;

use Storage;
use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class ModelSetting extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '模块设置';

    /**
     * [$id 标识 ]
     * @var [int]
     */
    protected $params;


    /**
     * @Author    Pudding
     * @DateTime  2020-09-04
     * @copyright [copyright]
     * @license   [license]
     * @version   [version]
     * @param     Request     $request [description]
     */
    public function __construct(Request $request)
    {
        //dd($request->route()->id);
        parent::__construct();
        if($request->route()->id == "1"){
            $this->title = "安全驾驶模块设置";
        }

        if($request->route()->id == "2"){
            $this->title = "汽车保养模块设置";
        }
        //dd($this->title);
        $this->params = $request->route()->id;


    }


    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        //dump($request->all());
        $info = \App\ModelSetting::where('id', $request->id)->first();

        $info->title = $request->title;

        $info->locks = $request->locks;

        $info->favs  = $request->favs;

        if($request->hasFile('thumb')){

            $picture = $request->file('thumb');

            $tmpFile = $picture->getRealPath();

            $extension = $picture->getClientOriginalExtension(); //获得上传文件扩展名

            $fileName = date('Y_m_d').'/'.md5(time()) .mt_rand(0,9999).'.'. $extension;

            Storage::disk('public')->put($fileName, file_get_contents($tmpFile));

            $info->thumb = env('APP_URL').Storage::url($fileName);
        }

        $info->save();

        admin_success('模块设置成功.');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->hidden('id')->rules('required');

        $this->text('title', '标题名称')->rules('required')->help('显示在缩略图下方的文字');

        $this->image('thumb', '缩略图片')->rules('required')->help('章节页面视频播放的封面图片');

        $this->number('locks', '学习次数')->help('默认的观看次数');

        $this->number('favs', '学习次数')->help('默认的收藏次数');
        
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        $info = \App\ModelSetting::where('id', $this->params)->first();

        if(empty($info)) abort(404);

        //dd($info);
        //dd($info);
        //dd($this->params);
        return $info;
    }
}
