<!--_meta 作为公共模版分离出去-->
<include file="Common/head" />
<!--/meta 作为公共模版分离出去-->

<title>招聘管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 招聘管理 <span class="c-gray en">&gt;</span> 招聘列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form method="post" id="search_form" action="{:U('Recruit/recruit_search')}"><div class="text-c" id=""> 
		<input type="text" name="position" id="section" placeholder="职位名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit" onclick="search();" ><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div></form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="datadel('{:U(\'Recruit/batch_del\')}')" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a class="btn btn-primary radius" href="{:U('Recruit/recruit_add')}"><i class="Hui-iconfont">&#xe600;</i> 添加招聘</a>
		</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th>职位名称</th>
					<th>招聘人数(人)</th>
					<th>工作地址</th>
					<th>发布时间</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($list as $k=>$v){ ?>
                    <tr class="text-c">
                        <td><input type="checkbox" name="recruit" value="{$v.id}"></td>
                        <td>{$v.id}</td>
                        <td>{$v.position}</td>
                        <td>{$v.number}</td>
                        <td>{$v.address}</td>
                        <td>{$v.public_date}</td>
                        <td class="f-14">
                        	<a title="编辑" href="{:U('Recruit/recruit_edit',array('id'=>$v['id']))}" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                        	<a title="删除"  onclick="recruit_del(this,'{:U(\'Recruit/recruit_del\',array(\'id\'=>$v[\'id\']))}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>
                    </tr>
                <?php } ?>
                <tr><td colspan="7" style="text-align:center;">{$page}</td></tr>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="/Public/datatables/1.10.0/jquery.dataTables.min.js"></script> 

<!--_footer 作为公共模版分离出去-->
<include file="Common/footer" />
<!--/_footer 作为公共模版分离出去-->

<script type="text/javascript">

/*招聘-删除*/
function recruit_del(obj,url){
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
	var boxLength=$("input:checked[name='recruit']").length;
	if(!boxLength){
		layer.alert("请先选择要删除的招聘！");
		return false;
	}
	layer.confirm('确定删除？',function(index){
		url=url+"?id=";
		for(var i=0;i<boxLength;i++){
			url=url+$("input:checked[name='recruit']").eq(i).val()+",";
		}
		location.href = url;
	});
}

</script>

</body>
</html>