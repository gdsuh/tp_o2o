<?php
namespace app\bis\controller;

use think\Controller;

class Deal extends Base{
    public function index(){
        return $this->fetch();
    }

    public function add(){
        $citys=model('City')->getNormalCityByParentId();//获取一级城市的数据
        $categorys=model('Category')->getCategoryByParentId();

        $data=session('bisAccount','','bis');
        $locationData=model('BisLocation')->getLocationDataByBisId($data->bis_id,'id,name,address,tel,contact,open_time,content,is_main');
        return $this->fetch('',[
            'citys'=>$citys,
            'categorys'=>$categorys,
            'bislocations'=>$locationData,
        ]);
    }


}







?>