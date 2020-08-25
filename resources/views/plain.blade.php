@extends('layouts.app')

@section('title')
{{ $title }}
@endsection


@section('content')
<div class="weui-tab">

    @include('layouts.header')

    <div style="background: #ebeef5; width: 100%; height: .5rem"></div>

    <div class="container">

        <div class="col-xs-12">
            <img src="http://www.jsyghw.com/uploads/fimg/20180425/18b37def538ec3bdc7e9e3e3f72f970f.jpg" class="img-responsive img-da">
        </div>

        <div class="col-xs-12">
            <div class="pagetitle">
                <h2>普通顺序-{{ $title }}</h2>
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

        </div>
    </div>



    @include('layouts.foot_nav', ['nav' => 'home'])

</div>
@endsection


@section('scripts')

@endsection