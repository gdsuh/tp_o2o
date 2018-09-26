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
		
		$validate=validate('Register');//使用助手函数实例化验证器
		if(!$validate->check($data)){
			$this->error($validate->getError());
		}
		/*
		//校验数据
		$validate=validate('Bis');//使用助手函数实例化验证器
		if(!$validate->scene('add')->check($data)){
			$this->error($validate->getError());
		}
		$validate=validate('BisLocation');//使用助手函数实例化验证器
		if(!$validate->scene('add')->check($data)){
			$this->error($validate->getError());
		}
		$validate=validate('User');//使用助手函数实例化验证器
		if(!$validate->scene('add')->check($data)){
			$this->error($validate->getError());
		}*/
		
		//商户信息
		$bisData=[
			'name'=>$data['name'],
			'email'=>$data['email'],
			'logo'=>$data['logo'],
			'licence_logo'=>$data['licence_logo'],
			'description'=>$data['description'],
			'city_id'=>$data['city_id'],
			'city_path'=>empty($data['se_city_id'])?$data['city_id']:$data['city_id'].','.$data['se_city_id'],
			'bank_info'=>$data['bank_info'],
			'bank_user'=>$data['bank_user'],
			'bank_name'=>$data['bank_name'],
			'faren'=>$data['faren'],
			'faren_tel'=>$data['faren_tel'],
		];
		print_r($bisData);
		
		$bisId=model('Bis')->add($bisData);
		
		
		//商户总店信息
		$lngLat_result=json_decode(\Map::getLngLat($data['address']));//获取经纬度信息
		
		
		
		if(!empty($data['se_category_id'])){
			$data['cat']=implode("|",$data['se_category_id']);
		}else{
			$data['cat']='';
		}
		
		$bisLocationData=[
			'name'=>$data['name'],
			'logo'=>$data['logo'],
			'address'=>$data['address'],
			'tel'=>$data['tel'],
			'contact'=>$data['contact'],
			'xpoint'=>empty($lngLat_result->result->location->lng)?'':$lngLat_result->result->location->lng,
			'ypoint'=>empty($lngLat_result->result->location->lat)?'':$lngLat_result->result->location->lat,
			'bis_id'=>$bisId,
			'open_time'=>$data['open_time'],
			'content'=>empty($data['content'])?"":$data['content'],
			'is_main'=>1,//表示总店信息
			'city_id'=>$data['city_id'],
			'city_path'=>empty($data['se_city_id'])?$data['city_id']:$data['city_id'].','.$data['se_city_id'],
			'category_id'=>$data['category_id'],
			'category_path'=>$data['category_id'].",".$data['cat'],
			'bank_info'=>$data['bank_info'],
		];
		print_r($bisLocationData);
		
		$bisLocationId=model('BisLocation')->add($bisLocationData);
		
		
		
		$data['code']=mt_rand(10000,99999);
		$bisUserData=[
			'bis_id'=>$bisId,
			'username'=>$data['username'],
			'password'=>md5($data['password'].$data['code']),
			'code'=>$data['code'],
			'is_main'=>1,//代表总管理员
			'last_login_ip'=>$_SERVER['REMOTE_ADDR'],
			'last_login_time'=>$_SERVER['REQUEST_TIME'],
			'email'=>$data['email'],
			'mobile'=>$data['tel'],
		];
		print_r($bisUserData);
		
		$res=model('User')->add($bisUserData);
		if($res){
			$this->success("新增成功3");
		}else{
			$this->error("新增失败");
		}
		
	}
}




?>