<?php
namespace app\common\model;

use think\Model;

class BisLocation extends BaseModel{
	public function getLocationDataByBisId($id,$field=''){
        $data=$this->where(['bis_id'=>$id])->field($field)->select();
        return $data;
    }
}

?>