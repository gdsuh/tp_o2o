<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function status($status){
	if($status==1){
		$str="<span class='label label-success radius'>正常</span>";
	}else if($status==0){
		$str="<span class='label label-danger radius'>待审</span>";
	}else{
		$str="<span class='label label-danger radius'>删除</span>";
	}
	return $str;
}

/**
*type=0 get;1 post
*/
function doCurl($url,$type=0,$data=[]){
	$ch = curl_init();//初始化
	//设置选项
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HEADER,0);
	
	if($type=1){
		//post
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,1);
	}
	//执行并获取内容
	$output=curl_exec($ch);
	//释放curl句柄
	curl_close($ch);
	return $output;
}


function bisRegister($status){
	if($status == 1){
		$str="入驻申请成功";
	}else if($status == 0){
		$str="待审核";
	}else if($status == 2){
		$str="入驻申请失败";
	}else{
		$str="该申请不存在";
	}
	return $str;
}


function getSeCityName($path){
    if(empty($path)){
        return "";
    }else{
        if(preg_match("/,/i",$path)){
          $cityPath=explode(",",$path);
          if(!empty($cityPath[1])){
              $id = $cityPath[1];
          }else{
              $id = $cityPath[0];
          }
        }else if(is_int($path)){
            $id = $path;
        }else{
            return "";
        }
        $data=model('city')->field('name')->find(['id'=>$id]);
        return $data['name'];
    }
}






