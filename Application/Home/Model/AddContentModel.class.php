<?php
namespace Home\Model;
use Think\Model;
class AddContentModel extends Model {
	private $losesTable;
	private $picksTable;
	private $losePictureTable;
	private $pickPictureTable;

	public function __construct($modelName){
		$this->$losesTable=M('Loses');
		$this->$picksTable=M('picks');
		$this->$losePictureTable=M('LosePicture');
		$this->$pickPictureTable=M('pickPicture');

	//	parent::__construct($modelName);
	}

	public function addContent($receiveInfo){
		//拼接类型过滤查询语句
		$sqlFilter='';
		$allType=array_keys($receiveInfo["typeFilter"]);
		foreach($allType as $oneType){
			if($receiveInfo["typeFilter"][$oneType]=='true'){
				if($sqlFilter==''){
					$sqlFilter='type = \''.$oneType.'\'';
				}else{
					$sqlFilter=$sqlFilter.' or type = \''.$oneType.'\'';
				}
			}
		}
		if($sqlFilter==''){
			$sqlFilter="type = 'stationery' or type = 'electronic' or type = 'card' or type = 'money' or type = 'keys' or type = 'others'";
		}
		//

		if($receiveInfo["loseId"]>=0 && $receiveInfo["pickId"]>=0){	//所有信息的情况
			//这里要从两个数据表中按时间顺序同时读取消息

			//获取最后更新的时间
			$lastTime=$this->$losesTable->query('select update_time from loses 
				where '.$sqlFilter.' and if_find=false 
				order by update_time desc limit 1');
			if(count($lastTime)>0){	//考虑到表为空的情况
				$lastTime=$lastTime[0]['update_time'];
			}else{
				$lastTime=0;
			}
			$lastTime2=$this->$losesTable->query('select update_time from picks 
				where '.$sqlFilter.' and if_give_back=false 
				order by update_time desc limit 1');
			if(count($lastTime2)){
				$lastTime2=$lastTime2[0]['update_time'];
			}else{
				$lastTime2=0;
			}

			//进行首次内容载入
			if($lastTime < $lastTime2){
				$lastTime=$lastTime2;

				$pickSelectTable=$this->$losesTable->query('select pick_id,thing_name,place,datetime,thing_describe,if_has_picture
					from picks where '.$sqlFilter.' and if_give_back=false
					order by update_time desc limit 1');

				$outputArray[0]["infoType"]="con-pick";
				$outputArray[0]["content_id"]=$pickSelectTable[0]["pick_id"];
				$outputArray[0]["thing_name"]=$pickSelectTable[0]["thing_name"];
				$outputArray[0]["place"]=$pickSelectTable[0]["place"];
				$outputArray[0]["datetime"]=$pickSelectTable[0]["datetime"];
				$outputArray[0]["thing_describe"]=$pickSelectTable[0]["thing_describe"];
			//	$outputArray[0]["thing_describe"]=$sqlFilter;

				if($pickSelectTable[0]["if_has_picture"]){	//有图片
					$outputArray[0]["picture_url"]="Public/pictures/".$this->$pickPictureTable->query('select picture_name from pick_picture
						where pick_id='.$pickSelectTable[0]["pick_id"])[0]["picture_name"];
				}else{
					$outputArray[0]["picture_url"]="Public/pictures/default.jpg";
				}
		
			}else{
				$loseSelectTable=$this->$losesTable->query('select lose_id,thing_name,place,datetime,thing_describe,if_has_picture
					from loses where '.$sqlFilter.' and if_find=false
					order by update_time desc limit 1');

				$outputArray[0]["infoType"]="con-lose";
				$outputArray[0]["content_id"]=$loseSelectTable[0]["lose_id"];
				$outputArray[0]["thing_name"]=$loseSelectTable[0]["thing_name"];
				$outputArray[0]["place"]=$loseSelectTable[0]["place"];
				$outputArray[0]["datetime"]=$loseSelectTable[0]["datetime"];
				$outputArray[0]["thing_describe"]=$loseSelectTable[0]["thing_describe"];
			//	$outputArray[0]["thing_describe"]=$sqlFilter;

				if($loseSelectTable[0]["if_has_picture"]){	//有图片
					$outputArray[0]["picture_url"]="Public/pictures/".$this->$losePictureTable->query('select picture_name from lose_picture
						where lose_id='.$loseSelectTable[0]["lose_id"])[0]["picture_name"];
				}else{
					$outputArray[0]["picture_url"]="Public/pictures/default.jpg";
				}

			}

			for($i=1; $i<$receiveInfo["addCount"]; $i++){
				//每次载入新内容时比较时间

			}

			








		}
		elseif($receiveInfo["loseId"]<0 && $receiveInfo["pickId"]>=0){	//有人捡到



		}
		elseif($receiveInfo["loseId"]>=0 && $receiveInfo["pickId"]<0){	//有人弄丢


		}

		return $outputArray;
	}
}
