<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OrderOnline - deatail</title>
<link rel="stylesheet" href="__PUBLIC__/Index/css/reset.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/top.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/detail.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/foot.css" />
<link href="__PUBLIC__/Index/css/popup.css" rel="stylesheet" type="text/css" />
<style>
	@import url(__PUBLIC__/Index/css/reset.css);
	@import url(__PUBLIC__/Index/css/public.css);
	@import url(__PUBLIC__/Index/css/top.css)(min-width:940px);
	@import url(__PUBLIC__/Index/css/top_768-940.css)(min-width:768px) and (max-width:940px);
	@import url(__PUBLIC__/Index/css/top_640-768.css)(min-width:640px) and (max-width:768px);
	@import url(__PUBLIC__/Index/css/top_480-640.css)(min-width:480px) and (max-width:640px);
	@import url(__PUBLIC__/Index/css/top_480under.css)(max-width:480px);
	
	@import url(__PUBLIC__/Index/css/detail.css)(min-width:940px);
	@import url(__PUBLIC__/Index/css/detail_768-940.css)(min-width:768px) and (max-width:940px);
	@import url(__PUBLIC__/Index/css/detail_640-768.css)(min-width:640px) and (max-width:768px);
	@import url(__PUBLIC__/Index/css/detail_480-640.css)(min-width:480px) and (max-width:640px);
	@import url(__PUBLIC__/Index/css/detail_480under.css)(max-width:480px);

</style>
<script type="text/javascript" src="__PUBLIC__/Index/js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/main.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/public.js"></script>
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
        
        
        <div class="detail">
        	<a class="back" href="<?php echo U('Dishes/results');?>">< Back to Search Results</a>
            <div class="shop clearfix">
            	<div class="ico">
                	<img src="<?php echo ($resinfo["logo"]); ?>" width="140" height="81" />
                    <div id="num" num="<?php echo W('ShowStar',array('id'=>$resinfo['id']));?>" flag=false class="star clearfix"><label>Item(<?php echo ($count); ?>) &nbsp;Package(<?php echo ($count_package); ?>)</label></div>

                </div>
                
                <div class="introduction clearfix">
                	<div class="open"></div>
                    <p class="p1"><?php echo ($resinfo["nickname"]); ?> Menu</p>
                    <div class="p2"><?php echo ($time[2]); ?> 
                    	<span><label><?php echo ($resinfo["openhours"]); ?></label><span></span>
                        	<!-- <ul class="time">
                            <?php if(is_array($dhours)): $i = 0; $__LIST__ = $dhours;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><?php echo ($vo[2]); ?> <?php echo ($vo[0]); ?>-<?php echo ($vo[1]); ?></li>
							</if><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul> -->
                        </span>
                    </div>
                    <p class="p3"><?php echo ($resinfo["remark"]); ?></p>
                    <p class="p4" resid="<?php echo ($resinfo["id"]); ?>">"<?php echo ($comment['title']); ?> <?php echo ($comment['star']); ?> stars,<?php echo W('ShowMember',array('id'=>$comment['member_id']));?> "<a href="#" resid="<?php echo ($resinfo["id"]); ?>">More</a></p>
                </div>
                
                <div class="mode clearfix">
                	<ul>
                    	<li class="selected">
                        	<span class="drop_box"><label>DELIVERY</label><span></span>
                                <ul>
                                    <li><?php if($resinfo['delivery_charges']): ?>Yes<?php else: ?>No<?php endif; ?></li>
                                </ul>
                        	</span>
                        </li>
                        <li>
                        	<span class="drop_box"><label>Coupons(9)</label><span></span>
                                <ul>
                                    <li>Coupons</li>
                                </ul>
                        	</span>
                        </li>
                        <li>
                        	<span class="drop_box"><label>PICKUP</label><span></span>
                                <ul>
                                    <li><?php if($details['is_pickup'] != '1'): ?>Yes<?php else: ?>No<?php endif; ?></li>
                                </ul>
                        	</span>
                        </li>
                        <li>Reservation</li>
                        <li>Dine In Express</li>
                    </ul>
                </div>
                
                <div class="contact">
                	<div class="phone"><span class="ico"></span><?php echo ($resinfo["phone"]); ?></div>
                    <div class="address"><span class="ico"></span><a href="javascript:;"><?php echo ($resinfo["address"]); ?></a></div>
                    <div class="book"><span class="ico"></span><a href="javascript:;" resid="<?php echo ($resinfo["id"]); ?>">I want Reservation!</a></div>
                </div>
            </div>
            
            <div class="context">
            	<div class="title">
                    Click whatever you like to start your order.
                </div>
                <div class="list">
                    <div class="top"><span class="ico"></span>Package</div>
                    <ul class="clearfix">
                    <?php if(is_array($list_package)): $i = 0; $__LIST__ = $list_package;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): ++$i;$mod = ($i % 2 )?><li resid="<?php echo ($va['restaurant_id']); ?>" packid="<?php echo ($va['id']); ?>">
                        <?php if($v['is_commend'] == '1'): ?><span class="ico1 ico"></span><?php endif; ?>
                         <?php if($v['peanut'] == '1'): ?><span class="ico2 ico"></span><?php endif; ?>
                         <?php if($v['spicy'] == '1'): ?><span class="ico3 ico"></span><?php endif; ?>
                         
                            <span class="name"><?php echo ($va['group_name']); ?></span><span class="price">$<?php echo ($va['price']); ?></span>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>   
                    </ul>
                </div>
               <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><div class="list">
                	<div class="top"><span class="ico"></span><?php echo ($vo['group_name']); ?></div>
                    <ul class="clearfix">
                    <?php if(is_array($vo['dishes'])): $i = 0; $__LIST__ = $vo['dishes'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><li resid="<?php echo ($v['restaurant_id']); ?>" disid="<?php echo ($v['id']); ?>">
                        <?php if($v['is_commend'] == '1'): ?><span class="ico1 ico"></span><?php endif; ?>
                         <?php if($v['peanut'] == '1'): ?><span class="ico2 ico"></span><?php endif; ?>
                         <?php if($v['spicy'] == '1'): ?><span class="ico3 ico"></span><?php endif; ?>
                         
                            <span class="name"><?php echo ($v['item_name']); ?></span><span class="price">$<?php echo ($v['price']); ?></span>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>	
                    </ul>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

                
                
                
                
            </div>
        </div>
    </div>
    <div class="foot"></div>
	<div class="popup_layer"></div>
<?php if(cookie("OrderOnlineAuth") != ""): ?><div class="shopping_cart">
   
        <div class="cart_title clearfix" flag=true>
            <a class="lt" num="0" href="#">Your Order</a>
            <a class="rt" href="#"><?php echo ($ordernum); ?></a>
        </div>
        
        <ul>
         <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li class="clearfix">
                <a href="javascript:;" class="area lt"><?php echo ($vo['item_name']); ?></a>&nbsp;<span class="price rt">$<?php echo ($vo['price']); ?></span>
                <a href="javascript:;" class="name lt"><?php echo ($vo['quantity']); ?> Piece,<?php echo substr($vo['item'],0,13);?></a>
                <span class="num rt"><a class="reduce" href="javascript:;" s_id="<?php echo ($vo['id']); ?>"></a><span class="qty"><?php echo ($vo['quantity']); ?></span><a class="add" href="javascript:;" s_id="<?php echo ($vo['id']); ?>"></a></span>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
            <li class="last"><a href="<?php echo U('Member/yourOrder');?>">Ready</a></li>
        </ul>
       
    </div><?php endif; ?>
<script type="text/javascript">
	$(".reduce").live('click',function(){
		var val = parseInt($(this).siblings(".qty").html());
		if(val>1){
			$(this).siblings(".qty").html(val-1);
		}else{
			$(this).parents(".clearfix").remove();
			var top = parseInt($(".shopping_cart ul").css("top"))+44;
			$(".shopping_cart ul").css("top",top);
		}
		var id = $(this).attr("s_id");
		$.post("<?php echo U('Dishes/reduceQty');?>",{id:id},function(){
		},'json')
	})
	$(".add").live('click',function(){
		var val = parseInt($(this).siblings(".qty").html());	
		$(this).siblings(".qty").html(val+1);
		var id = $(this).attr("s_id");
		$.post("<?php echo U('Dishes/addQty');?>",{id:id},function(){
			
		})
	})
</script>
</body>
</html>