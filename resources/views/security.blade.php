@extends('layouts.app')

@section('title')
汽车保养
@endsection


@section('content')
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
                            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                    <img class="weui-media-box__thumb" src="{{ config('base.oss_read_path') . $l->thumb }}">
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">{{ $l->title }}</h4>
                                </div>
                            </a>
                            @endif
                        @endforeach
                    @endif 
                @endforeach
            @endforeach
        </div>
    </div>


    @include('layouts.foot_nav', ['nav' => 'aqjs'])

</div>
@endsection


@section('scripts')

@endsection
