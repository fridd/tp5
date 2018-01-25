<?php
namespace Home\Controller;
use Think\Controller;
class ContactController extends CommonController {

    public function __construct(){
        parent::__construct();
        $this->assign("action","contact");
    }

    public function index(){

		$this->display();
		
	}

}