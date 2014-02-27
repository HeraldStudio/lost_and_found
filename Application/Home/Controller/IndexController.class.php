<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//获取用户登录信息
    	if(0){
    		$info["username"]="强哥";
    		$info["class1"]="disabled";
    		$info["class2"]="";
    	}else{
    		$info["username"]="账户";
    		$info["class2"]="disabled";
    		$info["class1"]="";
    	}
    	//'
    	$this->assign($info);
		$this->display();
    }
}