$(function(){
	
	$(".qty").live('change',function(){
		var qty = parseInt($(this).val());
		var obj = $(this).parents(".num").siblings(".total").find("p");
		var price = parseFloat($(this).parents(".num").siblings(".price").html().substr(1));
		var total = qty*price;
		if(obj.length > 0){
			$(this).parents(".num").siblings(".total").find("p").html("$"+total.toFixed(2));
		}else{
			$(this).parents(".num").siblings(".total").html("$"+total.toFixed(2));	
		}
		$(this).parents(".num").siblings(".name").children(".p1").children("span").html(qty);
		
		var obj1 = $(".total1 span");
		if(obj1.length > 0){
			var total = 0;
			$("input[name='sid']:checkbox").each(function(){
				if($(this).attr("checked")){
					total = total+parseFloat($(this).parents(".name").siblings(".total").find("p").html().substr(1));	
				}
			})	
			$(".total1 span").html("$"+total.toFixed(2));
		}
		var obj3 = $("input[name='sid']");
		if(obj3.length>0){
			var  ids = "";
			$("input[name='sid']").each(function(){
				if($(this).attr("checked")){
				var sid = $(this).val();
					if(ids == ""){
						ids = sid;	
					}else{
						ids += ","+sid;	
					}
				}
			})
		}
		var id = $(this).parents(".num").attr("s_id");
		$.post("index.php?s=Order/changeQty",{id:id,type:"change",num:qty,ids:ids},function(rs){
			//alert(rs);return false;
				var obj2 = $(".table");
				if(obj2.length>0){
					var length = rs.length;
					for(var i=0;i<length;i++){
						var html = html+'<tr class="line"><td class="pername">'+rs[i]['person']+'</td><td class="perprice" align="right"><p>$'+rs[i]['total_price']+'</p></td></tr>';	
					}
					$(".table").find(".line").remove();
					$(".table").prepend(html);	
				}
		},'json')
	})
	
    //减法
	$(".reduce").live('click',function(){
		var qty = parseInt($(this).siblings(".qty").val());
        console.log(qty);
		if(qty > 1){
			$(this).siblings(".qty").val(qty-1);
			var obj = $(this).parents(".num").siblings(".total").find("p");
			var price = parseFloat($(this).parents(".num").siblings(".price").html().substr(1));
			if(obj.length > 0){
				var total = parseFloat($(this).parents(".num").siblings(".total").find("p").html().substr(1))-price;
				$(this).parents(".num").siblings(".total").find("p").html("$"+total.toFixed(2));
			}else{
				var total = parseFloat($(this).parents(".num").siblings(".total").html().substr(1))-price;
				$(this).parents(".num").siblings(".total").html("$"+total.toFixed(2));
			}
			$(this).parents(".num").siblings(".name").children(".p1").children("span").html(qty-1);
		}else{
			$(this).parents(".list").remove();	
		}
		
		
		var obj1 = $(".total1 span");
		if(obj1.length > 0){
			var total = 0;
			$("input[name='sid']:checkbox").each(function(){
				if($(this).attr("checked")){
					total = total+parseFloat($(this).parents(".name").siblings(".total").find("p").html().substr(1));	
				}
			})	
			$(".total1 span").html("$"+total.toFixed(2));
		}
		var obj3 = $("input[name='sid']");
		if(obj3.length>0){
			var  ids = "";
			$("input[name='sid']").each(function(){
				if($(this).attr("checked")){
				var sid = $(this).val();
					if(ids == ""){
						ids = sid;	
					}else{
						ids += ","+sid;	
					}
				}
			})
		}
		var id = $(this).parents(".num").attr("s_id");
		$.post("index.php?s=Order/changeQty",{id:id,type:"reduce",ids:ids},function(rs){
			var obj2 = $(".table");
				if(obj2.length>0){
					var length = rs.length;
					for(var i=0;i<length;i++){
						var html = html+'<tr class="line"><td class="pername">'+rs[i]['person']+'</td><td class="perprice" align="right"><p>$'+rs[i]['total_price']+'</p></td></tr>';	
					}
					$(".table").find(".line").remove();
					$(".table").prepend(html);	
				}	
		},'json')
	})

	$(".add").live('click',function(){
		var qty = parseInt($(this).siblings(".qty").val());
		$(this).siblings(".qty").val(qty+1);
		var obj = $(this).parents(".num").siblings(".total").find("p");
		var price = parseFloat($(this).parents(".num").siblings(".price").html().substr(1));
		if(obj.length > 0){
			var total = parseFloat($(this).parents(".num").siblings(".total").find("p").html().substr(1))+price;
			$(this).parents(".num").siblings(".total").find("p").html("$"+total.toFixed(2));		
		}else{
			var total = parseFloat($(this).parents(".num").siblings(".total").html().substr(1))+price;
			$(this).parents(".num").siblings(".total").html("$"+total.toFixed(2));		
		}
		
		$(this).parents(".num").siblings(".name").children(".p1").children("span").html(qty+1);
		
		var obj1 = $(".total1 span");
		if(obj1.length > 0){
			var total = 0;
			$("input[name='sid']:checkbox").each(function(){
				if($(this).attr("checked")){
					total = total+parseFloat($(this).parents(".name").siblings(".total").find("p").html().substr(1));	
				}
			})	
			$(".total1 span").html("$"+total.toFixed(2));
		}
		var obj3 = $("input[name='sid']");
		if(obj3.length>0){
			var  ids = "";
			$("input[name='sid']").each(function(){
				if($(this).attr("checked")){
				var sid = $(this).val();
					if(ids == ""){
						ids = sid;	
					}else{
						ids += ","+sid;	
					}
				}
			})
		}
		var id = $(this).parents(".num").attr("s_id");
		$.post("index.php?s=Order/changeQty",{id:id,type:"add",ids:ids},function(rs){
				var obj2 = $(".table");
				if(obj2.length>0){
					var length = rs.length;
					for(var i=0;i<length;i++){
						var html = html+'<tr class="line"><td class="pername">'+rs[i]['person']+'</td><td class="perprice" align="right"><p>$'+rs[i]['total_price']+'</p></td></tr>';	
					}
					$(".table").find(".line").remove();
					$(".table").prepend(html);	
				}
		},'json')
	})
	
	
	$(".act a").live("click",function(){
		$(this).parents(".list").remove();
		var id = $(this).attr("s_id");
		$.post("index.php?s=Order/delCart",{id:id},function(rs){
		},'json')
	})
					
	recommendList();	
		//recommend展示效果
	function recommendList(){
		var size = $(".recommend .list").size();
		$(".recommend").i_scroll();
	}
});
