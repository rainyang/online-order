<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OrderOnline - results</title>
<link rel="stylesheet" href="__PUBLIC__/Index/css/reset.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/top.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/results.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/foot.css" />
<style>
    @import url(__PUBLIC__/Index/css/reset.css);
    @import url(__PUBLIC__/Index/css/public.css);
    @import url(__PUBLIC__/Index/css/top.css)(min-width:940px);
    @import url(__PUBLIC__/Index/css/top_768-940.css)(min-width:768px) and (max-width:940px);
    @import url(__PUBLIC__/Index/css/top_640-768.css)(min-width:640px) and (max-width:768px);
    @import url(__PUBLIC__/Index/css/top_480-640.css)(min-width:480px) and (max-width:640px);
    @import url(__PUBLIC__/Index/css/top_480under.css)(max-width:480px);
    
    @import url(__PUBLIC__/Index/css/results.css)(min-width:940px);
    @import url(__PUBLIC__/Index/css/results_768-940.css)(min-width:768px) and (max-width:940px);
    @import url(__PUBLIC__/Index/css/results_640-768.css)(min-width:640px) and (max-width:768px);
    @import url(__PUBLIC__/Index/css/results_480-640.css)(min-width:480px) and (max-width:640px);
    @import url(__PUBLIC__/Index/css/results_480under.css)(max-width:480px);
    
    @import url(__PUBLIC__/Index/css/foot.css)(min-width:940px);
    @import url(__PUBLIC__/Index/css/foot_768-940.css)(min-width:768px) and (max-width:940px);
    @import url(__PUBLIC__/Index/css/foot_640-768.css)(min-width:640px) and (max-width:768px);
    @import url(__PUBLIC__/Index/css/foot_480-640.css)(min-width:480px) and (max-width:640px);
    @import url(__PUBLIC__/Index/css/foot_480under.css)(max-width:480px);
</style>
<script type="text/javascript" src="__PUBLIC__/Index/js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/main.js"></script>
<script src="http://maps.google.cn/maps?file=api&ampv=2&ampkey=your key&sensor=true" type="text/javascript"></script>
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
        
        <div class="results_list">
            <p class="num">About <span style="color:red;font-weight:blod;"><?php echo ($list_count); ?></span> results</p>
            <div class="options clearfix">
                <div class="drup">
                    <select name="select" id="select">
                        <option>Top Rate</option>
                    </select>
                </div>
                <span class="lt"><input name="status_type[]" type="checkbox" value="1" class="status_type"/>Open Now</span>
               <!--  <span class="lt"><input name="status_type[]" type="checkbox" value="2" />Delivery</span>
                <span class="lt"><input name="status_type[]" type="checkbox" value="3" />Pickup</span>
                <span class="lt"><input name="status_type[]" type="checkbox" value="4" />Offers Coupons</span>
                <span class="lt"><input name="status_type[]" type="checkbox" value="5" />Hide Dlivery Services</span> -->
            </div>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="list l1 clearfix">
                <div class="img">
                    <?php if(strtotime($times[0])<time() && strtotime($times[1]>time())){ ?>
                        <a href="<?php echo U('Dishes/detail?id='.$vo['id']);?>">
                        <img src="<?php echo ($vo["logo"]); ?>" width="120" height="60" />
                        </a>
                    <?php }else{ ?>
                         <a href="<?php echo U('Dishes/detail?id='.$vo['id']);?>">
                        <img src="<?php echo ($vo["logo"]); ?>" width="120" height="60" />
                        </a>
                    <?php } ?>
                    <!-- <a href="<?php echo U('Dishes/detail?id='.$vo['id']);?>">
                    <img src="<?php echo ($vo["logo"]); ?>" width="120" height="60" />
                    </a> -->
                    <span>Opens today at 10:00 AM</span>
                </div>
                <div class="detail">
                    <span class="pt p1"><?php echo ($vo["nickname"]); ?><label>(<?php echo round($vo['distance'], 1); ?> miles away)</label></span>
                    <p class="pt p2"><?php echo ($vo["keywords"]); ?></p>
                    <span class="pt p3">Delivery<label>$<?php echo ($vo["delivery_charges"]); ?> </label> Minimum <label>$<?php echo ($vo["order_minimum"]); ?></label></span>
                </div>
                <div num='5' class="star clearfix"></div>
                <div class="msg">
                    <?php if(is_array($$vo['comment'])): $i = 0; $__LIST__ = $$vo['comment'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><p>{Nuno Alves}   <?php echo ($v["create_time"]); ?> <?php echo ($v["content"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?> 
            
            
            
        </div>
    </div>
    <div class="foot"></div>
    <div class="popup_layer"></div>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".status_type").click(function(){
            data = $(this).val();
            $.post("<?php echo U('Dishes/results');?>",data,function(rs){
                
            })
        })
    })
    </script>
</body>
</html>