$(function(){
	var timer;
	
	$.fn.extend({
		slide:function(list){
			var obj = $(this);
			var size = $(this).find(".list").size();
			
			$(this).attr({'index':0,'last':0,'flag':true});
			
			for(var i=0; i<size; i++){
				$(this).find(".pt").append("<span></span>");
				
				if(i==0){
					$(this).find(".list:eq("+i+")").css({'left':"0%"});
				}else{
					$(this).find(".list:eq("+i+")").css({'left':"100%"});
				}
			}
			$(this).find(".pt span:eq(0)").addClass('selected');
			
			$(this).find(".pt span").click(function(e) {
				var flag = obj.attr("flag");
				if(flag){
					var index = $(this).index();
					listRun(index,obj,list.t1);
				}
			});
			
			$(this).mouseover(function(e) {
			   clearInterval(timer); 
			}).mouseout(function(e) {
				listAutoRun(obj,size,list.t2);
			});
			
			if(size>1){
				listAutoRun(obj,size,list.t2);
			}
		}	
	});
	
	
	function listAutoRun(obj,size,autoTime){
		timer = setInterval(function(){
			var flag = obj.attr("flag");
			var index = obj.attr("index");
			
			if(eval(flag)){
				index++;
				if(index>=size){
					index = 0;
				}
				obj.attr("index",index);
				listRun(index,obj);
			}
		},autoTime);	
	}
	
	function listRun(index,obj,time){
		var last = obj.attr("last");
		
		if(index != last){
			obj.attr({'flag':false});
			
			obj.find(".pt span").removeClass('selected');
			obj.find(".pt span:eq("+index+")").addClass('selected');
			
			obj.find(".list:eq("+last+")").stop(true,false).animate({left:'-100%'},time,function(){
				$(this).css({'left':'100%'});
				obj.attr({"last":index,'flag':true});
			});
			obj.find(".list:eq("+index+")").stop(true,false).animate({left:'0%'},time);
		}
	}
});