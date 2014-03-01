jQuery(document).ready(function() {
	 $("#pc_send").click(function(){
	var thing_name = $('#pc_thing_name').val();
	var place = $('#pc_place').val();
	var datetime = $('#pc_datetime').val();
	var contact = $('#pc_contact').val();
	var thing_describe = $('#pc_thing_describe').val();
	var type = $('#pc_type').val();
	var if_has_picture = $("input[name='pc_has_picture']:checked").val();
	if(thing_name==''){
		alert("物品名称不能为空");
		ls_things_name.focus();
		return;
	}
	if (place == ''){
			alert("地点不能为空");
			ls_place.focus();
			return;
	}
	if (datetime == ''){
			alert("时间不能为空");
			ls_datetime.focus();
			return;
	}

	$.ajaxFileUpload
				        (
				            {
				                url:'index.php/home/UpFile/upload', 
				                secureuri:false,
				                fileElementId:'pc_picture',
				                dataType: 'json',
				                success: function (data, status)
				                {
				                    data;
				                },
				                error: function (data, status, e)
				                {
				                    alert(e);
				                }
				            }
				        )

				        
	$.post('index.php/home/FormHandle/picksform',
	{'thing_name':thing_name,'type':type,'place':place,'datetime':datetime,'contact':contact,'thing_describe':thing_describe,'if_has_picture':if_has_picture},
		function(data){
			if(data.status){
				alert('发布成功');
				$("#picks").modal('hide'); 
			}else{
				alert('发布失败');
				$("#picks").modal('hide'); 
			}
		},'json');
	});

	   $("#ls_send").click(function(){
	var thing_name = $('#ls_thing_name').val();
	var place = $('#ls_place').val();
	var datetime = $('#ls_datetime').val();
	var contact = $('#ls_contact').val();
	var thing_describe = $('#ls_thing_describe').val();
	var type = $('#ls_type').val();
	var if_has_picture = $("input[name='ls_has_picture']:checked").val();
	if(thing_name==''){
		alert("物品名称不能为空");
		ls_things_name.focus();
		return;
	}
	if (place == ''){
			alert("地点不能为空");
			ls_place.focus();
			return;
	}
	if (datetime == ''){
			alert("时间不能为空");
			ls_datetime.focus();
			return;
	}

	$.ajaxFileUpload
				        (
				            {
				                url:'index.php/home/UpFile/lupload', 
				                secureuri:false,
				                fileElementId:'ls_picture',
				                dataType: 'json',
				                success: function (data, status)
				                {
				                    data;
				                },
				                error: function (data, status, e)
				                {
				                    alert(e);
				                }
				            }
				        )

	$.post('index.php/home/FormHandle/losesform',
	{'thing_name':thing_name,'type':type,'place':place,'datetime':datetime,'contact':contact,'thing_describe':thing_describe,'if_has_picture':if_has_picture},
		function(data){
			if(data.status){
				alert('发布成功');
				$("#loses").modal('hide'); 
			}else{
				alert('发布失败');
				$("#loses").modal('hide'); 
			}
		},'json');
	});

});