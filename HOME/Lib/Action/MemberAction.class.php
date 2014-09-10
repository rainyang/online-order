<?php
//会员模块
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
	public function personal(){
		$cookie = cookie('OrderOnlineAuth');
		if(empty($cookie)){
			$this->redirect('Index/index');	
		}
		$auth = authcode($cookie,'DECODE');
		$authlist =  explode("\t",$auth);		
		$Order = M('Order');
		$ShoppingCart = M('ShoppingCart');
		$list = $Order->where(array('member_id'=>$authlist[0]))->order('create_time desc')->select();
		foreach($list as $key=>$val){
			$list[$key]['carts'] = $ShoppingCart->field('quantity,dishes_id')->where(array('id'=>array('in',$val['cart_ids'])))->select();	
		}
		$this->assign('list',$list);
		$this->display();	
	}

    public function profile(){
        $cookie = cookie('OrderOnlineAuth');
		if(empty($cookie)){
			$this->redirect('Index/index');	
		}
		$auth = authcode($cookie,'DECODE');
		$authlist =  explode("\t",$auth);		
		$Order = M('Order');
		$ShoppingCart = M('ShoppingCart');
		$list = $Order->where(array('member_id'=>$authlist[0]))->order('create_time desc')->select();
		foreach($list as $key=>$val){
			$list[$key]['carts'] = $ShoppingCart->field('quantity,dishes_id')->where(array('id'=>array('in',$val['cart_ids'])))->select();	
		}
		$this->assign('list',$list);

        $this->display();
    }

    public function address(){
        $cookie = cookie('OrderOnlineAuth');
		if(empty($cookie)){
			$this->redirect('Index/index');	
		}
		$auth = authcode($cookie,'DECODE');
		$authlist =  explode("\t",$auth);		
		$Order = M('Order');
		$ShoppingCart = M('ShoppingCart');
		$list = $Order->where(array('member_id'=>$authlist[0]))->order('create_time desc')->select();
		foreach($list as $key=>$val){
			$list[$key]['carts'] = $ShoppingCart->field('quantity,dishes_id')->where(array('id'=>array('in',$val['cart_ids'])))->select();	
		}
		$this->assign('list',$list);

        $this->display();
    }

    public function cards(){
        $cookie = cookie('OrderOnlineAuth');
		if(empty($cookie)){
			$this->redirect('Index/index');	
		}
		$auth = authcode($cookie,'DECODE');
		$authlist =  explode("\t",$auth);		
		$Order = M('Order');
		$ShoppingCart = M('ShoppingCart');
		$list = $Order->where(array('member_id'=>$authlist[0]))->order('create_time desc')->select();
		foreach($list as $key=>$val){
			$list[$key]['carts'] = $ShoppingCart->field('quantity,dishes_id')->where(array('id'=>array('in',$val['cart_ids'])))->select();	
		}
		$this->assign('list',$list);

        $this->display();
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
			cookie('OrderOnlineAuth',$auth,3600);
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
	public function placeOrder($id){
		$id = $_GET['res_id'];
		$cookie = cookie('OrderOnlineAuth');
		if(empty($cookie)){
			$this->redirect('Index/index');	
		}
		$authlist = explode("\t",authcode($cookie));
		$ShoppingCart = M('ShoppingCart');
		$MemberAddress = M('Member_address');
		$RestaurantMember = M('RestaurantMember');
		$RestaurantDetails = M('RestaurantDetails');
		$Dishes = M('Item');
		$orderlist = $ShoppingCart->where(array('member_id'=>$authlist[0],'status'=>'0'))->order('id desc')->select();
		$ordercount=$ShoppingCart->where(array('member_id'=>$authlist[0],'status'=>'0'))->count();
		$resinfo = $RestaurantMember->where(array('id'=>$id))->find();
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
		}//print_r($orderlist);
		$address = $MemberAddress->field('id,address,mobile,name,type')->where(array('member_id'=>$authlist[0]))->order('create_time desc')->select();
		$tip = $RestaurantDetails->where(array('restaurant_id'=>$orderlist[0]['restaurant_id']))->getField('tip');
		$tiplist = explode(',',$tip);
		$this->assign('total',$total);
		$this->assign('tip',$tiplist);
		$this->assign('resinfo',$resinfo);
		$this->assign('address',$address);
		$this->assign('order',$orderlist);
		$this->assign('restaurant_id',$orderlist[0]['restaurant_id']);
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
