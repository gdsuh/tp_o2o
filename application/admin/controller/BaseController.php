<?php
namespace app\admin\controller;

use think\Controller;

class BaseController extends Controller{
    public  function status(){
        //先获取参数
        $data = input('param.');
        //验证数据
        if(empty($data)){
            $this->error("修改失败");
        }
        //将数据提交到model层,让model层负责实际提交
        $res=$this->obj->save(['status'=>$data['status']],['id'=>$data['id']]);
        if($res){
            $this->success("修改成功");
        }else{
            print($this->obj->getLastSql());
        }
    }
}




?>