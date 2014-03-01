<?php
	$username=$_POST["username"];
	$password=$_POST["password"];
/*	if($username=="123" && $password=="abc")
	{
		setcookie('HERALD_USER_SESSION_ID', 12345, time()+3600000, '/');
		$return_info['code']=200;
		$return_info['data']="{\"truename\":\"强哥\",\"cardnum\":213111111}";
	}
	else
	{
		$return_info=array("code"=>1);
	}
	echo json_encode($return_info);	*/

	$post_data = array(  
	  'username' => $username,
	  'password' => $password 
	);

	$return_info=send_post("http://herald.seu.edu.cn/useraccount/login.php", $post_data);

	setcookie('HERALD_USER_SESSION_ID', $_COOKIE["HERALD_USER_SESSION_ID"], time()+3600000, '/');

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