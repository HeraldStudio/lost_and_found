jQuery(document).ready(function() {
	 $("#pc_send").click(function(){
	 var tp="pc";
	clicktype(tp);
	});

	  $("#ls_send").click(function(){
	   tp="ls";
	clicktype(tp);
	 });


	function clicktype(tp){//判断点击事件的类型	
	var place = $("#"+tp+"_place").val();
	var datetime = $("#"+tp+"_datetime").val();
	var contact = $("#"+tp+"_contact").val();
	var thing_describe = $("#"+tp+"_thing_describe").val();
	var type = $("#"+tp+"_type").val();
	var fileinput = $("#"+tp+"_picture").val();
	var thing_name = $("#"+tp+"_thing_name").val();
	var if_has_picture;
	var formdata = new FormData();
	if(thing_name==''){
		alert("物品名称不能为空");
		tp+'_things_name'.focus();
		return;
	}
	if (place == ''){
			alert("地点不能为空");
		tp+'_place'.focus();
			return;
	}
	if (datetime == ''){
			alert("时间不能为空");
			return;
	}
	if(fileinput){
		if_has_picture = 1;
		fileinput = document.getElementById(tp+"_picture");
		var file = fileinput.files[0];
		formdata.append("picture[]", file);
	}else{
		if_has_picture = 0;

	}
				formdata.append("tp",tp);
				formdata.append("if_has_picture", if_has_picture);
				formdata.append("place",place);
				formdata.append("thing_name", thing_name);
				formdata.append("datetime", datetime);
				formdata.append("contact", contact);
				formdata.append("thing_describe", thing_describe);
				formdata.append("type", type);
				if (formdata) {
   				$.ajax({
		        url: "../FormHandle/form",
		        type: "POST",
		        data:formdata,
		        processData: false,
		        contentType: false,
		        success: function (data) {
				if(data.status){
				alert('发布成功');
				$("#"+data.tp).modal('hide'); 
				}else{
				alert('发布失败');
				$("#"+data.tp).modal('hide'); 
				}
			}
		})
   			}
	   	}		

});