jQuery(document).ready(function() {
	 $('button[name="delete"]').click(function(){
	 	var pick_id = $(“tr:eq(0) td:eq(0)”).text();
	 	alert(pick_id);
	//  $.post('../../Home/Manage/delete',
	// {'pick_id':pick_id},
	// 	function(data){
	// 		if(data.status){
	// 			alert('删除成功');
	// 		}else{
	// 			alert('删除失败');
	// 		}
	// 	},'json');
	});

});