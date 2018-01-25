<!--_meta 作为公共模版分离出去-->
<include file="Common/head" />
<!--/meta 作为公共模版分离出去-->

<title>文章管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 文章管理 <span class="c-gray en">&gt;</span> 文章列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form method="post" id="search_form" action="{:U('Article/article_search')}"><div class="text-c" id=""> 
		<input type="text" name="title" id="section" placeholder="文章名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit" ><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div></form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="datadel('{:U(\'Article/batch_del\')}')" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a class="btn btn-primary radius" href="{:U('Article/article_add')}"><i class="Hui-iconfont">&#xe600;</i> 添加文章</a>
		</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="150">文章标题</th>
					<th width="100">分类</th>
					<th>内容摘要</th>
					<th width="100">发布时间</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($list as $k=>$v){ ?>
                    <tr class="text-c" >
                        <td><input type="checkbox" name="article" value="{$v.id}"></td>
                        <td>{$v.id}</td>
                        <td>{$v.title}</td>
                        <td>{$v.cat_id}</td>
                        <td class="text-l">{$v.content}</td>
                        <td>{$v.public_date}</td>
                        <td class="f-14">
                        	<a title="编辑" href="{:U('Article/article_edit',array('id'=>$v['id']))}" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                        	<a title="删除"  onclick="article_del(this,'{:U(\'Article/article_del\',array(\'id\'=>$v[\'id\']))}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>
                    </tr>
                <?php } ?>
                    <tr class="text-c">
                        <td colspan="8">{$page}</td>
                    </tr>  
			</tbody>
		</table>
	</div>
</div>

<!--_footer 作为公共模版分离出去-->
<include file="Common/footer" />
<!--/_footer 作为公共模版分离出去-->

<script type="text/javascript" src="/Public/js/dataTables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript">

/*文章-删除*/
function article_del(obj,url){
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
	var boxLength=$("input:checked[name='article']").length;
	if(!boxLength){
		layer.alert("请先选择要删除的文章！");
		return false;
	}
	layer.confirm('确定删除？',function(index){
		url=url+"?id=";
		for(var i=0;i<boxLength;i++){
			url=url+$("input:checked[name='article']").eq(i).val()+",";
		}
		location.href = url;
	});
}

</script>

</body>
</html>