<?php
namespace app\common\validate;

use think\Validate;

class BisAccount extends Validate{
	protected $rule = [
		'username'=>'require|min:2|max:25',
		'password'=>'require',
		'code'=>'require',
		'bis_id'=>'require',
		'last_login_ip'=>'require',
		'last_login_time'=>'require',
		'is_main'=>'require',
		'status'=>'require',
	];
	protected $message = [
		'username'=>'用户名不能为空且不能过于简短或超过25个字符',
		'password'=>'密码需超过8个字符且少于20个字符',
		'status'=>'状态不能为空',
	];
	/*
	场景设置
	*/
	protected $scene = [
		'add'=>[
			'username','password'
		],
	];
}




?>