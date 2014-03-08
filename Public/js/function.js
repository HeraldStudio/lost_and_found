//全局变量
	var addButton = new addButtonClass();
	var loadContent = new loadContetnClass();
//'

jQuery(document).ready(function(){
	//初始化加载
	loadContent.normalLoad();
	//'

	$(window).resize(function() {winResize();});

	$("#allInfo").click(function(){loadContent.allInfo();	});
	$("#allInf2").click(function(){loadContent.allInfo();});
	$("#othersPick").click(function(){loadContent.othersPick();});
	$("#someonePick2").click(function(){loadContent.othersPick();});
	$("#othersLose").click(function(){loadContent.othersLose();});
	$("#someoneLose2").click(function(){loadContent.othersLose();});

	$("#filterBtn").click(function(){
		switch(loadContent.getMode()){
			case "allInfo": case "othersLose": case "othersPick": case "search":
				$("#filter").modal();
				break;
			default:
				alert("不好意思，这里不能进行类型筛选");
		}
	});

	$("#ourHonor2").click(function(){
		switch(loadContent.getMode()){
			case "allInfo": case "othersLose": case "othersPick": case "search":
				$("#filter").modal();
				break;
			default:
				alert("不好意思，这里不能进行类型筛选");
		}
	});

	$("#filterOK").click(function(){filterOK();});

	$("#achievements").click(function(){loadContent.achievements();});

	$("#search").click(function(){
		search(globalLoseId, globalPickId, addNum, true);
	});

	$("#hide").click(function(){
		$("#commentBox").animate(
			{
				height:0
			},
			400
		);
	});
});


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
	$("#submit").unbind();
	$("#commentContent").val("");
	$("#commentBox").animate(
		{
			height:100
		},
		400
	);
	$("#submit").click(function(){
		setComment(infoType, commentId, $("#commentContent").val());
	});

}

function setComment(infoType, commentId, commentContent){
	$.ajax({
		url:'index.php/Home/Detail/setComment',
		type:'post',
		dataType:'json',
		data:{"infoType": infoType, "id": commentId, "content": commentContent },
		success:function(data){
			if(data.status==1){
				alert("很抱歉，查看详细信息需要登录，请您先登录");
				return;
			}
			if(data.status==2){
				alert("无效请求，请您正常操作");
				return;
			}
			alert("评论成功");
		},
		error:function(){
			alert("很抱歉，网络错误，请稍后重试");
		}
	});



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
				$(".getContact").click(function(){
					if( $(this).hasClass("lose") ) var type="lose";
					else var type="pick";
					getContact(type, this.id);
				});
		},
		error:function(){
			alert("很抱歉，网络错误，请稍后重试");
		}
	});
}

function getContact(type, id){
	$.ajax({
		url:'index.php/Home/Detail/getContact',
		type:'post',
		dataType:'json',
		data:{"infoType": type, "id": id },
		success:function(data){
			if(data.status==1){
				alert("很抱歉，查看详细信息需要登录，请您先登录");
				return;
			}
			if(data.status==2){
				alert("无效请求，请您正常操作");
				return;
			}
			alert("联系方式："+data.content);
		},
		error:function(){
			alert("很抱歉，网络错误，请稍后重试");
		}
	});
}

function filterOK(){
	var typeSelect=new Array();
		typeSelect["stationery"]=$("#stationery").is(":checked");
		typeSelect["electronic"]=$("#electronic").is(":checked");
		typeSelect["card"]=$("#card").is(":checked");
		typeSelect["money"]=$("#money").is(":checked");
		typeSelect["keys"]=$("#keys").is(":checked");
		typeSelect["others"]=$("#others").is(":checked");
	var beginTime=$("#dtp_input1").val();
	var endTime=$("#dtp_input2").val();
	var searchInput=$("#searchInput").val();
	loadContent.setTypeSelect(typeSelect, beginTime, endTime, searchInput);
	loadContent.search();
	$("#filter").modal("hide");
}

function addButtonClass(){
	var btn=new Object;
	btn.loading=function(){
			$("#addmore").html("……正在加载……");
			$("#addmore").unbind();
	}
	btn.stop=function(){
		$("#addmore").html("加载更多");
		 switch(loadContent.getMode()){
		 	case "allInfo": case "othersPick": case "othersLose":
		 		$("#addmore").click(function(){
			 		loadContent.normalLoad(false);
			 	});
			 	break;
		 	case "achievements":
		 		$("#addmore").click(function(){
		 			loadContent.achievements();
		 		});
		 		break;
		}
	}
	btn.noMore=function(){
		$("#addmore").html("已全部加载");
		$("#addmore").unbind();
	}
	return btn;
}

//这里采用面向对象的方式加载信息，之前用独立过程，到这里时已经324行，且管理复杂
function loadContetnClass(){
	var loseId=0;
	var pickId=0;
	var addCount=3;	//设置每次加载的个数 
	var mode="allInfo";
	var typeSelect=new Array();
		typeSelect["stationery"]=true;
		typeSelect["electronic"]=true;
		typeSelect["card"]=true;
		typeSelect["money"]=true;
		typeSelect["keys"]=true;
		typeSelect["others"]=true;
	var beginTime=0;
	var endTime=0;
	var searchInput="";

	
	this.getMode=function(){
		return mode;
	}

	this.setTypeSelect=function(typeArray, time1, time2, search){
		typeSelect=typeArray;
		beginTime=time1;
		endTime=time2;
		searchInput=search;
	}

	this.ajaxLoad=function(postUrl, postJson, clean){	
		addButton.loading();
		$.ajax({
			url: postUrl,
			type:'post',
			dataType:'json',
			data: postJson,
			success:function(data){
				loseId=data.loseId;
				pickId=data.pickId;

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
		if(clean){
			//对提示卡片信息进行修改
			var tipInner="";
			switch(loadContent.getMode()){
				case "allInfo":
					tipInner+="全部信息<br>";
					break;
				case "othersLose":
					tipInner+="有人丢失<br>";
					break;
				case "othersPick":
					tipInner+="有人捡到<br>";
					break;
				case "achievements":
					tipInner+="成绩展示<br>";
			}
			if(loadContent.getMode()!="achievements"){
				tipInner=tipInner+"时间范围：<br>"+beginTime+"<br>至"+endTime;
				tipInner=tipInner+"<br>名称匹配：<br>"+searchInput;
			}
			$("#tipInner").html(tipInner);
		}
	}

	this.normalLoad=function(clean){
		postUrl='index.php/Home/AddContent/index';
		postJson={"loseId": loseId, "pickId": pickId, "addCount": addCount,
			typeFilter:{
				stationery: typeSelect["stationery"],
				electronic: typeSelect["electronic"],
				card: typeSelect["card"],
				money: typeSelect["money"],
				keys: typeSelect["keys"],
				others: typeSelect["others"]
			},
			"beginTime": beginTime, "endTime":endTime, "searchInput":searchInput
		};
		this.ajaxLoad(postUrl, postJson, clean);
	}
	this.allInfo=function(){
		var clean;
		if(mode!="allInfo"){
			mode="allInfo"; pickId=0; loseId=0;
			this.normalLoad(clean=true);
		}
	}
	this.othersLose=function(){
		var clean;
		if(mode!="othersLose"){
			mode="othersLose"; pickId=-1; loseId=0;
			this.normalLoad(clean=true);
		}
	}
	this.othersPick=function(){
		var clean;
		if(mode!="othersPick"){
			mode="othersPick"; pickId=0; loseId=-1;
			this.normalLoad(clean=true);
		}		
	}

	this.achievements=function(){
		var clean;
		if(mode!="achievements"){
			mode="achievements"; pickId=0; loseId=0;
			clean=true;
		}else{
			clean=false;
		}
		postUrl='index.php/Home/AddContent/achievements';
		postJson={"loseId": loseId, "pickId": pickId, "addCount": addCount}
		this.ajaxLoad(postUrl, postJson, clean);
	}

	this.search=function(){
		if(pickId>0) pickId=0;
		if(loseId>0) loseId=0;
		this.normalLoad(true);
	}
}