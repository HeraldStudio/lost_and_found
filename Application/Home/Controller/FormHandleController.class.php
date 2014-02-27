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
            "if_has_picture" =>I('if_has_picture'),
            "update_time" =>date('Y-m-d H:i:s'),
            "if_give_back"=>false
            );      
    	if(M('picks')->data($data)->add()){
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
            "if_has_picture" =>I('if_has_picture'),
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