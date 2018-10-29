<?php
namespace app\common\model;

use think\Model;
class City extends Model{
    protected  $autoWriteTimestamp = true;

    /**
     * 根据省份id获取该省份包含的城市
     * @param int $parentId  省份id
     * @return false|\PDOStatement|string|\think\Collection 相应省份包含的城市
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
	public function getNormalCityByParentId($parentId=0,$field=''){
		$data=[
			'parent_id'=>$parentId,
		];
		
		$order=[
			'listorder'=>'desc',
		];
		
		return $this->field($field)->where($data)->order($order)->select();
	}

    public function getCityById($id=0,$field=''){
        $data=[
            'status'=>1,
            'id'=>$id,
        ];

        $order=[
            'listorder'=>'desc',
        ];

        return $this->field($field)->where($data)->order($order)->select();
    }
}




?>