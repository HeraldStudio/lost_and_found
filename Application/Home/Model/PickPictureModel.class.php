<?php
namespace Home\Model;
use Think\RelationModel;
class PickPictureModel extends RelationModel {
	protected $trueTableName="pick_picture";	//定义数据表
	
	 protected $_link = array(
 'picks'=>array(
 'mapping_type'=>self::BELONGS_TO,
 'foreign_key'=>'pick_id',
 )
 )

	
	
}