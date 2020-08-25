$(document).ready(function(){

    /** 选项卡切换 **/
    $(".weui-navbar__item").on('click', function(){
        $(".weui-navbar__item").removeClass('weui-bar__item--on');
        $(this).addClass("weui-bar__item--on");
        $(".weui-tab__bd-item").removeClass("weui-tab__bd-item--active");
        $($(this).attr("data")).addClass("weui-tab__bd-item--active");
    })

});

