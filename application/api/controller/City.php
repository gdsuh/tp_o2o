<?php
namespace app\api\controller;
use think\Controller;
class City extends Controller{
	private $model_obj;
	public function _initialize(){
		$this->model_obj=model('City');
	}
	public function getCitysByParentId(){
		$parentId=input('post.id');
		if(!$parentId){
			$this->error("Id不合法");
		}
		$se_citys=$this->model_obj->getNormalCityByParentId($parentId);
		if(!$se_citys){
			return show(0,'error');
		}
		return show(1,'success',$se_citys);
	}
}

?>