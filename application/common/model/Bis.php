<?php
namespace app\common\model;
use think\Model;
class Bis extends Model{
	protected $autoWriteTimestamp = true;
	public function add($data){
		return $this->save($data);
	}
}








?>