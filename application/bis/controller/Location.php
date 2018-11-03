<?php
/**
 * Created by PhpStorm.
 * User: wjm
 * Date: 2018/11/2
 * Time: 9:14
 */
namespace app\bis\controller;
use think\Controller;
class Location extends Base{
    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            print_r($data);exit;
        }else{
            $category=model('category')->getCategoryByParentId();
            return $this->fetch('',['categorys'=>$category]);
        }

    }
    public function index(){
        $locationData=model('BisLocation')->getLocationDataByStatus('0','id,name,address,tel,contact,open_time,content,is_main');
        return $this->fetch('',['locationData'=>$locationData]);
    }
}