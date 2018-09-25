<?php
namespace app/common/model;
use think/Model;

class BisUser{
	protected $autoWriteTimestamp = true;
	
	public function add($data){
		return $this->save($data);
	}
}






?>