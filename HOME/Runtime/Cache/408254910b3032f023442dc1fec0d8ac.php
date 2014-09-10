<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OrderOnline -- Home</title>
<link rel="stylesheet" href="__PUBLIC__/Index/css/reset.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/top.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/home.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/foot.css" />

<script type="text/javascript" src="__PUBLIC__/Index/js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/list_scroll.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/slide.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/home.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/main.js"></script>
<script src="http://maps.google.cn/maps?file=api&ampv=2&ampkey=your key&sensor=true" type="text/javascript"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/coordinate.js"></script>


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
    	<form name="form" method="post" id="form" action="<?php echo U('Dishes/results');?>">
        <div class="search_box clearfix">
        	<div class="left clearfix">
            	<span class="t1">Please Enter Your Address:</span><input class="b1" type="text" id="address" name="address" value="Street Address, City, State" /><br />
                <span class="t2">What would you like? (optional):</span><input class="b2" type="text" name="taste" value="tuna melt, John's Subs, Italian" />
                <input type="hidden" id="coordinate" name="lat" value="">
                <input type="hidden" id="map" >
            </div>
                <a class="btn" href="javascript:;" id="btn_go">
                <img src="__PUBLIC__/Index/images/search_btn.gif" />
                <p>Search Restaurants</p>
                </a>
        </div>
        </form>
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



        <div class="banner">
        	<img class="list" src="__PUBLIC__/Index/images/banner_img.gif" />
        	<img class="list" src="__PUBLIC__/Index/images/banner_img.gif" />
        	<img class="list" src="__PUBLIC__/Index/images/banner_img.gif" />
            <div class="point2 pt"></div>
        </div>
        
        <div class="coupons box">
        	<div class="title">
            	<span>Coupons</span>
                <input type="text" value="Street Address, City, State" />
                <a href="#"><img src="__PUBLIC__/Index/images/search_btn2.gif" /></a>
            </div>
            <div class="list">
            	<ul class="clearfix">
                	<li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                    <li><a href="#"><img src="__PUBLIC__/Index/images/test_img1.gif" /><p>易迅优惠劵</p></a></li>
                </ul>
            </div>
            <a class="more" href="#">More..</a>
        </div>
        
        <div class="reviews box">
        	<div class="title">
            	<span>Reviews</span>
                <input type="text" value="Street Address, City, State" />
                <a href="#"><img src="__PUBLIC__/Index/images/search_btn2.gif" /></a>
            </div>
           	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="list">
            	<ul class="clearfix">
                <?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><li class="clearfix">
                        <div class="lt">
                            <a href="<?php echo U('Dishes/detail?id='.$v['id']);?>"><img src="<?php echo ($v["logo"]); ?>" width="120" height="56" /></a>
                            <p class="p1"><?php echo ($v["nickname"]); ?></p>
                            <div num="<?php echo W('ShowStar',array('id'=>$v['id']));?>" class="star clearfix"></div>
                            <p>Delivery $<?php echo ($v['delivery_charges']); ?></p>
                            <p>Minimum $<?php echo ($v['order_minimum']); ?></p>
                           <!--  <p>Parking:<?php if($v['parking'] == '1'): ?>Yes<?php else: ?>No<?php endif; ?></p> -->
                        </div>
                        
                        <div class="rt">
                        	<p><?php echo ($v["remark"]); ?></p>
                            <ul>
                            <?php if(is_array($v['comment'])): $i = 0; $__LIST__ = $v['comment'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): ++$i;$mod = ($i % 2 )?><li><?php echo W('ShowMember',array('id'=>$vol['member_id']));?>   <?php echo date('F d',$vol['create_time']);?>, <?php echo date('Y',$vol['create_time']);?> at <?php echo date('H:i a',$vol['create_time']);?> <?php echo ($vol["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                
                </ul>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
            
            
            <div class="point pt"></div>
        </div>
    </div>
    <div class="foot"></div>
   
    <div class="popup_layer"></div>
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
</body>
</html>