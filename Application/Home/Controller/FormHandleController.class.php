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
            "if_has_picture" =>I('if_has_picture')
            );
    	if(M('picks')->data($data)->add()){
    		$data['status']=1;
            $this->AjaxReturn($data,'json');
        }else{
        	$data['status']=0;
            $this->AjaxReturn($data,'json');
        }
    }
	public function upload(){
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize =  3145728 ;// 设置附件上传大小
	    $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->savePath = './Public/pictures/picks/'; // 设置附件上传目录
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功
	        $this->success('上传成功！');
	    }
	}
}
?>