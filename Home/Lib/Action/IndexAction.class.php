<?php

class IndexAction extends CommAction {
	// 检测是否登陆
	Public function _initialize(){
    	if(!isset($_SESSION['Apil_Login'])){
    		// 跳转到登陆页面
        	$this->redirect('Login/login');
    	}
    }

    public function index(){
    	$this->display();
    }
    public function changePassword(){
    	echo '11111';
    }
}