<!--_meta 作为公共模版分离出去-->
<include file="Common/head" />
<!--/meta 作为公共模版分离出去-->

<title>图片轮播</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图片轮播 <span class="c-gray en">&gt;</span> 图片列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form method="post" id="search_form" action="{:U('Banner/banner_search')}"><div class="text-c" id=""> 
		<input type="text" name="banner_name" id="section" placeholder="图片名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit" onclick="search();" ><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div></form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="datadel('{:U(\'banner/batch_del\')}')" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a class="btn btn-primary radius" href="{:U('Banner/banner_add')}"><i class="Hui-iconfont">&#xe600;</i> 添加图片</a>
		</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="100">图片名称</th>
                    <th width="130">图片</th>
                    <th width="60">排序</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($list as $k=>$v){ ?>
                    <tr class="text-c" >
                        <td><input type="checkbox" name="banner" value="{$v.id}"></td>
                        <td>{$v.id}</td>
                        <td>{$v.banner_name}</td>
                        <td style="padding:5px 5px;"><img src="__PUBLIC__{$v.img_url}" style="width:200px;"></td>
                        <td>{$v.list_order}</td>
                        <td class="f-14">
                        	<a title="编辑" href="{:U('Banner/banner_edit',array('id'=>$v['id']))}" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                        	<a title="删除"  onclick="banner_del(this,'{:U(\'Banner/banner_del\',array(\'id\'=>$v[\'id\']))}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>
                    </tr>
                <?php } ?>
                    <tr class="text-c">
                        <td colspan="6">{$page}</td>
                    </tr>  
			</tbody>
		</table>
	</div>
</div>

<!--_footer 作为公共模版分离出去-->
<include file="Common/footer" />
<!--/_footer /作为公共模版分离出去-->

<script type="text/javascript" src="/Public/js/datatables/1.10.0/jquery.dataTables.min.js"></script> 

<script type="text/javascript">
/*图片-删除*/
function banner_del(obj,url){
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
				console.log(data);
			},
		});
	});
}

//批量删除
function datadel(url){
	var boxLength=$("input:checked[name='banner']").length;
	if(!boxLength){
		layer.alert("请先选择要删除的图片！");
		return false;
	}
	layer.confirm('确定删除？',function(index){
		url=url+"?id=";
		for(var i=0;i<boxLength;i++){
			url=url+$("input:checked[name='banner']").eq(i).val()+",";
		}
		location.href = url;
	});
}
</script>

</body>
</html>