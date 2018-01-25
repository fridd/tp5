<?php

namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller{

	public function __construct(){
		parent::__construct();
		if(!$_SESSION['username']){
			$this->redirect('Public/login');
		}
	}

	public function head(){
		$this->display();
	}

	public function foot(){
		$this->display();
	}

}