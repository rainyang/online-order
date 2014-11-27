$(function(){
	var w,h;
	var time = 500;

    //初始的默认宽度
    var default_width = 1024;
	
	var reviewsRt  = $(".reviews .list ul li .rt").width();
	
	init();
	
	function init(){
		w = $(window).width();
		h = $(window).height();

        var scrolls = $(window).scrollTop();
        //console.log(scrolls );
        $(".detail_layer").css("margin-top", scrolls - 200);

		//浏览器窗口大小
		windowSize(w);
		//搜索输出框
		searchBox();
		//显示星星结果
		starShow();
		//购物车事件
		shoppingCart();
		//下拉框
		drupBox();
		//加载弹出框
		loadPopupLayer();
		//加载foot页面
		loadFootPage();
		
		/* ----------home页面----------------------  */
		//coupons More点击事件
		couponsMore();
		
		/* ----------order页面----------------------  */
		//订单页面送货方式
	    orderType();
		
		/* ----------detail页面----------------------  */
		//弹出菜品详细页面
		detailShowLayer();
		
		/* ----------top页面----------------------  */
		top();
		
	}
	
	//搜索框 input焦点事件
	function searchBox(){
		$(".search_box .left input:eq(0)").focusin(function(e){
			$(this).attr('value','');
		});
		$(".search_box .left input:eq(1)").focusin(function(e){
			$(this).attr('value','');
		});
		$(".coupons .title input").focusin(function(e){
			$(this).attr('value','');
		});
		$(".reviews .title input").focusin(function(e){
			$(this).attr('value','');
		});
		$(".search_box .left input:eq(0)").focusout(function(e) {
			var val = $(this).attr('value');
			if(val == ''){
				$(this).attr('value','Street Address, City, State');
			}
        });
		$(".search_box .left input:eq(1)").focusout(function(e) {
			var val = $(this).attr('value');
			if(val == ''){
				$(this).attr('value',"tuna melt, John's Subs, Italian");
			}
        });
		$(".coupons .title input").focusout(function(e) {
			var val = $(this).attr('value');
			if(val == ''){
				$(this).attr('value',"Street Address, City, State");
			}
        });
		$(".reviews .title input").focusout(function(e) {
			var val = $(this).attr('value');
			if(val == ''){
				$(this).attr('value',"Street Address, City, State");
			}
        });
	}
	
	//窗口变化
	$(window).resize(function(e) {
        w = $(window).width();
		h = $(window).height();
		
		windowSize(w);  
    });
	
	//判断浏览器的窗口宽度
	function windowSize(w){
		if(w < default_width){
			$(".container").css({'width':w});
			$(".foot_in").css({'width':w});
			mobileSize(w);
			$(".shopping_cart").css('right',0);
		}else{
			$(".container").css({'width':default_width+'px'});
			$(".foot_in").css({'width':default_width+'px'});
			$(".shopping_cart").css("right",(w-default_width)/2+'px');
			normalSize(w);
		}
	}
	
	function normalSize(w){
		var temp = default_width - 179;
		$(".search_box .left").css({'width':temp});
		$(".reviews .list ul li .rt").css({'width':reviewsRt});
	}
	
	//移动端宽度尺寸
	function mobileSize(w){
		if(480 < w < default_width){
			var temp = w - 179;
			$(".search_box .left").css({'width':temp});
		}
		
		var tempreviewsRt = reviewsRt - (default_width - w)/2;
		$(".reviews .list ul li .rt").css({'width':tempreviewsRt});
	}

	//输出星星结果
	function starShow(){
		$(".star").each(function(index, element) {
            var num = $(this).attr('num');
			
			for(var i=0; i<num; i++){
				$(this).append("<span></span>");
			}
        });
	}

	//coupons列表
	function couponsMore(){
		$(".coupons .more").click(function(e) {
            for(var i=0; i<16; i++){
				$(".coupons .list ul").append('<li><a href="#"><img src="images/test_img1.gif" /><p>易迅优惠劵</p></a></li>');
			}
			return false;
        });
	}
	
	
	//购物车事件
	function shoppingCart(){
		$(".shopping_cart .cart_title").click(function(e) {
            var num = $(".shopping_cart .cart_title .lt").attr("num");
			if(num == 0){
				var flag = $(this).attr("flag");
				
				if(eval(flag)){
					$(this).attr('flag',false);
					showShoppingCart(true);
				}else{
					$(this).attr('flag',true);
					showShoppingCart(false);
				}
			}
        });
		
		$(".shopping_cart .cart_title .lt").mouseover(function(e) {
            $(this).attr('num',1);
        }).mouseout(function(e) {
            $(this).attr('num',0);
        });
	}
	
	//显示/隐藏购物车
	function showShoppingCart(flag){
		var cart_h = $(".shopping_cart ul").height()+20;

		if(flag){
			$(".shopping_cart ul").stop(true,false).animate({top:-cart_h},time);
		}else{
			$(".shopping_cart ul").stop(true,false).animate({top:0},time);
		}	
	}
	
	//下拉框事件
	function drupBox(){
		$(".drop_box").mouseover(function(e) {
            $(".drop_box ul").hide();
			$(this).find("ul").show();
        }).mouseout(function(e) {
            $(".drop_box ul").hide();
        });
	}
	
	
	//订单页面送货方式
	//订单页面送货方式
	function orderType(){
		$(".page_order .mode input").change(function(e) {
            var val = $(this).val();
			
			if(val == 1){
				$(".page_order .info").show();
				$(".page_order .mode .dine").hide();
				$(".page_order .pay").show(); 
				$(".page_order .pay2").hide();
				$(".order_list .person").hide();
			}else if(val == 2){
				$(".page_order .info").hide();
				$(".page_order .mode .dine").hide();
				$(".page_order .pay").show(); 
				$(".page_order .pay2").hide();
				$(".order_list .person").hide();
			}else if(val == 3){
				$(".page_order .info").hide();
				$(".page_order .mode .dine").show();
				$(".page_order .pay").hide(); 
				$(".page_order .pay2").show();
				
				$(".order_list .person").show();
			}
        });
		
		$(".page_order .info .add").click(function(e) {
            var dis = $(".page_order .info .rt .new").css("display");
			if(dis == 'none'){
				$(".page_order .info .rt .new").css("display",'block');
			}else{
				$(".page_order .info .rt .new").css("display",'none');
			}
			return false;
        });
		
		$(".page_order .info .new .close").click(function(e) {
            $(".page_order .info .rt .new").css("display",'none');
			return false;
        });
		
		$(".pay .rt .d2 input").change(function(e) {
            var val = $(this).val();
			
			if(val == 1){
				$(".pay .rt .pay_type").hide();
			}else if(val == 2){
				$(".pay .rt .pay_type").show();
			}else if(val == 3){
				$(".pay .rt .pay_type").hide();
			}
        });
	}

    //优惠券列表
    $(".btn-coupons").click(function(e)
    {
        //console.log('111');
        var scrolls = $(window).scrollTop();
        $(".popup_layer").show();
        initLayer($(".coupon_layer"));
        $(".coupon_layer").show();

        //使弹出框始终保持在屏幕的偏上方,可见
        $(".coupon_layer").css("margin-top", scrolls + 100);

        $.ajaxSettings.async = false;         
        $.getJSON(getResCouponsUrl, {res_id : res_id}, function(data){
            var content = '';
            $.each(data, function(i, item){
                var coupons_item_list = '';
                if(item.type == 3){
                    coupons_item_list = getCouponsItem(item);
                    console.log('coupons_item:' + coupons_item_list);
                }
                var disabled = (item.min_order < order.subTotal) ? '' : 'disabled'; //不满足条件的不能选择
                content += '<div class="d1"><input name="coupons_radio" id="coupons_item_'+item.id+'" class="coupons_radio" '+disabled+' type="radio" value="'+item.id+'" /><span><label for="coupons_item_'+item.id+'">'+ item.title +'</label></span></div><div class="coupons_detail hide" data-id="'+item.id+'"><p>'+ item.desc+'</p>' + coupons_item_list +'</div>';
            });

            //加一个none的选项,可取消使用优惠券
            content += '<div class="d1"><input name="coupons_radio" id="coupons_item_none" class="coupons_radio" type="radio" value="none" /><span><label for="coupons_item_none">None</label></span></div>';
            $('#coupons_list').html(content);
        });
    });

    //确定使用优惠券
    $('#btn-coupons-confirm').live("click", function(){
        //用户选择的优惠券id
        var coupon_id = $('input:radio[name="coupons_radio"]:checked').val();
        //用户选择了赠菜，菜的id
        var coupon_item_id = $('input:radio[name="give_item"]:checked').val();
        if(coupon_item_id === undefined){
            coupon_item_id = 0;
        }

        //计算优惠信息，并根据不同优惠类别显示,暂时不这么做了
        //getDiscountInfo(coupon_id);

        setCouponInfo(coupon_id);

        //存储优惠信息到cookie, todo:优惠信息存储多久? 存储时间长了可能优惠信息就下架了，时间短了是否合适
        var couponData = {
                    res_id : res_id, 
                    coupon_id: coupon_id, 
                    coupon_item_id: coupon_item_id
            };

        $.post(useCouponUrl, couponData, function(data){
            console.log(data);
        });

        $(".popup_layer").hide();
        $(".coupon_layer").hide();
    });

    function setCouponInfo(id){
        if(!id){
            alert('No selected items');
            return false; 
        }

        if (id === 'none') {
            $('.order .mode .coupon-info').remove();
        }

        $.getJSON(getCouponsInfoUrl, {id : id}, function(data){
            //1折扣，2抵现，3赠菜，4专属优惠
            $('.order .mode').append('<li class="coupon-info">You have been using coupons</li>');
        });

    }

    //获得优惠券赠送的菜品信息
    function getCouponsItem(data){
        //$.ajaxSettings.async = false;         
        var contents = '';
        $.getJSON(getCouponsItemUrl, {coupons_id : data.id}, function(res){
            //console.log(res);
            $.each(res, function(i, item){
                contents += '<p><input name="give_item" type="radio" id="give_item_radio_'+ item.id +'" value="'+ item.id +'"> <label for="give_item_radio_'+ item.id +'">'+item.item_name+'</label></p>';
            });

            //console.log(contents);
        });
        return contents;
    }

    //获得优惠券详细信息,
    //todo:暂时不这么做了,本函数暂时不使用
    function getDiscountInfo(id){
        if(!id){
            alert('No selected items');
            return false; 
        }

        if (id === 'none') {
            console.log('none');
            order.coupons_type = 'none';
            order.calSubTotal();
        }

        $.getJSON(getCouponsInfoUrl, {id : id}, function(data){
            //1折扣，2抵现，3赠菜，4专属优惠
            switch (data.type){
                case "1":
                    order.coupons_type = data.type;
                    order.discount = data.discount;
                    order.calSubTotal();
                    break;
                case "2":
                    order.coupons_type = data.type;
                    order.cash = data.cash;
                    order.calSubTotal();
                    break;
                case "3":
                    var give_item = $('input:radio[name="give_item"]:checked').val();
                    order.coupons_type = data.type;
                    order.cash = data.cash;
                    //order.calSubTotal();
                    break;
                default:
                    break;
            }

        });
    }

    $('.coupons_radio').live('click', function(){
        $('.coupons_detail').hide();
        $('.coupons_detail[data-id='+$(this).val()+']').show();
    });
	
	//显示菜单弹出层
	function detailShowLayer(){
		$(".detail .context .list ul li").click(function(e) {
			var resid = $(this).attr('resid');
			var disid = $(this).attr('disid');
			var packid = $(this).attr('packid');
            var scrolls = $(window).scrollTop();

			if(!packid){
				additem(resid,disid);
	            $(".popup_layer").show();
			    //initLayer($(".popup_layer .detail_layer"));
			    $(".popup_layer .detail_layer").show();
                $(".detail_layer").css("margin-top", scrolls + 100);
			}else{
				$(".popup_layer").show();
                $(".popup_layer .package_layer").css("margin-top", scrolls + 100);
			    //initLayer($(".popup_layer .package_layer"));
			    $(".popup_layer .package_layer").show();
				addpackage(resid,packid);
			}
			
        });	

        
		
		$(".popup_layer .close").live('click',function(e) {
			$(".package_layer .context .d2 .d2_title").empty();
			//window.location.reload();
            $(".popup_layer").hide();
			$(".popup_layer .layer").hide();

			return false;
        });
		
		$(".detail .contact .book a").click(function(e) {
			
            $(".popup_layer").show();
		    initLayer($(".popup_layer .booking_layer"));
            $(".popup_layer .booking_layer").show();
			var resid = $(this).attr("resid");
			$("#bk_resid").val(resid);
        });
		
		$(".detail .ico .star label").click(function(e) {
           $(".popup_layer").show();
		   initLayer($(".popup_layer .reviews_layer"));
		   $(".popup_layer .reviews_layer").show();
		   return false;
        });	
		$(".detail .shop .introduction .p4").click(function(e) {
			var resid = $(this).attr("resid");
			reviews(resid);
           $(".popup_layer").show();
		   initLayer($(".popup_layer .reviews_layer"));
		   $(".popup_layer .reviews_layer").show();
		   return false;
        });	
		$(".detail .shop .introduction .p4 a").click(function(e) {
			var resid = $(this).attr("resid");
			reviews(resid);
           $(".popup_layer").show();
		   initLayer($(".popup_layer .reviews_layer"));
		   $(".popup_layer .reviews_layer").show();
		   return false;
        });	
	}
	
    $('.please_login').live('click', function(){
        $(".popup_layer .layer").hide();
		initLayer($(".popup_layer .login_layer"));
        $(".popup_layer .login_layer").show();
        $('html, body').animate({scrollTop:0}, 'slow');
    });

	function top(){
		$(".top .btn1 .login").click(function(e) {
		    $(".popup_layer").show();
		   initLayer($(".popup_layer .login_layer"));
            $(".popup_layer .login_layer").show();
        });
		
		$(".top .btn1 .regist").click(function(e) {
		    $(".popup_layer").show();
		   initLayer($(".popup_layer .create_layer"));
            $(".popup_layer .create_layer").show();
        });
		
		$(".login_layer .fgt").live('click',function(e) {
			$(".popup_layer .layer").hide();
		   initLayer($(".popup_layer .forgot_layer"));
			$(".popup_layer .forgot_layer").show();
        });
	}
	
	//加载弹出框
	function loadPopupLayer(){
		$(".popup_layer").load('/index.php?s=Member/layer');
        var body_height = $("body").height();
        var foot_height = $(".foot").height();
        $(".popup_layer").css("height", body_height + 430);

        $(".popup_layer").css("position", "absolute");
        //$(".popup_layer").css("position", "fixed");
		
	}

    /*
     *$(window).scroll(function() {
     *    var scrolls = $(this).scrollTop();
     *    console.log(scrolls );
     *    $(".detail_layer").css("margin-top", "700px");
     *    $(".popup_layer").css("position", "absolute");
     *});
     */

	//加载foot
	function loadFootPage(){
		$(".foot").load('/index.php?s=Index/foot');
	}
	
	var layerObj;
	function initLayer(obj){
		var obj_h = obj.height();
		layerObj = obj;
		
		var marginTop = (h - obj_h)*.5;
		
		if(marginTop<0){
			marginTop = 0;
		}
		obj.css('margin-top',marginTop);
		
		/* 火狐*/
        /*
		if(document.addEventListener){
			document.addEventListener('DOMMouseScroll',scrollFunc,false);
		}
		window.onmousewheel=document.onmousewheel=scrollFunc;//IE/Opera/Chrome/Safari
        */
	}
	
	//鼠标滚动事件
	function scrollFunc(e,obj){
		var direct = 0;
		e = e || window.event;
		
		var mx_h = parseInt(layerObj.css('margin-top'));
		
		if(e.wheelDelta){//IE/Opera/Chrome
			direct = e.wheelDelta /120;
		}else if(e.detail){//Firefox
			direct = -e.detail /3;
		}
		
		//判断滚动方向
		if(direct>0){
			mx_h += 3;	
			layerObj.css('margin-top',mx_h)
		}else{
			mx_h -= 3;	
			layerObj.css('margin-top',mx_h)
		}
	}

    //套餐最大选择几项,注意必须把事件绑定到checkbox上，否则会出现两次事件
    $(".item_check_select input[type='checkbox']").live('click', function(event){
        var max_select = $(this).closest('ul').attr('max-select');
        
        if(max_select !== undefined){
            var lis = $(this).closest('ul').find("input");
            var max_item = 0;
            $(this).closest('ul').find("input").each(function(){
                //console.log($(this).attr('checked'));
                if($(this).attr('checked') =='checked'){
                    max_item += 1;
                }
            });
            //console.log(max_item);
            if(max_item >= max_select){
                //$(this).closest('ul').find("input:checkbox[checked='false']").attr("disabled", "disabled");
                //console.log($(this).closest('ul').find("input:checkbox[checked!='checked']"));
                $(this).closest('ul').find("input:checkbox[checked!='checked']").attr("disabled", "disabled");
            }
            else{
                $(this).closest('ul').find("input").removeAttr("disabled");
            }
        }
    });

});


