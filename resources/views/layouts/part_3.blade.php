<div class="weui-tab">

    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__bd qcby">

            <div class="weui-cells">
                @foreach($sub3 as $cp)
                <div class="weui-cell">
                    <div class="weui-cell__hd" style="width: 40%;">
                        <img src="{{ $cp->thumb }}" style="width: 90%">
                    </div>
                    <div class="weui-cell__bd" style="width: 40%; font-size: .6rem; line-height: 2">
                        <p style="font-size: .8rem; line-height: 2">{{ $cp->title }}</p>
                        <p>{{ $cp->description }}</p>
                        <p>课程数 5 播放量 12345</p>
                    </div>
                    <div class="weui-cell__ft">
                        <a href="/video/{{ $cp->id }}" class="weui-btn weui-btn_primary" style="font-size: .6rem">详情</a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </div>

</div>