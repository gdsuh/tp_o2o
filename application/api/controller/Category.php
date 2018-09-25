<?php
namespace app\api\controller;
use think\Controller;
class Category extends Controller{
	private $model_obj;
	public function _initialize(){
		$this->model_obj=model('Category');
	}
	public function getCategoryByParentId(){
		$parentId=input('post.id');
		if(!$parentId){
			$this->error("Id不合法");
		}
		$se_categorys=$this->model_obj->getCategoryByParentId($parentId);
		if(!$se_categorys){
			return show(0,'error');
		}
		return show(1,'success',$se_categorys);
	}
}

?>