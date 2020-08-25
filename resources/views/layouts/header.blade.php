<!-- 头部信息-->
<div class="weui-flex header">

    <div class="weui-flex__item">
        <div class="area"><i class="fa fa-map-marker"></i> <span class="area_text" data-text="{{ session('area.name') ? session('area.parent').' '.session('area.name') : '山东省 济南市' }}">{{ session('area.name') ?? '济南' }}</span></div>
    </div>

    <div class="weui-flex__item">
        <div class="top">驾驶员干货网</div>
    </div>

    <div class="weui-flex__item">
    	<div class="weui-flex">
		    <div class="weui-flex__item">
		        <div class="km"><span class="type_text">{{ session('cars.name') ?? '小车' }}</span><i class="fa fa-angle-down"></i></div>
		    </div>
		    <div class="weui-flex__item">
		        <div class="user"><i class="fa fa-user"></i></div>
		    </div>
		</div>
    </div>

</div>