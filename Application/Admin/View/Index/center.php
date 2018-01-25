<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/js/html5.js"></script>
<script type="text/javascript" src="/Public/js/respond.min.js"></script>
<script type="text/javascript" src="/Public/js/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/skin/default/skin.css" id="skin" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>我的桌面</title>
</head>
<body>
<div class="page-container" style="margin:80px auto;text-align:center;line-height:50px;">
	<p class="f-20 text-success">欢迎使用H-ui.admin <span class="f-14">v2.4</span>后台模版！</p>
	<p>登录次数：{$login_info.times} </p>
	<p>上次登录IP：{$login_info.last_login.ip}  </p>
	<p>上次登录时间：{$login_info.last_login.login_time} </p>
	<!-- <table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>新闻库</th>
				<th>图片库</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td>{$login_info.total_news}</td>
				<td>{$login_info.total_miens}</td>
			</tr>
			<tr class="text-c">
				<td>今日</td>
				<td>{$login_info.day_news}</td>
				<td>{$login_info.day_miens}</td>
			</tr>
			<tr class="text-c">
				<td>本周</td>
				<td>{$login_info.week_news}</td>
				<td>{$login_info.week_miens}</td>
			</tr>
			<tr class="text-c">
				<td>本月</td>
				<td>{$login_info.month_news}</td>
				<td>{$login_info.month_miens}</td>
			</tr>
		</tbody>
	</table> -->
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
			Copyright &copy;2015 H-ui.admin v2.3 All Rights Reserved.<br>
			本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
	</div>
</footer>
<script type="text/javascript" src="/Public/js/jquery-3.1.0.min.js"></script>  
<script type="text/javascript" src="/Public/js/H-ui.js"></script> 

</body>
</html>