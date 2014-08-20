<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>restocordobaordering</title>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/Togle.js"></script>
<link href="__PUBLIC__/css/adminMain.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/jquery-ui-1.8.22.custom.css" rel="stylesheet" type="text/css" />
<!-- <link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />  -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript"> 
    
  function codeAddress() { 
    
    var geocoder = new google.maps.Geocoder(); 
    var address = document.getElementById("rest_state").value + ' ' + document.getElementById("rest_city").value + ' ' + document.getElementById("rest_address").value; //alert(address);return false;
    geocoder.geocode( { 'address': address}, function(results, status) { 
      if (status == google.maps.GeocoderStatus.OK) { 
        console.log(results[0].geometry.location) ;
        document.getElementById("lng").value = results[0].geometry.location.A;
        document.getElementById("lat").value = results[0].geometry.location.k;
      } else { 
        alert("Geocode was not successful for the following reason: " + status); 
      } 
    }); 
  } 
</script> 
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



<div id="contents">  
  <style>
    input[type=text].alert-error,input[type=select].alert-error,input[type=password].alert-error{
        background-color: #F99;
        border: 1px solid #D92353;
        border-image: initial;
    }

    .alert-error {
        background-color:#f2dede;
        border-color:#eed3d7;
        color:#b94a48;
        text-shadow:0 1px 0 rgba(255, 255, 255, 0.5);
        -webkit-border-radius:4px;
        -moz-border-radius:4px;
        border-radius:4px;
    }
    div.alert-danger, div.alert-error , span.alert-error{
        padding:8px 10px;
        margin: 5px 0 10px 0;
    }
    .hidden{display:none;}

    #outline {margin:20px; border:solid 10px #9FB6CD; -moz-border-radius:20px; width:512px; height:440px;}
    #map_canvas{width:850px; height:540px;float:left;}
    #forehead{text-align:left;font-size:150%;}
    #novel{width:400px; margin:20px;float:right;}
    #AdSense{margin:20px;}
    A:hover {color: red;text-decoration: underline overline;}
    td{vertical-align:top;}
    .draggable-popup input{background-color:#ccf}
    .draggable-popup{background-color:white; border:1px solid black}
</style>


<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css"/>

 <div style="padding-bottom:10px;text-align:center">
      <img style="width:1085px; height:90px;" src="__PUBLIC__/Images/img_856_cat_header.jpg" border="0" />
  </div>
   	
   <div id="navigation_links">
   <div id="navigation">
    
    <div class="links selected"><a href="__APP__/RestaurantDetails/index/restaurant_id/<?php echo ($_SESSION['restaurant_id']); ?>" >Restaurant(<?php echo ($_SESSION['restaurant_count']); ?>)</a></div>
    <div class="links "><a href="__APP__/Order/index/restaurant_id/<?php echo ($_SESSION['restaurant_id']); ?>" class="">Orders(1)</a></div>
    <div class="links "><a href="__APP__/Customer/index" class="">Customers(0)</a></div>
    <!-- <div class="links "><a href="?mod=coupon" class="">Coupons</a></div> -->
    <div class="links "><a href="__APP__/Menus/index/restaurant_id/<?php echo ($_SESSION['restaurant_id']); ?>"class="">Menus</a></div>
    <!-- <div class="links "><a href="?mod=mailing_list"class="">Mailing List</a></div>
    <div class="links "><a href="analytics.html"class="">Analytics</a></div> -->
    <br style="clear:both" />
  </div>
</div>


<div id="main_heading">
    <span>Edit Restaurant</span>
</div>
 
<div id="AdminLeftConlum">
    <form name="frmedit" id="frmedit"  action="" method="post" enctype="multipart/form-data"   >
        <table width="100%" border="0" cellpadding="4" cellspacing="0">
            <tr align="left" valign="top">
                <td width="76">&nbsp;</td>
                <td width="1052"><strong>Restaurant Name</strong><br />
                    <textarea name="catname" cols="35" id="catname" style="font-size:18px; font-family:Arial;"><?php echo ($info["nickname"]); ?>                    </textarea></td>
            </tr>
                        <!-- <tr align="left" valign="top"> 
                <td width="76"></td>
                <td ><strong>Resturant Licenses Key:</strong><br />
                    85079822453                    <input type="hidden" name="rest_license_key" id="rest_license_key" value="850"  />

                </td>
            </tr> -->





            <tr align="left" valign="top"> 
                <td width="76"></td>
                <td><strong>Email:</strong><br />
                    <input name="email" type="text" size="40" value="<?php echo ($info["account"]); ?>" id="email" /> </td>
            </tr>
            <!--<tr align="left" valign="top"> 
              <td width="76"></td>
              <td><strong>Enable PDF attachment with email:</strong><br />
              <input name="pdf_attachment" type="checkbox" size="40" value="1" id="pdf_attachment"  /> </td>
            </tr>-->
             <!-- <tr align="left" valign="top">
                <td></td>
                <td><strong>Regional Settings:</strong><br />					
					                    <input name="region" type="radio" value="1" onclick="loadTimeZoneUS()" id="region" checked='checked'>USA&nbsp;&nbsp;
                    <input name="region" type="radio" value="0" onclick="loadTimeZoneUK()" id="region" >UK&nbsp;&nbsp;
                    <input name="region" type="radio" value="2" onclick="loadTimeZoneCanada()" id="region" >Canada 
                </td>
            </tr> -->
            <tr align="left" valign="top"> 
                <td width="76"></td>
                <td><strong>Phone:</strong><br />
                    <input name="phone" type="text" size="40" value="<?php echo ($info["phone"]); ?>" id="phone" /> </td>
            </tr>
            <tr align="left" valign="top"> 
                <td width="76"></td>
                <td><strong>Fax:</strong><br />
                    <input name="fax" type="text" size="40" value="<?php echo ($info["resfax"]); ?>" id="fax" /> </td>
            </tr>



 <tr align="left" valign="top">
                <td></td>
                <td><strong>Resturant Address:</strong><br />
                    <input name="rest_address" type="text" size="40" id="rest_address" value="<?php echo ($info["address"]); ?>">            
                </td>
            </tr>
            <tr align="left" valign="top"> 
                <td></td>
                <td><strong>Resturant City:</strong><br />
                    <input name="rest_city" type="text" size="40" id="rest_city" value="<?php echo ($info["city"]); ?>">            
                </td>
            </tr>
            <tr align="left" valign="top"> 
                <td></td>
                <td><strong><span id="spnSP">Resturant State:</span></strong><br />
                    <input name="rest_state" type="text" size="40" id="rest_state" value="<?php echo ($info["state"]); ?>">            
                </td>
            </tr>
            <tr align="left" valign="top"> 
                <td></td>
                <td>
                <input type="button" value="地址解析经纬度" onclick="codeAddress()"><br>
                    <strong><span id="spnSP">lng:</span></strong><br />
                    <input name="lng" type="text" size="40" id="lng" value="<?php echo ($info["lng"]); ?>"><br>
                    <strong><span id="spnSP">lat:</span></strong><br />
                    <input name="lat" type="text" size="40" id="lat" value="<?php echo ($info["lat"]); ?>">            
                </td>
            </tr>
            <tr align="left" valign="top"> 
                <td></td>
                <td><strong><span id="spnZP">Resturant Zip Code:</span></strong><br />
                    <input name="rest_zip" type="text" size="40" id="rest_zip" value="<?php echo ($info["zip"]); ?>">            
                </td>
            </tr>
            <!-- <tr align="left" valign="top"> 
                <td></td>
                <td><strong>Delivery Options: </strong><br />
                    <input type="radio" name="delivery_option" value="1"  checked  onclick="showdeliveryoption(1)"/>Delivery Radius
                    <input type="radio" name="delivery_option" value="2"     onclick="showdeliveryoption(2)"/>Custom Delivery Zone
                </td>
            </tr> -->

            <tr align="left" valign="top" id="delivery_radius" > 
                <td></td>
                <td><strong>Delivery Radius for Resturant:</strong><br />
                    <input name="delivery_radius" type="text" size="40" id="delivery_radius" value="<?php echo ($info["delivery_radius"]); ?>">&nbsp;(miles)            </td>
            </tr>
            <!-- <tr align="left" valign="top" id="delivery_zone" class="hidden"> 
                <td>&nbsp;</td>
                <td> <a href="ajax.php?mod=resturant&item=delivery_zone"  id="lnkdelivery_zones" rel="facebox"><img src="images/zones.png" title="Draw Delivery Zones"/></a>
                </td>
            </tr> -->

           <!--  <tr align="left" valign="top"> 
                <td></td>
                <td><strong>Time Zone:</strong><br />
                    <select name="time_zone" id="time_zone" style="width:270px;">
                        <option value="-1">Select Time Zone</option>
                       <option value=160>Europe/London</option><option value=161>Canada/Pacific</option><option value=162>Canada/Central</option><option value=163>Canada/Atlantic</option><option value=164>Canada/Mountain</option><option value=165>Canada/Eastern</option><option value=166>Canada/Newfoundland</option><option value=167>US/Hawaii</option><option value=168>US/Alaska</option><option value=169>US/Pacific</option><option value=170>US/Mountain</option><option value=171 selected>US/Central</option><option value=172>US/Eastern</option>                    </select>
                </td>

            </tr> -->



            <tr align="left" valign="top">
                <td>&nbsp;</td>
                <td><strong>Optional Logo</strong><br> <font color="#666666"><!--(system will resize to 
                    500x500)--></font>
                    <input name="image" type="file" id="image">
                    <input type="hidden" name="logo" value="<?php echo ($info["logo"]); ?>">
                    <!-- <input type="hidden" name="thumb" value="img_856_cat_thumbnail.jpg"></td>
            <input type="hidden" name="header_images" value="img_856_cat_header.jpg">
            </tr> -->
              <!-- <tr align="left" valign="top">
                <td>&nbsp;</td>
                <td><strong>Optional Logo Thumbnail</strong><br> <font color="#666666">(system will
                    resize to 130x130)</font>
                    <input name="userfile2" type="file" id="userfile2"></td>
            </tr> -->
           <!--  <tr align="left" valign="top">
                <td>&nbsp;</td>
                <td><strong>Header Image</strong><br> <font color="#666666">(system will
                    resize to 130x130)</font>
                    <input name="userfile3" type="file" id="userfile3"></td>
            </tr> -->

             <tr align="left" valign="top">
                <td></td>
                <td><strong>Logo Show:</strong><br />
                    <img src="<?php echo ($info["logo"]); ?>" width="150";>            </td>
            </tr>
            <tr align="left" valign="top">
                <td></td>
                <td><strong>Order Minimum:</strong><br />
                    <input name="order_minimum" type="text" size="40" id="order_minimum" value="<?php echo ($info["order_minimum"]); ?>">            </td>
            </tr>
            <tr align="left" valign="top"> 
                <td></td>
                <td><strong>Sales tax % for Restaurant:</strong><br />
                    <input name="tax_percent" type="text" size="40" id="tax_percent" value="<?php echo ($info["tax"]); ?>">            </td>
            </tr>
            <tr align="left" valign="top"> 
                <td></td>
                <td><strong>Delivery Charges:</strong><br />
                    <input name="delivery_charges" type="text" size="40" id="delivery_charges" value="<?php echo ($info["delivery_charges"]); ?>">            </td>
            </tr> 
            <tr align="left" valign="top"> 
                <td></td>
                <td><strong>Announcements:</strong><br />
                    <input name="rest_announcements" type="text" size="40" id="rest_announcements" value="<?php echo ($info["announcements"]); ?>">            </td>
            </tr>
            <tr align="left" valign="top"> 
                <td></td>
                <td><strong>Announcement status:</strong><br />
                    <input name="announce_status" type="radio" value="1"  id="announce_status" <?php if($info['announcements_status'] == 1): ?>checked<?php endif; ?>>Activate            &nbsp;&nbsp;
                    <input name="announce_status" type="radio" value="0"  id="announce_status" <?php if($info['announcements_status'] == 0): ?>checked<?php endif; ?>>Deactivate
                </td>
            </tr>  
            <!-- <tr align="left" valign="top"> 
                <td></td>
                <td><strong>Allow Delivery Option:</strong><br />
                    <input name="delivery_offer" type="radio" value="1"  id="delivery_offer" checked>Yes            &nbsp;&nbsp;
                    <input name="delivery_offer" type="radio" value="0"  id="delivery_offer" >No
                </td>
            </tr> -->  
            <tr align="left" valign="top"> 
                <td></td>
                <td><strong>Resturant Status:</strong><br />
                    <input name="rest_open_close" type="radio" value="1"  id="rest_open_close" <?php if($info['business_status'] == 1): ?>checked<?php endif; ?>>Open            &nbsp;&nbsp;
                    <input name="rest_open_close" type="radio" value="0"  id="rest_open_close" <?php if($info['business_status'] == 0): ?>checked<?php endif; ?>>Close
                </td>
            </tr>


            <tr align="left" valign="top"> 
                <td>&nbsp;</td>
                <td>Facebook Link<br /><input name="facebookLink" type="text" size="40" id="facebookLink" value="<?php echo ($info["facebook_link"]); ?>" /></td>
            </tr>
            <tr align="left" valign="top">
                <td width="76">&nbsp;</td>
                <td width="1052"><strong>META Keywords</strong><br />
                    <textarea name="meta_keywords" cols="35" id="meta_keywords" style="font-size:18px; font-family:Arial;"><?php echo ($info["keywords"]); ?>                    </textarea></td>
            </tr>
            <tr align="left" valign="top">
                <td width="76">&nbsp;</td>
                <td width="1052"><strong>META Description</strong><br />
                    <textarea name="meta_description" cols="35" id="meta_description" style="font-size:18px; font-family:Arial;"><?php echo ($info["remark"]); ?>                    </textarea></td>
            </tr>
            <tr align="left" valign="top">
                <td>&nbsp;</td>
                <td>
                    <input type="submit" name="submit" id="submit" value="submit" style="display:none" />

                    <!-- <input type="hidden"  id="hzone1"  value="0"/>
                    <input type="hidden"  id="hzone1_delivery_charges" value="0"/>
                    <input type="hidden"  id="hzone1_min_total" value="0"/>
                    <input type="hidden"  id="hzone2" value="0"/>
                    <input type="hidden"  id="hzone2_delivery_charges" value="0"/>
                    <input type="hidden"  id="hzone2_min_total" value="0"/>
                    <input type="hidden"  id="hzone3" value="0"/>
                    <input type="hidden"  id="hzone3_delivery_charges" value="0"/>
                    <input type="hidden"  id="hzone3_min_total" value="0"/>
                    <input type="hidden"  id="hzone1_coordinates" value=""/>
                    <input type="hidden"  id="hzone2_coordinates" value=""/>
                    <input type="hidden"  id="hzone3_coordinates" value=""/> -->

                    <input type="hidden" name="restaurant_id" value="<?php echo ($restaurant_id); ?>"/>
                    <input type="submit" name="btnSave" value="Save Changes"  />
                </td>
            </tr>
        </table>
    </form>
</div>  
<div id="AdminRightConlum" style="padding:5px; min-height:800px">
    <iframe src="__APP__/RestaurantDetails/openDate" frameborder="0"  width="100%" scrolling="no" id="iframe1" height="570"></iframe>
</div>
<br class="clearfloat" />
</div>
<!--End body Div-->	
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
</html>