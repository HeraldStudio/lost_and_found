<?php
namespace Home\Model;
use Think\Model;
class DetailModel extends Model {
	public function addDetail($receiveInfo){
		$tables=M();

		$sqlString='select name,contact,thing_name,place,datetime,update_time,thing_describe,picture_name,type
			from '.$receiveInfo["infoType"].'s 
			where '.$receiveInfo["infoType"].'_id = '.$receiveInfo['id'];
		$records=$tables->query($sqlString);

		$outputArray["infoType"]=$receiveInfo["infoType"];
		$outputArray["id"]=$receiveInfo["id"];
		$outputArray["thing_name"]=$records[0]["thing_name"];
		$outputArray["place"]=$records[0]["place"];
		$outputArray["datetime"]=$records[0]["datetime"];
		$outputArray["thing_describe"]=$records[0]["thing_describe"];
		$outputArray["name"]=$records[0]["name"];
		$outputArray["update_time"]=$records[0]["update_time"];
		$outputArray["contact"]=$records[0]["contact"];
		$outputArray["type"]=$records[0]["type"];

		if($records[0]["picture_name"]!="NULL"){
			$outputArray["picture_url"]="Public/pictures/".$receiveInfo["infoType"].'s/'.$records[0]["picture_name"];
		}else{
			$outputArray["picture_url"]="Public/pictures/".$outputArray["type"].".jpg";
		}

		//添加评论内容
		$sqlString="select comment,name,datetime from ".$receiveInfo["infoType"]."_comments
			where ".$receiveInfo["infoType"]."_id = ".$receiveInfo['id'];
		$outputArray["comments"]=$tables->query($sqlString);
		//
		return $outputArray;
	}

	public function getContact($receiveInfo){
		$tables=M();

		//.将获取过联系方式的人的信息存入记录
		$data = array(
            "type" => $receiveInfo["infoType"],
            "thing_id" => $receiveInfo["id"],
            "school_card_id" =>213123641
            );
		M('records')->data($data)->add();

		//

		$sqlString="select contact from ".$receiveInfo["infoType"]."s 
			 where ".$receiveInfo["infoType"].'_id = '.$receiveInfo['id'];
		$records=$tables->query($sqlString);
		return $records[0]["contact"];
	}
}