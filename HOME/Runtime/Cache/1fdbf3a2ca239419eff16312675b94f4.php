<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OrderOnline - placeOrder</title>
<link rel="stylesheet" href="__PUBLIC__/Index/css/reset.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/top.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/place_order.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/foot.css" />
<style>
	@import url(__PUBLIC__/Index/css/reset.css);
	@import url(__PUBLIC__/Index/css/public.css);
	@import url(__PUBLIC__/Index/css/top.css)(min-width:940px);
	@import url(__PUBLIC__/Index/css/top_768-940.css)(min-width:768px) and (max-width:940px);
	@import url(__PUBLIC__/Index/css/top_640-768.css)(min-width:640px) and (max-width:768px);
	@import url(__PUBLIC__/Index/css/top_480-640.css)(min-width:480px) and (max-width:640px);
	@import url(__PUBLIC__/Index/css/top_480under.css)(max-width:480px);
	
	@import url(__PUBLIC__/Index/css/place_order.css)(min-width:940px);
	@import url(__PUBLIC__/Index/css/place_order_768-940.css)(min-width:768px) and (max-width:940px);
	@import url(__PUBLIC__/Index/css/place_order_640-768.css)(min-width:640px) and (max-width:768px);
	@import url(__PUBLIC__/Index/css/place_order_480-640.css)(min-width:480px) and (max-width:640px);
	@import url(__PUBLIC__/Index/css/place_order_480under.css)(max-width:480px);
	
	@import url(__PUBLIC__/Index/css/foot.css)(min-width:940px);
	@import url(__PUBLIC__/Index/css/foot_768-940.css)(min-width:768px) and (max-width:940px);
	@import url(__PUBLIC__/Index/css/foot_640-768.css)(min-width:640px) and (max-width:768px);
	@import url(__PUBLIC__/Index/css/foot_480-640.css)(min-width:480px) and (max-width:640px);
	@import url(__PUBLIC__/Index/css/foot_480under.css)(max-width:480px);
</style>
<script type="text/javascript" src="__PUBLIC__/Index/js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/main.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/yourOrder.js"></script>

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
            {alert(1);
                $("#btn_go").click(function()
                {
                    $("#form").submit();
                    return false;});
            });
        </script>
        
        <div class="page_order">
        	<div class="title clearfix">
            	<span class="your_btn"><a href="<?php echo U('Member/yourOrder');?>">Your Order</a></span>
                <span class="place_order"><a href="<?php echo U('Member/placeOrder');?>">Place My Order</a></span>
                <span class="atr"></span>
            </div>

            <div class="mode">Delivery or Pickup? 
              <span><input  type="radio" name="pick" id="m1" value="1" checked="checked" />Delivery</span>
              <span><input type="radio" name="pick" id="m2" value="2" />Pickup</span>
              <span><input type="radio" name="pick" id="m3" value="3" />Dine In Express </span>
              <span class="dine">Please fill in the name of the meal.</span>
            </div>
            
            <div class="info clearfix">
            	<div class="lt">Contact Info</div>
                <div class="rt">
                <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="list">
                    	<input name="addressid" type="radio" id="m4" value="<?php echo ($vo["id"]); ?>"  <?php if($key == 0): ?>checked="checked"<?php endif; ?> />
                    	<span><?php if($vo["type"] == '1'): ?>Home<?php elseif($vo["type"] == '2'): ?>Office<?php else: ?>Other<?php endif; ?></span>
                        <span class="s2"><?php echo ($vo["address"]); ?></span>
                        <span>(<?php echo ($vo["name"]); ?>)</span>
                        <span><?php echo ($vo["mobile"]); ?></span>
                        <a class="del" href="javascript:;"></a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?> 
                    
                    <div class="add"><a href="#">Add New Contact Info</a></div>
                    <div class="new">
                    <form id="add_form">
                		<div class="d1 clearfix">
                        	<span><p>FIRST NAME</p><input type="text" name="fname" id="fname" /></span>
                            <span><p>LAST NAME</p><input type="text" name="lname" id="lname" /></span>
                        </div>
                        <div class="d1 clearfix">
                        	<span><p>ADDRESS</p><input style="width:215px;" type="text" name="add" id="add" /></span>
                            <span><p>APT/UNIT/SUITE</p><input type="text" name="aus" id="aus" /></span>
                            <span><p>CITY</p><input style="width:80px;" type="text" id="city" name="city" /></span>
                            <span><p>STATE</p><input style="width:80px;" type="text" id="state" name="state" /></span>
                        </div>
                        <div class="d1 clearfix">
                        	<span><p>ZIP CODE</p><input type="text" id="zip" name="zip" /></span>
                            <span><p>MOBILE NUMBER</p><input type="text" id="mobile" name="mobile" /></span>
                            <span style="color:red;padding-top:25px;" id="add_error"></span>
                        </div>
                      
                        <div class="d2">
                        	<span><input name="type" type="radio" id="m1" value="1" checked="checked" />Home</span>
                            <span><input name="type" type="radio" id="m1" value="2" />Office</span>
                            <span><input name="type" type="radio" id="m1" value="3" />Other</span>
                            <a href="javascript:;" id="add_submit">Save</a>
                            
                        </div>
                      
                        <a class="close" href="#"></a>
                       <form> 
                	</div>
                </div>
            </div>
           
            <div class="type1">
                <div class="order_list">
                    <div class="list_title clearfix">
                        <span class="name"><?php echo W('ShowRestaurant',array('id'=>$restaurant_id));?> Menu</span>
                        <span class="person">Person</span>
                        <span class="price">Price</span>
                        <span class="num">Qty</span>
                        <span class="dis">Discount</span>
                        <span class="total">Subtotal</span>
                    </div>
                    <input type="hidden" name="restaurant_id" value="<?php echo ($restaurant_id); ?>"/>
                    <?php if(is_array($orderlist)): $i = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="list l1 clearfix">
                        <span class="name">
                            <input type="checkbox" name="sid" checked="checked" value="<?php echo ($vo["id"]); ?>" />
                            <a href="#"><img src="<?php echo ($vo["image"]); ?>" /></a>
                            <p class="p1"><span><?php echo ($vo["quantity"]); ?></span> Piece <?php echo ($vo["dishesname"]); ?></p>
                            <p><?php echo ($vo["item"]); ?></p>
                        </span>
                         <span class="person pd"><input type="text" name="person" value="<?php echo ($vo["person"]); ?>" /><a href="javascript:;" class="person_ok">ok</a></span>
                        <span class="price pd">$<?php echo ($vo["price"]); ?></span>
                        <span class="num pd" s_id="<?php echo ($vo["id"]); ?>"><a class="reduce" href="javascript:;"></a><input class="qty" type="text" value="<?php echo ($vo["quantity"]); ?>" /><a class="add" href="javascript:;"></a></span>
                        <span class="dis pd">20% off of any order of $40 or more. Can not be used with deals</span>
                        <span class="total pd"><!--<del>$18.98</del>--><p>$<?php echo ($vo["total_price"]); ?></p></span>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>  
                </div>
              <div class="pay clearfix">
                	<div class="lt">
                   	  <div class="d1"><input type="checkbox" name="all" id="checkbox2"  checked="checked"/>
                           <span>Spare me the napkins and plasticware.I'm trying to save the earth.</span>
                      </div>
                      <div class="d2 clearfix">
                      	  <span>SPECIAL INSTRUCTIONS:</span>
                      	  <textarea rows="6" name="remark"></textarea>
                      </div>
                    </div>
                    <div class="rt">
                    	<div class="d1 total1">TOTAL:<span>$<?php echo ($total); ?></span></div>
                        <div class="d2">
                        	 <span><input name="payment" type="radio" id="m1" value="1" checked="checked" /> Pay with cash</span>
                             <span><input type="radio" name="payment" id="m2" value="2" /> Credit Card</span>
                             <span><input type="radio" name="payment" id="m3" value="3" /><a class="a1" href="#"></a></span>
                        </div>
                         <div class="pay_type">
                        	<div class="card_type">
                            	<img src="__PUBLIC__/Index/images/card1.gif" />
                                <img src="__PUBLIC__/Index/images/card2.gif" />
                                <img src="__PUBLIC__/Index/images/card3.gif" />
                                <img src="__PUBLIC__/Index/images/card4.gif" />
                                <img src="__PUBLIC__/Index/images/card5.gif" />
                                <img src="__PUBLIC__/Index/images/card6.gif" />
                            </div>
                            <div class="t1 clearfix">
                                <span><p>EXPIRATION DATE</p>
                                <select name="select" id="select" name="year">
                                	<option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                    <option value="2033">2033</option>
                                    <option value="2034">2034</option>
                                    <option value="2035">2035</option>
                                    <option value="2036">2036</option>
                                    <option value="2037">2037</option>
                                    <option value="2038">2038</option>
                                    <option value="2039">2039</option>
                                    <option value="2040">2040</option>
                                </select>
                                <select name="select" id="select" name="month">
                                	<option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                </span>
                                <span><p>CREDIT CARD NUMBER</p><input class="ipt" type="text" name="cardnum" /></span>
                            </div>
                            
                            <div class="t1 clearfix">
                                <span><p>BILLING ZIPCODE</p><input class="ipt" style="width:118px;" type="text" name="zipcode" /></span>
                                <span><p>CVV CODE</p><input class="ipt" style="width:81px;" type="text" name="cvv" /></span>
                            </div>
                            
                            <div class="t1 clearfix">
                                <span>Remember this card for future use.</span>
                                <span><input type="checkbox" name="remember" id="checkbox2" /></span>
                            </div>
                        </div>
                        <div class="d3">
                            Tip:<a href="javascript:;"><?php echo ($tip[0]); ?>%</a><a href="javascript:;"><?php echo ($tip[1]); ?>%</a><a href="javascript:;"><?php echo ($tip[2]); ?>%</a>
                            $<input type="text" name="tip" />
                        </div>
                        <p class="p1">Promo Codes</p>
                        <div  class="d4"><input type="text" /><a href="#">Apply</a></div>
                        
                        <div class="d5">By ordering below, I acknowledge I am bound by the <a class="a2" href="#">terms of use</a> of US.</div>
                        <div class="d6">Please make sure you have entered your credit card info properly or we won't be able to process your order.</div>

             			<a class="a3" href="javascript:;" id="order_submit">OK ></a>
                   </div>
                </div>
            </div>
          <div class="pay2 clearfix">
                	<div class="lt">
                      <div class="d2 clearfix">
                      	  <span>SPECIAL INSTRUCTIONS:</span>
                      	  <textarea rows="6" name="remark1"></textarea>
                      </div>
                    </div>
                    <div class="rt">
                    	<table width="100%" border="0" class="table">
                    	 <?php if(is_array($orderlist)): $i = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><?php if($v['person'] != ''): ?><tr class="line">
                         	<td class="pername"><?php echo ($v["person"]); ?></td>
                            <td class="perprice" align="right"><p>$<?php echo ($v["total_price"]); ?></p></td>
                         </tr><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
                    	  <tr>
                    	    <td class="tx">TOTAL:</td>
                    	    <td align="right" class="total total1"><span>$<?php echo ($total); ?></span></td>
                  	    </tr>
                    	  <tr>
                    	    <td>&nbsp;</td>
                    	    <td align="right"><a class="a3" href="javascript:;" id="order_submit">OK ></a></td>
                  	    </tr>
                  	  </table>
                   </div>
                   
                </div>
            </div>
           
        </div>
    </div>
    <div class="foot"></div>
	<div class="popup_layer"></div>
    
<script type="text/javascript" src="__PUBLIC__/index/js/placeOrder.js"></script>
</body>
</html>