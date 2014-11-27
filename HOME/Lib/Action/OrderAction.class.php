<?php
//订单模块
class OrderAction extends CommonAction
{
    //完成订单
    function orderdone()
    {
		$RestaurantMember = M('RestaurantMember');
        $RestaurantInfo = $RestaurantMember->find($_GET['restaurant_id']);
        $this->assign('bh_no',$_GET['bh_no']);
        $this->assign('resinfo',$RestaurantInfo);
     	$this->display('Member/orderdone');  
    }

    //提交订单处理
	public function orders(){
        $auth = $this->auth();
        $address_id = intval($_POST['address_id']);
        $card_id = intval($_POST['card_id']);
        $restaurant_id = intval($_POST['restaurant_id']);

        //快递方式,1快递,2自取,3堂吃
        $type = ($_POST['type'] == 'delivery') ? 1 : 2;
        $tip = $_POST['tip'];

        //支付方式，0现金，1信用卡
        $payment = ($_POST['payment'] == 'cash') ? 0 : 1;

		$Order = M('Billhead');
		$OrderItem = M('Billitem');
		$OrderNote = M('Billnote');
		$OrderAttr = M('Billattribute');
		$Address = M('Member_address');
		$Card = M('Member_card');
		$CouponsModel = M('coupons');
		$ShoppingCart = M('ShoppingCart');

		//$Member = M('Member');
		//$member = $Member->where(array('account'=>$auth->username))->find();

        //地址信息
		$addressInfo = $Address->find($address_id);
		$cardInfo = $Card->find($card_id);

        //购物车
		//$cartInfo = $ShoppingCart->where(array('id' => array('in',$_POST['cart_ids'])))->select();
		$cartInfo = $ShoppingCart->where(array('member_id' => $auth->id))->select();

        if(!$cartInfo or ($cartInfo[0]['member_id'] != $auth->id)){
            echo json_encode(array('status' => 0, 'err' => 'Members and shopping cart data does not match!'));
            exit;
        }

        //餐馆信息
		$RestaurantMember = M('RestaurantMember');
        $RestaurantInfo = $RestaurantMember->find($restaurant_id);

        $ModelCart = M();
        //取购物车里的subtotal，不包含税点和小费、快递费以及优惠券情况
        $subTotal = $ModelCart->query("SELECT sum(price*`quantity`) as subTotal, sum(`item_add_price` * `quantity`) as subItemTotal FROM `on_shopping_cart` WHERE `member_id` = {$auth->id} and `status` = 0 and `restaurant_id` = {$restaurant_id}");
        /*
         *echo $ModelCart->getLastSql();
         *print_r($subTotal);
         *exit;
         */

        $coupon = cookie('goMenuHubCoupons');
        if($coupon){
            $coupon = unserialize($coupon);
            $couponInfo = $CouponsModel->find($coupon['coupon_id']);
        }

		$data = array(
			'restaurant_id'	=>	$restaurant_id,
			'bh_no' 		=>	date('YmdHis',time())+substr(time(),7)+rand(1,99999),
			'bh_type'		=>	$type,
			'bh_status'		=>	'0',
			'bh_column'		=>	'0',
			'bh_customer_id'=>	$auth->id,
			'bh_subtotal'	=>	$subTotal[0]['subTotal'] + $subTotal[0]['subItemTotal'],
			'bh_discount'	=>	$couponInfo['discount'],
			'bh_dx'	        =>	$couponInfo['cash'],
			//'bh_disamt'	=>	
			'bh_taxrate'	=>	$RestaurantInfo['tax'],
			'bh_taxamt'	    =>	$subTotal[0]['subTotal'] * ($RestaurantInfo['tax'] / 100) ,  //税费,税率*小计
			'bh_delivery'	=>	($type == 1) ? $RestaurantInfo['delivery_charges'] : 0,
			'bh_tips'		=>	$tip,
			//'bh_total'	    =>	
			'bh_payment'	=>	$payment,
			'bh_address'	=>	$addressInfo['address'],
			'bh_create_time'=>	time(),
	    );
        
        if($data['bh_discount']){
            $data['bh_total'] = $data['bh_subtotal'] * ($data['bh_discount'] / 10) + $data['bh_tips'] + $data['bh_delivery'] + $data['bh_taxamt'];
        }

        if($data['bh_dx']){
            $data['bh_total'] = $data['bh_subtotal'] - $data['bh_dx'] + $data['bh_tips'] + $data['bh_delivery'] + $data['bh_taxamt'];
        }

        if(!$data['bh_dx'] && !$data['bh_discount']){
            $data['bh_total'] = $data['bh_subtotal'] + $data['bh_tips'] + $data['bh_delivery'] + $data['bh_taxamt'];
        }
        //print_r($data);

        //todo,支付过程/发送邮件/发送传真/没做

		//if($_POST['payment'] == 1)
		if(1)
		{
            //添加到订单主信息
			$order_id = $Order->add($data);
            //echo $Order->getLastSql();
			//$rs_item = $OrderItem->add($dataItem);
			if($order_id)
			{	
				//$_POST['quantity'] = explode(',',$_POST['quantity']);
				foreach($cartInfo AS $key => $val)
				{
					$rs_item = $OrderItem->add(array(
													'restaurant_id' => $restaurant_id,
													'bh_id' => $order_id,
													'item_id' => $val['item_id'],
													//'bi_quantity' => $_POST['quantity'][$key],
													'bi_quantity' => $val['quantity'],
													'bi_price' => $val['price'],
													'bi_amount' => $val['price'] * $val['quantity']
													));
				}

				$ret = json_encode(array('status'=>'1','id' => $order_id, 'url' => U('Order/orderdone', $data)));	
			}
		}

        //销毁处理
		cookie('goMenuHubCoupons', null);

        //更新购物车数据
        $cartData = array('status' => 1, 'bh_no' => $data['bh_no']);
		$upid = $ShoppingCart->where("member_id = {$auth->id} and status = 0 and bh_no is null and restaurant_id={$restaurant_id}")->save($cartData);

        //echo $ShoppingCart->getLastSql();

        unset($data);
        echo $ret;
		//print_r($data);
		/*if($rs){/
			if($_POST['payment'] == 1){
				$this->success('成功订单');
			}else{
				echo json_encode(array('status'=>'0','msg'=>'error.'));	
			}
		}else{
			echo json_encode(array('status'=>'0','msg'=>'error1.'));	
		}*/

	}
	
    public function book(){
		if(!preg_match("/^\d+\-?\d*$/",$_POST['tel'])){
			echo json_encode(array('status'=>'0','msg'=>'Moble Number input error.'));
			exit;
		}
		if(!preg_match("/^[1-9]\d*$/",$_POST['people'])){
			echo json_encode(array('status'=>'0','msg'=>'People input error.'));
			exit;	
		}
		if(time() > strtotime($_POST['date'])){
			echo json_encode(array('status'=>'0','msg'=>'Date input error.'));
			exit;	
		}
		$Order = M('Billhead');
		/*$max = $Order->max('id');
		if(($max+1) < 1000){
			$order_sn = sprintf("%04d", ($max+1));	
		}else{
			$order_sn = ($max+1);	
		}*/
		$cookie = cookie('OrderOnlineAuth');
		$auth = authcode($cookie);
		$authlist = explode("\t",$auth);
		$data = array(
			'restaurant_id'=>$_POST['restaurant_id'],
			'bh_no' 		=>	date('YmdHis',time())+substr(time(),7)+rand(1,99999),
			'bh_type' => '4',
			'bh_status'		=>	'0',
			'bh_column'		=>	'0',
			'bh_customer_id'=>	$authlist[0],
			//'order_sn'	=>	date('Ymd',time()).$order_sn,
			'bh_consignee' =>	$_POST['fname'].' '.$_POST['lname'],
			'bh_tel'		=>	$_POST['tel'],
			'bh_reservation_time'	=> strtotime($_POST['date'].$_POST['hours'].$_POST['minute']),
			'bh_people'	=>	$_POST['people'],
			'bh_create_time'=>time(),
		);//print_r($data);
		$rs = $Order->add($data);
		if($rs){
			echo json_encode(array('status'=>'1'));	
		}else{
			echo json_encode(array('status'=>'0','msg'=>'error.'));	
		}
	}

    function getPackageAddItem()
    {
        $id = intval($_GET['id']);
		//$ModelItemAttr = M('Item_attribute');
		$ShoppingCart = M('ShoppingCart');

        $carts = $ShoppingCart->find($id);
        $addItems = unserialize($carts['package_add_item']);

		$Dishes = M('Item');

        foreach($addItems as $key => $val){
            $item = $Dishes->find($key);
            echo "<p class='order_list_p'><span class='order_list_p_left'>{$item['item_name']}</span><span class='order_list_p_right'>+{$val}</span></p>";
        }
        //echo "哈哈成功". $id;
    }

    //获得套餐用户是否加价数组
    function getItemAddPrice($data){
		$ModelItemAttr = M('Item_attribute');

        //取attribute里相应的加价信息
        $res = $ModelItemAttr->where(array('package_id' => $data['package_id'], 'restaurant_id' => $data['restaurant_id']))->select();

        //print_r($res);
        //通过两次foreach，把attr表里的加价数据变为数组
        foreach($res as $key => $val){
            if(!$val['is_values'])
                continue;
            $is_values = explode(',', $val['is_values']);
            foreach($is_values as $k => $v){
                $is_value = explode('=', $v);
                $value_list[$is_value[0]] = $is_value[1];
            }
        }

        if(!$value_list){
            return false;
        }

        //print_r($value_list);

        //把用户选择的数据先转为数组，再进行key/value翻转，通过array_intersect_key进行键名比较，得到最终的数组
        $items = explode(',', $data['item_id']);
        array_pop($items);        
        $newItems = array_flip($items);
        //print_r($newItems);

        $userItemAttr = array_intersect_key($value_list, $newItems);
        if(!$userItemAttr){
            return false;
        }
        //print_r($userItemAttr);
        return $userItemAttr;
    }

    //添加到购物车
    public function shoppingcart(){
		$ShoppingCart = M('ShoppingCart');
		//$DishesItem = M('DishesItem');
		$Dishes = M('Item');
		$Package = M('Packagelist');
		$Group = M('PackageGroup');
		$cookie = cookie('OrderOnlineAuth');
		$authlist = explode("\t",authcode($cookie));//print_r($authlist);
		if($_POST['package_id']){
			$results = $Package->where(array('id' => $_POST['package_id']))->find();//print_r($results);
			
			//$result = $ShoppingCart->add(array('package_id' => $_POST['package_id']));
			$data = array(
						'package_id' => $_POST['package_id'],
						'item_name' => $results['group_name'],
						'cuisine_id' => $results['cuisine_id'],
						'restaurant_id'=>$_POST['restaurant_id'],
						'member_id'	=>	$authlist[0],
						'total_price'=>	$results['price'],
						'price'		=>	$results['price'],
						'remark'	=>	$_POST['remark'],
						'quantity'	=>	$_POST['quantity'],
						'create_time' => time(),
						'status'	=>	'0'
						);

            //根据取得的参数，获取itemName_13这样的数据值,没有分组，直接全部取出
            /*  传递参数如下：
                restaurant_id:1
                package_id:14
                itemName_13[]:32
                itemName_13[]:31
                itemName_12[]:12
                itemName_12[]:9
                itemName_12[]:14
                itemName_11[]:37
                quantity:1
             */
            foreach($_REQUEST as $postKey => $postVal){
                if(strpos($postKey, 'itemName_') !== false){
                    foreach($_REQUEST[$postKey] as $key => $val){
					    $data['item_id'] .= $val . ',';
                    }
                }
            }

            $data['package_add_item'] = $this->getItemAddPrice($data);

            if($data['package_add_item']){
                $data['item_add_price'] = array_sum($data['package_add_item']);
                $data['package_add_item'] = serialize($data['package_add_item']);
            }

            //print_r($result);print_r($data);
			$rs = $ShoppingCart->add($data);
			if($rs){
				echo json_encode(array('status'=>'1'));
			}else{
				echo json_encode(array('status'=>'0','msg' => 'error'));
			}
			
		}else{
			if(!preg_match('/^[1-9]\d*$/',$_POST['quantity'])){
				echo json_encode(array('status'=>'0','msg'=>'Qty input error.'));	
				exit;
			}
			/*foreach($_POST as $k=>$v){
				if(preg_match('/^(radio|checkbox)\d+$/',$k)){
					if(empty($items_ids)){
						$items_ids = $v;
					}else{
						$items_ids .=','.$v;	
					}
				}
			}*/
			
			$dishesinfo = $Dishes->field('item_name,cuisine_id,group_id,price')->where(array('id'=>$_POST['dishes_id']))->find();//print_r($dishesinfo);
			//$items = $DishesItem->field('item_name,add_price')->where(array('id'=>array('in',$items_ids)))->select();
			$totalmoney = $dishesinfo['price'];
			
			/*foreach($items as  $key=>$val){
				$item[$val['item_name']] = $val['add_price'];
				$totalmoney = $totalmoney+$val['add_price'];	
			}*/
			
			$data = array(
				'item_id' => $_POST['dishes_id'],
				'item_name'=> $dishesinfo['item_name'],
				'cuisine_id' => $dishesinfo['cuisine_id'],
				'group_id' => $dishesinfo['group_id'],
				//'items_id'	=>	$items_ids,
				//'items'		=>	json_encode($item),
				'restaurant_id'=>$_POST['restaurant_id'],
				'member_id'	=>	$authlist[0],
				'quantity'	=>	$_POST['quantity'],
				'total_price'=>	($totalmoney*$_POST['quantity']),
				'price'		=>	$totalmoney,
				'remark'	=>	$_POST['remark'],
				'create_time' => time(),
				'status'	=>	'0'
			);//print_r($data);exit;
			$rs = $ShoppingCart->add($data);
			if($rs){
				echo json_encode(array('status'=>'1'));
			}else{
				echo json_encode(array('status'=>'0','msg'=>'error.'));	
			}
		}
		
	}
	
	public function delCart(){
		$id = $_POST['id'];
		$ShoppingCart = M('ShoppingCart');
		$rs = $ShoppingCart->where(array('id'=>$id))->delete();
		if($rs){
			echo json_encode(array('status'=>'1'));	
		}
	}
	public function changeQty(){
		$cookie = cookie('OrderOnlineAuth');
		$authlist = explode("\t",authcode($cookie));
		$type = isset($_POST['type'])?$_POST['type']:'';
		$id = isset($_POST['id'])?$_POST['id']:'';
		$num = isset($_POST['num'])?$_POST['num']:'';
		$ids = isset($_POST['ids'])?$_POST['ids']:'';
		$ShoppingCart = M('ShoppingCart');
		$qty = $ShoppingCart->field('quantity,price')->where(array('id'=>$id))->find();
		if($type == 'reduce'){
			if($qty['quantity'] == '1'){
				$ShoppingCart->where(array('id'=>$id))->delete();	
			}else{
				$totalprice = ($qty['quantity']-1)*$qty['price'];
				$ShoppingCart->where(array('id'=>$id))->save(array('total_price'=>$totalprice));
				$ShoppingCart->where(array('id'=>$id))->setDec('quantity');	
			}
		}
		if($type == 'add'){
			$totalprice = ($qty['quantity']+1)*$qty['price'];
			$ShoppingCart->where(array('id'=>$id))->save(array('total_price'=>$totalprice));
			$ShoppingCart->where(array('id'=>$id))->setInc('quantity');		
		}
		if($type == 'change'){
			$totalprice = $num*$qty['price'];
			$ShoppingCart->where(array('id'=>$id))->save(array('quantity'=>$num,'total_price'=>$totalprice));	
		}	
		$list = $ShoppingCart->field('person,total_price')->where(array('id'=>array('in',$ids),'person'=>array('neq','')))->order('id desc')->select();	
			echo json_encode($list);
	}

	public function getOrderlist(){
		$ids = $_POST['ids'];
		$ShoppingCart = M('ShoppingCart');
		$list = $ShoppingCart->field('person,total_price')->where(array('id'=>array('in',$ids),'person'=>array('neq','')))->order('id desc')->select();
		echo json_encode($list);
	}
	public function endpage(){

		$this->display('bill');
	}
	
}
?>
