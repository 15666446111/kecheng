<!DOCTYPE HTML>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta http-equiv=Content-Type content=text/html; charset=utf-8 />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- head 中 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">

    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css">

    <link href="{{ asset('font-awesome/css/font-awesome.css') }}?t={{ time() }}" rel="stylesheet" type="text/css" />

    <!-- 抽屉效果 -->
    <link href="{{ asset('css/sidebar.css') }}?t={{ time() }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/apps.css') }}?t={{ time() }}" rel="stylesheet" type="text/css" />
    
    <link rel="Bookmark" href="logo.ico">

    @yield('css')
</head>
<body>

    <div id="wrapper" style="left: 0">

       @yield('content') 

        <div class="sidebar">
            <div class="headSculpture">
                <img src="{{ session('wechat_user')->avatar }}" alt="{{ session('wechat_user')->name }}">
                <p>昵称：{{ session('wechat_user')->name }}</p>
            </div>
            <div class="option">
                <ul>
                    <li><i class="fa fa-home"></i>
                        <p>首页</p>
                    </li>
                    <li><i class="fa fa-star"></i>
                        <p>我的收藏</p>
                    </li>
                    <li><i class="fa fa-clock-o"></i>
                        <p>发布作品</p>
                    </li>
                    <li><i class="fa fa-clock-o"></i>
                        <p>我的收藏</p>
                    </li>
                    <li><i class="fa fa-cog"></i>
                        <p>设置</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    

    <!-- body 最后 -->
    <script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>

    <script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>

    <script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/swiper.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/city-picker.js') }}" charset="utf-8"></script>

    <!-- DIY Javascript-->
    <script src="{{ asset('js/sidebar.js') }}?time={{ time() }}"></script>

    <!-- DIY Javascript-->
    <script src="{{ asset('js/apps.js') }}?time={{ time() }}"></script>

    @yield('scripts')

    <script type="text/javascript">
        
        $(".closing").click(function(){
            $.alert("正在开发..", "");
        })

        /** 轮播图。plug**/
        $(".swiper-container").swiper({
            loop: false,
            autoplay: 3000
        });

        /** 地址选择器**/
        $(".area_text").cityPicker({
            title: "请选择您的地址",
            showDistrict: false,
            onClose: function(value){
                let code = value.value[1];
                $.ajax({
                    url: '/setCity',
                    data: {code: code},
                    type: 'post',
                    dataType: 'json',
                    success: function(data){
                        if(data.code) window.location.reload();
                    }
                })
            },
            onChange: function(s){
                console.log(s)
            }
        });

        /** 机动车类型选择**/
        $(".type_text").picker({
            title: "请选择车型",
            cols: [
                {
                    textAlign: 'center',
                    values: ['小车', '客车', '货车', '摩托车']
                }
            ],

            value: ["{{ session('cars.name') }}"],

            onClose: function(p) {
                let text = p.value[0];
                $.ajax({
                    url: '/setCars',
                    data: {code: text},
                    type: 'post',
                    dataType: 'json',
                    success: function(data){
                        if(data.code) window.location.reload();
                    }
                })
            }
        });
    </script>
</body>
</html>