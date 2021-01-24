<?php

namespace App\Admin\Actions\Import;

use Throwable;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Encore\Admin\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class ImportAreaSubject extends Action
{

    protected $selector = '.import-area-subject';

    public function handle(Request $request)
    {
        try {

            $result = Excel::toArray(null, request()->file('area_file'));
            
            $code   = $request->area;

            if(!$code or $code == ""){
                return $this->response()->error('请选择地区!')->refresh();
            }

            // 只取第一个Sheet
            if (count($result[0]) > 0) {

                $rows = $result[0];

                $headings = [];

                if (count($rows) > 2) {
                    
                    foreach ($rows[0] as $key => $col) $headings[Str::snake($col)] = $key;

                }

                $data = [];

                $i = 0;

                foreach ($rows as $key => $row){
                    
                    if ( $key >= 1 && isset($row[$headings['题干']])){

                        $have = \App\SubjectOneFour::whereTitle($row[10])->where('option_a', $row[12])->where('option_b', $row[13])->where('answer', $row[16])->first();

                        if(empty($have)){
                            \App\SubjectOneFour::create([
                                'title'     =>  $row[10],
                                'title_pic' =>  $row[11],
                                'car'       =>  $row[1], // 车型
                                'type'      =>  $row[4], // 题目类型
                                'subject'   =>  $row[0], // 科目
                                'category'  =>  0, // 分类
                                'option_a'  =>  $row[12],
                                'option_b'  =>  $row[13], //
                                'option_c'  =>  $row[14],
                                'option_d'  =>  $row[15],
                                'answer'    =>  $row[16],     // 答案
                                'analysis'  =>  $row[20],     // 解析
                                'jiqiao'    =>  $row[18],     // 技巧
                                'analysis_video'    =>  null, //视频解析
                                'analysis_audio'    =>  $row[19], //音频解析
                                'analysis_image'    =>  $row[21], //图片解析
                                'sort'      =>  $row[3], //排序
                                'open'      =>  1,
                                'area_code' =>  $code,
                            ]);
                            $i++;
                        }

                    } 
                }

                return $this->response()->success('导入成功, 导入'.$i.'条!')->refresh();

            } else  return $this->response()->error('无数据导入!')->refresh();

        } catch (ValidationException $validationException) {

            return Response::withException($validationException);

        } catch (Throwable $throwable) {
            $this->response()->status = false;
            return $this->response()->swal()->error($throwable->getMessage());
        }
    }

    /**
     * [html 展示的HTML]
     * @author Pudding
     * @DateTime 2020-04-21T15:58:43+0800
     * @return   [type]                   [description]
     */
    public function html()
    {
        return  <<<HTML
        <a class="btn btn-sm btn-default import-area-subject"><i class="fa fa-upload"></i>导入地方题库题库</a>
HTML;
    }

    /**
     * [form 点击的按钮 出来的表单]
     * @author Pudding
     * @DateTime 2020-04-21T15:58:56+0800
     * @return   [type]                   [description]
     */
    public function form()
    {
        $this->select('provinces', __('省份'))->options(\App\Province::pluck('name', 'id')->toArray())->load('area', '/api/city');

        $this->select('area', __('城市'));

        $this->file('area_file', '上传题库(Excel)')->help('请上传符合格式的Excel,模版文件<a target="_blank" href="http://wwww.baidu.com">点击下载</a>');
    }


    /**
     * @return string
     * 上传效果
     */
    public function handleActionPromise()
    {
        $resolve = <<<'SCRIPT'
        $(".provinces").on('change',function(){
            var name = $(".provinces option:selected").val();
            if(name == ""){ 
                $(".area").find("option").remove();
            }else{
                
                $.ajax({
                    url: '/api/city',
                    data:{q: name},
                    success:function(data){
                        var options = '';
                        $.each(data, function(i, val) {
                            options += "<option value='"+val['id']+"'>"+val['text']+"</option>";
                        });
                        $(".area").html(options);
                        $(".area").change();
                    }
                });
            }
        })


var actionResolverss = function (data) {
            $('.modal-footer').show()
            $('.tips').remove()
            var response = data[0];
            var target   = data[1];

            if (typeof response !== 'object') {
                return $.admin.swal({type: 'error', title: 'Oops!'});
            }

            var then = function (then) {
                if (then.action == 'refresh') {
                    $.admin.reload();
                }

                if (then.action == 'download') {
                    window.open(then.value, '_blank');
                }

                if (then.action == 'redirect') {
                    $.admin.redirect(then.value);
                }
            };

            if (typeof response.html === 'string') {
                target.html(response.html);
            }

            if (typeof response.swal === 'object') {
                $.admin.swal(response.swal);
            }

            if (typeof response.toastr === 'object') {
                $.admin.toastr[response.toastr.type](response.toastr.content, '', response.toastr.options);
            }

            if (response.then) {
              then(response.then);
            }
        };

        var actionCatcherss = function (request) {
            $('.modal-footer').show()
            $('.tips').remove()

            if (request && typeof request.responseJSON === 'object') {
                $.admin.toastr.error(request.responseJSON.message, '', {positionClass:"toast-bottom-center", timeOut: 10000}).css("width","500px")
            }
        };
SCRIPT;

        Admin::script($resolve);

        return <<<'SCRIPT'
         $('.modal-footer').hide()
         let html = `<div class='tips' style='color: red;font-size: 18px;'>导入时间取决于数据量，请耐心等待结果不要关闭窗口！<img src="data:image/gif;base64,R0lGODlhEAAQAPQAAP///1VVVfr6+np6eqysrFhYWG5ubuPj48TExGNjY6Ojo5iYmOzs7Lq6utjY2ISEhI6OjgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAAFUCAgjmRpnqUwFGwhKoRgqq2YFMaRGjWA8AbZiIBbjQQ8AmmFUJEQhQGJhaKOrCksgEla+KIkYvC6SJKQOISoNSYdeIk1ayA8ExTyeR3F749CACH5BAkKAAAALAAAAAAQABAAAAVoICCKR9KMaCoaxeCoqEAkRX3AwMHWxQIIjJSAZWgUEgzBwCBAEQpMwIDwY1FHgwJCtOW2UDWYIDyqNVVkUbYr6CK+o2eUMKgWrqKhj0FrEM8jQQALPFA3MAc8CQSAMA5ZBjgqDQmHIyEAIfkECQoAAAAsAAAAABAAEAAABWAgII4j85Ao2hRIKgrEUBQJLaSHMe8zgQo6Q8sxS7RIhILhBkgumCTZsXkACBC+0cwF2GoLLoFXREDcDlkAojBICRaFLDCOQtQKjmsQSubtDFU/NXcDBHwkaw1cKQ8MiyEAIfkECQoAAAAsAAAAABAAEAAABVIgII5kaZ6AIJQCMRTFQKiDQx4GrBfGa4uCnAEhQuRgPwCBtwK+kCNFgjh6QlFYgGO7baJ2CxIioSDpwqNggWCGDVVGphly3BkOpXDrKfNm/4AhACH5BAkKAAAALAAAAAAQABAAAAVgICCOZGmeqEAMRTEQwskYbV0Yx7kYSIzQhtgoBxCKBDQCIOcoLBimRiFhSABYU5gIgW01pLUBYkRItAYAqrlhYiwKjiWAcDMWY8QjsCf4DewiBzQ2N1AmKlgvgCiMjSQhACH5BAkKAAAALAAAAAAQABAAAAVfICCOZGmeqEgUxUAIpkA0AMKyxkEiSZEIsJqhYAg+boUFSTAkiBiNHks3sg1ILAfBiS10gyqCg0UaFBCkwy3RYKiIYMAC+RAxiQgYsJdAjw5DN2gILzEEZgVcKYuMJiEAOwAAAAAAAAAAAA=="><\/div>`
         $('.modal-header').append(html)
process.then(actionResolverss).catch(actionCatcherss);
SCRIPT;
    }
}