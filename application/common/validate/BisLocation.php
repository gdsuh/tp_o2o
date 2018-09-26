<?php
namespace app\common\validate;

use think\Validate;

class BisLocation extends Validate{
	protected $rule = [
		'name'=>'require|max:25',
		'logo'=>'require',
		'address'=>'require',
		'tel'=>'require',
		'contact'=>'require',
		'open_time'=>'require',
		'city_id'=>'require|number',
		'category_id'=>'require',
		'bank_info'=>'require',
	];
	protected $message = [
		'name'=>'商户名不能为空且不能超过25个字符',
		'logo'=>'商户缩略图不能为空',
		'address'=>'商户地址不能为空',
		'tel'=>'联系方式不能为空或格式不正确',
		'contact'=>'联系人不能为空',
		'open_time'=>'营业时间不能为空',
		'city_id'=>'请选择所属城市',
		'category_id'=>'请选择商户所属分类',
		'bank_info'=>'银行账户不能为空',
	];
	protected $scene = [
		'add'=>[
			'name','logo','address','tel','contact','open_time','city_id','city_path','category_id','category_path','bank_info'
		],
	];
}


?>