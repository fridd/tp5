<?php

namespace Admin\Model;

class CategoryModel extends CommonModel{

	public $tableName = "Category";

	public function getCategories($num=0,$where=array()){
		$Category = M($this->tableName); // 实例化对象
		$count = $Category->where($where)->count();// 查询满足要求的总记录数
		if(!$num){
			$num = $count;
		}
		$Page = new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$Page->setConfig('header','<span class="total_row">共 %TOTAL_ROW% 条记录</span> | <span class="total_page">共 %TOTAL_PAGE% 页</span>');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','尾页');
		$Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

		$show = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Category->where($where)->order("concat(route,'-',id) ASC")->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $k => $v){
			$route_arr = explode('-',$v['route']);
			for($i = 0;$i < count($route_arr) - 1;$i++){
				$list[$k]['cat_name'] = '—'.$v['cat_name'];
			}
			//将pid进行转换
			if( $v['pid'] == 0 ){
				$list[$k]['pid'] = "顶级分类";
			}else{
				$parent = M($this->tableName)->field("cat_name")->where("id=".$v['pid'])->find();
				$list[$k]['pid'] = $parent['cat_name'];
			}
				
		}
		return array($list,$show);
	}

	public function getCategory($id){
		return M($this->tableName)->where("id=".$id)->find();
	}

	//查找父级分类
	public function getParentCategory($id){
		return M($this->tableName)->field("id,route")->where("id=".$id)->find();
	}

	public function insertCategory($data){
		$Category = M($this->tableName);
		$Category->create($data);
		if($Category->add()){
			return true;
		}else{
			return false;
		}
	}

	public function editCategory($data){
		$Category = M($this->tableName);
		$Category->create($data);
		if($Category->save()){
			return true;
		}else{
			return false;
		}
	}

	public function delCategory($id){
		$result = array();
		if($del_cat = M($this->tableName)->where('id='.$id)->find()){
			if(M($this->tableName)->where('pid=0')->select()){
				$result['info'] = false;
				$result['message'] = '顶级分类不能删除！';
				return $result;
			}else if(M($this->tableName)->where('pid='.$id)->select()){
				$result['info'] = false;
				$result['message'] = '该分类有下级分类，不能删除！';
				return $result;
			}else{
				if(M("Article")->where('cat_id='.$id)->select()){
					$result['info'] = false;
					$result['message'] = '该分类有文章，不能删除！';
					return $result;
				}else{
					M($this->tableName)->where("id=".$id)->delete();
					$result['info'] = true;
					$result['message'] = '删除成功！';
					return $result;
				}	
			}
		}else{
			$result['info'] = false;
			$result['message'] = '该分类不存在！';
			return $result;
		}
	}

	public function editField($id,$field,$data){
		$Category = M($this->tableName);
		if($Category->where('id='.$id)->field($field)->save($data)){
			return true;
		}else{
			return false;
		}
	}

}