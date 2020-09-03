@extends('layouts.app')

@section('title')
安全驾驶
@endsection


@section('content')
<link rel="stylesheet" href="https://g.alicdn.com/de/prismplayer/2.8.8/skins/default/aliplayer-min.css" />


<div class="weui-tab">

    @include('layouts.header')

    <div style="background: #ebeef5; width: 100%; height: .5rem"></div>

    <div class="container">

        <div class="col-xs-12">
            <img src="http://www.jsyghw.com/uploads/fimg/20180813/92686d0cbcdf0bf8c760e3f415ec6910.jpg" class="img-responsive img-da">
        </div>

        <div class="col-xs-12">
            <div class="pagetitle">
                <h2>《安全驾驶》精品课程</h2>
                <div class="w33"><i class="fa fa-video-camera"></i><span>1359</span>次学习</div>
                <div class="w33"><i class="fa fa-heart-o"></i><span>1359</span>次收藏</div>
            </div>
        </div>  

        <div class="col-xs-12 price">
            <span class="red"><b>￥</b>免费</span>
            <span class="buy-now">
                <a href="javascript:ready_to_study()">开始学习</a> 
            </span>
        </div>
    </div>

    <div style="background: #ebeef5; width: 100%; height: .5rem"></div>



    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__bd qcby">
            @foreach($list as $cp)
            <div class="col-xs-12 alert alert-success">{{ $cp->chapter_title }}</div>
                @foreach($cp->sections as $sec)
                    @if($sec->section_open)
                        <div class="weui-panel__hd">{{ $sec->section_title }}</div>
                        @foreach($sec->maints as $l)
                            @if($l->active)

                                <div class="weui-cell sxlx_rows" style="padding-left: 1rem">
                                    <div class="weui-cell__bd ljxx" data-url="{{ $l->media }}">
                                        @if(in_array(substr(strrchr($l->media, '.'), 1), ['mp4', 'mp3', 'flv', 'flash']))
                                        <i class="fa fa-video-camera" aria-hidden="true"></i>
                                        @elseif(in_array(substr(strrchr($l->media, '.'), 1), ['csv', 'pdf', 'xls', 'xlsx']))
                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        @else
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        @endif
                                        {{ $l->title }} 
                                    </div>
                                    <div class="weui-cell__ft ljxx" data-url="{{ $l->media }}">立即学习</div>
                                </div>
                            @endif
                        @endforeach
                    @endif 
                @endforeach
            @endforeach
        </div>
    </div>


    @include('layouts.foot_nav', ['nav' => 'aqjs'])

</div>

<div class="video_box">
    <div id="player-con"></div>
</div>
@endsection


@section('scripts')
<script type="text/javascript" charset="utf-8" src="https://g.alicdn.com/de/prismplayer/2.8.8/aliplayer-min.js"></script>
<script>
var player = new Aliplayer({
    "id": "player-con",
    "source": "//player.alicdn.com/video/aliyunmedia.mp4",
    "encryptType": 1,
    "width": "100%",
    "height": "250px",
    "autoplay": false,
    "isLive": false,
    "rePlay": false,
    "videoHeight": "100%",
    "playsinline": true,
    "preload": true,
    "language": "zh-cn",
    "controlBarVisibility": "click",
    "videoWidth": "100%",
    "showBarTime": 5000,
    "useH5Prism": true
}, function (player) {
        console.log("The player is created");
    }
);

$(".ljxx").click(function(){
    var show = $(".video_box").css('display');
    if(show == "none") $(".video_box").css('display', 'block');
    if($(this).data('url') == "undefined") return false;
    var url = "{{ config('base.oss_read_path') }}"+$(this).data('url');
    player.loadByUrl(url, 0);
    player.play();
})

</script>
@endsection
