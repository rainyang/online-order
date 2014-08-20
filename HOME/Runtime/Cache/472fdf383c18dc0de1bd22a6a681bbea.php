<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OrderOnline - bill</title>
<link rel="stylesheet" href="__PUBLIC__/Index/css/reset.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/top.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/bill.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/foot.css" />
<style>
	@import url(__PUBLIC__/Index/css/reset.css);
	@import url(__PUBLIC__/Index/css/public.css);
	@import url(__PUBLIC__/Index/css/top.css)(min-width:940px);
	@import url(__PUBLIC__/Index/css/top_768-940.css)(min-width:768px) and (max-width:940px);
	@import url(__PUBLIC__/Index/css/top_640-768.css)(min-width:640px) and (max-width:768px);
	@import url(__PUBLIC__/Index/css/top_480-640.css)(min-width:480px) and (max-width:640px);
	@import url(__PUBLIC__/Index/css/top_480under.css)(max-width:480px);
	
	@import url(__PUBLIC__/Index/css/bill.css)(min-width:768px) and (max-width:2000px);
	@import url(__PUBLIC__/Index/css/bill_545under.css)(max-width:545px);
	
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
        
        <div class="bill">
        	<div class="list">
                <div class="bl bill_top"></div>
                <div class="bl bill_center">
                  <div class="title clearfix"><p>Order #<?php echo ($result["bh_no"]); ?>&nbsp;(<?php if($result['bh_type'] == 3): ?>Dine In<?php elseif($result['bh_type'] == 1): ?>Delivery<?php elseif($result['bh_type'] == 2): ?>Carry Out<?php endif; ?>)</p><a href="#">Print Receipt</a></div>
                  <div class="d1 clearfix"><p>Estimated Pickup</p><label>2:10 AMish</label><img src="__PUBLIC__/Index/images/happy_eating.gif" /></div>	
                  <div class="d2">
                        Pickup Location<a href="#">Get Directions</a>
                    </div>
                  <div class="d3">
                        <div class="sweet">Sweet Station</div>
                        <span>2101 S China Pl</span>
                        <span>Chicago, IL 60616</span>
                        <span>312-842-2228</span>
                    </div>
                  <div class="d4">
                        <?php if(is_array($result_item)): $i = 0; $__LIST__ = $result_item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): ++$i;$mod = ($i % 2 )?><label><?php echo ($vi["bi_quantity"]); ?> Piece <?php echo ($vi["item_name"]); ?></label>
                        <span>$<?php echo ($vi["bi_amount"]); ?></span><br><?php endforeach; endif; else: echo "" ;endif; ?>
                        <!-- <p>Extra Seafood</p> -->
                    </div>
                    <div class="d5">
                      <table width="100%" border="0">
                          <tr>
                            <td>subtotal</td>
                            <td>$<?php echo ($subtotal); ?></td>
                        </tr>
                          <!-- <tr>
                            <td>Delivery</td>
                            <td>$1.00</td>
                        </tr>
                          <tr>
                            <td>Tax</td>
                            <td>$1.25</td>
                        </tr>
                          <tr>
                            <td>Tip</td>
                            <td>$10.00</td>
                        </tr>
                          <tr>
                            <td>TOTAL</td>
                            <td>$13.20</td> -->
                        </tr>
                      </table>
                    </div>
                    
                    <div class="d6">Payment</div>
                    <div class="d7">Cash - You'll pay when you get to the restaurant.</div>
                </div>
                <div class="bl bill_foot"></div>
            	
            </div>
        </div>
    </div>
    <div class="foot"></div>
	<div class="popup_layer"></div>
</body>
</html>