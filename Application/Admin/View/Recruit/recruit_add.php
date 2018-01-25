<!--_meta 作为公共模版分离出去-->
<include file="Common/head" />
<!--/meta 作为公共模版分离出去-->

<link rel="stylesheet" href="/Public/uploader/control/css/zyUpload.css" type="text/css">
<title>招聘信息</title>
</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="add_form">
		<div id="tab-category" class="HuiTab">
			<div class="tabBar cl">
				<span class="current">基本信息</span>
				<span>岗位职责</span>
				<span>招聘要求</span>
				<span>待遇水平</span>
			</div>
			<div class="tabCon" style="display:block;">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">招聘职位：</label>
					<div class="formControls col-xs-8 col-sm-4">
						<input type="text" class="input-text" value="" name="position" id="position"/>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">招聘人数：</label>
					<div class="formControls col-xs-8 col-sm-2">
						<input type="text" class="input-text" value="" name="number" id="number"/>
					</div>
					<div class="col-3"> </div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">工作时间：</label>
					<div class="formControls col-xs-8 col-sm-6">
						<input type="text" class="input-text" value="" name="working_hours" id="working_hours"/>
					</div>
					<div class="col-3"> </div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">工作地址：</label>
					<div class="formControls col-xs-8 col-sm-6">
						<input type="text" class="input-text" value="{$company.address}" name="address" id="address"/>
					</div>
					<div class="col-3"> </div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">发布时间：</label>
					<div class="formControls col-xs-8 col-sm-2">
						<input class="input-text" type="text" onfocus="WdatePicker()" name="public_date"/>
					</div>
					<div class="col-3"> </div>
				</div>
			</div>
			<div class="tabCon">
				<div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">岗位职责：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <script id="editor1" type="text/plain" style="width:100%;height:300px;" name="responsibility"></script> 
                    </div>
                </div>
			</div>
			<div class="tabCon">
				<div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">招聘要求：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <script id="editor2" type="text/plain" style="width:100%;height:300px;" name="requirement"></script> 
                    </div>
                </div>
			</div>
			<div class="tabCon">
				<div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">待遇水平：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <script id="editor3" type="text/plain" style="width:100%;height:300px;" name="treatment"></script> 
                    </div>
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
<!--/_footer 作为公共模版分离出去-->

<script language="javascript" type="text/javascript" src="/Public/WdatePicker/WdatePicker.js"></script>

<!-- 引用核心层插件 -->
<script type="text/javascript" src="/Public/uploader/core/zyFile.js"></script>
<!-- 引用控制层插件 -->
<script type="text/javascript" src="/Public/uploader/control/js/zyUpload.js"></script>
<!-- 引用初始化JS -->
<script type="text/javascript" src="/Public/uploader/demo.js"></script>

<script type="text/javascript" src="/Public/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="/Public/ueditor/1.4.3/ueditor.all.min.js"></script>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
$(function(){	
	
	var ue1 = UE.getEditor('editor1');
	var ue2 = UE.getEditor('editor2');
	var ue3 = UE.getEditor('editor3');

	$("#add_form").submit(function(){	
		if(!$("#position").val()){
			layer.msg("请输入职位名称！",{time: 3000, icon:5});
			return false;
		}
		if(!$("#number").val()){
			layer.msg("请输入招聘人数！",{time: 3000, icon:5});
			return false;
		}
	});

	$(".tabBar span").click(function(){
		$(".tabBar span").removeClass("current");
		$(this).addClass("current");
		$(".tabCon").css("display","none");
		$(".tabCon").eq($(this).index()).css("display","block");
	});

});
</script>
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>