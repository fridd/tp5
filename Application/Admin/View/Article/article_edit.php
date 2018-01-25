<!--_meta 作为公共模版分离出去-->
<include file="Common/head" />
<!--/meta 作为公共模版分离出去-->

<link rel="stylesheet" href="/Public/uploader/control/css/zyUpload.css" type="text/css">
<title>文章设置</title>
</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="add_form">
		<input type="hidden" name="id" value="{$this_article.id}">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{$this_article.title}" name="title" id="title" placeholder="请输入文章标题"/>
			</div>
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章分类：</label>
			<div class="formControls col-xs-8 col-sm-4">
				<span class="select-box">
					<select class="select" id="cat_id" name="cat_id">
						<option value="0">请选择文章分类</option>
						<volist name="categoris" id="v">
						<option value="{$v.id}" <if condition="$this_article['cat_id'] eq $v['id']">selected</if>>{$v.cat_name}</option>
						</volist>
					</select>
				</span>
			</div>
			<div class="col-3"></div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">时间：</label>
			<div class="formControls col-xs-8 col-sm-2">
				<input class="input-text" type="text" onfocus="WdatePicker()" name="public_date" value="{$this_article.public_date}"/>
			</div>
			<div class="col-3"> </div>
		</div>
		<div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">文章内容：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <script id="editor" type="text/plain" style="width:100%;height:400px;" name="content">{$this_article.content}</script> 
            </div>
        </div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序：</label>
			<div class="formControls col-xs-8 col-sm-2">
				<input type="text" class="input-text" value="{$this_article.list_order}" placeholder="" id="list_order" name="list_order">
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
</div>

<!--_footer 作为公共模版分离出去-->
<include file="Common/footer" />
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/WdatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="/Public/ueditor/1.4.3/ueditor.all.min.js"></script> 
<script type="text/javascript" src="/Public/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

<!-- 引用核心层插件 -->
<script type="text/javascript" src="/Public/uploader/core/zyFile.js"></script>
<!-- 引用控制层插件 -->
<script type="text/javascript" src="/Public/uploader/control/js/zyUpload.js"></script>
<!-- 引用初始化JS -->
<script type="text/javascript" src="/Public/uploader/demo.js"></script>
<!--/请在上方写此页面业务相关的脚本-->

<script type="text/javascript">

$(function(){	
	
	var ue = UE.getEditor('editor');

	$("#add_form").submit(function(){	
		if(!$("#title").val()){
			layer.msg("请输入文章名称！",{time: 3000, icon:5});
			return false;
		}
		if($("#cat_id").val() == 0){
			layer.msg("请选择文章分类！",{time: 3000, icon:5});
			return false;
		}
	});
});

</script>
<style type="text/css">
	#title,.select-box{width: 60%;}
	label.error{left:520px;top:5px;}
</style>
</body>
</html>