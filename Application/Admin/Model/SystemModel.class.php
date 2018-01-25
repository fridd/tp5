<?php

namespace Admin\Model;

class SystemModel extends CommonModel{

	public $tableName = "Admin";

	public function getAdmin($where){
		return M($this->tableName)->where($where)->find();
	}

	public function editAdmin($data){
		$Admin = M("Admin");
		$Admin->create($data);
		if($Admin->save()){
			return true;
		}else{
			return false;
		}
	}

}


?>