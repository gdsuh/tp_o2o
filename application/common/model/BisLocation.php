<?php
namespace app\common\model;

use think\Model;

class BisLocation extends BaseModel{
	public function getLocationDataByStatus($status='0',$field=''){
        $data=$this->where(['status'=>$status])->field($field)->select();
        return $data;
    }
}

?>