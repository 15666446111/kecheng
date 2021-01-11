<?php

namespace App\Admin\Actions\Question;

use Session;
use Illuminate\Http\Request;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;

class SyncSanli extends BatchAction
{
    protected $selector = '.report-posts-sanli';

    public function handle(Collection $collection, Request $request)
    {

    	if(!$request->san_maintains) return $this->response()->error('请选择同步目标')->refresh();

        session()->put('san_exercise', $request->san_exercise);

        session()->put('san_maintains', $request->san_maintains);

        foreach ($collection as $model) {
           
        	$is = \App\SanQuestion::where('maintain_id', $request->san_maintains)->where('question_id', $model->id)->exists();

        	if(!$is){

        		\App\SanQuestion::create([

        			'maintain_id'	=>	$request->san_maintains,
        			'question_id'	=>	$model->id,
        			'sort'			=>	$request->number ?? $model->sort,

        		]);

        	}

        }

        return $this->response()->success('同步成功')->refresh();
    }


    /**
     * @Author    Pudding
     * @DateTime  2020-08-25
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 选择章节 ]
     * @return    [type]      [description]
     */
    public function form()
	{
	    $this->select('san_exercise','地区车型')->options(\App\SanliExercise::pluck('title','id'))->default(session::get('san_exercise'));
	    
        $dd = \App\SanliMaintain::pluck('title as text', 'id')->toArray();

	    $this->select('san_maintains', '章节选择')->options($dd)->default(session::get('san_maintains'))->required();

        $this->text('number', '排序权重')->default(0);
	}

	/**
	 * @Author    Pudding
	 * @DateTime  2020-08-25
	 * @copyright [copyright]
	 * @license   [ 页面html ]
	 * @version   [version]
	 * @return    [type]      [description]
	 */
    public function html()
    {
        return "<a class='report-posts-sanli btn btn-sm btn-danger'><i class='fa fa-info-circle'></i>同步至保过600题</a>";
    }

    /**
     * @return string
     * 上传效果
     */
    public function handleActionPromise()
    {
        
        $resolve = <<<'SCRIPT'

        $(".six_exercise").on('change',function(){
            var san_exercise = $(".san_exercise option:selected").val();
            if(san_exercise == ""){ 
                $(".san_maintains").find("option").remove();
            }else{
                $.ajax({
                    url: '/getMaintainsSan',
                    data:{q: san_exercise},
                    success:function(data){
                        var options = '';
                        $.each(data, function(i, val) {
                            options += "<option value='"+val['id']+"'>"+val['text']+"</option>";
                        });
                        $(".san_maintains").html(options);
                        $(".san_maintains").change();
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
         let html = `<div class='tips' style='color: red;font-size: 18px;'>同步时间取决于数据量，请耐心等待结果不要关闭窗口！<img src="data:image/gif;base64,R0lGODlhEAAQAPQAAP///1VVVfr6+np6eqysrFhYWG5ubuPj48TExGNjY6Ojo5iYmOzs7Lq6utjY2ISEhI6OjgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAAFUCAgjmRpnqUwFGwhKoRgqq2YFMaRGjWA8AbZiIBbjQQ8AmmFUJEQhQGJhaKOrCksgEla+KIkYvC6SJKQOISoNSYdeIk1ayA8ExTyeR3F749CACH5BAkKAAAALAAAAAAQABAAAAVoICCKR9KMaCoaxeCoqEAkRX3AwMHWxQIIjJSAZWgUEgzBwCBAEQpMwIDwY1FHgwJCtOW2UDWYIDyqNVVkUbYr6CK+o2eUMKgWrqKhj0FrEM8jQQALPFA3MAc8CQSAMA5ZBjgqDQmHIyEAIfkECQoAAAAsAAAAABAAEAAABWAgII4j85Ao2hRIKgrEUBQJLaSHMe8zgQo6Q8sxS7RIhILhBkgumCTZsXkACBC+0cwF2GoLLoFXREDcDlkAojBICRaFLDCOQtQKjmsQSubtDFU/NXcDBHwkaw1cKQ8MiyEAIfkECQoAAAAsAAAAABAAEAAABVIgII5kaZ6AIJQCMRTFQKiDQx4GrBfGa4uCnAEhQuRgPwCBtwK+kCNFgjh6QlFYgGO7baJ2CxIioSDpwqNggWCGDVVGphly3BkOpXDrKfNm/4AhACH5BAkKAAAALAAAAAAQABAAAAVgICCOZGmeqEAMRTEQwskYbV0Yx7kYSIzQhtgoBxCKBDQCIOcoLBimRiFhSABYU5gIgW01pLUBYkRItAYAqrlhYiwKjiWAcDMWY8QjsCf4DewiBzQ2N1AmKlgvgCiMjSQhACH5BAkKAAAALAAAAAAQABAAAAVfICCOZGmeqEgUxUAIpkA0AMKyxkEiSZEIsJqhYAg+boUFSTAkiBiNHks3sg1ILAfBiS10gyqCg0UaFBCkwy3RYKiIYMAC+RAxiQgYsJdAjw5DN2gILzEEZgVcKYuMJiEAOwAAAAAAAAAAAA=="><\/div>`
         $('.modal-header').append(html)
process.then(actionResolverss).catch(actionCatcherss);
SCRIPT;
    
    }
}