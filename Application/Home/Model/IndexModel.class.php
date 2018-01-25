<?php

namespace Home\Model;

class IndexModel extends CommonModel{

	public function __construct(){
		parent::__construct();
	}

	public function getBanners(){
		return M("Banner")->select();
	}

	public function getArticles($where){
		$categories = M("Category")->where($where)->select();

		foreach($categories as $k => $v){
			if(M("Article")->where('cat_id='.$v['id'])->find()){
				$categories[$k]['article'] = M("Article")->where('cat_id='.$v['id'])->order("list_order ASC,public_date DESC")->limit(4)->select();
			}else{
				$children = M("Category")->where("pid=".$v['id'])->select();

				$id_str = "(";
				foreach ($children as $key => $val) {
					$id_str .= $val['id'].",";
				}
				$id_str = trim($id_str,',');
				$id_str .= ")";

				$categories[$k]['article'] = M("Article")->where('cat_id IN '.$id_str)->order("list_order ASC,public_date DESC")->limit(4)->select();
			}
		}
		return $categories;
	}

}

?>