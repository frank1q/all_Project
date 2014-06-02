<?php

class LoginAction extends CommAction {
	// $_validate;
    public function login(){
    	$this->display();
    }
    // 验证用户登陆
    public function doLogin(){
    	if(md5($_POST['verify'])!=$_SESSION['verify']){
    		$this->error('验证码输入错误');
    	}
    	// 根据用户把数据对应的数据拿出来
    	$where['username'] = $_POST['username'];
    	$userArr = M('user')->where($where)->find();
    	if($userArr){
    		if(md5($_POST['password'])!=$userArr['password']){
    			$this->error('密码出错');
    		}
    		else{
    			$_SESSION['Apil_Login'] = 1;
    			$_SESSION['uid'] = $userArr['uid'];
    			$_SESSION['username'] = $userArr['username'];
    			$this->redirect('index/index');
    		}
    	}
    	else{
    		$this->error('用户名不存在');
    	}
    	

    }
    // 画验证码
	public function verify(){
	    import('ORG.Util.Image');
	    Image::buildImageVerify();
	}



}