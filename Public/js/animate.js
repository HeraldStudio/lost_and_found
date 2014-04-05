
var headValueCon=250;
var headPosition="down";
$(window).scroll(function(){
	var navHeight=document.getElementById("navbar").clientHeight;
	navHeight=-180-navHeight;

	var top=$(window).scrollTop();
	if(top>=headValueCon && headPosition=="down"){
		//alert("正常上升");
		headPosition="changingToUp";
		//执行动画过程
		$("#myHead").animate(
			{
				top:navHeight  //隐藏
			},
			500,	//speed
			function(){
				headPosition="up";
				pinUp();
				tipUp();
				vBarShow();
			}
		);
		//'
	}
	else if(top<headValueCon && headPosition=="up"){
		//alert("正常下降");
		headPosition="changingToDown";
		//执行动画过程
		tipDown();
		vBarHide();
		$("#pin").animate(
			{
				bottom:cilentHeight-330,
				opacity:0
			},
			500,	//speed
			function(){
				headDown();
			}
		);
		//'		
	}
	else if(top<headValueCon && headPosition=="changingToUp")
	{
		$("#myHead").stop();
		$("#pin").stop(true);
		$("#tip").stop();
		$(".vBar").stop();
		$(".vBar2").stop();
		headPosition="changingToDown";
		tipDown();
		headDown();
		vBarHide();
		$("#pin").animate(
			{
				bottom:cilentHeight-330,
				opacity:0
			},
			500
		);
	}
	else if(top>=headValueCon && headPosition=="changingToDown")
	{
		$("#myHead").stop();
		$("#pin").stop(true);
		$("#tip").stop();
		$(".vBar").stop();
		$(".vBar2").stop();
		headPosition="changingToUp";
		tipUp();
		pinUp();
		vBarShow();
		$("#myHead").animate(
			{
				top:navHeight
			},
			500,
			function(){
				headPosition="up";
			}
		);
	}
});

var cilentHeight=document.documentElement.clientHeight;
function pinUp(){
	cilentHeight=document.documentElement.clientHeight;
	$("#pin").animate(
		{
			bottom:cilentHeight-90,
			opacity:1
		},
		600
	);
	$("#pin").animate(
		{
			bottom:cilentHeight-130
		},
		300,	//speed
		function(){

		}
	);
}

function tipUp(){
	$("#tip").animate(
		{
			bottom:cilentHeight-305,
			opacity:1
		},
		700,	//speed
		function(){

		}
	);	
}

function tipDown(){
	$("#tip").animate(
		{
			bottom:cilentHeight-505,
			opacity:0
		},
		300,	//speed
		function(){
			
		}
	);	
}

function headDown(){
	$("#myHead").animate(
		{
			top:0
		},
		500,
		function(){
			headPosition="down";
		}
	);
}

function vBarShow(){
	$(".vBar").animate(
		{
			right:10
		},
		300,	//speed
		function(){
			
		}
	);

	$(".vBar2").animate(
		{
			right:12
		},
		300
	);
}

function vBarHide(){
	$(".vBar").animate(
		{
			right:-17
		},
		300,	//speed
		function(){
	
		}
	);

	$(".vBar2").animate(
		{
			right:-15
		},
		300,	//speed
		function(){
			$(".vBar2").css({"width":"12px"});
			$(".vBar2").removeClass("vBarExtend");
		}
	);
}

$(".vBar2").mouseover(function(){
	$(this).stop();
	$(this).animate(
		{
			width:100
		},
		200,
		function(){
			$(this).addClass("vBarExtend");
		}
	);
});

$(".vBar2").mouseout(function(){
	$(this).stop();
	$(this).removeClass("vBarExtend");
	$(this).animate(
		{
			width:12
		},
		200,
		function(){

		}
	);
});

$("#closeLogin").click(function(){
	$("#loginModal").modal('hide');
});
$("#closeLogin2").click(function(){
	$("#loginModal").modal('hide');
});
$("#closeFilter").click(function(){
	$("#filter").modal('hide');
});
$("#closeFilter2").click(function(){
	$("#filter").modal('hide');
});
$("#closeDetail").click(function(){
	$("#detail").modal('hide');
});
$("#closeDetail2").click(function(){
	$("#detail").modal('hide');
});

$('.form_datetime').datetimepicker({
    //language:  'fr',
    weekStart: 1,
    todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	forceParse: 0,
    showMeridian: 1
});