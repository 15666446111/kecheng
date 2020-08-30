@extends('layouts.app')

@section('title')
考试预约
@endsection

@section('content')
<div class="weui-tab">

    <div class="st tx1 swiper-slide st1 swiper-slide-active" id="st8073" data-key="1" data-stid="8073">
        
        <div class="title">1、雨天对安全行车的主要影响是什么？&nbsp;</div>
            <!--单选-->
        <div class="answer">
            A:电器设备易受潮短路&nbsp;<br>
            B:路面湿滑，视线受阻&nbsp;<br>
            C:发动机易熄火&nbsp;<br>
            D:行驶阻力增大&nbsp;                    
        </div>

        <div class="alert-info st_answer_list">
            <label><input class="aui-radio" type="radio" name="st_1_ans" value="A">答案A</label>
            <label><input class="aui-radio" type="radio" name="st_1_ans" value="B">答案B</label>
            <label><input class="aui-radio" type="radio" name="st_1_ans" value="C">答案C</label>
            <label><input class="aui-radio" type="radio" name="st_1_ans" value="D">答案D</label>
        </div>
        
        <div class="ans_re" style="display:none"></div>
        <div class="anasis" style="display:none">[试题详解]：此题考查的知识点是雨天行车。雨天对安全行车的影响主要是能见度和路面湿滑。</div>

                    
        <div class="jiqiao" style="display:none">
            <div>[答案]B</div>
        </div>
    </div>




    <footer class="aui-bar aui-bar-tab" id="footer">
        <div class="aui-bar-tab-item prev" tapmode="">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <div class="aui-bar-tab-label">上一题</div>
        </div>
        <div class="aui-bar-tab-item ufa" tapmode="">
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <div class="aui-bar-tab-label">收藏</div>
        </div>
        <div class="aui-bar-tab-item aui-active done">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>
            <div class="aui-bar-tab-label">1/284</div>
        </div>
        <div class="aui-bar-tab-item jiqiao" tapmode="" data-toggle="modal" data-target="#jiqiao_modal" style="display: none">
            <i class="aui-iconfont aui-icon-display"></i>
            <div class="aui-bar-tab-label">技巧</div>
        </div>
        <div class="aui-bar-tab-item next" tapmode="">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <div class="aui-bar-tab-label">下一题</div>
        </div>
    </footer>
</div>
@endsection


@section('scripts')

@endsection
