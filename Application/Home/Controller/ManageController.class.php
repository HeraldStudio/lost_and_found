<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class ManageController extends Controller {
	public function index(){
		//获取是否登录
		//$logStatus=false;
		$logStatus=true;
		$username="强哥";
		//
		if(!$logStatus){
			$outputArray["logStatus"]=false;
			$outputArray["username"]="未登录";
			$this->assign($outputArray);
			$this->display();
			return;
		}else{
			$outputArray["logStatus"]=true;
			$outputArray["username"]=$username;
			$this->assign($outputArray);
			$this->display();
		}
	}
}