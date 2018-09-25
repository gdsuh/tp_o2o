<?php
namespace app\admin\validate;
use think\Validate;

class Category extends Validate{
	protected $rule=[
		['name','require|max:10'],
		['parent_id','number'],
		['id','number'],
		['status','number|in:-1,0,1','状态必须为数字|状态范围不合法'],
		['listorder','number']
	];
	protected $message=[
		'name.max'=>'分类命名最多不能超过10个字符',
	];
	protected $scene=[
		'add'=>['name','parent_id','id'],//添加
		'listorder'=>['id','listorder'],//排序
		'status'=>['id','status'],
	];
}
?>




