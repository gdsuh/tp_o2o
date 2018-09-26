<?php
namespace app\common\model;
use think\Model;
class Bis extends Model{
	protected $autoWriteTimestamp = true;
	
	public function add($data){
		$data['status']=1;//Ĭ��״̬Ϊ1
		$this->save($data);
		return $this->id;
	}
}








?>