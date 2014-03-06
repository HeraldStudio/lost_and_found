//全局变量
	var globalLoseId=0;
	var globalPickId=0;
	var globalIfAchievements=false;
	var addNum=3;	//设置每次加载的个数 
	var addButton=new addButtonClass();
	var typeSelect=new Array();
		typeSelect["stationery"]=true;
		typeSelect["electronic"]=true;
		typeSelect["card"]=true;
		typeSelect["money"]=true;
		typeSelect["keys"]=true;
		typeSelect["others"]=true;

//'

jQuery(document).ready(function(){
	//初始化加载
	addContent(globalLoseId,globalPickId,addNum);
	//'

	$(window).resize(function() {
		winResize();
	});

	$("#allInfo").click(function(){allInfo();});
	$("#allInf2").click(function(){allInfo();});
	$("#othersPick").click(function(){othersPick();});
	$("#someonePick2").click(function(){othersPick();});
	$("#othersLose").click(function(){othersLose();});
	$("#someoneLose2").click(function(){othersLose();});

	$("#filterBtn").click(function(){
		if(globalIfAchievements==false){
			$("#filter").modal();
		}else{
			alert("不好意思，这里不能进行类型筛选");
		}
	});

	$("#ourHonor2").click(function(){
		if(globalIfAchievements==false){
			$("#filter").modal();
		}else{
			alert("不好意思，这里不能进行类型筛选");
		}
	});

	$("#filterOK").click(function(){filterOK();});

	$("#achievements").click(function(){
		if(!globalIfAchievements){
			globalLoseId=0;
			globalPickId=0;
			globalIfAchievements=true;
			achievements(globalLoseId, globalPickId, addNum, true);
		}
	});

	$("#search").click(function(){
		search();
	});

});

function addContent(loseId,pickId,addCount,clean){	//count为加载的数量
	addButton.loading();
	$.ajax({
		url:'index.php/Home/AddContent/index',
		type:'post',
		dataType:'json',
		data:{"loseId": loseId, "pickId": pickId, "addCount": addCount,
		typeFilter:{
				stationery: typeSelect["stationery"],
				electronic: typeSelect["electronic"],
				card: typeSelect["card"],
				money: typeSelect["money"],
				keys: typeSelect["keys"],
				others: typeSelect["others"]
			}
		},
		success:function(data){
			if(data.status=="error"){
				alert("无效请求，请正常操作");
				return;
			}
			globalLoseId=data.loseId;
			globalPickId=data.pickId;
		//	alert("loseid:"+globalLoseId+"  pickid:"+globalPickId);
			if(clean){
				if(data.content!=undefined){
					$("#content-inner").html(data.content);
				}else{
					$("#content-inner").html("");
				}
			}else{
				$("#content-inner").append(data.content);
			}
			if(data.ifEnd){
				addButton.noMore();
			}else{
				addButton.stop();
			}
			winResize();
			reBindConFun();
		},
		error:function(){
			alert("很抱歉，网络错误，请稍后重试");
			addButton.stop();
		}
	});
}

function addButtonClass(){
	var ifLoading=false;
	var btn=new Object;
	btn.loading=function(){
		ifLoading=true;
		if(ifLoading){
			$("#addmore").html("……正在加载……");
			$("#addmore").unbind();
		}
	}
	btn.stop=function(){
		ifLoading=false;
		$("#addmore").html("加载更多");
		if(globalIfAchievements==false){
			$("#addmore").click(function(){
				addContent(globalLoseId, globalPickId, addNum, false);
			});
		}else{
			$("#addmore").click(function(){
				achievements(globalLoseId, globalPickId, addNum, false);
			});
		}
	}
	btn.noMore=function(){
		$("#addmore").html("已全部加载");
		$("#addmore").unbind();
	}
	return btn;
}

function winResize(){
	var containerWidth=parseInt($("#container").css("width"));
	var count=parseInt(containerWidth/280);
	var marginLR=parseInt(containerWidth%280/count/2)+15+"px";
	$(".content").css("margin-left",marginLR);
	$(".content").css("margin-right",marginLR);
}

function reBindConFun(){
	$(".comment").unbind();
	$(".comment").click(function(){
		if ($(this).hasClass("btnLose")) {
			comment("lose", this.id);
		}else{
			comment("pick", this.id);
		}
	});

	$(".detail").unbind();
	$(".detail").click(function(){
		if ($(this).hasClass("btnLose") ){
			detail("lose", this.id);
		}else{
			detail("pick", this.id);
		}
	});

	$(".con-pic").unbind();
	$(".con-pic").click(function(){
		if ($(this).hasClass("btnLose")) {
			detail("lose", this.id);
		}else{
			detail("pick", this.id);
		}
	});	
}

function comment(infoType, commentId){
	alert(infoType+" comment"+commentId);
}

function detail(infoType, detailId){
	$.ajax({
		url:'index.php/Home/Detail/index',
		type:'post',
		dataType:'json',
		data:{"infoType": infoType, "id": detailId },
		success:function(data){
			if(data.status==1){
				alert("很抱歉，查看详细信息需要登录，请您先登录");
				return;
			}
			if(data.status==2){
				alert("无效请求，请您正常操作");
				return;
			}
			$("#detail-content").html(data.content);
			$("#detail").modal();
		},
		error:function(){
			alert("很抱歉，网络错误，请稍后重试");
		}
	});
}

function allInfo(){
	if(!(globalLoseId>=0 && globalPickId>=0 && globalIfAchievements==false)){	//筛选方向有变化
		globalLoseId=0;
		globalPickId=0;
		globalIfAchievements=false;
		addContent(globalLoseId, globalPickId, addNum, true);
	}
}

function othersPick(){
	if(!(globalLoseId<0 && globalPickId>=0 && globalIfAchievements==false)){	//筛选方向有变化
		globalLoseId=-1;
		globalPickId=0;
		globalIfAchievements=false;
		addContent(globalLoseId, globalPickId, addNum, true);
	}
}

function othersLose(){
	if(!(globalLoseId>=0 && globalPickId<0 && globalIfAchievements==false)){	//筛选方向有变化
		globalLoseId=0;
		globalPickId=-1;
		globalIfAchievements=false;
		addContent(globalLoseId, globalPickId, addNum ,true);
	}
}

function filterOK(){
	typeSelect["stationery"]=$("#stationery").is(":checked");
	typeSelect["electronic"]=$("#electronic").is(":checked");
	typeSelect["card"]=$("#card").is(":checked");
	typeSelect["money"]=$("#money").is(":checked");
	typeSelect["keys"]=$("#keys").is(":checked");
	typeSelect["others"]=$("#others").is(":checked");
	if(globalLoseId>0) globalLoseId=0;
	if(globalPickId>0) globalPickId=0;
	$("#filter").modal('hide');
	addContent(globalLoseId, globalPickId, addNum ,true);
}

function achievements(loseId,pickId,addCount,clean){
	addButton.loading();
	$.ajax({
		url:'index.php/Home/AddContent/achievements',
		type:'post',
		dataType:'json',
		data:{"loseId": loseId, "pickId": pickId, "addCount": addCount,},
		success:function(data){
			globalLoseId=data.loseId;
			globalPickId=data.pickId;
		//	alert("loseid:"+globalLoseId+"  pickid:"+globalPickId);
			if(clean){
				if(data.content!=undefined){
					$("#content-inner").html(data.content);
				}else{
					$("#content-inner").html("");
				}
			}else{
				$("#content-inner").append(data.content);
			}

			if(data.ifEnd){
				addButton.noMore();
			}else{
				addButton.stop();
			}
			winResize();
			reBindConFun();
		},
		error:function(){
			alert("很抱歉，网络错误，请稍后重试");
			addButton.stop();
		}
	});
}

function search(){
	var val =$("#searchInput").val();
	alert(val);
}