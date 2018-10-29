<?php

namespace app\admin\controller;

use think\Controller;

class City extends Controller{
    private $cityModel;
    public function _initialize(){
        $this->cityModel=Model('city');
    }
    public function index(){
        $parentId=input("param.parent_id",0,'intval');//第二个参数为默认值
        $citys=$this->cityModel->getNormalCityByParentId($parentId);
        return $this->fetch('',['citys'=>$citys]);
    }

    public function listorder($id,$listorder){
        $res=$this->cityModel->save(['listorder'=>$listorder],['id'=>$id]);
        if($res){
            $this->result($_SERVER['HTTP_REFERER'],1,"success");
        }else{
            $this->result($_SERVER['HTTP_REFERER'],0,"更新失败");
        }
    }
    public function edit(){
        $id=input('param.id');
        $city=$this->cityModel->get($id);
        $citys=$this->cityModel->getNormalCityByParentId();
        return $this->fetch('',[
            'citys'=>$citys,
            'city'=>$city,]);
    }
    public function status(){
        $data=input('param.');

        $res=$this->cityModel->save(['status'=>$data['status']],['id'=>$data['id']]);
        if($res){
            $this->success("修改成功");
        }else{
            $this->error("修改失败");
        }
    }

    public function save(){
        $data=input('post.');

        print_r(request()->post());
        $result=$this->cityModel->field('id')->where(['name'=>$data['name']])->find();

        //print($this->cityModel->getLastSQL());
        //print_r($result);exit;


        if(!empty($result['id'])){//如果id存在,则执行更新操作
            return $this->update($data,$result['id']);
        }
        $res=$this->cityModel->save($data);

        if($res){
            $this->success('新增成功');
        }else{
            $this->error('新增失败');
        }
    }

    public function update($data,$id){
        $res=$this->cityModel->save($data,['id'=>$id]);
        if($res){
            $this->success('更新成功');
        }else{
            $this->error('更新失败');
        }
    }

    public function add(){
        $citys=$this->cityModel->getNormalCityByParentId();
        return $this->fetch('',['citys'=>$citys]);
    }

}


?>