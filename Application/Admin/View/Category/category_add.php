<!--_meta 作为公共模版分离出去-->
<include file="Common/head" />
<!--/meta 作为公共模版分离出去-->

<title>文章分类</title>
</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-category-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">
				分类名称：
			</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="" placeholder="请输入分类名称" id="cat_name" name="cat_name">
			</div>
			<div class="col-3"></div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">
				上级分类：
			</label>
			<div class="formControls col-xs-8 col-sm-6">
				<span class="select-box">
					<select class="select" id="pid" name="pid">
						<option value="0">顶级分类</option>
						<volist name="list" id="v">
						<option value="{$v.id}">{$v.cat_name}</option>
						</volist>
					</select>
				</span>
			</div>
			<div class="col-3"></div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">排序：</label>
			<div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" value="" placeholder="" id="list_order" name="list_order">
			</div>
			<div class="col-3"></div>
		</div>
		<div class="row cl">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
<include file="Common/footer" />
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
$(function(){	
	
	$("#form-category-add").submit(function(){	
		if(!$("#cat_name").val()){
			layer.msg("请输入分类名称！",{time: 3000, icon:5});
			return false;
		}
	});

});
</script>
<style type="text/css">
	#cat_name,.select-box,#list_order{width: 60%;}
	label.error{left:350px;top:5px;}
</style>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>