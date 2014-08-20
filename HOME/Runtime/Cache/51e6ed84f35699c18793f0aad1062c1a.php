<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OrderOnline - basicInfo</title>
<link rel="stylesheet" href="__PUBLIC__/Index/css/reset.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/top.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/basic.css" />
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
        
        <div class="basic clearfix">
        	<div class="basic_title clearfix">
            	<span class="s1" style="width:950px;">
                	<a href="#" >Basic Info</a>
                </span>
                            
            </div>
            <div class="basic_lt">
            	<p class="p1">JOIN US ( <label>Free</label> Promote Your Restaurant )</p>
                <div class="d1 clearfix">
                <form id="res_form" action="<?php echo U('Restaurant/reg');?>" method="post">
                	<span>
                    	<p>Your Name</p>
                        <input type="text" name="name" id="name" />
                    </span>
                    <span>
                    	<p>Your Phone Number</p>
                        <input type="text" name="phone"  id="phone"/>
                    </span>
                    <span>
                    	<p>Your Email(account)</p>
                        <input type="text" name="account" id="account" />
                    </span>
                </div>
                <div class="d1 clearfix">
                	<span>
                    	<p>Password</p>
                        <input type="password" name="password" id="name" />
                    </span>
                    <span>
                    	<p>Zip</p>
                        <input type="text" name="zip"  id="zip"/>
                    </span>
                    
                </div>
                <div class="d2 clearfix">
                	<span>
                    	<p>Restaurant Name</p>
                        <input type="text" name="nickname" id="nickname" />
                    </span>
                    <span>
                    	<p>Restaurant Address</p>
                        <input type="text" name="address" id="address" />
                    </span>
                </div>
                
                <div class="d4 clearfix">
                	<span>
                    	<p>Restaurant Phone</p>
                        <input type="text" name="tel" id="tel"/>
                    </span>
                    <span>
                    	<p>Restaurant Fax</p>
                        <input type="text" name="resfax" d="resfax"/>
                    </span>
                </div>
                </form>
            </div>
            <div class="basic_rt">
            	<p class="p1">Start the Sign-Up Process Now</p>
                <p class="p1">(it's easy and free)</p>
                <p class="p2">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. </p>
                
                <div class="link"><a href="javascript:;" id="link">Restaurant register ></a></div>
            </div>
        </div>
    </div>
    <div class="foot"></div>
	<div class="popup_layer"></div>
</body>
</html>
<script type="text/javascript">
	/*var name = $("#name").val();
	var phone = $("#phone").val();
	var account = $("#account").val();
	var nickname = $("#nickname").val(); 
	var address = $("#address").val();
	var tel = $("#tel").val();
	var resfax = $("#resfax").val();
	var zip = $("#zip").val();*/
	$("#link").click(function(){
        $("#res_form").submit();
        return false;
		/*var data = $("#res_form").serialize();
        alert(data);
		$.post("<?php echo U('Restaurant/reg');?>",data,function(rs){
			if(rs.status){
				alert(rs.msg);	
			}else{
				window.location.href="/Restaurant/restaurantDetails/id/"+rs.msg+".html";	
			}
		},'json')*/	
	})

</script>