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

		$this->idInitialize($receiveInfo);	//初始化记录id		
		
		$outputArray=$addconMod->AddContent($receiveInfo);	//执行模型加载函数

		//初始化返回值
		$returnInfo["loseId"]=$receiveInfo["loseId"];
		$returnInfo["pickId"]=$receiveInfo["pickId"];		
		//'

		$returnInfo["ifEnd"]=(count($outputArray)<$receiveInfo["addCount"]);	//标记是否全部加在完成，True表示没有更多


		for($i=0; $i<count($outputArray); $i++)	//调用view
		{
			//对图片进行尺寸设置
			$conWidth=238; $conHeight=178;	//设置容器尺寸，修改时只对此一处进行修改
			list($width, $height, $type, $attr)=getimagesize($outputArray[$i]["picture_url"]);
			if(!$type){
				$outputArray[$i]["picture_url"]="Public/pictures/".$outputArray[$i]["type"].".jpg";
				list($width, $height, $type, $attr)=getimagesize($outputArray[$i]["picture_url"]);
			}
			if($width/$height > $conWidth/$conHeight){
				$outputArray[$i]["width"]=$conWidth;
				$outputArray[$i]["height"]=$height/$width*$conWidth;
				$outputArray[$i]["marginLeft"]=0;
				$outputArray[$i]["marginTop"]=($conHeight-$outputArray[$i]["height"])/2;
			}else{
				$outputArray[$i]["height"]=$conHeight;
				$outputArray[$i]["width"]=$width/$height*$conHeight;
				$outputArray[$i]["marginTop"]=0;
				$outputArray[$i]["marginLeft"]=($conWidth-$outputArray[$i]["width"])/2;
			}
			//'

			$this->assign($outputArray[$i]);
			$returnInfo["content"]=$returnInfo["content"].$this->fetch("AddContent");

			if($outputArray[$i]["infoType"]=="con-lose")
			{
				$returnInfo["loseId"]=$outputArray[$i]["content_id"];
			}
			elseif($outputArray[$i]["infoType"]=="con-pick")
			{
				$returnInfo["pickId"]=$outputArray[$i]["content_id"];
			}
		}
		echo json_encode($returnInfo);		
	}

	public function achievements(){
		$receiveInfo["loseId"]=I('post.loseId');
		$receiveInfo["pickId"]=I('post.pickId');
		$receiveInfo["addCount"]=I('post.addCount');

		$this->idInitialize($receiveInfo);	//初始化id记录

		//初始化返回值
		$returnInfo["loseId"]=$receiveInfo["loseId"];
		$returnInfo["pickId"]=$receiveInfo["pickId"];
		//'

		$addconMod=D('AddContent');	//实例化添加信息模型
		$image=new \Think\Image();	//图像处理模型

		$outputArray=$addconMod->achievements($receiveInfo);	//执行模型加载函数


		$returnInfo["ifEnd"]=(count($outputArray)<$receiveInfo["addCount"]);	//标记是否全部加在完成，True表示没有更多


		for($i=0; $i<count($outputArray); $i++)	//调用view
		{
			//对图片进行尺寸设置
			$conWidth=238; $conHeight=178;	//设置容器尺寸，修改时只对此一处进行修改
			list($width, $height, $type, $attr)=getimagesize($outputArray[$i]["picture_url"]);
			if(!$type){
				$outputArray[$i]["picture_url"]="Public/pictures/".$outputArray[$i]["type"].".jpg";
				list($width, $height, $type, $attr)=getimagesize($outputArray[$i]["picture_url"]);
			}
			if($width/$height > $conWidth/$conHeight){
				$outputArray[$i]["width"]=$conWidth;
				$outputArray[$i]["height"]=$height/$width*$conWidth;
				$outputArray[$i]["marginLeft"]=0;
				$outputArray[$i]["marginTop"]=($conHeight-$outputArray[$i]["height"])/2;
			}else{
				$outputArray[$i]["height"]=$conHeight;
				$outputArray[$i]["width"]=$width/$height*$conHeight;
				$outputArray[$i]["marginTop"]=0;
				$outputArray[$i]["marginLeft"]=($conWidth-$outputArray[$i]["width"])/2;
			}
			//'

			$this->assign($outputArray[$i]);
			$returnInfo["content"]=$returnInfo["content"].$this->fetch("AddContent");

			if($outputArray[$i]["infoType"]=="con-lose")
			{
				$returnInfo["loseId"]=$outputArray[$i]["content_id"];
			}
			elseif($outputArray[$i]["infoType"]=="con-pick")
			{
				$returnInfo["pickId"]=$outputArray[$i]["content_id"];
			}
		}
		$returnInfo["status"]="success";
		echo json_encode($returnInfo);
	}

	private function idInitialize(&$receiveInfo){	//初始化记录id	
		$addconMod=D('AddContent');

		if($receiveInfo["loseId"]==0 && $receiveInfo["pickId"]==0){
			$receiveInfo["loseId"]=$addconMod->getBiggestLoseId(false, $receiveInfo)+1;
			$receiveInfo["pickId"]=$addconMod->getBiggestPickId(false, $receiveInfo)+1;
		}elseif ($receiveInfo["loseId"]==0 && $receiveInfo["pickId"]<0) {
			$receiveInfo["loseId"]=$addconMod->getBiggestLoseId(false, $receiveInfo)+1;
		}elseif ($receiveInfo["loseId"]<0 && $receiveInfo["pickId"]==0) {
			$receiveInfo["pickId"]=$addconMod->getBiggestPickId(false, $receiveInfo)+1;
		}
	}
}