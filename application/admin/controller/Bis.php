<?php
namespace app\admin\controller;

use think\Controller;

class Bis extends Controller{
	private $obj;
	public function _initialize(){
		$this->obj=model("Bis");
	}
	public function apply(){
		$data=$this->obj->getBisByStatus();
		//print_r($data);
		return $this->fetch('',[
			'bis'=>$data
		]);
	}
	public function detail(){
	    //获取参数
        $id=input("param.id");
        $bisData=model('bis')->limit(1)->select(['id'=>$id]);
        $bisLocationData=model('bisLocation')->get(['id'=>$id,'is_main'=>1]);
        $bisAccountData=model('bisAccount')->get(['id'=>$id,'is_main'=>1]);

        $citys=model('city')->getNormalCityByParentId();
        $category=model('category')->getFirstCategory($bisLocationData['category_id'],'id,name,parent_id');


        $se_categorys=model('category')->getSeCategoryByPath($bisLocationData['category_path']);


	    return $this->fetch('',[
	        'bisData'=>$bisData,
            'bisLocationData'=>$bisLocationData,
            'bisAccountData'=>$bisAccountData,
            'citys'=>$citys,
            'category'=>$category,
            'se_categorys'=>$se_categorys,
        ]);
    }
	public  function status(){
	    //先获取参数
        $data = input('param.');

        //验证数据
        $validate = validate('Bis');
        if(!$validate->scene('status')->check($data)){
            $this->error($validate->getError());
        }else{
            //将数据提交到model层,让model层负责实际提交
            $res=$this->obj->save(['status'=>$data['status']],['id'=>$data['id']]);

            if($res){
                $this->success("修改成功");
            }else{
                print($this->obj->getLastSql());

            }
        }
    }
}




?>