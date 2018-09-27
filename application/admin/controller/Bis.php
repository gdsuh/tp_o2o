<?php
namespace app\admin\controller;

use think\Controller;

class Bis extends Controller{
	private $obj;
	public function _initialize(){
		$this->obj=model("Bis");
	}
	public function apply(){
		$data=$this->obj->getBisByStatus();
		//print_r($data);
		return $this->fetch('',[
			'bis'=>$data
		]);
	}
}




?>