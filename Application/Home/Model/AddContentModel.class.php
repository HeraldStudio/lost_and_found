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

//		return "type='keys'";
	}

	public function getBiggestLoseId($ifGiveBack, $receiveInfo){
		$sqlFilter=$this->createSqlFilter($receiveInfo);

		return $this->$losesTable->query('select lose_id from loses 
					where ('.$sqlFilter.')
					and if_find=false 
					order by lose_id desc limit 1')
				[0]["lose_id"];
	}

	public function getBiggestPickId($ifFind, $receiveInfo){
		$sqlFilter=$this->createSqlFilter($receiveInfo);
		return $this->$picksTable->query('select pick_id from picks 
					where ('.$sqlFilter.')
					and if_give_back=false 
					order by pick_id desc limit 1')
				[0]["pick_id"];
	}

	public function addContent($receiveInfo){
		$sqlFilter=$this->createSqlFilter($receiveInfo);

		if($receiveInfo["loseId"]>0 && $receiveInfo["pickId"]>0){	//所有信息的情况
			//这里要从两个数据表中按时间顺序同时读取消息
			for($i=0; $i<$receiveInfo["addCount"]; $i++){
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
				if($latestTime1==0 && $latestTime2==0) return $outputArray;

				//每次载入新内容时比较时间
				if($latestTime1 > $latestTime2){
					$loseSelectTable=$this->$losesTable->query('select lose_id,thing_name,place,datetime,thing_describe,if_has_picture
						from loses where ('.$sqlFilter.') 
						and if_find=false 
						and lose_id < '.$receiveInfo["loseId"].' 
						order by update_time desc,lose_id desc limit 1');

					$outputArray[$i]["infoType"]="con-lose";
					$outputArray[$i]["content_id"]=$loseSelectTable[0]["lose_id"];
					$outputArray[$i]["thing_name"]=$loseSelectTable[0]["thing_name"];
					$outputArray[$i]["place"]=$loseSelectTable[0]["place"];
					$outputArray[$i]["datetime"]=$loseSelectTable[0]["datetime"];
				//	$outputArray[$i]["thing_describe"]=$loseSelectTable[0]["thing_describe"];
					$outputArray[$i]["thing_describe"]=$sqlFilter;

					//有图片
					if($loseSelectTable[0]["if_has_picture"]){
						$outputArray[$i]["picture_url"]="Public/pictures/".$this->$losePictureTable->query('select picture_name from lose_picture
							where lose_id='.$loseSelectTable[0]["lose_id"])[0]["picture_name"];
					}else{
						$outputArray[$i]["picture_url"]="Public/pictures/default.jpg";
					}
					//'
					$receiveInfo["loseId"]=$loseSelectTable[0]["lose_id"];	//这里要及时对id的位置记录进行更新

				}else{
					$pickSelectTable=$this->$picksTable->query('select pick_id,thing_name,place,datetime,thing_describe,if_has_picture
						from picks where ('.$sqlFilter.') 
						and if_give_back=false 
						and pick_id < '.$receiveInfo["pickId"].' 
						order by update_time desc,pick_id desc limit 1');

					$outputArray[$i]["infoType"]="con-pick";
					$outputArray[$i]["content_id"]=$pickSelectTable[0]["pick_id"];
					$outputArray[$i]["thing_name"]=$pickSelectTable[0]["thing_name"];
					$outputArray[$i]["place"]=$pickSelectTable[0]["place"];
					$outputArray[$i]["datetime"]=$pickSelectTable[0]["datetime"];
				//	$outputArray[$i]["thing_describe"]=$pickSelectTable[0]["thing_describe"];
					$outputArray[$i]["thing_describe"]=$sqlFilter;

					//有图片	
					if($pickSelectTable[0]["if_has_picture"]){
						$outputArray[$i]["picture_url"]="Public/pictures/".$this->$pickPictureTable->query('select picture_name from pick_picture
							where pick_id='.$pickSelectTable[0]["pick_id"])[0]["picture_name"];
					}else{
						$outputArray[$i]["picture_url"]="Public/pictures/default.jpg";
					}
					//'
					$receiveInfo["pickId"]=$pickSelectTable[0]["pick_id"];	//这里要及时对id的位置记录进行更新
				}
			}
			return $outputArray;
		}
		elseif($receiveInfo["loseId"]<0 && $receiveInfo["pickId"]>0){	//有人捡到
			for($i=0; $i<$receiveInfo["addCount"]; $i++){
				$pickSelectTable=$this->$picksTable->query('select pick_id,thing_name,place,datetime,thing_describe,if_has_picture
					from picks where ('.$sqlFilter.') 
					and if_give_back=false 
					and pick_id < '.$receiveInfo["pickId"].' 
					order by update_time desc,pick_id desc limit 1');

				if(count($pickSelectTable)==0) return $outputArray;

				$outputArray[$i]["infoType"]="con-pick";
				$outputArray[$i]["content_id"]=$pickSelectTable[0]["pick_id"];
				$outputArray[$i]["thing_name"]=$pickSelectTable[0]["thing_name"];
				$outputArray[$i]["place"]=$pickSelectTable[0]["place"];
				$outputArray[$i]["datetime"]=$pickSelectTable[0]["datetime"];
			//	$outputArray[$i]["thing_describe"]=$pickSelectTable[0]["thing_describe"];
				$outputArray[$i]["thing_describe"]=$sqlFilter;

				//有图片
				if($pickSelectTable[0]["if_has_picture"]){
					$outputArray[$i]["picture_url"]="Public/pictures/".$this->$pickPictureTable->query('select picture_name from pick_picture
						where pick_id='.$pickSelectTable[0]["pick_id"])[0]["picture_name"];
				}else{
					$outputArray[$i]["picture_url"]="Public/pictures/default.jpg";
				}
				//'
				$receiveInfo["pickId"]=$pickSelectTable[0]["pick_id"];	//这里要及时对id的位置记录进行更新
			}
			return $outputArray;
		}
		elseif($receiveInfo["loseId"]>0 && $receiveInfo["pickId"]<0){	//有人弄丢
			for($i=0; $i<$receiveInfo["addCount"]; $i++){
				$loseSelectTable=$this->$losesTable->query('select lose_id,thing_name,place,datetime,thing_describe,if_has_picture
					from loses where ('.$sqlFilter.') 
					and if_find=false 
					and lose_id < '.$receiveInfo["loseId"].' 
					order by update_time desc,lose_id desc limit 1');

				if(count($loseSelectTable)==0) return $outputArray;

				$outputArray[$i]["infoType"]="con-lose";
				$outputArray[$i]["content_id"]=$loseSelectTable[0]["lose_id"];
				$outputArray[$i]["thing_name"]=$loseSelectTable[0]["thing_name"];
				$outputArray[$i]["place"]=$loseSelectTable[0]["place"];
				$outputArray[$i]["datetime"]=$loseSelectTable[0]["datetime"];
			//	$outputArray[$i]["thing_describe"]=$loseSelectTable[0]["thing_describe"];
				$outputArray[$i]["thing_describe"]=$sqlFilter;

				//有图片
				if($loseSelectTable[0]["if_has_picture"]){
					$outputArray[$i]["picture_url"]="Public/pictures/".$this->$losePictureTable->query('select picture_name from lose_picture
						where lose_id='.$loseSelectTable[0]["lose_id"])[0]["picture_name"];
				}else{
					$outputArray[$i]["picture_url"]="Public/pictures/default.jpg";
				}
				//'
				$receiveInfo["loseId"]=$loseSelectTable[0]["lose_id"];	//这里要及时对id的位置记录进行更新
				if($receiveInfo["loseId"]==1) return $outputArray;
			}
			return $outputArray;
		}
	}
}
