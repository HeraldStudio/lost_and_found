<?php
namespace Home\Model;
use Think\Model;
class DetailModel extends Model {
	public function addDetail($receiveInfo){
		$tables=M();

		$sqlString='select name,contact,thing_name,place,datetime,update_time,thing_describe,if_has_picture
			from '.$receiveInfo["infoType"].'s 
			where '.$receiveInfo["infoType"].'_id = '.$receiveInfo['id'];
		$records=$tables->query($sqlString);

		$outputArray["infoType"]=$receiveInfo["infoType"];
		$outputArray["thing_name"]=$records[0]["thing_name"];
		$outputArray["place"]=$records[0]["place"];
		$outputArray["datetime"]=$records[0]["datetime"];
		$outputArray["thing_describe"]=$records[0]["thing_describe"];
		$outputArray["name"]=$records[0]["name"];
		$outputArray["update_time"]=$records[0]["update_time"];
		$outputArray["contact"]=$records[0]["contact"];

		if($records[0]["if_has_picture"]){
			$sqlString='select picture_name from '.$receiveInfo["infoType"].'_picture 
				where '.$receiveInfo["infoType"].'_id = '.$receiveInfo['id'];
			$outputArray["picture_url"]="Public/pictures/".$receiveInfo["infoType"].'s/' .$tables->query($sqlString)[0]["picture_name"];
		}else{
			$outputArray["picture_url"]="Public/pictures/default.jpg";
		}

		return $outputArray;
	}
}