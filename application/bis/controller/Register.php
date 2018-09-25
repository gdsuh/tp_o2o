<?php
namespace app\bis\controller;

use think\Controller;
class Register extends Controller{
	public function index(){
		
		//获取一级城市的数据
		$citys=model('City')->getNormalCityByParentId();
		$categorys=model('Category')->getFirstCategory();
		return $this->fetch('',[
			'citys'=>$citys,
			'categorys'=>$categorys,
		]);
	}
	public function add(){
		if(!request()->isPost()){
			$this->error("请求错误");
		}
		//获取表单的值
		$data=input("post.");
		print_r($data);
		exit;
		//校验数据
		$validate=validate('Bis');
		if(!$validate->scene('add')->check($data)){
			$this->error($validate->getError());
		}
		print_r($data);exit;
		//商户信息
		$bisData=[
			'name'=>$data['name'],
			'email'=>$data['email'],
			'logo'=>$data['logo'],
			'licence_logo'=>$data['licence_logo'],
			'description'=>$data['description'],
			'city_id'=>$data['city_id'],
			'city_path'=>$data['city_id'].",".$data['se_city_id'],
			'bank_info'=>$data['bank_info'],
			'bank_user'=>$data['bank_user'],
			'bank_name'=>$data['bank_name'],
			'faren'=>$data['faren'],
			'faren_tel'=>$data['faren_tel'],
		];
		$res=model('Bis')->add($bisData);
		if($res){
			$this->success("新增成功");
		}else{
			$this->error("新增失败");
		}
		
		//商户总店信息
		$lngLat_result=\Map::getLngLat($data['address']);//获取经纬度信息
		
		foreach($data['se_category_id'] as $value){
			$category_path=$value."|";
		}
		
		$bisDataLocation=[
			'name'=>$data['name'],
			'logo'=>$data['logo'],
			'address'=>$data['address'],
			'tel'=>$data['tel'],
			'contact'=>$data['contact'],
			'xpoint'=>$lngLat_result->result->location->lng,
			'ypoint'=>$lngLat_result->result->location->lat,
			'bis_id'=>'',
			'open_time'=>$data['open_time'],
			'content'=>empty($data['content'])?"":$data['content'],
			'is_main'=>1,
			'city_id'=>$data['city_id'],
			'city_path'=>$data['city_id'].",".$data['se_city_id'],
			'category_id'=>$data['category_id'],
			'category_path'=>$category_path,
			'bank_info'=>$data['bank_info'],
		];
		$res=model('Bislocation')->add($bisDataLocation);
		if($res){
			$this->success("新增成功");
		}else{
			$this->error("新增失败");
		}
		
		
		foreach(){
		
		}
		
		
	}
}




?>