@extends('layouts.apps')

@section('title')
顺序练习
@endsection


@section('content')
<header>
    <i class="fa fa-chevron-left"></i> 
    <span>机动车驾驶相关知识练习题</span>
</header>


<div class="content">
    <div class="ques-title">
        <span class="radio">单选</span>在实习期内驾驶机动车的，应当在车身后部粘贴或者悬挂哪种标志？
    </div>

    <div class="ques-pic">
        <img src="https://kecheng-jsyghw.oss-cn-beijing.aliyuncs.com/subject14/images/subject1/app5-shigujiuhu/31-jiexi.jpg">
    </div>

    <div class="ques-options">
        <ul>
            <li><span>A</span>违规行为</li>
            <li><span>B</span>违章行为</li>
            <li><span>C</span>违法行为</li>
            <li><span>D</span>犯罪行为</li>
        </ul>
    </div>


    <div class="fg"></div>

    <div class="jiexi-title">
        <h3>答案解析</h3>
    </div>

    <div class="jiexi-video">
        <div class="jiexi-video-title">视频解析</div>
        <div class="jiexi-video-text">
                <audio id="mp3Btn" controls="controls" class="btn-audio" controlsList="nodownload">
                    <source src="https://kecheng-jsyghw.oss-cn-beijing.aliyuncs.com/subject14/sounds/subject1-voice/qianghua6/5-6.mp3" type="audio/mp3" />
                    <source src="song.ogg" type="audio/ogg" />
                    Your browser does not support this audio format.
                </audio>
        </div>
    </div>

    <div class="jiexi-line"></div>

    <div class="jiexi-audio">
        <div class="jiexi-audio-title">音频解析</div>
        <div class="jiexi-audio-text">
            <audio id="mp3Btn" controls="controls" class="btn-audio" controlsList="nodownload">
                <source src="https://kecheng-jsyghw.oss-cn-beijing.aliyuncs.com/subject14/sounds/subject1-voice/qianghua6/5-6.mp3" type="audio/mp3" />
                <source src="song.ogg" type="audio/ogg" />
                Your browser does not support this audio format.
            </audio>
        </div>
    </div>

    <div class="jiexi-line"></div>

    <div class="jiexi-jiqiao">
        <div class="jiexi-audio">
            <div class="jiexi-audio-title">题目解析</div>
            <div class="jiexi-jiqiao-text">
                《道路安全交通法》第九十六条伪造、变造或者使用伪造、变造的机动车登记证书、号牌、行驶证、检验合格标志、保险标志、驾驶证或者使用其他车辆的机动车登记证书、号牌、行驶证、检验合格标志、保险标志的，由公安机关交通管理部门予以收缴，扣留该机动车，并处二百元以上二千元以下罚款;构成犯罪的，依法追究刑事责任。
            </div>
        </div>   
    </div>
</div>



<footer>
    <ul>
        <li><i class="fa fa-chevron-left"></i> 上一题</li>
        <li class="fa-s"><i class="fa fa-star-o"></i> <br/> 收藏</li>
        <li class="fa-s"><i class="fa fa-th-large"></i> <br/>23/467</li>
        <li>下一题 <i class="fa fa-chevron-right"></i></li>
    </ul>
</footer>
@endsection


@section('scripts')

@endsection
