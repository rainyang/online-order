/**
 * order对象
 * 用于订单计算
 * author by RainYang
 */

var order = {};
order.subTotal = 0.00;
order.tax = 0.00;
order.tip = 0.00;
order.total = 0.00;
order.order_minimum = 0;
order.min_delivery = 0;
order.coupons_type = 0;
order.discount = 0;
order.cash = 0;

//计算消费
order.calTip = function (tipPercent){
    if(tipPercent === undefined){
        tipPercent = 0.15;
    }

    var tip = order.subTotal * tipPercent;
    order.tip = tip;
    var total = tip + order.tax + order.subTotal;
    //console.log('total:' + total);
    //console.log('Tip:' + order.subTotal);
    $('#tip-input').val('$' + tip.toFixed(2));
    $('#order-tip').text('$' + tip.toFixed(2));
    $('#order-total').text('$' + total.toFixed(2));
    $('#order-tip-title').text('Tip (' + tipPercent * 100 + '%): ');
};

//计算subtotal,每次加减操作都计算
order.calSubTotal = function (){
    //var subTotal = parseFloat($(".orderItem").find(".price").html().substr(1))-price;
    var subTotal = 0;
    var item_price = 0;
    $('.orderitem').each(function(){
        item_price = ($(this).find('.hastip').length >0 ) ? parseFloat($(this).find('.hastip').html().substr(1)) : 0;
        subTotal += parseFloat($(this).find('.em_price').html()) + item_price; 
    });

    console.log(subTotal);

    /*  //暂时搁置
    if(order.coupons_type == 1){
        old_subTotal = subTotal;
        subTotal = subTotal * (order.discount * 0.01);
    }

    if(order.coupons_type == 2){
        old_subTotal = subTotal;
        subTotal = subTotal - order.cash;
    }
    */

    order.subTotal = subTotal;

    order.calTip($('.tip-percent.hover').attr('data-percent'));
    
    var tax = subTotal * 0.05;
    order.tax = tax;
    var allTotal = subTotal + tax;
    order.total= allTotal;

    /*  //暂时搁置
    if(order.coupons_type == 1){
        //原有的总价不变
        //新增折扣后价格
        $('.sub-total').html('$' + old_subTotal.toFixed(2));
        $('.sub-total').removeClass('text-line').addClass('text-line');
        $('#discount-li').remove();
        $('.sub-total').parent().after('<li id="discount-li"><span>discount</span><span class="subtotal">'+ subTotal.toFixed(2) +'</span></li>');
    }
    else if(order.coupons_type == 2){
        $('.sub-total').html('$' + old_subTotal.toFixed(2));
        $('.sub-total').removeClass('text-line').addClass('text-line');
        $('#discount-li').remove();
        $('.sub-total').parent().after('<li id="discount-li"><span>new SubTotal</span><span class="subtotal">'+ subTotal.toFixed(2) +'</span></li>');
    }
    else{
        $('.sub-total').html('$' + subTotal.toFixed(2));
    }
    */

    $('.sub-total').html('$' + subTotal.toFixed(2));
    $('.tax').html('$' + tax.toFixed(2));

    $('.all-total').html('$' + allTotal.toFixed(2));
    //console.log(subTotal);
    
    $('#order-subtotal').text('$' + subTotal.toFixed(2));
    $('#order-total').text('$' + allTotal.toFixed(2));
    $('#order-tax').text('$' + tax.toFixed(2));
    order.ordercheck_finishdelivery(subTotal, tax);
    order.ordercheck_finishpickup(allTotal);
};
    
//check是否达到送餐要求
order.ordercheck_finishdelivery = function (subTotal, tax){
    var addPrice = order.order_minimum - subTotal;
    //if (subTotal < order_mininum){
    if (addPrice > 0){
        //总金额小于最小送餐金额
        $('#delivery').addClass('novalid');
        //$('#delivery').href('');
        $('#ok-delivery').hide();
        $('#ok-delivery .delivery-total span').text('0.00');
        $('#no-delivery').show();

        $("#no-delivery .delivery span").text(addPrice.toFixed(2));
    }
    else{
        $('#delivery').removeClass('novalid');
        $('#ok-delivery').show();
        $('#no-delivery').hide();
        //console.log(subTotal);
        //console.log(order_minimum);
        console.log('subTotal:' + subTotal);
        console.log('min_delivery:' + order.min_delivery);
        console.log('tax:' + tax);
        $('#ok-delivery .delivery-total span').text((subTotal + order.min_delivery + tax).toFixed(2));
        $('#delivery').attr('href', order.deliveryUrl);
        $('#pickup').attr('href', order.pickupUrl);
        //console.log('test');
    }
};

order.ordercheck_finishpickup = function(allTotal){
    $('#pickup span').text(allTotal.toFixed(2));
};

/*
 *
 *var OrderInfo = {
 *    type : orderType;
 *    address : $('').val();
 *};
 *    
 */
