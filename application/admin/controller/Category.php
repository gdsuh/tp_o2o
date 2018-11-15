<?php
namespace app\admin\controller;

use think\Controller;

class Category extends BaseController{
	private $obj;
	public function _initialize(){
		$this->obj=model("Category");
	}
	public function index(){
		$parentId=input("param.parent_id",0,'intval');//第二个参数为默认值
		$categorys=$this->obj->getCategoryByParentId($parentId);//根据相应的parentId拿到对应记录，默认为0
		return $this->fetch('',['categorys'=>$categorys]);//返回index模板文件
	}
	public function add(){
		$categorys = $this->obj->getNormalFirstCategory();//拿到分类栏目的值
		return $this->fetch('',['categorys'=>$categorys,]);//返回add模板文件
	}
	public function edit(){
		$id=input("param.id");
		if(intval($id)<0){
			$this->error("传入参数不合法");
		}
		$category=$this->obj->get($id);
		
		$categorys = $this->obj->getNormalFirstCategory();
		return $this->fetch('',[
			'categorys'=>$categorys,
			'category'=>$category,
		]);//返回edit模板文件
	}
	public function save(){
		$data=input('post.');
		$validate = validate('Category');
		if(!$validate->scene('add')->check($data)){
			$this->error($validate->getError());
		}
		print_r(request()->post());
		if(!empty($data['id'])){//如果id存在,则执行更新操作
			return $this->update($data);
		}
		
		$res=$this->obj->add($data);//将$data提交到model层
		if($res){
			$this->success("新增成功");
		}else{
			$this->error("新增失败");
		}
	}
	
	public function update($data){
		$res=$this->obj->save($data,['id'=>intval($data['id'])]);
		if($res){
			$this->success("更新成功");
		}else{
			$this->error("更新失败");
		}
	}
	public function listorder($id,$listorder){
		$res=$this->obj->save(['listorder'=>$listorder],['id'=>$id]);
		if($res){
			$this->result($_SERVER['HTTP_REFERER'],1,"success");
		}else{
			$this->result($_SERVER['HTTP_REFERER'],0,"更新失败");
		}
	}


}

?>