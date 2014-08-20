$(function(){
	var timer;
	var index = 0;
	var last = 0;
	var time = 500;
	var autoTime = 5000;
	
	var flag = true;
	
	$.fn.extend({
		i_scroll:function(){
			var obj = $(this);
			var size = $(this).find(".list").size();
			
			for(var i=0; i<size; i++){
				$(this).find(".point").append("<span></span>");
				
				if(i==0){
					$(this).find(".list:eq("+i+")").css({'left':"0%"});
				}else{
					$(this).find(".list:eq("+i+")").css({'left':"100%"});
				}
			}
			$(this).find(".point span:eq(0)").addClass('selected');
			
			$(this).find(".point span").click(function(e) {
				if(flag){
					index = $(this).index();
					listRun(index,obj);
				}
			});
			
			/*
			$(this).mouseover(function(e) {
			   clearInterval(timer); 
			}).mouseout(function(e) {
				listAutoRun(obj,size);
			});
			
			listAutoRun(obj,size);
			*/
		}	
	});
	
	
	function listAutoRun(obj,size){
		timer = setInterval(function(){
			if(flag){
				index++;
				if(index>=size){
					index = 0;
				}
				listRun(index,obj);
			}
		},autoTime);	
	}
	
	function listRun(index,obj){
		if(index != last){
			flag = false;
			
			obj.find(".point span").removeClass('selected');
			obj.find(".point span:eq("+index+")").addClass('selected');
			
			obj.find(".list:eq("+last+")").stop(true,false).animate({left:'-100%'},time,function(){
				$(this).css({'left':'100%'});
				last = index;
				flag = true;
			});
			obj.find(".list:eq("+index+")").stop(true,false).animate({left:'0%'},time);
		}
	}
});