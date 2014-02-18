<?php
	if(!empty($_COOKIE["HERALD_USER_SESSION_ID"]))
	{
		setcookie('HERALD_USER_SESSION_ID',null,time()-36000);
		$return_info['code']=200;
		$return_info['info']=$_COOKIE["HERALD_USER_SESSION_ID"];
	}
	else
	{
		$return_info['code']=3;
	}
	echo json_encode($return_info);
?>
