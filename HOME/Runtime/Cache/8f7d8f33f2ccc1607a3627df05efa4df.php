<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OrderOnline - deatail</title>
<link rel="stylesheet" href="__PUBLIC__/Index/css/reset.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/top.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/detail.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/foot.css" />
<link rel="stylesheet" href="__PUBLIC__/Index/css/font-awesome.css" />
<link href="__PUBLIC__/Index/css/popup.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="__PUBLIC__/Index/js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/jquery-extend-order.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/main.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/public.js"></script>
<script type="text/javascript" src="__PUBLIC__/Index/js/order.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/tooltipsy.min.js"></script>
<script type="text/javascript" charset="utf-8">
    var getResCouponsUrl = "<?php echo U('Member/getResCoupons');?>";
    var res_id = <?php echo ($resinfo["id"]); ?>;
    var getCouponsInfoUrl = "<?php echo U('Member/getCouponsInfo');?>";
    var getCouponsItemUrl = "<?php echo U('Member/getCouponsItem');?>";
    var useCouponUrl = "<?php echo U('Member/useCoupon');?>";
</script>
</head>

<body>
    	<div class="top-box">
<div class="top clearfix">
        	<a href="/"><img class="logo" src="__PUBLIC__/Index/images/logo.gif" /></a>
           <?php if(cookie("OrderOnlineAuth") == ""): ?><div class="btn btn1">
            	<a class="login" href="#">Sign In</a>
            	<a class="regist" href="#">Create Your Account</a>
            </div>
            <?php else: ?>
            <div class="btn btn2">
                <!--<a class="quit" href="<?php echo U('Member/logout');?>">Sign out</a>-->
                <a class="cart" href="<?php echo U('Member/yourOrder');?>">Cart(<?php echo ($member_count); ?>)</a>
                <div class="chris-box"> 
            	    <a class="chris" href="<?php echo U('Member/personal');?>"><?php echo ($member_name); ?><i class="fa fa-chevron-down"></i></a>
                   <ul class="order-account-nav">
                      <li class="nav-font fa fa-caret-up"></li>
                      <li><a class="account-nav-1" href="<?php echo U('Member/personal');?>">Order historry</a></li>
                      <li><a href="<?php echo U('Member/profile');?>">Profile</a></li>
                      <li><a href="<?php echo U('Member/address');?>">Addresses</a></li>
                      <li><a href="<?php echo U('Member/cards');?>">Credit cards</a></li>
                      <li><a href="<?php echo U('Member/logout');?>">Log out</a></li>
                  </ul>
              </div>
            </div><?php endif; ?>
        </div>
</div>

	<div class="container">
    	<form name="form" method="post" id="form" action="<?php echo U('Dishes/results');?>">
        <div class="search_box clearfix">
        	<div class="left clearfix">
                <span class="t1">Please Enter Your Address:</span><input class="b1" type="text" id="address" name="address" value="" placeholder="Street Address, City, State" /><br />
                <span class="t2">What would you like? (optional):</span><input class="b2" id="cuisines" type="text" name="taste" placeholder="tuna melt, John's Subs, Italian" value="" />
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


        
    	<div class="detail">
            <div class="shop clearfix">
            	<div class="ico">
                	<img src="<?php echo ($resinfo["logo"]); ?>" width="140" height="81" />
                        <p class="stars" resid="<?php echo ($resinfo["id"]); ?>"><a href="#" resid="<?php echo ($resinfo["id"]); ?>">More</a></p>

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
                    <p class="p4" id="num" num="<?php echo W('ShowStar',array('id'=>$resinfo['id']));?>" flag=false><label>Item(<?php echo ($count); ?>) &nbsp;Package(<?php echo ($count_package); ?>)</label></p>
                </div>
                
                                
                <div class="contact">
                	<div class="phone"><span class="ico"></span><?php echo ($resinfo["phone"]); ?></div>
                    <div class="address"><span class="ico"></span><a href="javascript:;"><?php echo ($resinfo["address"]); ?></a></div>
                    <div class="book"><span class="ico"></span><a href="javascript:;" resid="<?php echo ($resinfo["id"]); ?>">I want Reservation!</a></div>
                </div>
            </div>


            <div class="context">
              <div class="menu">
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

    	                <div class="order">
                <h1>Your Order1</h1>
                <ul class="ordertiems">
                    <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li class="orderitem" data-price='<?php echo ($vo['price']); ?>' data-add-price="<?php echo ($vo['item_add_price']); ?>">
                            <span class="quantity">
                            <a class="reduce" href="javascript:;" s_id="<?php echo ($vo['id']); ?>">-</a>
                            <span class="num qty"><?php echo ($vo['quantity']); ?></span>
                            <a class="add" href="javascript:;" s_id="<?php echo ($vo['id']); ?>">+</a>
                        </span>
                        <span class="name"><?php echo ($vo['item_name']); ?></span>
                        <span class="price rt">$<em class="em_price"><?php echo ($vo['price'] * $vo['quantity']); ?></em><?php if($vo['item_add_price']) echo '<em class="hastip" data-id="'.$vo['id'].'">+' . $vo['quantity'] * $vo['item_add_price'] . "</em>";?></span>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <!--<li class="last"><a href="<?php echo U('Member/yourOrder');?>">Ready</a></li>-->
                </ul>
                <ul class="subtotal-item">
                    <li>
                        <span>Subtotal</span>
                        <span class="subtotal sub-total">$0.00</span>
                    </li>
                    <li>
                        <span class="tax-text">Tax</span>
                        <span class="tax">$0.00</span>
                    </li>
                </ul>
                    <?php
                    if(ACTION_NAME != 'placeOrder'){
                    ?>
                    <ul class="mode clearfix">
                        <li>
                            <span class="drop_box btn-coupons"><label>Coupons list.</label></span>
                        </li>
                        </ul>
                    <h2 class="to-order">Ready to order?</h2>
                    <?php
                    }
                    ?>
                <div class="finish-btn">
                    <?php
                    if(ACTION_NAME == 'placeOrder'){
                    ?>
                    <?php if(cookie("goMenuHubCoupons") != ""): ?><ul class="mode clearfix">
                        <li>
                            <span class="drop_box"><label>use coupons.</label></span>
                        </li>
                        </ul><?php endif; ?>
                       <div class="place-order"><a href="javascript:void(0)" id="place-order">Place order</a></div> 
                    <?php 
                    }
                    else{
                    ?>
                    <a class="check-btn novalid" id="delivery" href="javascript:void(0)">
                        <!--<h3>I want delivery!</h3>
                        <p class="delivery">Delivery $<span>2.00</span></p>
                        <p class="delivery-total">Total $<span>0.00</span></p>-->
                        <div id="ok-delivery" style="display:none;">
                            <h3>I want delivery!</h3>
                            <p class="delivery">Delivery $<span><?php echo ($resinfo["min_delivery"]); ?></span></p>
                            <p class="delivery-total">Total $<span>0.00</span></p>
                        </div>
                        <div id="no-delivery">
                            <h3>Want delivery?</h3>
                            <p class="delivery">Add $<span>2.00</span></p>
                            <p class="delivery-total">Minimum $<span><?php echo ($resinfo["order_minimum"]); ?></span></p>
                        </div>
                    </a> 
                    <a class="pickup-btn" id="pickup" href="<?php echo U('Member/placeOrder?res_id='.$resinfo["id"].'&type=pickup');?>">
                        <!--<h3>Pickup not available</h3>-->
                        <h3>I'll pick it up</h3>
                        <p class="delivery-total">Total $<span>0.00</span></p>
                    </a>          	
                    <?php }?>
                </div>
              </div>
<script type="text/x-tmpl" id="tmpl-delivery">
    <h3>I want delivery!</h3>
    <p class="delivery">Delivery $<span><?php echo L("=o.delivery%");?></span></p>
    <p class="delivery-total">Total $<span><?php echo L("=o.total%");?></span></p>
</script>

<script type="text/x-tmpl" id="tmpl-no-delivery">
    <h3>Want delivery?</h3>
    <p class="delivery">Add $<span>2.00</span></p>
    <p class="delivery-total">Minimum $<span>0.00</span></p>
</script>
<script type="text/javascript">
$(document).ready(function(){

    $('.hastip').tooltipsy({
        content: function ($el, $tip) {
            var id = $el.attr('data-id');
            $.get("<?php echo U('Order/getPackageAddItem');?>", {id : id}, function (data) {
                $tip.html(data);
            });
            
            return 'Fallback content';
        },
        offset: [-10, 0],
        show: function (e, $el) {
            $el.css({
                'left': parseInt($el[0].style.left.replace(/[a-z]/g, '')) - 50 + 'px',
                'opacity': '0.0',
                'display': 'block'
            }).animate({
                'left': parseInt($el[0].style.left.replace(/[a-z]/g, '')) + 50 + 'px',
                'opacity': '1.0'
            }, 300);
        },
        hide: function (e, $el) {
            $el.slideUp(100);
        },
        css: {
            'padding': '10px',
            'max-width': '200px',
            'color': '#303030',
            'background-color': '#f5f5b5',
            'border': '1px solid #deca7e',
            '-moz-box-shadow': '0 0 10px rgba(0, 0, 0, .5)',
            '-webkit-box-shadow': '0 0 10px rgba(0, 0, 0, .5)',
            'box-shadow': '0 0 10px rgba(0, 0, 0, .5)',
            'text-shadow': 'none'
        }
    });
    //最小送餐金额
    order.order_minimum = <?php echo ($resinfo["order_minimum"]); ?>;
    order.min_delivery = <?php echo ($resinfo["min_delivery"]); ?>;
    order.deliveryUrl = "<?php echo U('Member/placeOrder?res_id='.$resinfo["id"].'&type=delivery');?>";
    order.pickupUrl = "<?php echo U('Member/placeOrder?res_id='.$resinfo["id"].'&type=pickup');?>";
    var subTotal = 0.00;
    var tax = 0.00;

    $(".reduce").live('click',function(){
        var val = parseInt($(this).siblings(".qty").html());
        if(val>1){
            var old_price = $(this).parents('.orderitem').find('.em_price').html();
            //增加菜品的价格
            var old_add_price = $(this).parents('.orderitem').find('.hastip').html();
            var unit_price = $(this).parents('.orderitem').attr('data-price');

            //增加菜品的单价
            var unit_add_price = $(this).parents('.orderitem').attr('data-add-price');
            var newprice = parseFloat(old_price) - parseFloat(unit_price);
            var newAddPrice = parseFloat(old_add_price) - parseFloat(unit_add_price);

            $(this).siblings(".qty").html(val-1);
            $(this).parents('.orderitem').find('.em_price').html(newprice.toFixed(2));
            $(this).parents('.orderitem').find('.hastip').html('+' + newAddPrice.toFixed(2));
        }else{
            $(this).parents(".orderitem").remove();
        }
        var id = $(this).attr("s_id");
        $.post("<?php echo U('Dishes/reduceQty');?>",{id:id},function(){
        },'json');
        order.calSubTotal();
    })

    $(".add").live('click',function(){
        var val = parseInt($(this).siblings(".qty").html());	
        var old_price = $(this).parents('.orderitem').find('.em_price').html();
        //增加菜品的价格
        var old_add_price = $(this).parents('.orderitem').find('.hastip').html();
        var unit_price = $(this).parents('.orderitem').attr('data-price');
        //增加菜品的单价
        var unit_add_price = $(this).parents('.orderitem').attr('data-add-price');
        var id = $(this).attr("s_id");
        
        var newprice = parseFloat(old_price) + parseFloat(unit_price);
        var newAddPrice = parseFloat(old_add_price) + parseFloat(unit_add_price);

        $(this).parents('.orderitem').find('.em_price').html(newprice.toFixed(2));
        $(this).parents('.orderitem').find('.hastip').html('+' + newAddPrice.toFixed(2));
        $(this).siblings(".qty").html(val+1);
        $.post("<?php echo U('Dishes/addQty');?>",{id:id},function(){
        });
        order.calSubTotal();
    });

    order.calTip();
    order.calSubTotal();

    $('.tip-percent').click(function(){
        var tipPercent = $(this).attr('data-percent');
        order.calTip(tipPercent);
        $('.tip-percent').removeClass('hover');
        $(this).addClass('hover');
    });

    $(".order").smartFloat();

    $('#addNewAddress').click(function(){
        $('.address-fields').toggle();
    });

    $('#place-order').click(function(){
        if(!res_id){
            alert('Illegal operation.');
            return false;
        }
        
        var address_id = $('.address-radio:input:radio:checked').val();
        var card_id = $('.card-radio:input:radio:checked').val();
        var tip = $('#order-tip').text().substr(1);
        
        var orderInfo = {
            restaurant_id: res_id,
            type : '<?php echo ($type); ?>',
            address_id : address_id,
            card_id : card_id,
            tip : tip,
            payment : payment
        };

        var param = $.param(orderInfo);

        $.post(doOrderUrl, orderInfo, function(data){
            console.log(data);
            window.location.href = data.url;
        }, 'json');
    });

    $('#credit-tab').click(function(){
        payment = 'card';
        var tipPercent = $('.tip-percent.hover').attr('data-percent');
        console.log('TIP:'+tipPercent);
        order.calTip(tipPercent);
        $('#cash-tab').removeClass('hover');       
        $(this).removeClass('hover').addClass('hover');       
        $('.credit-and-other').show();
        $('.cartinfo-tip').show();
        $('.other-payments').hide();
        $('.add-edit-address').show();
        $('.line-total').show();
    });
    
    $('#cash-tab').click(function(){
        payment = 'cash';
        order.calTip(0);
        $('#credit-tab').removeClass('hover');       
        $(this).removeClass('hover').addClass('hover');       
        $('.other-payments').show();
        $('.cartinfo-tip').hide();
        $('.credit-and-other').hide();
        $('.add-edit-address').hide();
        $('.line-total').hide();
    });
});
</script>



            </div>
        </div>
    </div>
    <div class="foot"></div>
    <div class="popup_layer"></div>
</body>
</html>