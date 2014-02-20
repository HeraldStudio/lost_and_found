<?php
namespace Home\Controller;
use Think\Controller;
class AddContentController extends Controller{
	public function index(){
		$receiveInfo["loseId"]=I('post.loseId');
		$receiveInfo["pickId"]=I('post.pickId');
		$receiveInfo["addCount"]=I('post.addCount');
		$receiveInfo["typeFilter"]=I('post.typeFilter');//这是一个布尔数组，包含类型过滤的信息，元素有stationery、electronic、card、money、keys、others

		$addconMod=D('AddContent');	//实例化添加信息模型
		$outputArray=$addconMod->AddContent($receiveInfo);

		for($i=0; $i<count($outputArray); $i++)	//调用view
		{
			$this->assign($outputArray[$i]);
			$returnInfo["content"]=$returnInfo["content"].$this->fetch("AddContent");
		}

		if(count($outputArray)<$receiveInfo["addCount"]){
			$returnInfo["ifEnd"]=true;	//标记是否全部加在完成，True表示没有更多
		}else{
			$returnInfo["ifEnd"]=false;
		}

		$returnInfo["loseId"]=$receiveInfo["loseId"];
		$returnInfo["pickId"]=$receiveInfo["pickId"];

		echo json_encode($returnInfo);		
	}
}