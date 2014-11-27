<?php
class PayAction extends Action{
	public function index(){//echo $_SESSION['restaurant_id'];
	    $payid = intval($_POST['payid']);
		$data = array('restaurant_id' => $_SESSION['restaurant_id'],
					  'type' => $_POST['pay_type'],
					  'api_login_id' => $_POST['api_login_id'],
					  'transaction_key' => $_POST['transaction_key'],
					  'md5_setting' => $_POST['md5_setting'],
					  'host'=> $_POST['host'],
					  'testMode' => $_POST['testMode'],
					  'username'=> $_POST['username'],
					  'password'=>$_POST['password'],
					  'ctime'=> time()
					  );
        if ( $_POST ){
			if($_POST['payid']){
            print_r($data);//exit;
				$result = M('Payment')->where('id='.$payid)->save($data);
                echo M('Payment')->getLastSql();
			}else{
				$result = M('Payment')->add($data);
			}
			if($result){
				$this->redirect('index');
			}else{
				$this->error('error');
			}
		}
		$info = M('Payment')->where(array('restaurant_id'=>$_SESSION['restaurant_id']))->find();
		$this->assign('info',$info);
		$this->display();
	}
}
?>
