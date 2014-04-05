<?php
// 本类由系统自动生成，仅供测试用途
namespace Manage\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		 // $cookie=$_COOKIE["HERALD_USER_SESSION_ID"];
		 // if($cookie){
		 // 	$this->assign('logstatus',1);
		 // }else{
		 // 	$this->assign('logstatus',0);
		 // }
		$this->display();
    } 



	/*用于获取招领或者寻物信息，tp用于判断信息是招领还是寻物*/
	public function myinfo(){
		$tp=I('tp');
		if($tp=='loses'){
			$callback="if_find";
			$id="lose_id";
		}else{
			$callback="if_give_back";
			$id="pick_id";
		}
		$user = M($tp);
		$info =  $user->where('school_card_id = 0' )->Field("$id,type,thing_name,place,datetime,$callback")->select();
		$this->assign('tp',$tp);
		$this->assign('callback',$callback);
		$this->assign('info',$info);
		$this->assign('id',$id);
		$info["content"]=$info["content"].$this->fetch('Myinfo:index');
		 echo json_encode($info);	

	}

	/*用于删除发布的信息*/
	public function delete(){
		$id = I('id');
		$tp = I('tp');
		if(M($tp)->delete($id)){
			$this->success();
        }else{
        $this->error();
        }
	} 

	 /*用于确认用户是否找到物品*/
    public function confirm(){
		$id = I('id');
		$tp = I('tp');
		if($tp=="loses"){
		if(M($tp)->where("lose_id = $id")->setfield('if_find','1')){
			$this->success();
        }else{
        $this->error();
        }
        }else{
        if(M($tp)->where("pick_id = $id")->setfield('if_give_back','1')){
			$this->success();
        }else{
        $this->error();
        }	
        }    

	}

	/*用于查看留言评论*/
	 public function remark(){
		$id = I('id');
		$tp = I('tp');
		if ($tp=="loses") {
			$remark=M('lose_comments');
			$idtype="lose_id";
		}else{
			$remark=M('pick_comments');
			$idtype="pick_id";
		}
		$comment =$remark->where("$idtype=$id")->Field("name,datetime,comment,$idtype")->order("$idtype DESC")->select();
		$this->assign('comment',$comment);
		$this->assign('id',$id);
		$comment["content"]=$comment["content"].$this->fetch('message:index');
		echo json_encode($comment);

	}   

}