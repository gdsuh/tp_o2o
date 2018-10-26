<?php
namespace app\common\validate;

use think\Validate;

class Register extends Validate{
	protected $rule = [
		'name'=>'require|min:2|max:25',
		'city_id'=>'require|number',
		'se_city_id'=>'require|number',
		'logo'=>'require',
		'license_logo'=>'require',
		'description'=>'require',
		'bank_info'=>'require',
		'bank_name'=>'require',
		'bank_user'=>'require',
		'faren'=>'require',
		'faren_tel'=>'require|number',
		'email'=>'email',
		'contact'=>'require',
		'tel'=>'require',
		'category_id'=>'require|number',
		'address'=>'require',
		'open_time'=>'require',
		'username'=>'require|min:2|max:25',
		'password'=>'require|min:8|max:20',
	];
	protected $message = [
		'name'=>'商户名不能为空且不能过于简短或超过25个字符',
		'city_id'=>'请选择所属城市',
		'se_city_id'=>'请选择所属二级城市',
		'logo'=>'商户缩略图不能为空',
		'license_logo'=>'商户营业执照不能为空',
		'description'=>'商户介绍不能为空',
		'bank_info'=>'银行账户不能为空',
		'bank_name'=>'开户行名称不能为空',
		'bank_user'=>'开户人名称不能为空',
		'faren'=>'法人不能为空',
		'faren_tel'=>'法人联系方式为空或格式不正确',
		'email'=>'邮箱格式不正确',
		'contact'=>'联系人不能为空',
		'tel'=>'联系方式不能为空或格式不正确',
		'category_id'=>'请选择商户所属分类',
		'address'=>'商户地址不能为空',
		'open_time'=>'营业时间不能为空',
		'username'=>'用户名不能为空且不能过于简短或超过25个字符',
		'password'=>'密码需超过8个字符且少于20个字符',
	];
	protected $scene = [
		'filter'=>[
			'name','bank_info','bank_name','bank_user','faren','faren_tel',
			'email','contact','tel','category_id','address','open_time','username','password'
		],
	];
}




?>