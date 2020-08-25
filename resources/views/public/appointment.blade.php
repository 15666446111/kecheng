@extends('layouts.app')

@section('title')
考试预约
@endsection

@section('content')
<div class="weui-tab">

    @include('layouts.header')

    <div style="background: #ebeef5; width: 100%; height: .5rem"></div>

    <div class="container">

        <div class="yy_title">
            <li>注：本经验适用于已于驾校报名且已登记个人信息的学员或新手</li>
        </div>
        
        <div class="yy_cont">
            <div class="yy_num">1</div>首先打开，公安部交通安全综合管理服务平台: <a href="http://www.122.gov.cn">www.122.gov.cn</a>（选择自己所在的省份）
            <img src="http://jx.cdn.liuxiu.me/images/help/yuyue/01.jpg-phone" alt="">
            <img src="http://jx.cdn.liuxiu.me/images/help/yuyue/02.jpg-phone" alt="">
        </div>


        <div class="yy_cont">
            <div class="yy_num">2</div>点击用户登入（密码可询问所在驾校要取），登入后如图所示，点击首页，会到首页界面。）
            <img src="http://jx.cdn.liuxiu.me/images/help/yuyue/03.jpg-phone" alt="">
            <img src="http://jx.cdn.liuxiu.me/images/help/yuyue/04.jpg-phone" alt="">
        </div>


        <div class="yy_cont">
            <div class="yy_num">3</div>首页下拉，可以看到“本地考试预约。选择“本地考试预约”，进入预约界面。（注：根据自己的进度选择预约哪个科目，不要提早预约，以免错过考试。）
            <img src="http://jx.cdn.liuxiu.me/images/help/yuyue/05.jpg-phone" alt="">
        </div>

        <div class="yy_title">
            <li>科目二、三预约步骤</li>
        </div>

        <div class="yy_cont">
            <div class="yy_num">1</div>选择要预约的科目（科目二或科目三），选中后“下一步”（注：本次以科目二为示范）
            <img src="http://jx.cdn.liuxiu.me/images/help/yuyue/06.jpg-phone" alt="">
        </div>

        <div class="yy_cont">
            <div class="yy_num">2</div>本次以科目二为示范，1、选择考试场地；2、点击“查询”3、选择你要约的时间，选中后会打勾。注：关注一下自己排名，一般排名越靠前，预约成功率越高。
            <img src="http://jx.cdn.liuxiu.me/images/help/yuyue/07.jpg-phone" alt="">
        </div>

        <div class="yy_cont">
            <div class="yy_num">3</div>确认个人信息无误后，点击“发送验证码”，你绑定的手机号会收到预约短信，输入验证码后点击预约。（注：如果预约成功，在考试前的3天左右会有短信提醒你，是否成功预约科目考试。）
            <img src="http://jx.cdn.liuxiu.me/images/help/yuyue/08.jpg-phone" alt="">
        </div>

    </div>

    @include('layouts.foot_nav', ['nav' => 'home'])
</div>
@endsection


@section('scripts')

@endsection
