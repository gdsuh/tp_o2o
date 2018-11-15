<?php
namespace app\admin\controller;

use think\Controller;

class Bis extends BaseController{
	private $obj;
	public function _initialize(){
		$this->obj=model("Bis");
	}

	public function index(){
	    $status=input('param.s');
	    $bisData=$this->obj->getBisByStatus('id,name,faren,faren_tel,status,create_time',$status);
	    return $this->fetch('bis/apply',['bisData'=>$bisData]);
    }


	public function detail(){
	    //获取参数
        $id=input("param.id");
        $bisData=model('bis')->limit(1)->select(['id'=>$id]);
        $bisLocationData=model('bisLocation')->get(['id'=>$id,'is_main'=>1]);
        $bisAccountData=model('bisAccount')->get(['id'=>$id,'is_main'=>1]);

        $citys=model('city')->getNormalCityByParentId();
        $category=model('category')->getFirstCategory($bisLocationData['category_id'],'id,name,parent_id');


        $se_categorys=model('category')->getSeCategoryByPath($bisLocationData['category_path']);


	    return $this->fetch('',[
	        'bisData'=>$bisData,
            'bisLocationData'=>$bisLocationData,
            'bisAccountData'=>$bisAccountData,
            'citys'=>$citys,
            'category'=>$category,
            'se_categorys'=>$se_categorys,
        ]);
    }


}




?>