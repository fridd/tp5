<!--_meta 作为公共模版分离出去-->
<include file="Common/head" />
<!--/meta 作为公共模版分离出去-->

<link rel="stylesheet" href="/Public/uploader/control/css/zyUpload.css" type="text/css">
<title>联系我们</title>
</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="add_form">
		<input type="hidden" name="common[id]" value="{$company.id}">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">公司名称：</label>
			<div class="formControls col-xs-8 col-sm-3"><input type="text" class="input-text" value="{$company.company_name}" name="common[company_name]" id="company_name"/></div>
		</div>
		<empty name="links">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">联系方式：</label>
			<div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" name="linkman[]" value="" placeholder="联系人" style="width:35%;"/>
				<input type="text" class="input-text" name="mobilephone[]" value="" placeholder="联系电话" style="width:45%;"/>
				<span style="font-size:14px;margin-left:10px;background:#00B7EE;color:#fff;padding:3px 5px;border-radius:3px;cursor:pointer;" onclick="addLink(this)">添加</span>
			</div>
			<div class="col-3"> </div>
		</div>
		</empty>
		<notempty name="links">
		<volist name="links" id="v" key="k">
		<div class="row cl" id="link_{$v.id}">
			<label class="form-label col-xs-4 col-sm-2"><if condition="$k eq 1">联系方式：<else /></if></label>
			<div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" name="old_linkman[{$v.id}]" value="{$v.linkman}" placeholder="联系人" style="width:35%;"/>
				<input type="text" class="input-text" name="old_mobilephone[{$v.id}]" value="{$v.mobilephone}" placeholder="联系电话" style="width:45%;"/>
				<span style="font-size:14px;margin-left:10px;background:#00B7EE;color:#fff;padding:3px 5px;border-radius:3px;cursor:pointer;" onclick="<if condition='$k eq 1'>addLink(this)<else />dropLink('{$v.id}')</if>"><if condition="$k eq 1">添加<else />删除</if></span>
			</div>
			<div class="col-3"> </div>
		</div>
		</volist>
		</notempty>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">电话：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" name="common[telephone]" value="{$company.telephone}">
			</div>
			<div class="col-3"> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">邮箱：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" name="common[email]" value="{$company.email}">
			</div>
			<div class="col-3"> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">公司地址：</label>
			<div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" name="common[address]" value="{$company.address}">
			</div>
			<div class="col-3"> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">公司logo：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div id="demo" class="demo"><input type="hidden" name="common[logo]" id="logo" value="{$company.logo}"></div>
            </div>
            <div class="col-3"> </div>
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
		if(!$("#company_name").val()){
			layer.msg("请输入公司名称！",{time: 3000, icon:5});
			return false;
		}
	});
});

function addLink(obj){
	var oDiv = $(obj).parent().parent();
	var divLength = $("#add_form>div").length;
	$("<div class='row cl'></div>").insertAfter($("#add_form>div").eq(divLength-6));
	
	$("#add_form>div").eq(divLength-5).html(oDiv.html());
	$("#add_form>div").eq(divLength-5).find("label").html("");
	$("#add_form>div").eq(divLength-5).find(".formControls>input").eq(0).attr("name","linkman[]");
	$("#add_form>div").eq(divLength-5).find(".formControls>input").eq(1).attr("name","mobilephone[]");
	$("#add_form>div").eq(divLength-5).find(".formControls>input").val("");
	$("#add_form>div").eq(divLength-5).find(".formControls>span").attr("onclick","removeLink(this)").html("删除");
	
}

function removeLink(obj){
	$(obj).parent().parent().remove();
}

function dropLink(linkId){
	layer.confirm("确定要删除么？",function(index){
		url = "{:U('Contact/link_del')}"+"?id="+linkId;
		$.ajax({
			url: url,
			type: "POST",
			dataType: "json",
			success: function(data){
				layer.alert(data.message);
				$("#link_"+data.linkId).css("display","none");
			}
		});
	});
}

</script>
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>