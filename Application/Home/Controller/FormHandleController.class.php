<?php
namespace Home\Controller;
use Think\Controller;
class FormHandleController extends Controller{
	Public function picksform(){
		 $data = array(
            "thing_name" =>  I('thing_name'),
            "place" => I('place'),
            "datetime" =>I('datetime'),
            "contact" =>I('contact'),
            "thing_describe" => I('thing_describe'),
            "type" =>I('type'),
            "picture_name" =>I('picture_name'),
            "update_time" =>date('Y-m-d H:i:s'),
            "if_give_back"=>false
            );
            $id =  M('picks')->data($data)->add();  
    	if($id){
            $user = M('picks');
            $user->where("pick_id = $id")->setField('picture_name',$id.'.jpg');
            $data['status']=1;
            $this->AjaxReturn($data,'json');
        }else{
        	$data['status']=0;
            $this->AjaxReturn($data,'json');
        }
    }

    Public function losesform(){
         $data = array(
            "thing_name" =>  I('thing_name'),
            "place" => I('place'),
            "datetime" =>I('datetime'),
            "contact" =>I('contact'),
            "thing_describe" => I('thing_describe'),
            "type" =>I('type'),
            "ls_picture" =>I('ls_picture'),
            "update_time" =>date('Y-m-d H:i:s'),
            "if_find"=>false
            );
        if(M('loses')->data($data)->add()){
            $data['status']=1;
            $this->AjaxReturn($data,'json');
        }else{
            $data['status']=0;
            $this->AjaxReturn($data,'json');
        }
    }

}
?>