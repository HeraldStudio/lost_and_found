//全局变量
	var globalLoseId=0;
	var globalPickId=0;
	var addNum=12;	//设置每次加载的个数
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
	addContent(0,0,addNum);
	//'

	$(window).resize(function() {
		winResize();
	});

});

function addContent(loseId,pickId,addCount){	//count为加载的数量
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
			//加载具体内容
			globalLoseId=data.loseId;
			globalPickId=data.pickId;
			$("#content-inner").append(data.content);
			if(data.ifEnd)
			{
				addButton.noMore();
				exit;
			}
			//'
			addButton.stop();
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
			addContent(globalPickId,globalLoseId,addNum);
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
		comment(this.id);
	});

	$(".detail").unbind();
	$(".detail").click(function(){
		detail(this.id);
	});

	$(".con-pic").unbind();
	$(".con-pic").click(function(){
		detail(this.id);
	});	
}

function comment(commentId){
	alert("comment"+commentId);
}

function detail(detailId){
	alert("detail"+detailId);
}