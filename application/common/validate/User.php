<?php
namespace app\common\validate;

use think\Validate;

class User extends Validate{
	protected $rule=[
		'username'=>'require|max:25',
		'password'=>'require|min:8|max:16',
		'email'=>'email',
		'mobile'=>'require|number',
	];
	protected $message = [
		'username'=>'用户名不能为空且不能超过25个字符',
		'password'=>'密码不能为空且必须介于8-16个字符',
		'email'=>'email格式不正确',
		'mobile'=>'联系方式不能为空或格式不正确',
	];
	protected $scene = [
		'add'=>[
			'username','password','email'
		],
	];
}





?>