<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class MessageController extends Controller {
	public function index(){
		$pcuser = M('picks');
		$pick_id =  $pcuser->where('school_card_id = 0' )->Field('pick_id')->select();
		$count =  $pcuser->where('school_card_id = 0' )->count();
		$pccomment = M('pick_comments');
		for($i=0;$i<=$count;$i++){ 
			$id = $pick_id[$i];
		$comment = $pccomment->where($id)->Field('comment_id,comment,datetime,name')->order('comment_id DESC')->select();
		 if($comment){
		 $arr[] = $id;
		}

		};
		$num = count($arr);
		for($j=0;$j<$num-1;$j++){
		 $thing = $pcuser->where($arr[$j])->Field('thing_name,update_time')->order('pick_id DESC')->select();
		 $arr_thing[$j] =$thing;
		 };
		// print_r($thing);
	// 	$Page = new \Think\Page($count,6);
	// 	$show = $Page->show();
	// 	$limit = $Page->firstRow.','.$Page->listRows;
	// 	$pcinfo =  $pcuser->where('school_card_id = 0' )->Field('pick_id,type,thing_name,place,datetime,if_give_back')->order('pick_id DESC')->limit($limit)->select();
		// print_r($thing);
		// $this->assign('comment',$comment);
		// $this->assign('thing',$arr_thing);
		// $this->display();
		 $this->assign('comment',$comment);
		 $this->assign('arr_thing',$arr_thing);
		 // print_r($arr_thing);
		 // print_r($comment);
		 $this->display();

	}

}