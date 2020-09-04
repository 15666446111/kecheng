@extends('layouts.app')

@section('title')
超级攻略
@endsection


@section('content')
<div class="weui-tab sxlx_con">

    @include('layouts.header')

    <div style="background: #ebeef5; width: 100%; height: .5rem"></div>

    <div class="container">

        <div class="col-xs-12">
            <img src="{{ config('base.oss_read_path') . $info->thumb }}" class="img-responsive img-da">
        </div>

        <div class="col-xs-12">
            <div class="pagetitle">
                <h2>{{ $info->title }}</h2>
                <div class="w33"><i class="fa fa-video-camera"></i><span>{{ number_format($info->study_count) }}</span>次学习</div>
                <div class="w33"><i class="fa fa-heart-o"></i><span>{{ number_format($info->favouer_count) }}</span>次收藏</div>
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



    <div class="weui-tab">

        <div class="weui-navbar">
            <div class="weui-navbar__item weui_bar__item_on weui-bar__item--on" data="#tab1">
                课程目录
            </div>
            <div class="weui-navbar__item" data="#tab2">
                课程说明
            </div>
            <div class="weui-navbar__item" data="#tab3">
                学员评价
            </div>
        </div>

        <div class="weui-tab__bd" style="padding-top: 0">
            <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active" style="padding: 0 2%">
                <div class="weui-cells">
                    @foreach($info->maintains as $cp)
                        @if($cp->open)
                            <div class="col-xs-12 alert alert-success">{{ $cp->title }}</div>

                            @foreach($cp->courses as $course)
                                <div class="weui-cell sxlx_rows" style="padding-left: 1rem">
                                    <div class="weui-cell__bd ljxx" data-url="{{ $course->media }}">
                                        @if(in_array(substr(strrchr($course->media, '.'), 1), ['mp4', 'mp3', 'flv', 'flash']))
                                        <i class="fa fa-video-camera" aria-hidden="true"></i>
                                        @elseif(in_array(substr(strrchr($course->media, '.'), 1), ['csv', 'pdf', 'xls', 'xlsx']))
                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        @else
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        @endif
                                        {{ $course->title }} 
                                    </div>
                                    <div class="weui-cell__ft ljxx" data-url="{{ $course->media }}">立即学习</div>
                                </div>
                            @endforeach

                        @endif 
                    @endforeach
                </div>
            </div>
            <div id="tab2" class="weui-tab__bd-item">
                {{ $info->desc }}
            </div>
            <div id="tab3" class="weui-tab__bd-item">
                <h4> 学员评价 </h4>
            </div>
        </div>

    </div>
    @include('layouts.foot_nav', ['nav' => 'home'])
</div>

<div class="pdf_body">
    <iframe class="pdf_iframe" src=""></iframe>
</div>

@endsection


@section('scripts')
    <!-- pdf jquery Javascript-->
    <script src="{{ asset('js/jquery.media.js') }}?time={{ time() }}"></script>

    <script type="text/javascript">
        $(".ljxx").click(function(){
            var show = $(".pdf_body").css('display');
            if(show == "none") $(".pdf_body").css('display', 'block');
            var url = "{{ config('base.oss_read_path') }}"+$(this).data('url');
            $(".pdf_iframe").attr('src', "/js/pdf/web/viewer.html?file="+url);
            $('.pdf_body').media();
        })
    </script>
@endsection
