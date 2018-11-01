<?php
namespace app\common\model;
use think\Model;
class Bis extends BaseModel{
	public function getBisByStatus($field='',$status='1'){
		$order=[
			'id'=>'desc',
		];
		$data=[
			'status'=>$status,
		];
		$result=$this->field($field)->where($data)->order($order)->select();
		return $result;
	}
	
	public function edit($id){
		
	}
}








?>