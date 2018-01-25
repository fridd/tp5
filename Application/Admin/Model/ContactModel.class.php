<?php

namespace Admin\Model;

class ContactModel extends CommonModel{

	public $tableName = "Contact";

	public function getContact(){
		return M($this->tableName)->find();
	}

	public function getLinks(){
		return M("Contact_affiliate")->select();
	}

	public function addContact($data){
		$Contact = M($this->tableName);
		$Contact->create($data);
		if($Contact->add()){
			return true;
		}else{
			return false;
		}
	}

	public function addLink($data){
		$Link = M("Contact_affiliate");
		$Link->create($data);
		if($Link->add()){
			return true;
		}else{
			return false;
		}
	}

	public function editContact($data){
		$Contact = M($this->tableName);
		$Contact->create($data);
		if($Contact->save()){
			return true;
		}else{
			return false;
		}
	}

	public function editLink($data){
		$Link = M("Contact_affiliate");
		$Link->create($data);
		if($Link->save()){
			return true;
		}else{
			return false;
		}
	}

	public function delLink($id){
		$result = array();
		if(M("Contact_affiliate")->where("id=".$id)->delete()){
			$result['info'] = true;
			$result['linkId'] = $id;
			$result['message'] = '删除成功！';
			return $result;
		}else{
			$result['info'] = false;
			$result['message'] = '删除失败！';
			return $result;
		}
	}

}

?>