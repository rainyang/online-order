<?php
//餐馆注册
class RestaurantAction extends CommonAction
{

    public function basicInfo()
    {
     	$this->display();  
    }
	public function RestaurantDetails()
    {
     	$this->display();  
    }
	    public function done()
    {
     	$this->display();  
    }
	public function reg(){
		$RestaurantMember = M('Restaurant_member');
		$User = M('User');
		
		if($_POST)
		{
			$data['account'] = $_POST['account']? $_POST['account']:'';
			$data['password'] = $_POST['password']?md5($_POST['password']):md5($_POST['account']);
			$data['name'] = $_POST['name'];
			$data['nickname'] = $_POST['nickname'];
			$data['phone'] = $_POST['phone'];
			$data['resfax'] = $_POST['resfax'];
			$data['address'] = $_POST['address'];
			$data['zip'] = $_POST['zip'];
			$data['tel'] = $_POST['tel'];
			$data['create_time'] = time();
			$rs = $User->where(array('account'=>$_POST['account']))->find();

			if(!$rs)
			{
				if(!empty($data['account']) && !empty($data['password']))
				{
					$result_user = $User->add(array(
													'account' 	 => $data['account'],
													'password' 	 => $data['password'],
													'create_time'=> $data['create_time'],
													'nickname'	 => $data['nickname'],
													'status'	 => '0'
													));
					$find_user = $User->where(array('account'=>$_POST['account']))->find();
						$data['user_id'] = $find_user['id'];
						$result_member = $RestaurantMember->add(array(
																	  'user_id'  	=> $data['user_id'],
																	  'account'  	=> $data['account'],
																	  'password' 	=> $data['password'],
																	  'name'     	=> $data['name'],
																	  'email'		=> $data['account'],
																	  'nickname' 	=> $data['nickname'],
																	  'phone' 	 	=> $data['phone'],
																	  'resfax'   	=> $data['resfax'],
																	  'address'  	=> $data['address'],
																	  'zip'		 	=> $data['zip'],
																	  'tel'			=> $data['tel'],
																	  'create_time' => $data['create_time']
																	  ));

					if($result_user)
					{	
						$this->success("The success of registered account,Please wait for the administrators to audit.");	
					}else
					{
						$this->error("Failed to register account,Please register again.");
					}
				
				}else
				{
					$this->error("E-mail and Password has cannot be empty.");
				}	
			}else
			{
				$this->error("E-mail has been registered.");
			}
		}
	}
	public function reviews(){
		$resid = $_POST['resid'];
		$Comment = M('Comment');
		$RestaurantMember = M('restaurant_member');
		$list = $Comment->where(array('restaurant_id'=>$resid,'status'=>1))->order('create_time desc')->limit(2)->select();
		foreach($list as $k=>$v){
			$list[$k]['restaurant'] = $RestaurantMember->where(array('id'=>$v['restaurant_id']))->getField('nickname'); 
		}
		echo json_encode($list);
	}
	public function addreview(){
		$_POST['title'] = strip_tags($_POST['title']);
		$_POST['content'] = strip_tags($_POST['content']);
		$data = $_POST;
		$data['create_time'] = time();
		$data['status'] = 1;
		$Comment = M("Comment");
		$rs = $Comment->add($data);
		if($rs){
			echo json_encode(array('status'=>'1'));	
		}else{
			echo json_encode(array('status'=>'0','msg'=>'error.'));	
		}
	}
	
}
?>