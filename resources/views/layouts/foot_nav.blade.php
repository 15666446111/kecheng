
<div class="weui-tabbar">
    <a href="{{ config('base.sign_up_url') }}" class="weui-tabbar__item">
        <div class="weui-tabbar__icon"><img class="img-cefan" src="{{ asset('images/nav_bm.png') }}" alt=""></div>
        <p class="weui-tabbar__label">报名</p>
    </a>

    <a href="/" class="weui-tabbar__item @if($nav == 'home') weui-bar__item--on  @endif">
        <div class="weui-tabbar__icon"><img class="img-cefan" src="{{ asset('images/nav_jk.png') }}" alt=""></div>
        <p class="weui-tabbar__label">驾考</p>
    </a>

    <a href="{{ route('aqjs') }}" class="weui-tabbar__item @if($nav == 'aqjs') weui-bar__item--on  @endif">
        <div class="weui-tabbar__icon"><img class="img-cefan" src="{{ asset('images/nav_js.png') }}" alt=""></div>
        <p class="weui-tabbar__label">安全驾驶</p>
    </a>

    <a href="{{ route('qcby') }}" class="weui-tabbar__item @if($nav == 'qcby') weui-bar__item--on  @endif">
        <!-- <span class="weui-badge" style="position: absolute;top: -.4em; right: 1rem;">8</span> -->
        <div class="weui-tabbar__icon"><img class="img-cefan" src="{{ asset('images/nav_by.png') }}" alt=""></div>
        <p class="weui-tabbar__label">汽车保养</p>
    </a>

    <a href="javascript:;" class="weui-tabbar__item closing">
        <!-- <span class="weui-badge" style="position: absolute;top: -.4em; right: 1rem;">8</span> -->
        <div class="weui-tabbar__icon"><img class="img-cefan" src="{{ asset('images/nav_fl.png') }}" alt=""></div>
        <p class="weui-tabbar__label">车主福利</p>
    </a>
</div>
