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

	//	parent::__construct($modelName);	//不必调用父类构造函数也能工作，这样还节约资源
	}

	private function createSqlFilter($receiveInfo){
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
		return $sqlFilter;
	}

	public function getBiggestLoseId($ifGiveBack, $receiveInfo){
		$temp= $this->$losesTable->query('select lose_id from loses order by lose_id desc limit 1');
		if(count($temp)==0){
			return 1;
		}else{
			return $temp[0]["lose_id"];
		}
	}

	public function getBiggestPickId($ifFind, $receiveInfo){
		$temp=$this->$picksTable->query('select pick_id from picks order by pick_id desc limit 1');
		if(count($temp)==0){
			return 1;
		}else{
			return $temp[0]["pick_id"];
		}
	}

	public function addContent($receiveInfo){
		$sqlFilter=$this->createSqlFilter($receiveInfo);

	//这里要从两个数据表中按时间顺序同时读取消息

		//获取最后更新的时间
		$latestTime1=$this->$losesTable->query('select update_time from loses 
			where ('.$sqlFilter.') 
			and if_find=false 
			and lose_id < '.$receiveInfo["loseId"].' 
			order by lose_id desc limit 1');

		if(count($latestTime1)>0){
			$latestTime1=$latestTime1[0]['update_time'];
		}else{
			$latestTime1=0;
		}

		$latestTime2=$this->$picksTable->query('select update_time from picks 
			where ('.$sqlFilter.') 
			and if_give_back=false 
			and pick_id < '.$receiveInfo["pickId"].' 
			order by pick_id desc limit 1');

		if(count($latestTime2)>0){
			$latestTime2=$latestTime2[0]['update_time'];
		}else{
			$latestTime2=0;
		}
		//'

		for($i=0; $i<$receiveInfo["addCount"]; $i++){
			//每次载入新内容时比较时间
			if($latestTime1==0 && $latestTime2==0) return $outputArray;

			if($latestTime1 > $latestTime2){
				$loseSelectTable=$this->$losesTable->query(
					'select lose_id,thing_name,place,datetime,thing_describe,if_has_picture,type 
					from loses where ('.$sqlFilter.') 
					and if_find=false 
					and lose_id < '.$receiveInfo["loseId"].' 
					order by update_time desc,lose_id desc limit 1');

				$outputArray[$i]["infoType"]="con-lose";
				$outputArray[$i]["content_id"]=$loseSelectTable[0]["lose_id"];
				$outputArray[$i]["thing_name"]=$loseSelectTable[0]["thing_name"];
				$outputArray[$i]["place"]=$loseSelectTable[0]["place"];
				$outputArray[$i]["datetime"]=$loseSelectTable[0]["datetime"];
				$outputArray[$i]["thing_describe"]=$loseSelectTable[0]["thing_describe"];
				$outputArray[$i]["type"]=$loseSelectTable[0]["type"];


				//有图片
				if($loseSelectTable[0]["if_has_picture"]){
					$outputArray[$i]["picture_url"]="Public/pictures/loses/".$this->$losePictureTable->query(
						'select picture_name from lose_picture
						where lose_id='.$loseSelectTable[0]["lose_id"])[0]["picture_name"];
				}else{
					$outputArray[$i]["picture_url"]="Public/pictures/".$loseSelectTable[0]["type"].".jpg";
				}
				//'
				$receiveInfo["loseId"]=$loseSelectTable[0]["lose_id"];	//这里要及时对id的位置记录进行更新

				//这里对时间进行跟进，之前的版本是在进入for循环的时候进行跟进，那样会多执行不要的查询
				$latestTime1=$this->$losesTable->query('select update_time from loses 
					where ('.$sqlFilter.') 
					and if_find=false 
					and lose_id < '.$receiveInfo["loseId"].' 
					order by lose_id desc limit 1');

				if(count($latestTime1)>0){
					$latestTime1=$latestTime1[0]['update_time'];
				}else{
					$latestTime1=0;
				}
				//'

			}else{
				$pickSelectTable=$this->$picksTable->query(
					'select pick_id,thing_name,place,datetime,thing_describe,if_has_picture,type 
					from picks where ('.$sqlFilter.') 
					and if_give_back=false 
					and pick_id < '.$receiveInfo["pickId"].' 
					order by update_time desc,pick_id desc limit 1');

				$outputArray[$i]["infoType"]="con-pick";
				$outputArray[$i]["content_id"]=$pickSelectTable[0]["pick_id"];
				$outputArray[$i]["thing_name"]=$pickSelectTable[0]["thing_name"];
				$outputArray[$i]["place"]=$pickSelectTable[0]["place"];
				$outputArray[$i]["datetime"]=$pickSelectTable[0]["datetime"];
				$outputArray[$i]["thing_describe"]=$pickSelectTable[0]["thing_describe"];
				$outputArray[$i]["type"]=$pickSelectTable[0]["type"];


				//有图片	
				if($pickSelectTable[0]["if_has_picture"]){
					$outputArray[$i]["picture_url"]="Public/pictures/picks/".$this->$pickPictureTable->query(
						'select picture_name from pick_picture
						where pick_id='.$pickSelectTable[0]["pick_id"])[0]["picture_name"];
				}else{
					$outputArray[$i]["picture_url"]="Public/pictures/".$pickSelectTable[0]["type"].".jpg";
				}
				//'
				$receiveInfo["pickId"]=$pickSelectTable[0]["pick_id"];	//这里要及时对id的位置记录进行更新

				//时间跟进
				$latestTime2=$this->$picksTable->query('select update_time from picks 
					where ('.$sqlFilter.') 
					and if_give_back=false 
					and pick_id < '.$receiveInfo["pickId"].' 
					order by pick_id desc limit 1');

				if(count($latestTime2)>0){
					$latestTime2=$latestTime2[0]['update_time'];
				}else{
					$latestTime2=0;
				}
				//'
			}
		}
		return $outputArray;
	}

	public function achievements($receiveInfo){
		for($i=0; $i<$receiveInfo["addCount"]; $i++){
			//获取最后更新的时间
			$latestTime1=$this->$losesTable->query('select update_time from loses 
				where if_find = TRUE 
				and lose_id < '.$receiveInfo["loseId"].' 
				order by lose_id desc limit 1');

			if(count($latestTime1)>0){
				$latestTime1=$latestTime1[0]['update_time'];
			}else{
				$latestTime1=0;
			}

			$latestTime2=$this->$picksTable->query('select update_time from picks 
				where if_give_back = TRUE 
				and pick_id < '.$receiveInfo["pickId"].' 
				order by pick_id desc limit 1');

			if(count($latestTime2)>0){
				$latestTime2=$latestTime2[0]['update_time'];
			}else{
				$latestTime2=0;
			}
			//'
			if($latestTime1==0 && $latestTime2==0){	return $outputArray; }

			//每次载入新内容时比较时间
			if($latestTime1 > $latestTime2){
				$loseSelectTable=$this->$losesTable->query(
					'select lose_id,thing_name,place,datetime,thing_describe,if_has_picture,type
					from loses where if_find = TRUE 
					and lose_id < '.$receiveInfo["loseId"].' 
					order by update_time desc,lose_id desc limit 1');

				$outputArray[$i]["infoType"]="con-lose";
				$outputArray[$i]["content_id"]=$loseSelectTable[0]["lose_id"];
				$outputArray[$i]["thing_name"]=$loseSelectTable[0]["thing_name"]." (已找到)";
				$outputArray[$i]["place"]=$loseSelectTable[0]["place"];
				$outputArray[$i]["datetime"]=$loseSelectTable[0]["datetime"];
				$outputArray[$i]["thing_describe"]=$loseSelectTable[0]["thing_describe"];
				$outputArray[$i]["type"]=$loseSelectTable[0]["type"];


				//有图片
				if($loseSelectTable[0]["if_has_picture"]){
					$outputArray[$i]["picture_url"]="Public/pictures/loses/".$this->$losePictureTable->query('select picture_name from lose_picture
						where lose_id='.$loseSelectTable[0]["lose_id"])[0]["picture_name"];
				}else{
					$outputArray[$i]["picture_url"]="Public/pictures/".$loseSelectTable[0]["type"].".jpg";
				}
				//'
				$receiveInfo["loseId"]=$loseSelectTable[0]["lose_id"];	//这里要及时对id的位置记录进行更新

			}else{
				$pickSelectTable=$this->$picksTable->query('select pick_id,thing_name,place,datetime,thing_describe,if_has_picture,type
					from picks where if_give_back = TRUE 
					and pick_id < '.$receiveInfo["pickId"].' 
					order by update_time desc,pick_id desc limit 1');

				$outputArray[$i]["infoType"]="con-pick";
				$outputArray[$i]["content_id"]=$pickSelectTable[0]["pick_id"];
				$outputArray[$i]["thing_name"]=$pickSelectTable[0]["thing_name"]." (已归还)";
				$outputArray[$i]["place"]=$pickSelectTable[0]["place"];
				$outputArray[$i]["datetime"]=$pickSelectTable[0]["datetime"];
				$outputArray[$i]["thing_describe"]=$pickSelectTable[0]["thing_describe"];
				$outputArray[$i]["type"]=$pickSelectTable[0]["type"];


				//有图片	
				if($pickSelectTable[0]["if_has_picture"]){
					$outputArray[$i]["picture_url"]="Public/pictures/picks/".$this->$pickPictureTable->query('select picture_name from pick_picture
						where pick_id='.$pickSelectTable[0]["pick_id"])[0]["picture_name"];
				}else{
					$outputArray[$i]["picture_url"]="Public/pictures/".$loseSelectTable[0]["type"].".jpg";
				}
				//'
				$receiveInfo["pickId"]=$pickSelectTable[0]["pick_id"];	//这里要及时对id的位置记录进行更新
			}
		}
		return $outputArray;

	}
}
