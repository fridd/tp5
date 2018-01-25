<?php

namespace Admin\Model;
use Think\Model;

class CommonModel extends Model{

	protected $tableName = "System_log";

	public function __construct(){
		parent::__construct();
	}

}