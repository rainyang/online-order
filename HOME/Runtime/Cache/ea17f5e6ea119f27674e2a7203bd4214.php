<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OrderOnline -- Personal Center</title>
<link rel="stylesheet" href="__PUBLIC__/Index/css/reset.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/top.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/personal.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/foot.css" />
<style>
	@import url(__PUBLIC__/Index/css/reset.css);
	@import url(__PUBLIC__/Index/css/public.css);
	@import url(__PUBLIC__/Index/css/top.css)(min-width:940px);
	@import url(__PUBLIC__/Index/css/top_768-940.css)(min-width:768px) and (max-width:940px);
	@import url(__PUBLIC__/Index/css/top_640-768.css)(min-width:640px) and (max-width:768px);
	@import url(__PUBLIC__/Index/css/top_480-640.css)(min-width:480px) and (max-width:640px);
	@import url(__PUBLIC__/Index/css/top_480under.css)(max-width:480px);
	
	@import url(__PUBLIC__/Index/css/foot.css)(min-width:940px);
	@import url(__PUBLIC__/Index/css/foot_768-940.css)(min-width:768px) and (max-width:940px);
	@import url(__PUBLIC__/Index/css/foot_640-768.css)(min-width:640px) and (max-width:768px);
	@import url(__PUBLIC__/Index/css/foot_480-640.css)(min-width:480px) and (max-width:640px);
	@import url(__PUBLIC__/Index/css/foot_480under.css)(max-width:480px);
</style>
<script type="text/javascript" src="__PUBLIC__/Index/js/jquery-1.7.1.js"></script>
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
            	<span class="t1">Please Enter Your Address:</span><input class="b1" type="text" value="Street Address, City, State" /><br />
                <span class="t2">What would you like? (optional):</span><input class="b2" type="text" value="tuna melt, John's Subs, Italian" />
            </div>
        	<a class="btn" href="<?php echo U('Dishes/results');?>">
            	<img src="__PUBLIC__/Index/images/search_btn.gif" />
            	<p>Search Restaurants</p>
            </a>
        </div>
        
        <div class="personal">
        	<div class="title"><span class="s1">Your Order</span><span class="s2">Reviews</span></div>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="list t1">
            	<p class="p1">Current Order</p>
                <a class="a1" href="#"><?php echo W('ShowRestaurant',array('id'=>$vo['restaurant_id']));?></a>
                <p class="p2">Ordered on <?php echo date('F d Y',$vo['create_time']);?> at <?php echo date('H:i A',$vo['create_time']);?></p>
               <?php if(is_array($vo['carts'])): $i = 0; $__LIST__ = $vo['carts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><p class="p3">You ordered <?php echo ($v['quantity']); ?> <span><?php echo W('ShowDishesName',array('dishes_id'=>$v['dishes_id'],'type'=>'1'));?>.</span></p><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="d1"><span>See receipt</span><a href="#">Order Again</a></div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
           
        </div>
        	
    </div>
    <div class="foot"></div>
	<div class="popup_layer"></div>
</body>
</html>