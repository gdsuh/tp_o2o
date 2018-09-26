<?php
namespace app\common\validate;

use think\Validate;

class Bis extends Validate{
	protected $rule = [
		'name'=>'require|max:25',
		'email'=>'email',
		'logo'=>'require',
		'city_id'=>'require|number',
		'bank_info'=>'require',
		'bank_name'=>'require',
		'bank_user'=>'require',
		'faren'=>'require',
		'faren_tel'=>'require|number',
	];
	protected $message = [
		'name'=>'商户名不能为空且不能超过25个字符',
		'email'=>'email格式不正确',
		'logo'=>'商户缩略图不能为空',
		'city_id'=>'请选择所属城市',
		'bank_info'=>'银行账户不能为空',
		'bank_name'=>'开户行名称不能为空',
		'bank_user'=>'开户人名称不能为空',
		'faren'=>'法人不能为空',
		'faren_tel'=>'法人联系方式不能为空或格式不正确',
	];
	/*
	场景设置
	*/
	protected $scene = [
		'add'=>['name','email','logo','city_id','bank_info','bank_name','bank_user','faren','faren_tel'
		],
	];
}




?>