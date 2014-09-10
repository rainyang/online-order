<?php
//菜品模块
class DishesAction extends CommonAction
{

    public function detail()
    {
		$resid = $_POST['resid'];
		$id = $_REQUEST['id'];

		$RestaurantMember = M('RestaurantMember');
		$Comment = M('Comment');
		$Dishes = M('Item');
		$DishesGroup = M('Menugroup');
		$RestaurantDetails = M('RestaurantDetails');
		$ShoppingCart = M('ShoppingCart');
		$Packagelist = M('Packagelist');
		$Opentime = M('Opentime');
		$resinfo = $RestaurantMember->where(array('id'=>$id))->find();
		$open = $Opentime->where(array('restaurant_id' => $id))->find();
		$com = $Comment->where(array('restaurant_id'=>$id))->order('create_time desc')->find();
		$count = $Dishes->where(array('restaurant_id'=>$id))->count();
		//$details = $RestaurantMember->where(array('id'=>$id))->find();
        //todo,可用配置文件实现,并写入公共函数库
		$key = date('w',time());
		if($key == 0){
 			$resinfo['openhours'] = $open['sun'];
 			$time[2] = 'Sun';
 		}else if($key == 1){
 			$resinfo['openhours'] = $open['mon'];
 			$time[2] = 'Mon';
 		}else if($key == 2){
 			$resinfo['openhours'] = $open['tue'];
 			$time[2] = 'Tue';
 		}else if($key == 3){
 			$resinfo['openhours'] = $open['wed'];
 			$time[2] = 'Wed';
 		}else if($key == 4){
 			$resinfo['openhours'] = $open['thu'];
 			$time[2] = 'Thu';
 		}else if($key == 5){
 			$resinfo['openhours'] = $open['fri'];
 			$time[2] = 'Fri';
 		}else if($key == 6){
 			$resinfo['openhours'] = $open['sat'];
 			$time[2] = 'Sat';
 		}
 		
 		/*if(strtotime($times[0])<time() && strtotime($times[1]>time())){

 		}else{

 		}*/
 		
		/*if($details['is_delivery'] == '1'){
			$deliveryhours = json_decode($details['deliveryhours'],true);
			foreach($deliveryhours as $k=>$v){
				if($k != $key){
					$dhours[$k] = explode('-',$v);
					$dhours[$k][2] = $k;
				}else{
					$time = explode('-',$v);
					$time[2] = $k;	
				}
			}
		}*/
		$list = $DishesGroup->field('id,group_name')->where(array('restaurant_id'=>$id))->order('create_time desc')->select();
		$list_package = $Packagelist->where(array('restaurant_id'=>$id))->order('create_time desc')->select();//print_r($list_package);
		$count_package = $Packagelist->where(array('restaurant_id'=>$id))->count();
		foreach($list as $k=>$v){
			$list[$k]['dishes'] = $Dishes->where(array('group_id'=>$v['id']))->select();	
		}

		$cookie = cookie('OrderOnlineAuth');
		$authlist = explode("\t",authcode($cookie));
		$orderlist = $ShoppingCart->field('id,item_name,price,quantity')->where(array('member_id'=>$authlist[0],'status'=>'0'))->order('id desc')->select();
        //dump($orderlist);
		$ordercount=$ShoppingCart->where(array('member_id'=>$authlist[0],'status'=>'0'))->count();
		/*foreach($orderlist as $k=>$v){
			if(!empty($v['items'])){
				$items = json_decode($v['items'],true);
				foreach($items as $key=>$val){
					if(empty($orderlist[$k]['item'])){
						$orderlist[$k]['item'] = $key;
					}else{
						$orderlist[$k]['item']	.= ','.$key;
					}
				}	
			}	
		}*///print_r($list);
		$this->assign('ordernum',$ordercount);
		$this->assign('order',$orderlist);
		$this->assign('list',$list);
		//$this->assign('details',$details);
		$this->assign('time',$time);
		$this->assign('dhours',$dhours);
		$this->assign('resinfo',$resinfo);
		$this->assign('comment',$com);
		$this->assign('count',$count);
		$this->assign('resid',$resid);
		$this->assign('list_package',$list_package);
		$this->assign('count_package',$count_package);
     	$this->display();  
    }
	public function results()
    {	
    	$RestaurantMember = M('RestaurantMember');
    	$Opentime = M('Opentime');
    	$Comment = M('Comment');
    	$address = $_POST['address'] == "Street Address, City, State"?'':$_POST['address'];
    	$taste   = $_POST['taste'] == "tuna melt, John's Subs, Italian"?'':$_POST['taste'];
    	//echo $coordinate =$_POST['lat'];
    	if($_POST['lat'])
    	{
    		$arr = explode(',',$_POST['lat']);//print_r($arr);
    		if($_POST['status_type']){
				$result = $RestaurantMember->where(array('business_status' => 1))->select();
    		}else{
				$result = $RestaurantMember->select();
    		}
    		
    		foreach($result AS $key => $val)
    		{
    			$result[$key]['distance'] = $this->getDistance($arr[0],$arr[1],$result[$key]['lat'],$result[$key]['lng'])/1609.3;
    			if($result[$key]['distance']<$result[$key]['delivery_radius'])
    			{
    				$list[] = $result[$key];
    				$list_count = $key+1;
    			}
    		}
    	}
  
    	
    	/*if(!empty($address) && !empty($taste))
    	{
    		$where = " address like '%".$address."%' and taste like '%".$taste."%'";
    	}else if(!empty($address) && empty($taste))
    	{
    		$where = " address like '%".$address."%'";
    	}else if(!empty($taste) && empty($address))
    	{
    		$where = " taste like '%".$taste."%'";
    	}else
    	{ 
    		$where = " id>0";
    	}*/
    	//$list = $RestaurantMember->where($where)->field('on_opentime.restaurant_id,on_opentime.mon,on_opentime.tue,on_opentime.wed,on_opentime.thu,on_opentime.fri,on_opentime.sat,on_opentime.sun,on_restaurant_member.*')->join('on_opentime ON on_restaurant_member.id = on_opentime.restaurant_id')->order('create_time desc')->select();//print_r($list);
    	//$list_count = $RestaurantMember->where($where)->order('create_time desc')->count();
    	foreach($list AS $k => $v)
    	{
 			$num = date('w',time());
 			if($num == 0){
 				$list[$k]['openhours'] = $list[$k]['sun'];
 			}else if($num == 1){
 				$list[$k]['openhours'] = $list[$k]['mon'];
 			}else if($num == 2){
 				$list[$k]['openhours'] = $list[$k]['tue'];
 			}else if($num == 3){
 				$list[$k]['openhours'] = $list[$k]['wed'];
 			}else if($num == 4){
 				$list[$k]['openhours'] = $list[$k]['thu'];
 			}else if($num == 5){
 				$list[$k]['openhours'] = $list[$k]['fri'];
 			}else if($num == 6){
 				$list[$k]['openhours'] = $list[$k]['sat'];
 			}
 			$times = explode('-',$list[$k]['openhours']);
    		$list[$k]['comment'] = $Comment->where(array('restaurant_id' => $list[$k]['id']))->select();
    		foreach($list[$k]['comment'] AS $key => $vo)
    		{
    			$list[$k]['comment']['create_time'] = date('m/d-Y',$list[$k]['comment']['create_time']);
    		}
    	}
    	//echo $RestaurantMember->getLastSql();
    	//print_r($list);
    	$this->assign('list',$list);
    	$this->assign('times',$times);
    	$this->assign('list_count',$list_count);
     	$this->display();  
    }

	public function additem(){

		$resid = $_POST['resid'];
		$disid = $_POST['disid'];
		$packid = $_POST['packid'];
		$Dishes = M('Item');
		$DishesItem = M('DishesItem');
		$Group = M('PackageGroup');
		$Attribute = M('ItemAttribute');
		$disheslist = $Dishes->where(array('id'=>$disid))->find();
		$cookie = cookie('OrderOnlineAuth');
		if(empty($cookie)){
			$disheslist['open'] = '2';	
		}elseif(!empty($disheslist['openhours'])){
			$time = explode('-',$disheslist['openhours']);
			if(time()>strtotime($time[0]) && time()<strtotime($time[1])){
				$disheslist['open'] = '1';
			}else{
				$disheslist['open'] = '0';
			}
		}else{
			$disheslist['open'] = '1';		
		}
		
		$items = $DishesItem->field('id,item_name')->where(array('dishes_id'=>$disid,'p_id'=>'0'))->select();
		foreach($items as $k=>$v){
			$items[$k]['item'] = $DishesItem->where(array('p_id'=>$v['id']))->select();	
		}
		if($_POST['packid'])
		{
			$packagegroup = $Group->field('on_packagelist.group_name as package_name,on_item_attribute.is_values,on_packagelist.price,on_package_group.*')->join('on_packagelist ON on_package_group.package_id=on_packagelist.id')->join('on_item_attribute ON on_package_group.id=on_item_attribute.package_group_id')->where(array('on_package_group.package_id' => $packid))->select();//print_r($packagegroup);exit();
			foreach($packagegroup AS $key => $val){
				$data = $Dishes->where(array('id' => array('in',$val['item_id'])))->select();
				$vals = explode(',',$packagegroup[$key]['is_values']);
				if($vals[0]){
					foreach ($vals as $val2) {
						$valu = explode('=',$val2);
						$vale[$valu[1]] = $valu[0];
					}

					foreach($data as $key1 => $val1){
						$key3 = array_search($val1['id'], $vale);
						$data_item[$key1] = $val1;
						if($key3 !== false){
							$data_item[$key1]['attr'] = $key3;
						}
					}
					$packagegroup[$key]['item_info'] = $data_item;
				}else{
					$packagegroup[$key]['item_info'] = $data;
				}

				
				/*$data[$key]['item_info']['id'];
				if()
				$data[$key]['is_values'] = explode(',',$packagegroup[$key]['is_values']);*/
				
				//$packagegroup[$key]['attr'] = $packagegroup[$key]['is_values'][];
				
				//$packagegroup[$key]['is_values'] = explode('=',$packagegroup[$key]['is_values']);

				
			}
			//print_r($return);exit();
		}
		echo json_encode(array('dishes'=>$disheslist,'items'=>$items,'group' => $packagegroup));
	}

	public function reduceQty(){
		$id = $_POST['id'];	
		$ShoppingCart = M('ShoppingCart');
		$qty = $ShoppingCart->field('quantity,price')->where(array('id'=>$id))->find();
		if($qty['quantity'] == '1'){
			$ShoppingCart->where(array('id'=>$id))->delete();	
		}else{
			$totalprice = ($qty['quantity']-1)*$qty['price'];
			$ShoppingCart->where(array('id'=>$id))->save(array('total_price'=>$totalprice));
			$ShoppingCart->where(array('id'=>$id))->setDec('quantity');	
		}
		
	}
	public function addQty(){
		$id = $_POST['id'];	
		$ShoppingCart = M('ShoppingCart');
		$qty = $ShoppingCart->field('quantity,price')->where(array('id'=>$id))->find();
		$totalprice = ($qty['quantity']+1)*$qty['price'];
		$ShoppingCart->where(array('id'=>$id))->save(array('total_price'=>$totalprice));
		$ShoppingCart->where(array('id'=>$id))->setInc('quantity');	
		
	}
	public function getLatLong($address)
	{
	    if (!is_string($address))die("All Addresses must be passed as a string");
	    $_url = sprintf('http://maps.google.com/maps?output=js&q;=%s',rawurlencode($address));
	    $_result = false;
	    if($_result = file_get_contents($_url)) 
	    {
	        if(strpos($_result,'errortips') > 1 || strpos($_result,'Did you mean:') !== false) return false;
	        preg_match('!center:\s*{lat:\s*(-?\d+\.\d+),lng:\s*(-?\d+\.\d+)}!U', $_result, $_match);
	        $_coords['lat'] = $_match[1];
	        $_coords['long'] = $_match[2];
	    }
	    return $_coords;
	}

	//计算两个点的直线距离
	public function getDistance($lat1, $lng1, $lat2, $lng2) {
        $earthRadius = 6367000; 

        $lat1 = ($lat1 * pi() ) / 180;
        $lng1 = ($lng1 * pi() ) / 180;

        $lat2 = ($lat2 * pi() ) / 180;
        $lng2 = ($lng2 * pi() ) / 180;

        $calcLongitude = $lng2 - $lng1; 
        $calcLatitude = $lat2 - $lat1;
        $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);  
        $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
        $calculatedDistance = $earthRadius * $stepTwo;

        return round($calculatedDistance);
    }
}
?>
