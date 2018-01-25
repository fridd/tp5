<!--_meta 作为公共模版分离出去-->
<include file="Common/head" />
<!--/meta 作为公共模版分离出去-->

<link rel="stylesheet" href="/Public/uploader/control/css/zyUpload.css" type="text/css">
<title>图片设置</title>
</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="add_form">
		<input type="hidden" name="id" value="{$this_banner.id}">
		<div id="tab-category" class="HuiTab">
			<div class="tabBar cl"><span>图片修改</span></div>
			<div class="tabCon" style="display:block;">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">图片名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{$this_banner.banner_name}" name="banner_name" id="banner_name"/>
					</div>
				</div>
                <div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">上传图片：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <div id="demo" class="demo"><input type="hidden" name="img_url" value="{$this_banner.img_url}"></div>
                    </div>
                    <div class="col-3"> </div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">排序：</label>
					<div class="formControls col-xs-8 col-sm-9 skin-minimal">
						<div class="check-box" style="padding-left:0px;">
							<input type="text" class="input-text" name="list_order" value="{$this_banner.list_order}">
						</div>
					</div>
					<div class="col-3"> </div>
				</div>
			</div>
		</div>
		<div class="row cl">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>
</div>

<!--_footer 作为公共模版分离出去-->
<include file="Common/footer" />
<!--/_footer /作为公共模版分离出去-->

<!-- 引用核心层插件 -->
<script type="text/javascript" src="/Public/uploader/core/zyFile.js"></script>
<!-- 引用控制层插件 -->
<script type="text/javascript" src="/Public/uploader/control/js/zyUpload.js"></script>
<!-- 引用初始化JS -->
<script type="text/javascript" src="/Public/uploader/demo.js"></script>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">

$(function(){	
	$("#add_form").submit(function(){	
		if(!$("#banner_name").val()){
			layer.msg("请输入图片名称！",{time: 3000, icon:5});
			return false;
		}
		if(!$("input[name='img_url']").val()){
			layer.msg("请上传图片！",{time: 3000, icon:5});
			return false;
		}
	});
});

</script>
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>