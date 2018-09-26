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
		'username'=>'�û�������Ϊ���Ҳ��ܹ��ڼ�̻򳬹�25���ַ�',
		'password'=>'�����賬��8���ַ�������20���ַ�',
		'status'=>'״̬����Ϊ��',
	];
	/*
	��������
	*/
	protected $scene = [
		'add'=>[
			'username','password'
		],
	];
}




?>