<?php
namespace app\common\validate;

use think\Validate;

class Featured extends Validate{
    protected $rule=[
        'type'=>'require|max:25',
        'title'=>'require|max:16',
        'image'=>'require',
        'url'=>'require',
        'description'=>'require',
    ];
    protected $message = [
        'type'=>'类型不能为空且不能超过25个字符',
        'title'=>'标题不能为空且不能超过16个字符',
        'image'=>'图形不能为空',
        'url'=>'url地址不为空',
        'description'=>'描述不为空',
    ];
    protected $scene = [
        'add'=>[
            'type','title', 'image','url', 'description',
        ],
    ];
}





?>