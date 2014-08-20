<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OrderOnline - yourOrder</title>
<link rel="stylesheet" href="__PUBLIC__/Index/css/reset.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/top.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/your_order.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/foot.css" />
<style>
	@import url(__PUBLIC__/Index/css/reset.css);
	@import url(__PUBLIC__/Index/css/public.css);
	@import url(__PUBLIC__/Index/css/top.css)(min-width:940px);
	@import url(__PUBLIC__/Index/css/top_768-940.css)(min-width:768px) and (max-width:940px);
	@import url(__PUBLIC__/Index/css/top_640-768.css)(min-width:640px) and (max-width:768px);
	@import url(__PUBLIC__/Index/css/top_480-640.css)(min-width:480px) and (max-width:640px);
	@import url(__PUBLIC__/Index/css/top_480under.css)(max-width:480px);
	
	@import url(__PUBLIC__/Index/css/your_order.css)(min-width:940px);
	@import url(__PUBLIC__/Index/css/your_order_768-940.css)(min-width:768px) and (max-width:940px);
	@import url(__PUBLIC__/Index/css/your_order_640-768.css)(min-width:640px) and (max-width:768px);
	@import url(__PUBLIC__/Index/css/your_order_480-640.css)(min-width:480px) and (max-width:640px);
	@import url(__PUBLIC__/Index/css/your_order_480under.css)(max-width:480px);
	
	@import url(__PUBLIC__/Index/css/foot.css)(min-width:940px);
	@import url(__PUBLIC__/Index/css/foot_768-940.css)(min-width:768px) and (max-width:940px);
	@import url(__PUBLIC__/Index/css/foot_640-768.css)(min-width:640px) and (max-width:768px);
	@import url(__PUBLIC__/Index/css/foot_480-640.css)(min-width:480px) and (max-width:640px);
	@import url(__PUBLIC__/Index/css/foot_480under.css)(max-width:480px);
</style>
<script type="text/javascript" src="__PUBLIC__/Index/js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/list_scroll.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/yourOrder.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/main.js"></script>
</head>

<body>
	<div class="container">
    	<div class="top clearfix">
        	<a href="/"><img class="logo" src="__PUBLIC__/Index/images/logo.gif" /></a>
           <?php if(cookie("OrderOnlineAuth") == ""): ?><div class="btn btn1">
            	<a class="login" href="#">Sign In</a>
            	<a class="regist" href="#">Create Your Account</a>
            </div>
            <?php else: ?>
            <div class="btn btn2">
            	<a class="quit" href="<?php echo U('Member/logout');?>">Sign out</a>
            	<a class="chris" href="<?php echo U('Member/personal');?>"><?php echo ($member_name); ?></a>
                <a class="cart" href="<?php echo U('Member/yourOrder');?>">Cart(<?php echo ($member_count); ?>)</a>
            </div><?php endif; ?>
        </div>
        
       <div class="search_box clearfix">
            <div class="left clearfix">
            <form name="form" method="post" id="form" action="<?php echo U('Dishes/results');?>">
                <span class="t1">Please Enter Your Address:</span><input class="b1" type="text" id="address" name="address" value="Street Address, City, State" /><br />
                <span class="t2">What would you like? (optional):</span><input class="b2" type="text" name="taste" value="tuna melt, John's Subs, Italian" />
                <input type="hidden" id="coordinate" name="lat" value="">
                <input type="hidden" id="map" >
                </form>
            </div>
                <a class="btn" href="javascript:;" id="btn_go">
                <img src="__PUBLIC__/Index/images/search_btn.gif" />
                <p>Search Restaurants</p>
                </a>
        </div>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("#btn_go").click(function()
                {
                    $("#form").submit();
                    return false;
                });
            });
        </script>
        
        <div class="page_order">
        	<div class="title clearfix">
            	<span class="your_btn"><a href="<?php echo U('Member/yourOrder');?>">Your Order</a></span>
                <span class="place_order"><a href="<?php echo U('Member/placeOrder');?>">Place My Order</a></span>
                <span class="atr"></span>
            </div>
            
            <div class="order_list">
            	<div class="list_title clearfix">
                	<span class="name"><?php echo W('ShowRestaurant',array('id'=>$restaurant_id));?> Menu</span>
                    <span class="price">Price</span>
                    <span class="num">Qty</span>
                    <span class="total">Subtotal</span>
                    <span class="act"></span>
                </div>
                <?php if(is_array($orderlist)): $i = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="list l1 clearfix">
                	<span class="name">
                		<!--<input type="checkbox" name="checkbox" id="checkbox" />-->
                        <a href="javascrit:;"><img src="<?php echo ($vo["image"]); ?>" /></a>
                        <p class="p1"><span><?php echo ($vo["quantity"]); ?></span> Piece <?php echo ($vo["item_name"]); ?></p>
                        <p><?php echo ($vo["item"]); ?></p>
                	</span>
                    <span class="price pd">$<?php echo ($vo["price"]); ?></span>
                    <span class="num pd" s_id="<?php echo ($vo["id"]); ?>"><a class="reduce" href="javascript:;"></a><input type="text" class="qty" value="<?php echo ($vo["quantity"]); ?>" /><a class="add" href="javascript:;"></a></span>
                    <span class="total pd">$<?php echo ($vo["total_price"]); ?></span>
                    <span class="act pd"><a href="javascript:;" s_id="<?php echo ($vo["id"]); ?>"></a></span>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>  
                
            </div>
            <div class="links"><a href="<?php echo U('Member/placeOrder');?>">Place My Order ></a></div>
            
            <div class="recommend">
				<div class="rd_title">Recommend</div>
                <div class="list">
                	<?php echo W('ShowRecommon',array('id'=>$restaurant_id));?>
                </div>
                
               
                
                <div class="point"></div>
            </div>
        </div>
    </div>
    <div class="foot"></div>
	<div class="popup_layer"></div>
</body>
</html>