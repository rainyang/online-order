$(function(){
    $('#save').click(function(){
        //验证
        $('#member_form').submit();
    });

    $('.add-edit-address').click(function(){
        $('.account-list').toggle();
    });

    //添加信用卡
    //todo,没有做验证
    $('#btn-add-card').click(function(){
        $.post(
        doCardUrl,
        {
            card_number: $('#card_number').val(),
            card_exp_month: $('#card_exp_month').val(),
            card_exp_year: $('#card_exp_year').val(),
            card_cvv: $('#card_cvv').val(),
            card_zip: $('#card_zip').val(),
            member_id: $('#member_id').val(),
            id: $('#member_card_id').val(),
        },
        function(data, status){
            if(data){
                if(data.id === undefined){  //新增地址
                    $('.cards-list').append('<p class="no-cards"><span><input type="radio" name="card_id" class="card-radio" id="card_id" value="'+data.id+'"></span><span>'+data.card_number+'</span><span>'+data.card_zip+'</span></p>');
                    $('.account-list').hide();
                    $('#no-card').hide();
                }
                else{   //更新地址
                    var $cards = $('.cards-list p[data-id=' + data.id + ']');
                    $cards.find('.card-number').text(data.card_number);
                    $('#address-name').text('Add address');
                    $('.account-list').hide();
                }
            }
        },
        'json'
        );
    });

    //编辑信用卡
    $('.edit-card').click(function(){
        var card_id= $(this).attr('data-id');
        $('#member_card_id').val(card_id);
        var url = getCardUrl;
        //获得地址数据
        $.getJSON(url, {id: card_id}, function(res){
            $('#card_number').val(res.card_number);
            $('#card_exp_month').val(res.card_exp_month);
            $('#card_exp_year').val(res.card_exp_year);
            $('#card_cvv').val(res.card_cvv);
            $('#card_zip').val(res.card_zip);
            //$('#member_card_id').val(res.card_id);
        });
        $('#address-name').html('Edit Card');
        $('.account-list').show();
    });


    //todo,没有做验证
    $('#btn-add-address').click(function(){
        $.post($('#url').val(),
        {
            address: $('#member_address').val(),
            company: $('#company').val(),
            city: $('#city').val(),
            state: $('#state').val(),
            zip_code: $('#zip_code').val(),
            mobile: $('#mobile').val(),
            member_id: $('#member_id').val(),
            id: $('#member_address_id').val(),
        },
        function(data, status){
            if(data){
                if(data.id === undefined){  //新增地址
                    $('.address-list').append('<p class="no-addresses"><span><input type="radio" name="address_id" class="address-radio" id="address_id" value="'+data.id+'"></span><span>'+data.address+'</span><span>'+data.mobile+'</span></p>');
                    $('.account-list').hide();
                    $('.address-fields').hide();
                    $('#no-address').hide();
                }
                else{   //更新地址
                    var $address = $('.address-list p[data-id=' + data.id + ']');
                    $address.find('.address-name').text(data.address);
                    $address.find('.address-mobile').text(data.mobile);
                    $('#address-name').text('Add address');
                    $('.account-list').hide();
                    $('.address-fields').hide();
                }
            }
        },
        'json'
        );
    });

    //编辑地址
    $('.edit-address').click(function(){
        var address_id = $(this).attr('data-id');
        $('#member_address_id').val(address_id);
        var url = $('#getAddressurl').val();
        //获得地址数据
        $.getJSON(url, {id: address_id}, function(res){
            $('#member_address').val(res.address);
            $('#company').val(res.company);
            $('#city').val(res.city);
            $('#state').val(res.state);
            $('#zip_code').val(res.zip_code);
            $('#mobile').val(res.mobile);
        });
        $('#address-name').html('Edit address');
        $('#addNewAddress').html('Edit address');
        $('.account-list').show();
        $('.address-fields').show();
    });

    $('#set-default-address').click(function(){
        event.stopPropagation();
        var aid = $('.address-radio:input:radio:checked').val();
        $.post(setDefaultAddressUrl, {id: aid}, function(data){
            if(data == 1){
                alert('Set default address success!');
                $('.address-list p').removeClass('address-default');
                $('.address-list p[data-id=' + aid + ']').addClass('address-default');
            }
        });
    });

    $('#set-default-card').click(function(){
        event.stopPropagation();
        var aid = $('.card-radio:input:radio:checked').val();
        $.post(setDefaultCardUrl, {id: aid}, function(data){
            if(data == 1){
                alert('Set default card success!');
                $('.cards-list p').removeClass('cards-default');
                $('.cards-list p[data-id=' + aid + ']').addClass('cards-default');
            }
        });
    });


    //取消编辑
    $('.count-cancle').click(function(event){
        if($(this).attr('data-type') == 'address'){
            $('#addNewAddress').html('Add address');
            $('#address-name').html('Add address');
        }
        else{
            $('#address-name').html('Add Credit card');
        }
        $('.account-list').hide();
        $('.address-fields').hide();
    });

});
