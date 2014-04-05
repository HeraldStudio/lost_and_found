jQuery(document).ready(function() {
	 $("#loseinfo").click(function(){
	 	var tp="loses";
		myinfo(tp);
	});

	  $("#pickinfo").click(function(){
	 	var tp="picks";
		myinfo(tp);
	});
	
	$(".confirm").click(function(){
		alert("物品是否已经找到?");
		var id = $(this).attr('id');
		var tp = $(this).attr('type');
		$.ajax({
			url: '../index/confirm',
			type:'post',
			dataType:'json',
			data:{"id":id,"tp":tp},
			success:function(data){
				alert('操作成功');
				 var url ='../index/index';
				window.location.href=url;
			},
			error:function(){
				alert("很抱歉，网络错误，请稍后重试");
			}
		});
	});


		$(".delete").click(function(){
		alert("确认删除么?");
		var id = $(this).attr('id');
		var tp = $(this).attr('type');
		$.ajax({
			url: '../index/delete',
			type:'post',
			dataType:'json',
			data:{"id":id,"tp":tp},
			success:function(data){
				alert('删除成功');
				 var url ='../index/index';
				 window.location.href=url;
			},
			error:function(){
				alert("很抱歉，网络错误，请稍后重试");
			}
		});
	});


		$(".remark").click(function(){
		var id = $(this).attr('id');
		var tp = $(this).attr('type');
		$.ajax({
			url: '../index/remark',
			type:'post',
			dataType:'json',
			data:{"id":id,"tp":tp},
			success:function(data){
				$("#remark").append(data.content);
				$("#demo"+id).modal('show');
			},
			error:function(){
				alert("很抱歉，网络错误，请稍后重试");
			}
		});
	});

		function myinfo(tp){
				$.ajax({
					url: '../index/myinfo',
					type:'post',
					dataType:'json',
					data:{"tp":tp},
					success:function(data){
						$("#add").append(data.content);
						$("#loseinfo").hide();
						$("#pickinfo").hide();
					},
					error:function(){
						alert("很抱歉，网络错误，请稍后重试");
					}
				});
			}

});