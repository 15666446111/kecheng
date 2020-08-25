@extends('layouts.app')

@section('title')
视频播放
@endsection


@section('content')
<link rel="stylesheet" href="https://g.alicdn.com/de/prismplayer/2.8.8/skins/default/aliplayer-min.css" />
<style type="text/css">
    .prism-big-play-btn{left: 45%!important; bottom: 40%!important}
    .prism-player .prism-big-play-btn { width: 45px; height: 45px;  }
    .prism-player .prism-big-play-btn .outter{ width: 45px; height: 45px;}

</style>
<div class="weui-tab">

    @include('layouts.header')

    <div style="background: #ebeef5; width: 100%; height: .5rem"></div>

    <div class="container">

        <div class="col-xs-12">
            <div class="prism-player" id="player-con"></div>
        </div>

        <div class="col-xs-12">
            <div class="pagetitle">
                <h2 style="line-height: 2; margin-top: 5px;">{{ $video->title }}</h2>
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


    @include('layouts.foot_nav', ['nav' => 'home'])

</div>
@endsection


@section('scripts')
<script type="text/javascript" charset="utf-8" src="https://g.alicdn.com/de/prismplayer/2.8.8/aliplayer-min.js"></script>
<script>
var player = new Aliplayer({
    "id": "player-con",
    "vid":"{{ $video->video_url }}",
    "playauth":"{{ $auth }}",
    "encryptType": 1,
    "cover": '{{ $video->thumb }}',
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
</script>
@endsection
