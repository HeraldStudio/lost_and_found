<?php
/*	if(!empty($_COOKIE["HERALD_USER_SESSION_ID"]))
	{
		setcookie('HERALD_USER_SESSION_ID',null,time()-36000);
		$return_info['code']=200;
		$return_info['info']=$_COOKIE["HERALD_USER_SESSION_ID"];
	}
	else
	{
		$return_info['code']=3;
	}
	echo json_encode($return_info);	*/

	$return_info=send_post("http://herald.seu.edu.cn/useraccount/logout.php", $_COOKIE["HERALD_USER_SESSION_ID"]);
	echo $return_info;

	function send_post($url, $post_data) {  
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
?>
