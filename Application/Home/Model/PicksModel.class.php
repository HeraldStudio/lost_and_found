<?php
namespace Home\Model;
use Think\RelationModel;
class PicksModel extends RelationModel {
	protected $trueTableName="picks";	//定义数据表
	 protected $_link = array(
	 'pick_picture'=> array(
	 'mapping_type'=> self::HAS_ONE,
	 'mapping_name'=>'pick_picture',
	 'class_name'=>'pick_picture',
	 'foreign_key'=>'pick_id',
	 )
 )

}