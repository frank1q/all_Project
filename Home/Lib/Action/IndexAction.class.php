<?php

class IndexAction extends CommAction {
	// 检测是否登陆
	Public function _initialize(){
    	if(!isset($_SESSION['Apil_Login'])){
    		// 跳转到登陆页面
        	$this->redirect('Login/login');
    	}
    }
    // 显示要做的功能
    public function index(){
    	$this->display();
    }

    public function changePassword(){
    	$this->display();
    }

    public function xiugaimima(){
        if(($_POST['xpassword'])!=$_POST['qrpassword']){
            $this->error('密码显示不一致');
        }
        $where['uid'] = $_SESSION['uid'];
        $user = M('user');
        $userArr = $user->where($where)->find();
        // dump($userArr);
        if($userArr){
            if(md5($_POST['oldpassword'])!=$userArr['password']){
                $this->error('原密码出错');
            }
            else{
                if($userArr['password'] == md5($_POST['xpassword'])){
                    $this->error('旧密码与新密码一样');
                }
                $data['password'] =md5($_POST['xpassword']);
                $where['uid'] = $_SESSION['uid'];
                // 影响行数
                $user->data($data)->where($where)->save();
                $this->success('修改成功');
            }

        }
        else{
            $this->error('参数出错');
        }

        
    }



}