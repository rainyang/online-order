<?php
/*=============================================================================
#     FileName: MemberAction.class.php
#         Desc: 会员相关类，包含优惠券
#       Author: RainYang - https://github.com/rainyang
#        Email: rainyang2012@qq.com
#     HomePage: http://rainyang.github.io
#      Version: 0.0.1
#   LastChange: 2014-11-25 17:23:45
#      History:
=============================================================================*/

class MemberAction extends CommonAction
{

	public function layer(){
		$cookie = cookie('OrderOnlineAuth');
		if(!empty($cookie)){
			$cookie = cookie('OrderOnlineAuth');
			$auth = authcode($cookie);
			$authlist = explode("\t",$auth);
			$this->assign('member_id',$authlist[0]);	
		}	
		$this->display();
		
	}

    /**
     * 使用优惠券功能
     * 需要把优惠券、餐馆id、会员id等存入cookie或数据库，保证下单时可以调取
     *
     * @param  get获取
     * @return void
     * @author RainYang
     **/
    function useCoupon()
    {
        $auth = $this->auth();
        $data['res_id'] = intval($_POST['res_id']);
        $data['coupon_id'] = intval($_POST['coupon_id']);
        $data['coupon_item_id'] = intval($_POST['coupon_item_id']);
        $data['member_id'] = $auth->id;
        //print_r($data);
        if ($data['coupon_id'] == 'none') {
            cookie('goMenuHubCoupons', null);
        }
        else{
            cookie('goMenuHubCoupons', serialize($data), 3600*24*7);
        }
    }

    //获取优惠券列表
    function getResCoupons(){
        $res_id = intval($_GET['res_id']);
        if(!$res_id){
            echo 'error';
            exit;
        }
		$CouponsModel = M('coupons');
        $condition = array(
                'res_id' => $res_id,
                'status' => 1,
                'date_from' => array('elt', time()), 
                'date_to' => array('egt', time()), 
                );
        $coupons = $CouponsModel->where($condition)->select(); 
        echo json_encode($coupons);
    }

    //获取优惠券详细信息
    function getCouponsInfo(){
        $id = intval($_GET['id']);
        if(!$id){
            echo 'error';
            exit;
        }
		$CouponsModel = M('coupons');
        $coupons = $CouponsModel->find($id); 
        echo json_encode($coupons);
    }

    //根据优惠券id获取相关菜品,赠送使用
    function getCouponsItem(){
        $coupons_id = intval($_GET['coupons_id']);
        if(!$coupons_id){
            echo 'error';
            exit;
        }

		$Model = M();
        $couponsItem = $Model->query('SELECT i.* FROM `on_coupons_item` as c inner join on_item as i on c.item_id=i.id WHERE c.coupons_id='.$coupons_id);
        echo json_encode($couponsItem);
    }

	public function personal(){
        $auth = $this->auth();
		$Order = M();
		//$RestaurantMember = M('RestaurantMember');
    	//$ShoppingCart = M('ShoppingCart');
		//$list = $Order->where(array('bh_customer_id'=>$auth->id))->order('bh_create_time desc')->select();
		$list = $Order->query("select b.*,r.nickname from on_billhead as b inner join on_restaurant_member as r on b.restaurant_id = r.id where b.bh_customer_id = {$auth->id} order by bh_create_time desc");
        //echo $Order->getLastSql();
        /*
		 *foreach($list as $key=>$val){
		 *    $list[$key]['carts'] = $ShoppingCart->field('quantity,dishes_id')->where(array('id'=>array('in',$val['cart_ids'])))->select();	
		 *}
         */
        //print_r($list);
		$this->assign('list',$list);
		$this->display();	
	}

    public function profile(){
        $auth = $this->auth();

		$Member = M('Member');
		$rs = $Member->find($auth->id);

		$this->assign('Member',$rs);

        $this->display();
    }

   function doProfile(){
        $auth = $this->auth();
        $data = $_POST;
        if($_POST['password']){
            $data['password'] = md5($_POST['password']);
        }
        else{
            unset($data['password']);
        }
        //exit;

		$Member = M('Member');
		$rs = $Member->where(array('id'=>$auth->id))->save($data);

        if($rs){
			$this->redirect('Member/profile');	
        }
        else{
            throw_exception('update failed');
        }
    }

    function getAddress(){
        $id = intval($_GET['id']);
        $MemberAddress = M('Member_address');
        $ma = $MemberAddress->find($id);
        //$ma = $MemberAddress->where('id='.$id)->find();
        echo json_encode($ma);
    }

    public function address(){
        $auth = $this->auth();

		$Member = M('Member');
		$rs = $Member->find($auth->id);

        if(!$rs){
            throw_exception('The user does not exist!');
        }

        $MemberAddress = M('Member_address');
        $ma = $MemberAddress->where('member_id='.$rs['id'])->select();
        //$ma = $MemberAddress->where(array('member_id' => $rs['id'], 'is_default' => 1))->find();

        //dump($ma);

		$this->assign('Ma',$ma);
		$this->assign('Mid',$rs['id']);
        $this->display();
    }

    function doAddress(){
        $auth = $this->auth();
        $data = $_POST;

        $address_id = $data['id'];
        unset($data['id']);

        $MemberAddress = M('Member_address');
        if($address_id){    //更新地址
            $MemberAddress->where('id='.$address_id)->save($data);
            $data['id'] = $address_id;
        }
        else{   //新增地址
		    $rs = $MemberAddress->where(array('member_id'=>$data['member_id']))->find();
            if(!$rs){
                $data['is_default'] = 1;    //新增地址时自动设置为默认地址
            }
            $ma = $MemberAddress->add($data);
        }

        echo json_encode($data);

    }

    function setDefaultAddress(){
        $id = intval($_POST['id']);

        $MemberAddress = M('Member_address');

        $memid = $MemberAddress->where('id='.$id)->getField('member_id');

        //先把此会员的默认地址都更新为0
        $data['is_default'] = 0;
        $res = $MemberAddress->where('member_id='.$memid)->save($data);

        //再把当前地址更新为1
        $data['is_default'] = 1;
        $res = $MemberAddress->where('id='.$id)->save($data);

        echo $res;
    }

    function getCards(){
        $id = intval($_GET['id']);
        $MemberAddress = M('Member_card');
        $ma = $MemberAddress->find($id);
        //$ma = $MemberAddress->where('id='.$id)->find();
        echo json_encode($ma);
    }

    public function cards(){
        $auth = $this->auth();
		$Member = M('Member');
		$rs = $Member->find($auth->id);

        if(!$rs){
            throw_exception('The user does not exist!');
        }

        $MemberAddress = M('Member_card');
        $ma = $MemberAddress->where('member_id='.$rs['id'])->select();
        //$ma = $MemberAddress->where(array('member_id' => $rs['id'], 'is_default' => 1))->find();

        //dump($ma);

		$this->assign('Ma',$ma);
		$this->assign('Mid',$rs['id']);
        $this->display();
    }

    function doCard(){
        $auth = $this->auth();
        $data = $_POST;

        $address_id = $data['id'];
        unset($data['id']);

        $MemberCard = M('Member_card');
        if($address_id){    //更新信用卡
            $MemberCard->where('id='.$address_id)->save($data);
            $data['id'] = $address_id;
        }
        else{   //新增信用卡
            $rs = $MemberCard->where(array('member_id'=>$data['member_id']))->find();
            if(!$rs){
                $data['is_default'] = 1;    //新增地址时自动设置为默认地址
            }
            $ma = $MemberCard->add($data);
        }

        echo json_encode($data);

    }

    function setDefaultCard(){
        $id = intval($_POST['id']);

        $MemberCard = M('Member_card');

        $memid = $MemberCard->where('id='.$id)->getField('member_id');

        //先把此会员的默认地址都更新为0
        $data['is_default'] = 0;
        $res = $MemberCard->where('member_id='.$memid)->save($data);

        //再把当前地址更新为1
        $data['is_default'] = 1;
        $res = $MemberCard->where('id='.$id)->save($data);

        echo $res;
    }


	public function register(){
		$account = $_POST['account'];
	 	$password = md5($_POST['password']);
		if(!preg_match('/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/', $account)){
			echo json_encode(array('status'=>0,'msg'=>'Please enter a valid email address.'));exit;
		}
		$Member = M('Member');
		$rs = $Member->where(array('account'=>$account))->getField('id');
		if(!empty($rs)){
			echo json_encode(array('status'=>0,'msg'=>'That email address is already in use.'));exit;
		}
		$result = $Member->add(array('account'=>$account,'password'=>$password));
		if($result){
			echo json_encode(array('status'=>1));
			$id = $Member->where(array('account'=>$account))->getField('id');
			$auth = authcode($id."\t".$account."\t".md5($id.$account),'ENCODE');
			cookie('OrderOnlineAuth',$auth,3600);
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Registration fails.'));exit;
		}
		
		
	}

	public function checkLogin(){
	 	$account = $_POST['account'];
	 	$password = md5($_POST['password']);
		if(!preg_match('/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/', $account)){
			echo json_encode(array('status'=>0,'msg'=>'Please enter a valid email address.'));exit;
		}
		$Member = M('Member');
		$rs = $Member->field('id,account')->where(array('account'=>$account,'password'=>$password))->find();
		if($rs){
			$Member->where(array('id'=>$rs['id']))->save(array('last_login_time'=>time(),'last_login_ip'=>get_client_ip()));
			$Member->where(array('id'=>$rs['id']))->setInc('login_count');
			$auth = authcode($rs['id']."\t".$rs['account']."\t".md5($rs['id'].$rs['account']),'ENCODE');
			cookie('OrderOnlineAuth',$auth,3600 * 12);
			echo json_encode(array('status'=>1));
		}else{
			echo json_encode(array('status'=>0,'msg'=>'Account or password is incorrect.'));exit;
		}
	}

	public function logout(){
		cookie('OrderOnlineAuth',NULL);
		$this->redirect('Index/index');	
	}

	public function forgotpassword(){
		$account = trim($_POST['account']);
		if(!preg_match('/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/', $account)){
			echo json_encode(array('status'=>0,'msg'=>'Please enter a valid email address.'));exit;
		}
		$Member = M('Member');
		$mid = $Member->where(array('account'=>$account))->getField('id');
		if(empty($mid)){
			echo json_encode(array('status'=>0,'msg'=>'Account does not exist.'));exit;	
		}
		$key = md5(md5($mid.time()));
		$Forgotpass = M('Forgotpass');
		$rs = $Forgotpass->where(array('mid'=>$mid))->find();
		if($rs){
			$Forgotpass->where(array('mid'=>$mid))->save(array('key'=>$key,'create_time'=>time()));
		}else{
			$Forgotpass->add(array('mid'=>$mid,'key'=>$key,'create_time'=>time()));
		}
		
		import("@.ORG.PhpMailer");
		//设置发送邮件的部分
        $mail = new PHPMailer();
        $mail->CharSet = "utf-8";                                 //设置采用UTF中文编码
        $mail->IsSMTP();                                         //设置采用SMTP方式发送邮件
        $mail->Host = "smtp.163.com";                            //设置邮件服务器的地址
        $mail->Port = 25;                                        //设置邮件服务器的端口，默认为25
        $mail->From     = "youlovely@163.com";                     //设置发件人的邮箱地址
        $mail->FromName = "password";                             //设置发件人的姓名
        $mail->SMTPAuth = true;                                  //设置SMTP是否需要密码验证，true表示需要
        $mail->Username="youlovely@163.com";
        $mail->Password = 'woshennaita1314';					//邮件密码
        $mail->Subject = 'Password Help for OrderOnline';                    //设置邮件的标题
        $mail->AltBody = "text/html";                             // optional, comment out and test
        $mail->Body ='Follow this link to get back into your account:<br><a href="http://bk.admin.com/index.php?s=Member/changepass?key='.$key.'">Click to reset your password</a>';
        $mail->IsHTML(true);                                      //设置内容是否为html类型
        //$mail->WordWrap = 50;                                   //设置每行的字符数
        $mail->AddReplyTo($account,$account);          //设置回复的收件人的地址
        $mail->AddAddress($account,$account);            //设置收件的地址		
        if(!$mail->Send()) {   									//发送邮件
			echo json_encode(array("status"=>0,"msg"=>"Failed to send."));
			exit;
         }
		echo json_encode(array("status"=>1,"msg"=>"Send success.")); 
	}

	public function yourOrder($res_id){
		$cookie = cookie('OrderOnlineAuth');
		if(empty($cookie)){
			$this->redirect('Index/index');	
		}
		$authlist = explode("\t",authcode($cookie));
		$ShoppingCart = M('Shopping_cart');
		$Dishes = M('Item');
		$orderlist = $ShoppingCart->field('id,item_name,price,total_price,quantity,restaurant_id,item_id')->where(array('member_id'=>$authlist[0],'status'=>'0'))->order('id desc')->select();//print_r($orderlist);
		$ordercount=$ShoppingCart->where(array('member_id'=>$authlist[0],'status'=>'0'))->count();
		foreach($orderlist as $k=>$v){
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
			$orderlist[$k]['image'] = $Dishes->where(array('id'=>$v['item_id']))->getField('imagesrc');
		}
		$this->assign('orderlist',$orderlist);
		$this->assign('restaurant_id',$orderlist[0]['restaurant_id']);
		$this->display();	
	}

	public function placeOrder($id, $type){
		$id = $_GET['res_id'];  //餐馆id
		$type = $_GET['type'];  //订餐类型,pickup|Delivery

        $auth = $this->auth();

		$ShoppingCart = M('ShoppingCart');
		$MemberAddress = M('Member_address');
		$RestaurantMember = M('RestaurantMember');
		$RestaurantDetails = M('RestaurantDetails');
        $MemberCard = M('Member_card');
		$Dishes = M('Item');
		$orderlist = $ShoppingCart->where(array('member_id'=>$auth->id,'status'=>'0'))->order('id desc')->select();
        
		$ordercount=$ShoppingCart->where(array('member_id'=>$auth->id,'status'=>'0'))->count();
		$resinfo = $RestaurantMember->where(array('id'=>$id))->find();

		$Packagelist = M('Packagelist');
		$count = $Dishes->where(array('restaurant_id'=>$id))->count();
		$count_package = $Packagelist->where(array('restaurant_id'=>$id))->count();

		foreach($orderlist as $k=>$v){
			if(!empty($v['items'])){
				$items = json_decode($v['items'],true);
				foreach($items as $key=>$val){
					if(empty($orderlist[$k]['item'])){
						$orderlist[$k]['item'] = $key;
					}else{
						$orderlist[$k]['item']	.= ','.$key;
					}
				}
				$total += $v['total_price']; 	
			}	
			$orderlist[$k]['image'] = $Dishes->where(array('id'=>$v['item_id']))->getField('imagesrc');
        }
		$address = $MemberAddress->field('id,address,mobile,city, state, zip_code, name,type, is_default')->where(array('member_id'=>$auth->id))->order('create_time desc')->select();
		$tip = $RestaurantDetails->where(array('restaurant_id'=>$orderlist[0]['restaurant_id']))->getField('tip');
        $Card = $MemberCard->where('member_id='.$auth->id)->select();
		$tiplist = explode(',',$tip);
        //dump($resinfo);
		$this->assign('total',$total);
		$this->assign('tip',$tiplist);
		$this->assign('resinfo',$resinfo);
		$this->assign('type',$type);
		$this->assign('Mid',$auth->id);
		$this->assign('address',$address);
		$this->assign('card',$Card);
		$this->assign('order',$orderlist);
		$this->assign('restaurant_id',$orderlist[0]['restaurant_id']);
		$this->assign('count',$count);
		$this->assign('count_package',$count_package);
		$this->display();	
	}

	public function usefulAdd(){
		$cookie = cookie('OrderOnlineAuth');
		$authlist = explode("\t",authcode($cookie));
		if(!preg_match('/^[0-9]*$/',$_POST['zip'])){
			echo json_encode(array('status'=>'0','msg'=>'Zip input errors.'));exit;
		}
		if(!preg_match('/^[0-9]*$/',$_POST['mobile'])){
			echo json_encode(array('status'=>'0','msg'=>'Mobile input errors.'));exit;	
		}
		$MemberAddress = M('Member_address');
		$data = array(
			'member_id' => $authlist[0],
			'type' => $_POST['type'],
			'name' => $_POST['fname'].' '.$_POST['lname'],
			'address' => $_POST['state'].' '.$_POST['city'].' - '.$_POST['aus'].' '.$_POST['add'],
			'zip_code'	=>	$_POST['zip'],
			'mobile'	=>	$_POST['mobile'],
			'create_time'	=> 	time()
		);
		$rs = $MemberAddress->add($data);
		//echo $MemberAddress->getLastSql();exit;
		if($rs){
			echo json_encode(array('status'=>'1'));
		}else{
			echo json_encode(array('status'=>'0','msg'=>'Error.'));
		}
	}

	public function delUseful(){
		$id = $_POST['id'];
		$MemberAddress = M('Member_address');
		$rs = $MemberAddress->where(array('id'=>$id))->delete();
		if($rs){
			echo json_encode(array('status'=>'1'));	
		}else{
			echo json_encode(array('status'=>'0'));	
		}
	}

	public function personEdit(){
		$cookie = cookie('OrderOnlineAuth');
		$authlist = explode("\t",authcode($cookie));
		$sid = $_POST['sid'];
		$person = $_POST['person'];
		$ids = $_POST['ids'];
		$ShoppingCart = M('ShoppingCart');
		$rs = $ShoppingCart->where(array('id'=>$sid))->save(array('person'=>$person));	
		if($rs){
			$list = $ShoppingCart->field('person,total_price')->where(array('id'=>array('in',$ids),'person'=>array('neq','')))->order('id desc')->select();	
			echo json_encode($list);
		}
	}

	public function bill(){
		$Order = M('Billhead');
		$OrderItem = M('Billitem');
		$id = $_GET['id'];
		$result = $Order->where(array('id' => $id))->find();//print_r($result);;
		$result_item = $OrderItem->field('on_billitem.id,on_billitem.restaurant_id,on_billitem.item_id,on_billitem.bi_quantity,on_billitem.bi_price,on_billitem.bi_amount,on_item.item_name')->join('on_item ON on_billitem.item_id=on_item.id')->where(array('bh_id' => $id))->select();//print_r($result_item);
		$subtotal = 0;
		foreach($result_item AS $k => $v)
		{
			$subtotal += $v['bi_amount'];
		}
		$this->assign('result',$result);
		$this->assign('result_item',$result_item);
		$this->assign('subtotal',$subtotal);
		$this->display();	
	}
	
}
?>
