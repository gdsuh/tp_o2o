<?php
namespace app\common\model;

use think\Model;
class City extends Model{
	public function getNormalCityByParentId($parentId=0){
		$data=[
			'status'=>1,
			'parent_id'=>$parentId,
		];
		
		$order=[
			'id'=>'desc',
		];
		
		return $this->where($data)->order($order)->select();
	}
}




?>