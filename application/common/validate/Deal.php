<?php
namespace app\common\validate;

use think\Validate;

class Deal extends Validate{
    protected $rule = [
        'name'=>'require|min:2|max:25',
        'category_id'=>'require',
        'se_category_id'=>'require',
        'bis_id'=>'require',
        'location_ids'=>'require',
        'image'=>'require',
        'description'=>'require',
        'start_time'=>'require',
        'end_time'=>'require',
        'origin_price'=>'require',
        'current_price'=>'require',
        'city_id'=>'require',
        'total_count'=>'require',
        'coupons_begin_time'=>'require',
        'coupons_end_time'=>'require',
        'xpoint'=>'require',
        'ypoint'=>'require',
        'bis_account'=>'require',
        'status'=>'number|in:-1,0,1,2',
    ];
    protected $message = [
        'name'=>'团购商品名不能为空且不能过于简短或超过25个字符',
        'bis_id'=>'商户不能为空',
        'location_ids'=>'支持门店不能为空',
        'image'=>'团购商品图片不能为空',
        'description'=>'团购商品描述不能为空',
        'start_time'=>'团购开始时间不能为空',
        'end_time'=>'团购结束时间不能为空',
        'origin_price'=>'原价不能为空',
        'current_price'=>'折扣价不能为空',
        'city_id'=>'城市不能为空',
        'coupons_begin_time'=>'消费券生效时间不能为空',
        'coupons_end_time'=>'消费券结束时间不能为空',
        'status'=>'状态不能为空|状态范围不合法',
        'total_count'=>'库存数不能为空',
    ];
    /*
    场景设置
    */
    protected $scene = [
        'add'=>['name', 'category_id', 'bis_id','location_ids','image','description','start_time','end_time','origin_price','current_price'],
        'status'=>['status'],

    ];
}




?>