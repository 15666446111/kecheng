@extends('layouts.app')

@section('title')
首页
@endsection


@section('content')
<div class="weui-tab">

    @include('layouts.header')

    <!--Plug-->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($plug as $p)
            <div class="swiper-slide">
                <img src="{{ config('base.oss_read_path') . $p->images }}" alt="{{ $p->name }}">
            </div>
            @endforeach
        </div>
    </div>


    <div class="weui-navbar">
        <a class="weui-navbar__item weui-bar__item--on" data="#tab1">科一</a>
        <a class="weui-navbar__item" data="#tab2">科二</a>
        <a class="weui-navbar__item" data="#tab3">科三</a>
        <a class="weui-navbar__item" data="#tab4">科四</a>
        <a class="weui-navbar__item" href="{{ config('base.sign_up_url') }}">拿本</a>
    </div>

    <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
            @include('layouts.part_1')
        </div>
        <div id="tab2" class="weui-tab__bd-item">
            @include('layouts.part_2')
        </div>
        <div id="tab3" class="weui-tab__bd-item">
            @include('layouts.part_3')
        </div>
        <div id="tab4" class="weui-tab__bd-item">
            @include('layouts.part_4')
        </div>

    </div>

    @include('layouts.foot_nav', ['nav' => 'home'])

</div>
@endsection


@section('scripts')

@endsection
