<?php
namespace Home\Model;
use Think\Model;
class AddContentModel extends Model {
	private $losesTable;
	private $picksTable;

	public function __construct($modelName){
		$this->$losesTable=M('Loses');
		$this->$picksTable=M('picks');
	//	parent::__construct($modelName);
	}

	public function addContent($receiveInfo){
		if($receiveInfo["loseId"]>=0 && $receiveInfo["pickId"]>=0){	//所有信息的情况
			//这里要从两个数据表中按时间顺序同时读取消息

			//获取最后更新的时间
			$lastTime=$this->$losesTable->query('select update_time from loses where if_find=false order by update_time desc limit 1');
			if(count($lastTime)>0){	//考虑到表为空的情况
				$lastTime=$lastTime[0]['update_time'];
			}else{
				$lastTime=0;
			}
			$lastTime2=$this->$losesTable->query('select update_time from picks where if_give_back=false order by update_time desc limit 1');
			if(count($lastTime2)){
				$lastTime2=$lastTime2[0]['update_time'];
			}else{
				$lastTime2=0;
			}

			//进行首次内容载入
			if($lastTime < $lastTime2){
				$lastTime=$lastTime2;

				$selectTable=$this->$losesTable->query('select pick_id,thing_name,place,datetime,thing_describe,if_has_picture
					from picks where if_give_back=false
					order by update_time desc limit 1');
				$outputArray[0]["infoType"]="con-pick";
				$outputArray[0]["content_id"]=$selectTable[0]["pick_id"];
				$outputArray[0]["thing_name"]=$selectTable[0]["thing_name"];
				$outputArray[0]["place"]=$selectTable[0]["place"];
				$outputArray[0]["datetime"]=$selectTable[0]["datetime"];
				$outputArray[0]["thing_describe"]=$selectTable[0]["thing_describe"];

				//$outputArray[0]["picture_url"]=$selectTable[0]["picture_url"];
			}else{
				$selectTable=$this->$losesTable->query('select lose_id,thing_name,place,datetime,thing_describe,if_has_picture
					from loses where if_find=false
					order by update_time desc limit 1');
				$outputArray[0]["infoType"]="con-lose";
				$outputArray[0]["content_id"]=$selectTable[0]["lose_id"];
				$outputArray[0]["thing_name"]=$selectTable[0]["thing_name"];
				$outputArray[0]["place"]=$selectTable[0]["place"];
				$outputArray[0]["datetime"]=$selectTable[0]["datetime"];
				$outputArray[0]["thing_describe"]=$selectTable[0]["thing_describe"];
				
			}

			for($i=1; $i<$receiveInfo["addCount"]; $i++){

			}

			








		}
		elseif($receiveInfo["loseId"]<0 && $receiveInfo["pickId"]>=0){	//有人捡到



		}
		elseif($receiveInfo["loseId"]>=0 && $receiveInfo["pickId"]<0){	//有人弄丢


		}

		return $outputArray;
	}
}
