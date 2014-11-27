<?php if (!defined('THINK_PATH')) exit();?><!--﻿<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--<meta http-equiv="content-type" content="text/html; charset=utf-8"/>-->
<!--<link rel="stylesheet" type="text/css" href="__PUBLIC__/JQueryDate/jquery.datetimepicker.css"/>-->
<!--</head>-->
<!--<body>-->
<!--	<h3>DateTimePicker</h3>-->
<!--	<input type="text" value="2014/03/15 05:06" id="datetimepicker"/><br><br>-->
<!--	-->
<!--</body>-->
<!--<script src="__PUBLIC__/JQueryDate/jquery.js"></script>-->
<!--<script src="__PUBLIC__/JQueryDate/jquery.datetimepicker.js"></script>-->
<!--<script>-->


<!--$('#datetimepicker').datetimepicker();-->


<!--</script>-->
<!--</html>-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>easywayordering</title>

<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/Togle.js"></script>

<link href="__PUBLIC__/JQueryDate/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/adminMain.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/south-street/jquery-ui-1.8.22.custom.css" rel="stylesheet" type="text/css" />


<!-- GOOGLE API KEY FOR DREAM HOST:  AIzaSyCkRkSd4hQornJOYjYMoHqi3-Wv4hVOOgg-->
<!-- GOOGLE API KEY FOR LOCAL PROJECT:  ABQIAAAAPpaOjFQ_miNP74G3g3O7oBTTwBGlz0OqYPu6tmNrU0ToxRrT5hQhlPr8PLUNIxb0D5FrOa5lJ1tp6w-->
<!-- <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBT2sOPbIDLELZVjk6vPcGs87xqabq2jcs&sensor=false" type="text/javascript"></script> -->
<!--<script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyBT2sOPbIDLELZVjk6vPcGs87xqabq2jcs" type="text/javascript"></script> -->



</head>

﻿<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<body>
<div id="maincontainer">
	<div id="header">
		<div id="top">
			<div id="top_left"></div>
			<div id="top_right"></div>
		</div><!--End top Div-->
    </div><!--End header Div-->        
    <div id="text_holder">
        <div id="logo_area">
        	<div id="logo"><img src="__PUBLIC__/Images/man_img.png" width="57" height="74" /></div>
        	<div id="logo_text">ADMINISTRATION PANEL</div>
        	<div id="login_text"><strong>Welcome</strong>&nbsp;&nbsp;restaurateur, <?php echo ($_SESSION['']); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/Public/logout/">Log out</a></div>
        	<br style="clear:both" />
        </div>                
        <!--End logo_area Div-->
        <div id="page_content">
        	<div id="navigation_links">
        		<div id="navigation">
        			<div class="links selected"><a href="__APP__/Index" >Restaurants</a></div>
        			<div class="links not"><a href="__APP__/Public/changePwd" >Change Password</a></div>
                    <div class="links not"><a href="__APP__/Public/addRestaurant" >Create New Restaurant</a></div>
        			<!-- <div class="links not"><a href="apikey.html" >API Key</a></div>
                    <div class="links not"><a href="apikey.html" >Restaurant Review </a></div> -->
        			<br style="clear:both" />
        		</div>
        		<!--End navigation Div-->
            </div>
            <!--End navigation_links Div-->
            <div id="tab_items">
            	<ul>
            		<li><a href="__APP__/Index/index" class="selected_red">Restaurants Listing</a></li>
            	</ul>
            </div>
   	
<div id="navigation_links">
                           <div id="navigation">
                            
                            <div class="links "><a href="__APP__/RestaurantDetails/index/restaurant_id/<?php echo ($_SESSION['restaurant_id']); ?>" >Restaurants(<?php echo ($_SESSION['restaurant_count']); ?>)</a></div>
                            <div class="links "><a href="__APP__/Order/index/restaurant_id/<?php echo ($_SESSION['restaurant_id']); ?>" class="">Orders(<?php echo ($_SESSION['order_count']); ?>)</a></div>
                            <div class="links "><a href="__APP__/Customer/index" class="">Customers(0)</a></div>
                            <div class="links "><a href="__APP__/Coupons/index" class="">Coupons</a></div>
                            <div class="links selected"><a href="__APP__/Menus/index/restaurant_id/<?php echo ($_SESSION['restaurant_id']); ?>"class="">Menus</a></div>
                            <div class="links "><a href="__APP__/Pay/index"class="">Pay Config</a></div>
                            <!--<div class="links "><a href="analytics.html"class="">Analytics</a></div> -->
                            <br style="clear:both" />
                          </div>
                        </div>

<div id="tab_items">
	<ul>
    	<li>
			<a href="__APP__/Coupons/index">Edit Exisiting Coupons</a>
        </li>|
        <li>
        	<a href="__APP__/Coupons/addcoupons">Add New Coupon</a>
        </li>
     </ul>
</div>

<div id="main_heading">ADD COUPONS</div>
<div class="form_outer">
  <form name="form1" method="post" action="__APP__/Coupons/addCoupons"  >
    <table width="100%" border="0" cellpadding="4" cellspacing="0">
      <tr align="left" valign="top">
        <td width="172"><strong>Coupon Title:</strong></td>
        <td width="973"><input name="coupon_title" type="text" size="40" id="coupon_title" value=""></td>
      </tr>
      <tr align="left" valign="top">
        <td width="172"><strong>Coupon Type:</strong></td>
        <td width="973">
        	<select name="type" class="types">
        		<option id="type0" value="0" selected="selected">Select Type</option>
        		<option id="type1" value="1">Discount(%)</option>
        		<option id="type2" value="2">Reduce Cash($)</option>
        		<option id="type3" value="3">Give Item</option>
        		<option id="type4" value="4">Exclusive Code</option>
        	</select>
        </td>
      </tr>
      <tr align="left" valign="top">
        <td width="172"><strong>Minimum Order Total:</strong></td>
        <td><input name="min_order_total" type="text" size="40" id="min_order_total" value="">
          &nbsp;$</td>
      </tr>
      <tr align="left" valign="top">
        <td width="172"><strong>Date To:</strong></td>
        <td>From:&nbsp;<input name="date_from" type="text" value="<?php echo date('Y/m/d H:i',time());?>" id="date_form"/>
          &nbsp;&nbsp;To:&nbsp;<input name="date_to" type="text" id="date_to" ></td>
      </tr>
      <tr align="left" valign="top" style="display:none;"id="code_show">
        <td><strong>Coupon Code:</strong></td>
        <td><input name="coupon_code" maxlength="11" type="text" size="40" id="coupon_code" value=""></td>
      </tr>
      
      <tr align="left" valign="top" style="display:none;" id="discount_show">
        <td><strong>Discount:</strong></td>
        <td><input name="coupon_discount" type="text" size="26" id="coupon_discount" value="">&nbsp;%</td>
            </td>
      </tr>
      
      <tr align="left" valign="top" style="display:none;" id="cash_show">
        <td><strong>Cash:</strong></td>
        <td><input name="coupon_cash" type="text" size="26" id="coupon_cash" value="">&nbsp;$</td>
            </td>
      </tr>
      
      <tr align="left" valign="top" style="display:none;" id="item_show">
        <td><strong>Item List:</strong></td>
        <td>
        	<div style="border:1px;border-color:black; width:600px;">
        		<?php if(is_array($itemlist)): foreach($itemlist as $key=>$vo): ?><span><input name="item_list[<?php echo ($vo["id"]); ?>]" class="item_input" type="checkbox" size="26" value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["item_name"]); ?><input type="text" name="item_num[<?php echo ($vo["id"]); ?>]" value="" size="3" style="display:none;" placeholder="num"></span><?php endforeach; endif; ?>
        	</div>
        	
        	
        </td>
      </tr>
      
      <tr align="left" valign="top">
        <td><strong>Coupon Description:</strong></td>
        <td><textarea name="coupon_des" cols="40" rows="6" id="coupon_des"></textarea></td>
      </tr>
      
      <tr align="left" valign="top">
        <td>&nbsp;</td>
        <input type="hidden" name="coupon_items1" id="coupon_items1" value="" />
        <input type="hidden" name="coupon_items2" id="coupon_items2" value="" />
        <input type="hidden" name="coupon_items3" id="coupon_items3" value="" />
        <td><input type="submit" name="submit" value="Add Coupon"></td>
      </tr>
    </table>
  </form>
</div>
 </div>	
         </div>   
            
        </div><!--End text_holder Div-->	
        <div id="footer">
            <div id="bottom">
                <div id="bottom_left"></div>
                <div id="bottom_right"></div>
            </div><!--End bottom Div--><br style="clear:both" />
        </div><!--End footer Div-->
    </div><!--End header Div-->
</div><!--End maincontainer Div-->
</body>

<script src="__PUBLIC__/JQueryDate/jquery.datetimepicker.js"></script>
<script>
$('#date_form').datetimepicker();
$('#date_to').datetimepicker();
</script>
<script type="text/javascript">
	$(document).ready(function(){
		//下拉框事件
		$(".types").change(function(){
			if($(this).val() == 0){
				$("#discount_show").hide();
				$("#code_show").hide();
				$("#cash_show").hide();
				$("#item_show").hide();
			}else if($(this).val() == 1){
				$("#discount_show").show();
				$("#code_show").hide();
				$("#cash_show").hide();
				$("#item_show").hide();
			}else if($(this).val() == 2){
				$("#discount_show").hide();
				$("#code_show").hide();
				$("#cash_show").show();
				$("#item_show").hide();
			}else if($(this).val() == 3){
				$("#discount_show").hide();
				$("#code_show").hide();
				$("#cash_show").hide();
				$("#item_show").show();
			}else if($(this).val() == 4){
				var timestamp=new Date().getTime()+Math.round(Math.random()*9999999999999);
				$('#coupon_code').attr('value',timestamp);
				$("#discount_show").hide();
				$("#code_show").show();
				$("#cash_show").hide();
				$("#item_show").hide();
			}
		});
		//item 点击显示填写数量
		$(".item_input").click(function(){
			if($(this).attr("checked") == "checked"){
				$(this).siblings('input').show();
			}else{
				$(this).siblings('input').hide();
			}
		});
	});
	
</script>
</html>