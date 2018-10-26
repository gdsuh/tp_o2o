<?php
namespace app\common\model;

use think\Model;
class Category extends Model{

	protected $autoWriteTimestamp=true;

    /**
     * @param $data
     * @return false|int
     */
	public function add($data){
		$data['status']=1;
		$data['create_time']=time();
		return $this->save($data);
	}

    /**
     * 根据id获取商品
     * @param int $id
     * @return \think\Paginator|\think\paginator\Collection
     * @throws \think\exception\DbException
     */
	public function getFirstCategory($id,$field=''){
		$data=[
			'id'=>$id,
			'status'=>['neq',-1]
		];

		$order =[
			'listorder'=>'asc',
		];

		$result=$this->field($field)->where($data)->order($order)->find();
		return $result;
	}

    /**
     * 根据parent_id获取商品
     * @param int $parentId
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
	public function getCategoryByParentId($parentId=0,$field=''){
		$data=[
			'parent_id'=>$parentId,
			'status'=>['neq',-1]
		];
		
		$order =[
			'listorder'=>'desc',
		];
		
		$result=$this->field($field)->where($data)->order($order)->select();
		return $result;
	}
	public function getNormalFirstCategory(){
		$data=[
			'status'=>1,
			'parent_id'=>0,
		];
		
		$order=[
			'id'=>'desc',
		];
		
		return $this->where($data)->order($order)->select();
	}

	public function getSeCategoryByPath($path){
        $arr = explode('|',$path);
        $html='';
        foreach($arr as $id) {
            if (!empty($id)) {
                $result = $this->getFirstCategory($id,'name');


                $html.=$result->getAttr('name')."<label for='checkbox-moban'>&nbsp;</label>";
            }
        }

        return $html;
    }
}

?>