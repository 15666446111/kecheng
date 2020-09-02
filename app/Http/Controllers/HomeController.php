<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 默认微信打开路由
    public function index(Request $request)
    {
        set_time_limit(0);  //设置程序执行时间
        
        ignore_user_abort(true);    //设置断开连接继续执行
        
        header('X-Accel-Buffering: no');    //关闭buffer
        
        header('Content-type: text/html;charset=utf-8');    //设置网页编码
        
        ob_start(); //打开输出缓冲控制
        
        echo str_repeat(' ',1024*4);    //字符填充

        $count = \App\SubjectOneFour::whereIn('subject', [1, 4])->orderBy('id', 'asc')->count();

        $width = 1000;

        $speed = 2000;

        $maxId = 0;

        $html = '<div style="margin:100px auto; padding: 8px; border: 1px solid gray; background: #EAEAEA; width: %upx">
        <div style="text-align:center; margin-bottom:10px;">共有'.$count.'条数据需要导出</div><div style="padding: 0; background-color: white; border: 1px solid navy; width: %upx"><div id="progress" style="padding: 0; background-color: #FFCC66; border: 0; width: 0px; text-align: center; height: 16px"></div></div><div id="msg" style="font-family: Tahoma; font-size: 9pt;">正在导出...</div><div id="percent" style="position: relative; top: -34px; text-align: center; font-weight: bold; font-size: 8pt">0%%</div></div>';
        
        echo sprintf($html, $width+8, $width);
        
        echo ob_get_clean();    //获取当前缓冲区内容并清除当前的输出缓冲
        
        flush();   //刷新缓冲区的内容，输出

        $i = 1;

        $regImg = '/<img[^>]*src\s*=\s*[\"|\']?\s*([^>\"\'\s]*)(\">|\"\/>)/i';

        while(true){

            $list = \App\SubjectOneFour::whereIn('subject', [1, 4])->where('id', '>', $maxId)->limit($speed)->orderBy('id', 'asc')->get();

            if ($list->isEmpty()) {

                dd('数据处理完成!');

                break;
            }


            foreach ($list as $key => $value) {

                $proportion = $i / $count;

                $msg = $i == $count ? '处理完成' : '正在处理第' . $i . '条信息';

                $script = '<script>document.getElementById("percent").innerText="%u%%";document.getElementById("progress").style.width="%upx";document.getElementById("msg").innerText="%s";</script>';

                echo sprintf($script, intval($proportion*100), intval( $i / $count * $width), $msg);

                $i++;

                echo ob_get_clean();

                flush();

                preg_match('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', $value->title, $match);

                if(isset($match[0])){

                    $src = $match[2];

                    //echo $src."<br/>";


                    if(strstr($src, 'http://ww4.sinaimg.cn')){


                            if( @fopen( $src, 'r' ) ) {

                                $file = substr(strrchr($src, '.'), 1);

                                file_put_contents( storage_path('app/public/'.$value->subject."/image/".$value->id.".".$file), file_get_contents($src));

                                $yum = "http://kc.jsyghw.com/storage/".$value->subject."/image/".$value->id.".".$file;

                                $pregRule = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/";
                                
                                $content = preg_replace($pregRule, "<img src='".$yum."' />", $value->title);
                                
                                $value->title = $content;

                                $value->save();  


                            }else {
                                echo 'File Do Not Exits <br/>';
                            }

                        /*if(strstr($src, 'http://www.jsyghw.com/')){

                            $src  = strstr($src, "http://www.jsyghw.com/");

                            if( @fopen( $src, 'r' ) ) {

                                $file = substr(strrchr($src, '.'), 1);

                                file_put_contents( storage_path('app/public/'.$value->subject."/image/".$value->id.".".$file), file_get_contents($src));

                                $yum = "http://kc.jsyghw.com/storage/".$value->subject."/image/".$value->id.".".$file;

                                $pregRule = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/";
                                
                                $content = preg_replace($pregRule, "<img src='".$yum."' />", $value->title);
                                
                                $value->title = $content;

                                $value->save();  


                            }else {
                                echo 'File Do Not Exits <br/>';
                            }
                        };*/
                        echo $src."<br/>";
                        
                    }

/*                    if (!preg_match('/(http:\/\/www)|(https:\/\/www)/i', $src)) {

                        $src = "http://kc.jsyghw.com/storage/".$src;
                        
                        $pregRule = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/";
                        
                        $content = preg_replace($pregRule, "<img src='".$src."' />", $value->title);
                        
                        $value->title = $content;

                        $value->save();  

                        echo $src."<br/>";                  

                    }*/

                }


                
            }
            //1590940800。
            $maxId = $list->max(['id']);

        }

        dd('over');


    	// 获取轮播图
    	$plug = \App\Plug::where('active', '1')->orderBy('sort', 'desc')->get();

    	// 获取科目二视频
    	$sub2 = \App\SubjectTwoThree::where('subject', 2)->orderBy('id', 'desc')->get();

    	// 获取科目三视频
    	$sub3 = \App\SubjectTwoThree::where('subject', 3)->orderBy('id', 'desc')->get();

    	return view('Home', compact('plug', 'sub2', 'sub3'));
    }
}
