//评论弹出框读取数据
function reviews(resid){
	$("#restaurant_id").val(resid);
	$.post("/index.php?s=Restaurant/reviews",{resid:resid},function(rs){
		var length  = rs.length;
		for(var i=0;i<length;i++){
			$(".reviews_layer .context .list .p1").eq(i).html(rs[i]['title']);
			$(".reviews_layer .context .list .p2").eq(i).html(rs[i]['content']);	
			var obj = $(".reviews_layer .context .list .star").eq(i);
			starShow(obj,rs[i]['star']);
		}
	})
	
}

//增加项目弹出框数据
function additem(resid,disid){
	$("#additem_resid").val(resid);
	$("#additem_disid").val(disid);
	$(".additem_error").html('');
	$.post("/index.php?s=Dishes/additem",{resid:resid,disid:disid},function(rs){
		//console.log(rs);
		$('.detail_layer .context .list .clearfix').empty();
		$('.detail_layer .context .d2 .d2_title').empty();
		$('.detail_layer .context .d1 .lt .p1').html(rs['dishes']['item_name']);
		$('.detail_layer .context .d1 .lt .p2').html('$'+rs['dishes']['price']);
		$('.detail_layer .context .d1 .lt .p3').html(rs['dishes']['description']);
		
		if(rs['dishes']['imagesrc'] != ''){
			$('.detail_layer .context .d1 img').attr('src',rs['dishes']['imagesrc']);	
		}else{
			$('.detail_layer .context .d1 img').attr('src','/Public/Images/no-pictrue.jpg');		
		}
		var htm = '<a href="javascript:;" id="additem_submit">Add Item</a>';
		var htm0 = '<a href="javascript:;" style="color:#999;border:none;">Not in the supply period</a>';
		var htm2 = '<a href="javascript:;" style="color:#999;border:none;">Please login</a>';
			if(rs['dishes']['open'] == '0'){
				 $('.detail_layer .context .d4 .d4_submit').html(htm0);
			}else if(rs['dishes']['open'] == '2'){
				$('.detail_layer .context .d4 .d4_submit').html(htm2);	
			}else{
				$('.detail_layer .context .d4 .d4_submit').html(htm);	
				}
		var length = rs['items'].length;
		for(var i=0;i<length;i++){
			$('.detail_layer .context .d2 .d2_title').html(rs['items'][i]['item_name']);
			var item_length = rs['items'][i]['item'].length;
			for(var j=0;j<item_length;j++){
				if(rs['items'][i]['item'][j]['type'] == '0'){
					var html = '<li><input type="radio" name="radio'+rs['items'][i]['id']+'" value="'+rs['items'][i]['item'][j]['id']+'"/><span>'+rs['items'][i]['item'][j]['item_name']+'</span><p>+$'+rs['items'][i]['item'][j]['add_price']+'</p></li>';
				}else{
					var html = '<li><input type="checkbox" name="checkbox'+rs['items'][i]['item'][j]['id']+'" value="'+rs['items'][i]['item'][j]['id']+'"/><span>'+rs['items'][i]['item'][j]['item_name']+'</span><p>+$'+rs['items'][i]['item'][j]['add_price']+'</p></li>';
				}
				$('.detail_layer .context .list .clearfix').append(html);
			}	
		}
	},'json')
	
	
}
//增加套餐弹出框数据
function addpackage(resid,packid){
	$("#additem_pack_resid").val(resid);
	$("#additem_packid").val(packid);
	//$("#additem_disid").val(disid);
	$(".additem_error").html('');
	$.post("/index.php?s=Dishes/additem",{resid:resid,packid:packid},function(rs){
		console.log(rs);//return false;
		$('.package_layer .context .d2 .d2_title').html('<h1 class="site-h1">'+rs['group'][0]['package_name']+'</h1><p class="price">$'+rs['group'][0]['price']+'</p>');
		$(rs['group']).each(function(){
			var group_id = this['id'];
			$('.package_layer .context .d2 .d2_title').append('<ul><li class="choice"><h2 class="name">'+this['group_name']+'</h2><ul class="options"></ul></li></ul>');
			if(this['group_type'] == 0){
				$(this['item_info']).each(function(){
					if(this['attr'] == undefined)
					{
						this['attr'] = '';
						$('.package_layer .context .d2 .d2_title .choice .options').append('<li class="option"><input type="radio" name="itemName['+group_id+']" value="'+this['id']+'" attr-price="'+this['attr']+'"><label><span class="name">'+this['item_name']+'</span><span class="price">'+this['attr']+'</span></label></li>');
					}else
					{
						$('.package_layer .context .d2 .d2_title .choice .options').append('<li class="option"><input type="radio" name="itemName['+group_id+']" value="'+this['id']+'" attr-price="'+this['attr']+'"><label><span class="name">'+this['item_name']+'</span><span class="price">$'+this['attr']+'</span></label></li>');
					}
					
				});
			}else if(this['group_type'] == 1){
				$(this['item_info']).each(function(){
					if(this['attr'] == undefined){
						this['attr'] = '';
						$('.package_layer .context .d2 .d2_title .choice .options').append('<li class="option"><input type="checkbox" name="itemName['+group_id+'][]" value="'+this['id']+'" attr-price="'+this['attr']+'"><label><span class="name">'+this['item_name']+'</span><span class="price">'+this['attr']+'</span></label></li>');
					}else{
						$('.package_layer .context .d2 .d2_title .choice .options').append('<li class="option"><input type="checkbox" name="itemName['+group_id+'][]" value="'+this['id']+'" attr-price="'+this['attr']+'"><label><span class="name">'+this['item_name']+'</span><span class="price">'+this['attr']+'</span></label></li>');
					}
					
				});
			}
			
		})
		
		//}
		/*$('.detail_layer .context .list .clearfix').empty();
		$('.detail_layer .context .d2 .d2_title').empty();
		$('.detail_layer .context .d1 .lt .p1').html(rs['dishes']['item_name']);
		$('.detail_layer .context .d1 .lt .p2').html('$'+rs['dishes']['price']);
		$('.detail_layer .context .d1 .lt .p3').html(rs['dishes']['description']);*/
		
		/*if(rs['dishes']['imagesrc'] != ''){
			$('.detail_layer .context .d1 img').attr('src',rs['dishes']['imagesrc']);	
		}else{
			$('.detail_layer .context .d1 img').attr('src','/Public/Images/no-pictrue.jpg');		
		}*/
		var htm = '<a href="javascript:;" id="addpackage_submit">Add Item</a>';
		var htm0 = '<a href="javascript:;" style="color:#999;border:none;">Not in the supply period</a>';
		var htm2 = '<a href="javascript:;" style="color:#999;border:none;">Please login</a>';
			if(rs['dishes']['open'] == '0'){
				 $('.package_layer .context .d4 .d4_submit').html(htm0);
			}else if(rs['dishes']['open'] == '2'){
				$('.package_layer .context .d4 .d4_submit').html(htm2);	
			}else{
				$('.package_layer .context .d4 .d4_submit').html(htm);	
				}
		/*var length = rs['items'].length;
		for(var i=0;i<length;i++){
			$('.detail_layer .context .d2 .d2_title').html(rs['items'][i]['item_name']);
			var item_length = rs['items'][i]['item'].length;
			for(var j=0;j<item_length;j++){
				if(rs['items'][i]['item'][j]['type'] == '0'){
					var html = '<li><input type="radio" name="radio'+rs['items'][i]['id']+'" value="'+rs['items'][i]['item'][j]['id']+'"/><span>'+rs['items'][i]['item'][j]['item_name']+'</span><p>+$'+rs['items'][i]['item'][j]['add_price']+'</p></li>';
				}else{
					var html = '<li><input type="checkbox" name="checkbox'+rs['items'][i]['item'][j]['id']+'" value="'+rs['items'][i]['item'][j]['id']+'"/><span>'+rs['items'][i]['item'][j]['item_name']+'</span><p>+$'+rs['items'][i]['item'][j]['add_price']+'</p></li>';
				}
				$('.detail_layer .context .list .clearfix').append(html);
			}	
		}*/
	},'json')
	
	
}


//输出星星结果
	function starShow(obj,num){
		obj.each(function(index, element) {
            //var num = $(this).attr('num');
			$(this).empty();
			for(var i=0; i<num; i++){
				$(this).append("<span></span>");
			}
        });
	}
