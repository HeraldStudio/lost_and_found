<?php
	$username=$_POST["username"];
	$password=$_POST["password"];
	if($username=="123" && $password=="abc")
	{
		setcookie('HERALD_USER_SESSION_ID', 12345, time()+3600000, '/');
		$return_info['code']=200;
		$return_info['data']="{\"truename\":\"强哥\",\"cardnum\":213111111}";
	}
	else
	{
		$return_info=array("code"=>1);
	}
	echo json_encode($return_info);
?>