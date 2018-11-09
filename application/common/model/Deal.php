<?php
namespace app\common\model;

use think\Model;
class Deal extends BaseModel{
        public function getDealsByStatus(){
            $data=[
                'status'=>['neq',-1],
            ];

            $order=[
                'id'=>'desc',
            ];

            return $this->where($data)->order($order)->select();
        }
        public function getDeals($data){
            if(empty($data)){
                return '';
            }else{
                return $this->where($data)->select();
            }

        }
}

?>