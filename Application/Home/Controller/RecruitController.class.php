<?php
namespace Home\Controller;
use Think\Controller;
class RecruitController extends CommonController {

    public function __construct(){
        parent::__construct();
        $this->assign("action","recruit");
    }

    public function recruit_list(){

        $result = D("Recruit")->getRecruits(10,array());
        $this->assign("list",$result[0]);
        $this->assign("page",$result[1]);
        $this->display();
		
	}

    public function recruit_detail(){
        $id= I("get.id",0,"intval");
        $where['id'] = $id;
        $this_recruit = D("Recruit")->getRecruit($where);
        $this->assign("this_recruit",$this_recruit);

        $ip = get_client_ip();

        //判断是否重复访问
        if($record = D("Recruit")->getRecord($id,$ip)){
            if((time()-$record['time'])>3600){
                $this->recordHit($id,$ip);
            }
        }else{
            $this->recordHit($id,$ip);
        }

        $this->display();
    }

    //记录访问量
    public function recordHit($id,$ip){
        $data = array(); 
        $data['obj_id'] = $id;
        $data['type'] = 2;
        $data['ip'] = $ip;
        $data['time'] = time();
        D("Recruit")->recordHit($data);
    }

}