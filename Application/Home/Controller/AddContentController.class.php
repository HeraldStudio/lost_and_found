<?php
namespace Home\Controller;
use Think\Controller;
class AddContentController extends Controller{
	public function index(){
		$receiveInfo["loseId"]=I('post.loseId');
		$receiveInfo["pickId"]=I('post.pickId');
		$receiveInfo["addCount"]=I('post.addCount');
		//$receiveInfo["typeFilter"]=

		for($i=0;$i<$receiveInfo["addCount"];$i++)
		{
			//用Modal代替以下内容
			$infoType="con-pick";
			$thing_name="钥匙";
			$place="图书馆";
			$datetime="2013-12-21 23:10:00";
			$thing_describe="很精致，像是女生的";
			$picture_url="Public/pictures/default2.jpg";
			$content_id=16;
			//'



			$outputArray["infoType"]=$infoType;	//用于区别是丢失还是捡到 con-pick/con-lose
			$outputArray["thing_name"]=$thing_name;	//物品的名称
			$outputArray["place"]=$place;	//丢失/捡到地点
			$outputArray["datetime"]=$datetime;	//时间发生的具体时间
			$outputArray["thing_describe"]=$thing_describe;	//对物品的描述
			$outputArray["picture_url"]=$picture_url;
			$outputArray["content_id"]=$content_id;
			$this->assign($outputArray);

			$returnInfo["content"]=$returnInfo["content"].$this->fetch("AddContent");
			$returnInfo["ifEnd"]=false;	//标记是否全部加在完成，True表示没有更多
		}
		echo json_encode($returnInfo);		
	}
}