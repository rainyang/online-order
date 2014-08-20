<?php
//订单模块
class OrderAction extends CommonAction
{
	
	public function orders(){
		$cookie = cookie('OrderOnlineAuth');
		if(empty($cookie)){
			$this->redirect('Index/index');	
		}
		$authlist = explode("\t",authcode($cookie));
		$Order = M('Billhead');
		$OrderItem = M('Billitem');
		$OrderNote = M('Billnote');
		$OrderAttr = M('Billattribute');
		$Address = M('Member_address');
		$ShoppingCart = M('ShoppingCart');
		$info = $Address->where(array('id' => $_POST['addressid']))->find();
		$cartInfo = $ShoppingCart->where(array('id' => array('in',$_POST['cart_ids'])))->select();
		$data = array(
			'restaurant_id'	=>	$_POST['restaurant_id'],
			'bh_no' 		=>	date('YmdHis',time())+substr(time(),7)+rand(1,99999),
			'bh_type'		=>	$_POST['type'],
			'bh_status'		=>	'0',
			'bh_column'		=>	'0',
			'bh_customer_id'=>	$authlist[0],
			//'bh_subtotal'	=>	
			//'bh_discount'	=>	
			//'bh_disamt'	=>	
			//'bh_taxrate'	=>	
			//'bh_taxamt'	=>	
			//'bh_delivery'	=>	
			'bh_tips'		=>	$_POST['tip'],
			//'bh_total'	=>	
			'bh_payment'	=>	$_POST['payment'],
			'bh_address'	=>	$info['address'],
			'bh_create_time'=>	time(),

			);
		//$dataItem['restaurant_id'] = $_POST['restaurant_id'];
		/*$dataItem = array(
			'restaurant_id'	=>	$_POST['restaurant_id'],
			'bh_id'			=>	
			'item_id'		=>	
			'bi_quantity'	=>	
			'bi_price'		=>	
			'bi_amount'		=>	
			'');
		$dataNote = array(
			'restaurant_id'	=>	$_POST['restaurant_id'],
			'bh_id'			=>	
			'bn_note'		=>	);*/
		if($_POST['payment'] == 1)
		{

			$rs = $Order->add($data);
			//$rs_item = $OrderItem->add($dataItem);
			if($rs)
			{	
				$_POST['quantity'] = explode(',',$_POST['quantity']);
				foreach($cartInfo AS $key => $val)
				{
					
					$rs_item = $OrderItem->add(array(
													'restaurant_id' => $_POST['restaurant_id'],
													'bh_id' => $rs,
													'item_id' => $val['item_id'],
													'bi_quantity' => $_POST['quantity'][$key],
													'bi_price' => $val['price'],
													'bi_amount' => $val['price']*$_POST['quantity'][$key]
													));
				}
				echo json_encode(array('status'=>'1','id' => $rs));	
			}
		}
		
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
	public function shoppingcart(){//print_r($_REQUEST);
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
			foreach($_REQUEST['itemName'] AS $k => $v){
				$result[] = $Group->where(array('id' => $k))->select();
				foreach($result AS $ke => $va){
					$data['item_id'] .= ','.$va['id'];
				} 
				
			}//print_r($result);print_r($data);
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