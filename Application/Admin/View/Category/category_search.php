<!--_meta 作为公共模版分离出去-->
<include file="Common/head" />
<!--/meta 作为公共模版分离出去-->

<title>文章分类</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	文章分类
	<span class="c-gray en">&gt;</span>
	分类列表
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<form method="post" id="search-form" action="{:U('Category/category_search')}">
		<div class="text-c">
			<input type="text" name="cat_name" id="search-name" placeholder="分类名称" style="width:250px" class="input-text">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
		</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<a href="javascript:;" onclick="datadel('{:U(\'Category/batch_del\')}')" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a class="btn btn-primary radius" onclick="category_add('添加分类','{:U(\'Category/category_add\')}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a>
		</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">排序</th>
					<th>分类名称</th>
					<th>上级分类</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				<volist name="list" id="v">
				<tr class="text-c">
					<td><input type="checkbox" name="category" value="{$v.id}"></td>
					<td>{$v.id}</td>
					<td>{$v.list_order}</td>
					<td class="text-l">{$v.cat_name}</td>
					<td class="text-l">{$v.pid}</td>
					<td class="f-14">
						<a title="编辑" href="{:U('Category/category_edit',array('id'=>$v['id']))}" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onclick="category_del(this,'{:U(\'Category/category_del\',array(\'id\'=>$v[\'id\']))}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
				</tr>
				</volist>
			</tbody>
		</table>
	</div>
</div>

<!--_footer 作为公共模版分离出去-->
<include file="Common/footer" />
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__PUBLIC__/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="__PUBLIC__/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="__PUBLIC__/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">

$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  // {"bVisible": false, "aTargets": [3]} //控制列的隐藏显示
		  {"orderable": false, "aTargets": [0,5]}// 制定列不参与排序
		]
	});
	//搜索
	$("#search-form").submit(function(){
		if(!$("#search-name").val()){
			layer.alert("请输入分类名称！");
			return false;
		}
	});
	
});

/*分类-删除*/
function category_del(obj,url){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: url,
			dataType: 'json',
			success: function(data){
				if(data.info){
					$(obj).parents("tr").remove();
					layer.msg(data.message,{icon:1,time:2000});
				}else{
					layer.msg(data.message,{icon:2,time:2000});
				}
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}

function datadel(url){
	var newsLength=$("input:checked[name='news']").length;
	if(!newsLength){
		alert("请先选择要删除的文章！");
		return false;
	}
	if(confirm('确定删除？')){
		url=url+"?id=";
		for(var i=0;i<newsLength;i++){
			url=url+$("input:checked[name='news']").eq(i).val()+",";
		}
		location.href = url;	
	}else{
		return false;
	}	
}

function change_order(obj,url){
	var listOrder = obj.value;
	$.ajax({
		type: 'POST',
		url: url,
		data: {'list_order': listOrder},
		dataType: 'json',
		success:function(data){
			if(data.info){
				layer.msg(data.message,{icon:1,time:1000});
			}else{
				layer.msg(data.message,{icon:2,time:1000});
			}
			
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			layer.msg(XMLHttpRequest.message,{icon:2,time:1000});
		}
	});
}

</script>

</body>
</html>