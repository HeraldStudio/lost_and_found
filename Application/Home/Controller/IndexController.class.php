<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//获取用户登录信息
        $cookie=$_COOKIE["HERALD_USER_SESSION_ID"];
        $PostResult=$this->send_post("http://herald.seu.edu.cn/useraccount/getloginuserinfo.php", $cookie);
        //'
    	if($PostResulta["code"]==200){
    		$info["username"]=$PostResult["data"]["truename"];
    		$info["class1"]="disabled";
    		$info["class2"]="";
    	}else{
    		$info["username"]="账户";
        	$info["class2"]="disabled";
    		$info["class1"]="";
    	}
    	//'
    	$this->assign($info);
		$this->display();
    }

    private function send_post($url, $post_data) {  
        $postdata = http_build_query($post_data);  
        $options = array(  
            'http' => array(  
                'method' => 'POST',  
                'header' => 'Content-type:application/x-www-form-urlencoded',  
                'content' => $postdata,  
                'timeout' => 15 * 60 // 超时时间（单位:s）  
            )  
        );  
      $context = stream_context_create($options);  
      $result = file_get_contents($url, false, $context);  
      return $result;  
    } 
}