$(".person_ok").live("click",function(){
	var person = $(this).siblings("input[name='person']").val();	
	var price = $(this).parents(".person").siblings(".total").find("p").html();
	var sid = $(this).parents(".person").siblings(".name").find("input[name='sid']:checkbox").val();
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
	$.post("/index.php?s=Member/personEdit",{sid:sid,person:person,ids:ids},function(rs){
		//alert(rs);return false;
		var length = rs.length;
		for(var i=0;i<length;i++){
			var html = html+'<tr class="line"><td class="pername">'+rs[i]['person']+'</td><td class="perprice" align="right"><p>$'+rs[i]['total_price']+'</p></td></tr>';	
		}
		$(".table").find(".line").remove();
		$(".table").prepend(html);
	},'json')
})

//  提交订单
$("#order_submit").live("click",function(){
		var data = "";
		var cart_ids = "";
		var quantity = "";
	  	$("input[name='sid']:checkbox").each(function(){
		  if($(this).attr("checked")){
			  var cid = $(this).val();
			  if(cart_ids == ""){
				  cart_ids = cid;
			  }else{
				  cart_ids = cart_ids+","+cid;	
			  }
		  }
	  })
	  if(cart_ids == ""){
			alert('Please select at least one dish.');  
	  }
	  $(".qty").each(function(){
	  		var qid = $(this).val();
	  		if(quantity == ""){
				quantity = qid;
			}else{
				quantity = quantity+","+qid;	
			}
		
	  });
	  var restaurant_id = $("input[name='restaurant_id']").val();
	  var type  = $("input[name='pick']:checked").val();
	  var payment = $("input[name='payment']:checked").val();
	  data = "cart_ids="+cart_ids+"&quantity="+quantity+"&restaurant_id="+restaurant_id+"&type="+type+"&payment="+payment;
	  if(type == "1"){
		  var addressid = $("input[name='addressid']").val();
		 data = data+"&addressid="+addressid;
	  }
	  if(type == "3"){
		var remark = $("input[name='remark1']").val(); 
		data = data+"&remark="+remark; 
	  }else{
		var remark = $("input[name='remark']").val(); 
		data = data+"&remark="+remark; 	 
		if(payment == "2"){
			var cardnum = $("input[name='cardnum']").val();
			var year = $("input[name='year']").val();
			var month = $("input[name='month']").val();
			var cvv = $("input[name='cvv']").val();
			var zip = $("input[name='zip']").val();
			var remember = $("input[name='remember']").val();
			data = data+"&cardnum="+cardnum+"&year="+year+"&month="+month+"&cvv="+cvv+"&zip="+zip+"&remember="+remember; 
		} 
		var tip = $("input[name='tip']").val();
		data = data+"&tip="+tip;
	  }
	
	$.post("index.php?s=Order/orders",data,function(rs){//alert(data);return false;
		eval("var data=" + rs + "");
		if(data.status == '0'){
			$("#add_error").html(data.msg);return false;		
		}else
		{
			window.location.href="index.php?s=Member/bill&id="+data.id;
		}
		//console.log(data);
		
	}) 
	
 })	
 	
$("input[name='sid']").live("click",function(){
		var total = parseFloat($(".total1 span").html().substr(1));
		var price = parseFloat($(this).parents(".name").siblings(".total").find("p").html().substr(1));	
		if($(this).attr("checked") == undefined){
			total = total-price;
			$(".total1 span").html("$"+total.toFixed(2));
		}else{
			total = total+price;
			$(".total1 span").html("$"+total.toFixed(2));
		}
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
		
		$.post("index.php?s=Order/getOrderlist",{ids:ids},function(rs){
					$(".table").find(".line").remove();
					var length = rs.length;
					for(var i=0;i<length;i++){
						var html = html+'<tr class="line"><td class="pername">'+rs[i]['person']+'</td><td class="perprice" align="right"><p>$'+rs[i]['total_price']+'</p></td></tr>';	
					}
					$(".table").prepend(html);	
		},'json')

	})
	$(".d3 a").live('click',function(){
		var tipht = parseFloat($(this).html());
		var total = parseFloat($(".total1 span").html().substr(1));
		var val  = parseFloat((tipht*total)/100).toFixed(2);
		$("input[name='tip']").val(val);
	})
	$("input[name='all']").live('click',function(){
		var check = $(this).attr("checked");
		var price=0;
		if(check){
			var  ids = "";
			$("input[name='sid']").each(function(){
				var sid = $(this).val();
				$(this).attr("checked",true);
				price = price+parseFloat($(this).parents(".name").siblings(".total").find("p").html().substr(1));	
				if(ids == ""){
					ids = sid;	
				}else{
					ids += ","+sid;	
				}
			})
			$(".total1 span").html("$"+price.toFixed(2));
			$.post("index.php?s=Order/getOrderlist",{ids:ids},function(rs){
					var length = rs.length;
					for(var i=0;i<length;i++){
						var html = html+'<tr class="line"><td class="pername">'+rs[i]['person']+'</td><td class="perprice" align="right"><p>$'+rs[i]['total_price']+'</p></td></tr>';	
					}
					$(".table").find(".line").remove();
					$(".table").prepend(html);	
			},'json')	
		}else{
			$("input[name='sid']").each(function(){
				$(this).attr("checked",false);	
			})
			$(".total1 span").html("$"+price.toFixed(2));	
			$(".table").find(".line").remove();	
		}
		
		
	})
	
	$(".del").live("click",function(){
		var id = $(this).siblings("input").val();
		$.post("/index.php?s=Member/delUseful",{id:id},function(rs){
			if(rs.status == '1'){
				window.location.reload();	
			}
		},'json')
	})
	$("#add_submit").live("click",function(){
		var sta = false;
		$("#add_form").find("input").each(function(){
			var type = $("#add_form").find("input").attr("type");
			if(type == "text"){
				var val = $.trim($(this).val());
				if(val == ""){
					var name = $(this).siblings("p").html();
					$("#add_error").html(name+" can not be empty");
					sta = true;
					return false;
				}
			}
		});
		if(sta){
			return false;
		}
		var data = $("#add_form").serialize();//console.log(data);return false;
			$.post("/index.php?s=Member/usefulAdd",data,function(rs){
				if(rs.status == '0'){
					$("#add_error").html(rs.msg);return false;		
				}else{
					window.location.reload();
				}
			},'json');
		
	});


