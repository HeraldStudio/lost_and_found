jQuery(document).ready(function($) {
	$('#login').click(function(event) {
		var username = $('#username').val();
		var password = $('#password').val();
		if (username == ''){
			$("#logInfo").removeClass("hidden");
			$("#logInfo").addClass("alert-danger");
			$("#logInfo").html("用户名不能为空");
			return;
		}
		if (password == ''){
			$("#logInfo").removeClass("hidden");
			$("#logInfo").addClass("alert-danger");
			$("#logInfo").html("密码不能为空");
			return;
		}
		$.ajax({
			url:'Public/php/login.php',
			//url:'http://herald.seu.edu.cn/useraccount/login.php',
			type:'post',
			dataType:'json',
			data:{"username": username,"password": password},
			success:function(data){
				if(data.code == 200){
					$("#logInfo").addClass("alert-success");
					$("#logInfo").removeClass("alert-danger");
					var userInfo=JSON.parse(data.data);
					$("#logInfo").html("登陆成功, "+userInfo.truename+" 欢迎您");
					$('#username').val("");
					$('#password').val("");
					$("#login").addClass("disabled");
					$("#account").html(userInfo.truename+'<span class="glyphicon glyphicon-user"></span><b class="caret"></b>');
					$("#loginButton").addClass("disabled");
					$("#logoutButton").removeClass("disabled");
					$("#loginButton").unbind();
					$("#logoutButton").click(function(){logout();});
				}else{
					$("#logInfo").removeClass("hidden");
					$("#logInfo").removeClass("alert-success");
					$("#logInfo").addClass("alert-danger");
					$("#logInfo").html("很抱歉，登陆失败。请核对您的用户名和密码");	
				}
			},
			error:function(){
				$("#logInfo").removeClass("hidden");
				$("#logInfo").addClass("alert-danger");
				$("#logInfo").html("很抱歉，网络错误，请稍后重试");
			}
		});
	});

	$("#loginButton").click(function(){
		$("#loginModal").modal();
	});

});

function logout(){
	//发送退出请求
	$.ajax({
	url:"Public/php/logout.php",
	type:"post",
	dataType:"json",
	success:function(data){
		if(data.code==200)
		{
			$("#loginButton").removeClass("disabled");
			$("#loginButton").click(function(){
				$("#loginModal").modal();
			});
			$("#logoutButton").addClass("disabled");
			$("#logoutButton").unbind();
			$("#account").html('账户<span class="glyphicon glyphicon-user"></span><b class="caret"></b>');
			$("#logInfo").removeClass("alert-danger");
			$("#logInfo").removeClass("alert-success");
			$("#logInfo").html("&nbsp");
			$("#login").removeClass("disabled");

			alert(data.info);
		}
		else
		{
			alert("无用户登陆");
			alert(data.code);
		}
	},
	error:function(){
		alert("很抱歉，网络错误，请稍后重试");
	}
	});
}

/*
	$("#submit").click(function() {
		var cookie = $("#cookie").val();
		$.ajax({
			url: 'getloginuserinfo.php',
			type: 'post',
			dataType: 'text',
			data: {cookie: cookie},
		})
		.done(function(data) {
			console.log(data);
		  //alert(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
*/