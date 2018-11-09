<?php
namespace app\admin\controller;

use think\Controller;

class Deal extends Controller{
    private $dealModel;
    public  function _initialize(){
        $this->dealModel=model('Deal');
    }
    public function index()
    {
        $citys = model('City')->getSeCitys();//获取二级城市的数据
        $cityArrs=[];$categoryArrs=[];
        foreach($citys as $city){
            $cityArrs[$city->id]=$city->name;
        }
        $categorys = model('Category')->getCategoryByParentId();
        foreach($categorys as $category){
            $categoryArrs[$category->id]=$category->name;
        }
        if (!empty($data=input('get.'))) {
            $sdata=[];
            if(!empty($data['category_id'])){
                $sdata['category_id']=$data['category_id'];
            }
            if(!empty($data['city_id'])){
                $sdata['city_id']=$data['city_id'];
            }
            if(!empty($data['start_time'])&&!empty($data['end_time'])&&strtotime($data['end_time'])>strtotime($data['start_time'])){
                $sdata['create_time']=[
                    ['gt',strtotime($data['start_time'])],
                    ['lt',strtotime($data['end_time'])],
                ];
            }else if(strtotime($data['end_time'])>strtotime($data['start_time'])){
                if(!empty($data['start_time'])){
                    $sdata['create_time']=[
                        ['gt',strtotime($data['start_time'])],
                    ];
                }else if(!empty($data['end_time'])){
                    $sdata['create_time']=[
                        ['lt',strtotime($data['end_time'])],
                    ];
                }
            }
            if(!empty($data['name'])){
                $sdata['name']=['like','%'.$data['name'].'%'];
            }
            $deals=$this->dealModel->getDeals($sdata);
            //print($this->dealModel->getLastSql());exit;

            return $this->fetch('', [
                'citys' => $citys,
                'categorys' => $categorys,
                'deals' => $deals,
                'category_id'=>empty($data['category_id'])?'':$data['category_id'],
                'city_id'=>empty($data['city_id'])?'':$data['city_id'],
                'start_time'=>empty($data['start_time'])?'':$data['start_time'],
                 'end_time'=>empty($data['end_time'])?'':$data['end_time'],
                 'name'=>empty($data['name'])?'':$data['name'],
                'cityArrs'=>$cityArrs,
                'categoryArrs'=>$categoryArrs,
            ]);
        } else {

            $deals = model('Deal')->getDealsByStatus();
            return $this->fetch('', [
                'citys' => $citys,
                'categorys' => $categorys,
                'deals' => $deals,
                'category_id'=>empty($data['category_id'])?'':$data['category_id'],
                'city_id'=>empty($data['city_id'])?'':$data['city_id'],
                'start_time'=>empty($data['start_time'])?'':$data['start_time'],
                'end_time'=>empty($data['end_time'])?'':$data['end_time'],
                'name'=>empty($data['name'])?'':$data['name'],
                'cityArrs'=>$cityArrs,
                'categoryArrs'=>$categoryArrs,
            ]);
        }
    }

    public function apply(){
        $citys=model('City')->getNormalCityByParentId();//获取一级城市的数据
        $categorys=model('Category')->getCategoryByParentId();
        $deals=model('Deal')->getDealsByStatus();
        return $this->fetch('',[
            'citys'=>$citys,
            'categorys'=>$categorys,
            'deals'=>$deals,
        ]);
    }


}
?>