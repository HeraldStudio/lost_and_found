<?php
namespace Home\Controller;
use Think\Controller;
class LoseInfoController extends Controller{
	public function index(){
		$lsuser = M('loses');
		$count =  $lsuser->where('school_card_id = 0' )->count();
		$Page = new \Think\Page($count,6);
		$show = $Page->show();
		$limit = $Page->firstRow.','.$Page->listRows;
		$lsinfo =  $lsuser->where('school_card_id = 0' )->Field('lose_id,type,thing_name,place,datetime,if_find')->order('lose_id DESC')->limit($limit)->select();
		$this->assign('lsinfo',$lsinfo);
		$this->assign('page',$show);
		$this->display();
	}
	//删除丢失表的诗句
	public function delete(){
		$lose_id = I('lose_id');
		if(M('loses')->delete($lose_id)){
			$this->success('删除成功',U('Home/LoseInfo/index'));
        }else{
        $this->error();
        }
	}    

    //确认是否找回丢失
    public function confirm(){
		$lose_id = I('lose_id');
		if(M('loses')->where("lose_id = $lose_id")->setfield('if_find','1')){
			$this->success('确认成功',U('Home/LoseInfo/index'));
        }else{
        $this->error();
        }    

	}
}