<?php
namespace Admin\Model;
use Think\Model;
class PublicModel extends Model {

	protected $tableName = "admin";

    public function checkLogin($username,$password){
    	$User = M($this->tableName);
    	$where['username'] = $username;
    	$where['password'] = $password;
    	$res = $User->where($where)->find();
    	if($res){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function addSystemLog($username){
        $data['username'] = $username;
        $data['ip'] = get_client_ip();
        $data['login_time'] = time();
        M("System_log")->data($data)->add();
    }

}

?>