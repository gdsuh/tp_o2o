<?php
namespace app\bis\controller;

use think\Controller;

class Deal extends Base{
    public function index(){
        return $this->fetch();
    }

    public function add(){
        $bisId=$this->getLoginUser()->bis_id;

        if(request()->isPost()){
            //插入数据
            $data=input('post.');
            //严格校验提交的数据
            if(!empty($data['se_category_id'])){
                $data['se_category_id']=implode("|",$data['se_category_id']);
            }else{
                $data['se_category_id']='';
            }

            $location=model('bisLocation')->get($data['location_ids'][0]);

            if(!empty($data['location_ids'])){
                $data['location']=implode("|",$data['location_ids']);
            }else{
                $data['location']='';
            }


            $dealData=[
                    'bis_id'=>$bisId,
                    'name'=>$data['name'],
                    'image'=>$data['image'],
                    'category_id'=>$data['category_id'],
                     'se_category_id'=>$data['se_category_id'],
                    'location_ids'=>$data['location'],
                    'image'=>$data['image'],
                    'description'=>empty($data['description'])?'':$data['description'],
                    'start_time'=>strtotime($data['start_time']),//将字符串时间转换为时间戳
                    'end_time'=>strtotime($data['end_time']),
                    'origin_price'=>$data['origin_price'],
                    'current_price'=>$data['current_price'],
                    'city_id'=>$data['city_id'],
                    'total_count'=>$data['total_count'],
                    'coupons_begin_time'=>strtotime($data['coupons_begin_time']),
                    'coupons_end_time'=>strtotime($data['coupons_end_time']),
                    'xpoint'=>$location->xpoint,
                     'ypoint'=>$location->ypoint,
                    'bis_account'=>$this->getLoginUser()->id,
                    'note'=>empty($data['notes'])?'':$data['notes'],
            ];
            $validate=validate('Deal');
            if(!$validate->scene('add')->check($dealData)){
                $this->error($validate->getError());
            }

            $id=model('deal')->add($dealData);



            if($id){
                $this->success('添加成功',url('deal/index'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $citys=model('City')->getNormalCityByParentId();//获取一级城市的数据
            $categorys=model('Category')->getCategoryByParentId();


            $locationData=model('BisLocation')->getLocationDataByBisId($bisId,'id,name,address,tel,contact,open_time,content,is_main');
            return $this->fetch('',[
                'citys'=>$citys,
                'categorys'=>$categorys,
                'bislocations'=>$locationData,
            ]);
        }

    }


}
?>