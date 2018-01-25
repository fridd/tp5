<!--_meta 作为公共模版分离出去-->
<include file="Common/head" />
<!--/meta 作为公共模版分离出去-->

<title>文章分类</title>
</head>
<body>
<div class="page-container">
	<form action="{:U('Category/category_edit')}" method="post" class="form form-horizontal" id="form-category-edit">
		<input type="hidden" name="id" value="{$this_category.id}">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">
				分类名称：
			</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="{$this_category.cat_name}" placeholder="" id="cat_name" name="cat_name">
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
						<option value="{$v.id}" <if condition="$this_category['pid'] eq $v['id']">selected</if>>{$v.cat_name}</option>
						</volist>
					</select>
				</span>
			</div>
			<div class="col-3"></div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">排序：</label>
			<div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" value="{$this_category.list_order}" placeholder="" id="list_order" name="list_order">
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
<script type="text/javascript" src="__PUBLIC__/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="__PUBLIC__/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="__PUBLIC__/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$.fn.Huitab($("#tab-category"));
	
	$("#form-category-edit").validate({

		onsubmit:true,// 是否在提交是验证
	    onblur  :false,
	　　//onfocusout:false,// 是否在获取焦点时验证
	　　onkeyup :false,// 是否在敲击键盘时验证

		rules: {
			cat_name: {
				required: true,
				maxlength: 10,
			},
		},
		messages: {
			cat_name: {
				required: "请输入分类名称",
			},
		}
	});
});
</script>
<style type="text/css">
	#cat_name,.select-box,#list_order{width: 60%;}
	label.error{left:210px;top:5px;}
</style>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>