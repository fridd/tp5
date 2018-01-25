<?php

namespace Admin\Model;

class BannerModel extends CommonModel{

	public $tableName = "Banner";

	public function getBanners($num=0,$where=array()){
		$Banner = M($this->tableName); // 实例化对象
		$count = $Banner->where($where)->count();// 查询满足要求的总记录数
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
		$list = $Banner->where($where)->order("list_order ASC")->limit($Page->firstRow.','.$Page->listRows)->select();
		
		return array($list,$show);
	}

	public function addBanner($data){
		$Banner = M($this->tableName);
		$Banner->create($data);
		if($Banner->add()){
			return true;
		}else{
			return false;
		}
	}

	public function delBanner($id){
		$result = array();
		if(M($this->tableName)->where('id='.$id)->find()){
			if(M($this->tableName)->where("id=".$id)->delete()){
				$result['info'] = true;
				$result['message'] = '删除成功！';
				return $result;
			}else{
				$result['info'] = false;
				$result['message'] = '删除失败！';
				return $result;
			}
		}else{
			$result['info'] = false;
			$result['message'] = '图片不存在！';
			return $result;
		}
	}

	public function editBanner($data){
		$Banner = M($this->tableName);
		$Banner->create($data);
		if($Banner->save()){
			return true;
		}else{
			return false;
		}
	}

	public function getBanner($where){
		return M($this->tableName)->where($where)->find();
	}

}

?>