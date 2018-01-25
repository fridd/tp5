<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Generator" content="CmsEasy 5_5_0_20130716_UTF8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo ($company["company_name"]); ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="RushCrm">
<link href="/hanteng/Public/css/home/bootstrap.css" rel="stylesheet" type="text/css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/hanteng/Public/js/home/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="/hanteng/Public/css/home/style.css" rel="stylesheet" type="text/css">
<!-- Custom Theme files -->
<!-- Add fancyBox main JS and CSS files -->
<script src="/hanteng/Public/js/home/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="/hanteng/Public/css/home/popup.css" rel="stylesheet" type="text/css">
<script src="/hanteng/Public/js/home/pc_nb.js" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="/hanteng/Public/css/home/main.css">

</head>
<body>

<div class="header">
    <div class="container">
        <div class="header_top">
            <div class="logo">
                <a href="<?php echo U('Index/index');?>">
                    <img src="/hanteng/Public<?php echo ($company["logo"]); ?>" alt="<?php echo ($company["company_name"]); ?>">
                </a>
            </div>
            <div class="cssmenu">
                <ul>
                    <li><a>联系电话： <?php echo ($company["telephone"]); ?></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- start h_menu4 -->
        <div class="h_menu4">
            <a class="toggleMenu" href="<?php echo U('Index/index');?>" style="display: none;">导航菜单</a>
            <ul class="nav">
                <li <?php if($action == 'index'): ?>class="active"<?php endif; ?>><a title="返回首页" href="<?php echo U('Index/index');?>">首页</a></li>
                <?php if(is_array($commonCategories)): $i = 0; $__LIST__ = $commonCategories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li <?php if(!empty($category)): if($category['id'] == $v['id']): ?>class="active"<?php endif; endif; if(!empty($this_article)): if($this_article['category'] == $v['cat_name']): ?>class="active"<?php endif; endif; ?>><a href="<?php echo U('Article/article_list',array('id'=>$v['id']));?>" title="<?php echo ($v["cat_name"]); ?>" target=""><?php echo ($v["cat_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                <li <?php if($action == 'recruit'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Recruit/recruit_list');?>" title="公司招聘" target="">公司招聘</a></li>
                <li <?php if($action == 'contact'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Contact/index');?>" title="联系我们" target="">联系我们</a></li>
            </ul>
            <script type="text/javascript" src="/hanteng/Public/js/home/nav.js"></script>
        </div>
        <!-- end h_menu4 -->
    </div>
</div>

<div class="about">
    <div class="container">
        <h1>联系我们</h1>
    </div>
</div>

<div class="support_box">
    <div class="container">
        <div class="col-md-6">
            <h4 class="tz-title-4 tzcolor-blue">
                <p class="tzweight_Bold"><span class="m_1">Rushcrm<br></span>联系我们</p>
            </h4>
            <p class="text1">如果您需要更多信息或者有任何疑问，请直接联系我们，我们的客服会尽快联系您。</p>
            <div class="contact_address1">
                <div class="col_1_of_2 span_1_of_2 row_5">
                    <h4 class="tz-title-6">
                        <p><span class="m_21">联系电话</span></p>
                    </h4>
                    <p>全国免费电话： <?php echo ($company["telephone"]); ?></p>
                </div>
                <div class="col_1_of_2 span_1_of_2 row_5">
                    <h4 class="tz-title-6">
                        <p><span class="m_21">联系邮箱</span></p>
                    </h4>
                    <p>服务邮箱：<a href="mailto:services@rushcrm.com"> <?php echo ($company["email"]); ?></a></p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="contact_address1">
                <div class="col_1_of_2 span_1_of_2 row_5">
                    <h4 class="tz-title-6">
                        <p><span class="m_21">地址：</span></p>
                    </h4>
                    <ul class="contact_social">
                        <p><?php echo ($company["address"]); ?></p>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 contact_right">
            <div class="ditu" id="dituContent" style="width:100%;height:350px">

            </div>
            <style>
                @media all and (max-width:768px){
                    .ditu{
                        margin:10px 0px;
                    }
                }
            </style>
            <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
            <script type="text/javascript">
                //创建和初始化地图函数：
                function initMap() {
                    createMap();//创建地图
                    setMapEvent();//设置地图事件
                    addMapControl();//向地图添加控件
                    addMarker();//向地图中添加marker
                }

                //创建地图函数：
                function createMap() {
                    var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
                    var point = new BMap.Point(113.760467, 34.769566);//定义一个中心点坐标
                    map.centerAndZoom(point, 17);//设定地图的中心点和坐标并将地图显示在地图容器中
                    window.map = map;//将map变量存储在全局
                }

                //地图事件设置函数：
                function setMapEvent() {
                    map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
                    map.enableScrollWheelZoom();//启用地图滚轮放大缩小
                    map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
                    map.enableKeyboard();//启用键盘上下左右键移动地图
                }

                //地图控件添加函数：
                function addMapControl() {
                    //向地图中添加缩放控件
                    var ctrl_nav = new BMap.NavigationControl({
                        anchor: BMAP_ANCHOR_TOP_LEFT,
                        type: BMAP_NAVIGATION_CONTROL_LARGE
                    });
                    map.addControl(ctrl_nav);
                    //向地图中添加缩略图控件
                    var ctrl_ove = new BMap.OverviewMapControl({anchor: BMAP_ANCHOR_BOTTOM_RIGHT, isOpen: 1});
                    map.addControl(ctrl_ove);
                    //向地图中添加比例尺控件
                    var ctrl_sca = new BMap.ScaleControl({anchor: BMAP_ANCHOR_BOTTOM_LEFT});
                    map.addControl(ctrl_sca);
                }

                //标注点数组
                var markerArr = [{
                    title: "合肥汉腾信息科技有限公司",
                    content: "电话：0551-65869378<br/>地址：合肥市高新技术开发区天达路2号安徽大学科技园",
                    point: "117.219617|31.851643",
                    isOpen: 1,
                    icon: {w: 23, h: 25, l: 46, t: 21, x: 9, lb: 12}
                }
                ];
                //创建marker
                function addMarker() {
                    for (var i = 0; i < markerArr.length; i++) {
                        var json = markerArr[i];
                        var p0 = json.point.split("|")[0];
                        var p1 = json.point.split("|")[1];
                        var point = new BMap.Point(p0, p1);
                        var iconImg = createIcon(json.icon);
                        var marker = new BMap.Marker(point, {icon: iconImg});
                        var iw = createInfoWindow(i);
                        var label = new BMap.Label(json.title, {"offset": new BMap.Size(json.icon.lb - json.icon.x + 10, -20)});
                        marker.setLabel(label);
                        map.addOverlay(marker);
                        label.setStyle({
                            borderColor: "#808080",
                            color: "#333",
                            cursor: "pointer"
                        });

                        (function () {
                            var index = i;
                            var _iw = createInfoWindow(i);
                            var _marker = marker;
                            _marker.addEventListener("click", function () {
                                this.openInfoWindow(_iw);
                            });
                            _iw.addEventListener("open", function () {
                                _marker.getLabel().hide();
                            })
                            _iw.addEventListener("close", function () {
                                _marker.getLabel().show();
                            })
                            label.addEventListener("click", function () {
                                _marker.openInfoWindow(_iw);
                            })
                            if (!!json.isOpen) {
                                label.hide();
                                _marker.openInfoWindow(_iw);
                            }
                        })()
                    }
                }
                //创建InfoWindow
                function createInfoWindow(i) {
                    var json = markerArr[i];
                    var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>" + json.content + "</div>");
                    return iw;
                }
                //创建一个Icon
                function createIcon(json) {
                    var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w, json.h), {
                        imageOffset: new BMap.Size(-json.l, -json.t),
                        infoWindowOffset: new BMap.Size(json.lb + 5, 1),
                        offset: new BMap.Size(json.x, json.h)
                    })
                    return icon;
                }

                initMap();//创建和初始化地图
            </script>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="footer">
    <div class="container col">
        <p>版权所有 <?php echo ($company["company_name"]); ?> ICP备14014049号 Copyright © 2011-2015 All Rights Reserved</p>
        <p>地址：<?php echo ($company["address"]); ?>  邮箱：<?php echo ($company["email"]); ?>   电话：<?php echo ($company["telephone"]); ?></p>
    </div>
</div>
<style>
    .col{
        text-align: center;
        color: #ccc;
    }
    .col p{
        margin:5px 0px;
    }
</style>

</body>
</html>