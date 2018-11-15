<?php
namespace app\admin\controller;

use think\Controller;

class Featured extends BaseController{
    protected $obj;
    public function _initialize(){
        $this->obj=model('Featured');
    }
    public function index(){
        $types=config('featured.featured_type');
        if(input('param.')){
            $type=input('param.type');
        }else{
            $type='';
        }
        $result=model('featured')->getFeaturedByStatus($type);
        //print($this->obj->getLastSql());exit;
        //print_r($types);print_r($type);exit;
        return $this->fetch('',['results'=>$result,'types'=>$types,'type'=>$type]);
    }
    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            //验证
            $validate=validate('featured');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }else{
                $id=model('featured')->add($data);
                if($id){
                    $this->success('新增成功');
                }else{
                    $this->error('新增失败');
                }
            }

        }else{

            $types=config('featured.featured_type');
            //print_r($types);exit;
            return $this->fetch('',['types'=>$types]);
        }

    }
}








?>