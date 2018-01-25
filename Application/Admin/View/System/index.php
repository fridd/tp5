<!--_meta 作为公共模版分离出去-->
<include file="Common/head" />
<!--/meta 作为公共模版分离出去-->

<link rel="stylesheet" href="/Public/uploader/control/css/zyUpload.css" type="text/css">
<title>系统设置</title>
</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="add_form">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">管理员账号：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" value="" name="username" id="username"/>
			</div>
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">原密码：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="password" class="input-text" value="" name="old_password" id="old_password"/>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">新密码：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="password" class="input-text" value="" name="new_password" id="new_password"/>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">确认密码：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="password" class="input-text" value="" name="confirm_password" id="confirm_password"/>
			</div>
		</div>
		<div class="row cl">
			<div class="col-9 col-offset-2">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>
</div>

<!--_footer 作为公共模版分离出去-->
<include file="Common/footer" />
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script>
$("#add_form").submit(function(){
	if(!$("#username").val()){
		layer.alert('请输入账号！');
		return false;
	}else if(!$("#old_password").val()){
		layer.alert('请输入原密码！');
		return false;
	}else if(!$("#new_password").val()){
		layer.alert('请输入新密码！');
		return false;
	}else if(!$("#confirm_password").val()){
		layer.alert('请输入确认密码！');
		return false;
	}
});
</script>
<!--/请在上方写此页面业务相关的脚本-->


</body>
</html>