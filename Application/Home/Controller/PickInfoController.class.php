<?php
namespace Home\Controller;
use Think\Controller;
class PickInfoController extends Controller{
	public function index(){
		$pcuser = M('picks');
		$count =  $pcuser->where('school_card_id = 0' )->count();
		$Page = new \Think\Page($count,6);
		$show = $Page->show();
		$limit = $Page->firstRow.','.$Page->listRows;
		$pcinfo =  $pcuser->where('school_card_id = 0' )->Field('pick_id,type,thing_name,place,datetime,if_give_back')->order('pick_id DESC')->limit($limit)->select();
		$this->assign('pcinfo',$pcinfo);
		$this->assign('page',$show);
		$this->display();
	}

	//删除捡到表的数据
	public function delete(){
		$pick_id = I('pick_id');
		if(M('picks')->delete($pick_id)){
			$this->success('删除成功',U('Home/PickInfo/index'));
        }else{
        $this->error();
        }
	}    

    //确认是否归还
    public function confirm(){
		$pick_id = I('pick_id');
		if(M('picks')->where("pick_id = $pick_id")->setfield('if_give_back','1')){
			$this->success('确认成功',U('Home/PickInfo/index'));
        }else{
        $this->error();
        }    

	}
}