<?php
namespace app\bis\controller;

use think\Controller;
class Login extends Controller{
	public function index(){

	    if(request()->isPost()){
            //登录逻辑
            $data=input('post.');
            if(empty($data['username'])){
                $this->error('用户名不能为空');
            }
            if(empty($data['password'])){
                $this->error('密码不能为空');
            }
            //通过用户名获取相关信息
            //校验
            $accountData=model('BisAccount')->get(['username'=>$data['username']]);

            if(!$accountData){
                $this->error('该用户不存在');
            }
            if($accountData->status!='1'){
                $this->error('该用户未审核通过');
            }
            if($accountData->password==md5($data['password'].$accountData->code)){
                model('BisAccount')->updateById(['last_login_time'=>time()],$accountData->id);

                //保存用户登录信息
                session('bisAccount',$accountData,'bis');
                return $this->success('登录成功',url('index/index'));
            }else{
                $this->error('密码错误');
            }
        }else{
	        //获取session
            $account = session('bisAccount','','bis');
            if($account && $account->id){
                return $this->redirect(url('index/index'));
            }
            return $this->fetch();
        }

	}

	public function logout(){
	    //清除session
        session(null,'bis');
        $this->redirect('index');
    }
}




?>