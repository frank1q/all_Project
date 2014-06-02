<?php
class CateAction extends CommAction {
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
    
    public function add(){
    	$this->display();
    }
    // 增加
    public function zengjia(){
        $cate = M('cate');
     
    	$data['name'] =$_POST['aname'];
    	$data['pid'] =$_POST['bpid'];
    	$data['sort_id'] =$_POST['csort_id'];
    	$id = $cate->add($data);
    	dump($_POST);
    	$this->success('增加成功');
    }
    // 删除
 	public function sc(){
        if(!isset($_POST['sub'])){
            $this->display();
        }
        else{
            $cate = M('cate');
            $where['id'] =$_POST['id'];
            $where1['pid'] =$_POST['id'];
            $jsArr = $cate->where($where1)->count();
            // dump($jsArr);
            // exit;    
            if ($jsArr) {
                $this->error('该分类中存有子分类'); 
            } else {
                $nums = $cate->where($where)->sel();
                $this->success('删除成功');
            }
        }
    }

    // 修改
    public function xg(){
        // dump($_POST['sub']);
        if(!isset($_POST['sub'])){
            $this->display();
        }
        else{
            $cate = M('cate');
            $where['id'] = $_POST['gid'];
            $jsArr = $cate->where($where)->find();
            if (!$jsArr) {
                $this->success('该内容不存在');
            } 
            else{
                // 把数据放到模板  <指派>
                $this->assign('arr',$jsArr);
                $this->display('xx');

               /* */
            }
        }
    }

    public function xiugai(){
        $cate = M('cate');
        $data['name'] =$_POST['aname'];
        $data['pid'] =$_POST['bpid'];
        $data['sort_id'] =$_POST['csort_id'];
        $where['id'] =$_POST['id'];
        $cate->data($data)->where($where)->save();
        $this->success('修改成功'); 



    }

        // 查询
    public function cs(){
        if(!isset($_POST['sub'])){
            $this->display();
        }
        else{
            $cate = M('cate');
            // $where['id'] =$_POST['id'];
            // $where['name'] =$_POST['aname'];
            $where['pid'] =$_POST['bpid'];
            // $where['sort_id'] =$_POST['csort_id'];
            $jsArr = $cate->where($where)->select();
            dump($jsArr);
            // exit;    
            if ($jsArr) {exit;
            $this->success('查询成功');
            }
            else{
            $this->success('查询失败');
            }
        }
    }
}