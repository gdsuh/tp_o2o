<?php
namespace app\common\model;

use think\Model;
class Featured extends BaseModel{
        public function getFeaturedByStatus($type=''){
            $data=[
                'status'=>['neq',-1],
            ];
            if($type!=''){
                $data['type']=$type;
            }
            $order=[
                'listorder'=>'asc',
            ];
            return $this->where($data)->order($order)->select();
        }
}

?>