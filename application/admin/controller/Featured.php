<?php
namespace app\admin\controller;

use think\Controller;

class Featured{
    private $featuredModel;
    public function _initialize(){
        $this->featuredModel=model('Featured');
    }
    public function index(){
        return $this->fetch();
    }
    public function add(){
        return $this->fetch();
    }
}








?>