$(function(){
	var w,h;
	var time = 500;
	
	var reviewsRt  = $(".reviews .list ul li .rt").width();
	
	init();
	
	function init(){
		w = $(window).width();
		h = $(window).height();
		
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
		if(w<940){
			$(".container").css({'width':w});
			$(".foot_in").css({'width':w});
			mobileSize(w);
			$(".shopping_cart").css('right',0);
		}else{
			$(".container").css({'width':'940px'});
			$(".foot_in").css({'width':'940px'});
			$(".shopping_cart").css("right",(w-940)/2+'px');
			normalSize(w);
		}
	}
	
	function normalSize(w){
		var temp = 940 - 179;
		$(".search_box .left").css({'width':temp});
		$(".reviews .list ul li .rt").css({'width':reviewsRt});
	}
	
	//移动端宽度尺寸
	function mobileSize(w){
		if(480 < w < 940){
			var temp = w - 179;
			$(".search_box .left").css({'width':temp});
		}
		
		var tempreviewsRt = reviewsRt - (940 - w)/2;
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
	
	//显示菜单弹出层
	function detailShowLayer(){
		$(".detail .context .list ul li").click(function(e) {
			var resid = $(this).attr('resid');
			var disid = $(this).attr('disid');
			var packid = $(this).attr('packid');
			if(!packid){
				additem(resid,disid);
	            $(".popup_layer").show();
			    initLayer($(".popup_layer .detail_layer"));
			    $(".popup_layer .detail_layer").show();
			}else{
				$(".popup_layer").show();
			    initLayer($(".popup_layer .package_layer"));
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

        //$(".popup_layer").css("position", "fixed");
		$(window).scroll(function() {
			var scrolls = $(this).scrollTop();
            //console.log(scrolls );
            //$(".popup_layer").css("position", "absolute");
        });
	}
	//加载foot
	function loadFootPage(){
		$(".foot").load('/index.php?s=Index/foot');
	}
	
	var layerObj;
	function initLayer(obj){
		var obj_h = obj.height();
		layerObj = obj;
		
		var marginTop = (h - obj_h)*0.5;
		
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

});
