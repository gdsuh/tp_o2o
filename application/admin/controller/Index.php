<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
       return $this->fetch();
    }
	public function welcome(){
		\phpmailer\Email::send('jiangchengwen@fulengen.com','体验百态人生','这是系统邮件，请验收');
		return "发送邮件成功";
		return "欢迎来到o2o后台";
	}
	public function location(){
		$result=\Map::getLngLat('广东广州天河');
		//print_r($result->result->location->lng);
		return $result;
	}
	public function map(){
		return \Map::staticimage("广东省广州市天河区");
	}
}

?>
