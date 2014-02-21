//全局变量
	var globalLoseId=0;
	var globalPickId=0;
	var addNum=2;	//设置每次加载的个数 
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

	$("#filterOK").click(function(){filterOK();});

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
		$("#addmore").click(function(){
			addContent(globalLoseId, globalPickId, addNum);
		});
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
	alert(infoType+" detail"+detailId);
}

function allInfo(){
	if(!(globalLoseId>=0 && globalPickId>=0)){	//筛选方向有变化
		globalLoseId=0;
		globalPickId=0;
		addContent(globalLoseId, globalPickId, addNum, true);
	}
}

function othersPick(){
	if(!(globalLoseId<0 && globalPickId>=0)){	//筛选方向有变化
		globalLoseId=-1;
		globalPickId=0;
		addContent(globalLoseId, globalPickId, addNum, true);
	}
}

function othersLose(){
	if(!(globalLoseId>=0 && globalPickId<0)){	//筛选方向有变化
		globalLoseId=0;
		globalPickId=-1;
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