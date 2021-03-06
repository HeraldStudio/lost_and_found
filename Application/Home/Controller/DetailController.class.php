<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller {
    public function index(){
    	//进行登录检查
    	if (0/* 未登录 */) {
    		$returnInfo["status"]="1";	//未登录错误
    		echo json_encode($returnInfo);
    		return;
    	}
    	//
    	if(I('post.infoType')=="lose" || I('post.infoType')=="pick"){
    		$receiveInfo["infoType"]=I('post.infoType');
    	}else{
    		$returnInfo["status"]="2";	//请求参数错误
    		echo json_encode($returnInfo);
    		return;
    	}
    	$receiveInfo["id"]=I('post.id');

    	//获取详细信息
    	$detailMod=D('Detail');
		$outputArray=$detailMod->addDetail($receiveInfo);
        //

        $image=new \Think\Image();  //图像处理模型

         //对图片进行尺寸设置
        $conWidth=390; $conHeight=390;  //设置容器尺寸，修改时只对此一处进行修改
        list($width, $height, $type, $attr)=getimagesize($outputArray["picture_url"]);
        if(!$type){
            $outputArray["picture_url"]="Public/pictures/".$outputArray["type"].".jpg";
            list($width, $height, $type, $attr)=getimagesize($outputArray["picture_url"]);
        }

        if($width/$height > $conWidth/$conHeight){
            $outputArray["width"]=$conWidth;
            $outputArray["height"]=$height/$width*$conWidth;
            $outputArray["marginLeft"]=0;
            $outputArray["marginTop"]=($conHeight-$outputArray["height"])/2;
        }else{
            $outputArray["height"]=$conHeight;
            $outputArray["width"]=$width/$height*$conHeight;
            $outputArray["marginTop"]=0;
            $outputArray["marginLeft"]=($conWidth-$outputArray["width"])/2;
        }
        //


        $this->assign($outputArray);
        $returnInfo["content"]=$this->fetch('Detail');


		$returnInfo["status"]="3";	//成功
    	echo json_encode($returnInfo); 

    }

    public function getContact(){
        if (0/* 未登录 */) {
            $returnInfo["status"]="1";  //未登录错误
            echo json_encode($returnInfo);
            return;
        }
        //
        if(I('post.infoType')=="lose" || I('post.infoType')=="pick"){
            $receiveInfo["infoType"]=I('post.infoType');
        }else{
            $returnInfo["status"]="2";  //请求参数错误
            echo json_encode($returnInfo);
            return;
        }

        $receiveInfo["id"]=I('post.id');
        $receiveInfo["infoType"]=I('post.infoType');

        $detailMod=D('Detail');
        $returnInfo["content"]=$detailMod->getContact($receiveInfo);
        $returnInfo["status"]="3";  //成功
        echo json_encode($returnInfo);
    }

    public function setComment(){
        if (0/* 未登录 */) {
            $returnInfo["status"]="1";  //未登录错误
            echo json_encode($returnInfo);
            return;
        }
        
        if(I('post.infoType')=="lose" || I('post.infoType')=="pick"){
            $receiveInfo["infoType"]=I('post.infoType');
        }else{
            $returnInfo["status"]="2";  //请求参数错误
            echo json_encode($returnInfo);
            return;
        }

        $receiveInfo["infoType"]=I('post.infoType');
        $receiveInfo["id"]=I('post.id');
        $receiveInfo["content"]=I('post.content');
        
        if($receiveInfo["infoType"]=="lose"){          
            $data = array(
                "lose_id" => $receiveInfo["id"],
                "comment" => $receiveInfo["content"],
                "datetime" => date('Y-m-d H:i:s'),
                "school_card_id" =>213123641,
                "name" =>"李盈达"
            );
            if( M('lose_comments')->data($data)->add() ){
                $returnInfo["status"]="3"; 
            }
        }else{
            $data = array(
                "pick_id" => $receiveInfo["id"],
                "comment" => $receiveInfo["content"],
                "datetime" => date('Y-m-d H:i:s'),
                "school_card_id" =>213123641,
                "name" =>"李盈达"
            );
            if( M('pick_comments')->data($data)->add() ){
                $returnInfo["status"]="3"; 
             
            }
        }

        $tables=M();
        $sqlString="select comment,name,datetime from ".$receiveInfo["infoType"]."_comments
            where ".$receiveInfo["infoType"]."_id = ".$receiveInfo['id'];
        $results=$tables->query($sqlString);

        $returnInfo["comments"]="<h4><strong>评论:</strong></h4>";
        for($i=0;$i<count($results);$i++){
            $returnInfo["comments"]=$returnInfo["comments"]."<p class='commenter'><strong>".
                $results[$i]["name"].":</strong>".$results[$i]["comment"]." (".$results[$i]["datetime"].")</p>";
        }

        echo json_encode($returnInfo);         
    }
}