<?php
namespace app\common\validate;

use think\Validate;

class Bis extends Validate{
	protected $rule = [
		'name'=>'require|min:2|max:25',
		'email'=>'email',
		'logo'=>'require',
		'licence_logo'=>'require',
		'description'=>'require',
		'city_id'=>'require|number',
		'city_path'=>'require',
		'money'=>'require',
		'bank_info'=>'require',
		'bank_name'=>'require',
		'bank_user'=>'require',
		'faren'=>'require',
		'faren_tel'=>'require|number',
		'status'=>'number|in:-1,0,1',
	];
	protected $message = [
		'name'=>'商户名不能为空且不能过于简短或超过25个字符',
		'email'=>'邮箱格式不正确',
		'logo'=>'商户缩略图不能为空',
		'license_logo'=>'商户营业执照不能为空',
		'description'=>'商户介绍不能为空',
		'city_id'=>'请选择所属城市',
		'city_path'=>'请选择所属城市',
		'money'=>'注册资金不能为空',
		'bank_info'=>'银行账户不能为空',
		'bank_name'=>'开户行名称不能为空',
		'bank_user'=>'开户人名称不能为空',
		'faren'=>'法人不能为空',
		'faren_tel'=>'法人联系方式为空或格式不正确',
		'status'=>'状态不能为空|状态范围不合法',
	];
	/*
	场景设置
	*/
	protected $scene = [
		'add'=>['name','email','logo','license_logo','city_id','city_path','bank_info','bank_name','bank_user','faren','faren_tel'],
        'status'=>['status'],

	];
}




?>