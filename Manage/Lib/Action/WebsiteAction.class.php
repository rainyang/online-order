<?php
// 餐馆会员详情模块
class WebsiteAction extends CommonAction {

	public function index()
	{
		$Website = M('Website');
			$info = $Website->select();
			//print_r($info);exit;
			if($_POST['btnSave'])
			{//echo $_POST['siteid'];exit;
				$data['tel']				=	$_POST['tel'];
				$data['email']				=	$_POST['email'];
				$data['delivery_radius']	=	$_POST['delivery_radius'];
				$data['min_delivery']		=	$_POST['min_delivery'];
				$data['option_miles']		=	$_POST['option_miles'];
				$data['option_dollar']		=	$_POST['option_dollar'];
				$data['pay_type']			=	$_POST['pay_type'];
				$data['api_login_id']		=	$_POST['api_login_id'];
				$data['transaction_key']	=	$_POST['transaction_key'];
				$data['md5_setting']		=	$_POST['md5_setting'];
				$data['host']				=	$_POST['host'];
				$data['testMode']			=	$_POST['testMode'];
				$data['username']			=	$_POST['username'];
				$data['password']			=	$_POST['password'];
				$data['url']				=	$_POST['url'];
				$data['ctime']				=	time();
				
				if(isset($_FILES['image']) && !empty($_FILES['image'])&& $_FILES['image']['error']==0)
				{
					$data['logo']			=	$this->uploadfile();	
				}else
				{
					$data['logo']			=	$_POST['logo'];
				}
				//print_r($data);exit;
				if($_POST['siteid']){
					$result = $Website->where(array('id'=>$_POST['siteid']))->save($data);				
				}else{
					$result = $Website->add($data);				
				}
				if($result){
					$this->success('success');
					$this->redirect('index');
				}else{
					$this->error('error');
				}
					
				
			}
		$this->assign('info',$info[0]);
		$this->assign('restaurant_id',$_SESSION['restaurant_id']);
		$this->display();
	}

	public function slide(){
		$list = M('WebsiteSlide')->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function add(){
		$data['title'] = $_POST['title'];
		$data['desc'] = $_POST['description'];
		$data['ctime'] = time();
		if(isset($_FILES['image']) && !empty($_FILES['image'])&& $_FILES['image']['error']==0)
		{
			$data['image']			=	$this->uploadfile();	
		}else
		{
			$data['image']			=	$_POST['image2'];
		}

			
		
		if($_GET['id']){
			if($_POST['slideid']){
				$result = M('WebsiteSlide')->where(array('id'=>$_POST['slideid']))->save($data);
				if($result){
					$this->redirect('slide');
				}else{
					$this->error('error');
				}
			}
			
		}else{
			if($_POST){
				$result = M('WebsiteSlide')->add($data);
				if($result){
					$this->redirect('slide');
				}else{
					$this->error('error');
				}
			}
			
		}
		
		$info = M('WebsiteSlide')->where(array('id'=>$_GET['id']))->find();
		$this->assign('info',$info);
		$this->display();
	}
	public function delete(){
		$list = M('WebsiteSlide')->where(array('id'=>$_GET['id']))->delete();
		if($list){
			$this->redirect('slide');
		}else{
			$this->error('error');
		}
		$this->display();
	}
	public function uploadfile(){
		import('@.ORG.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 2097152 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  'Public/Uploads/Logo/'.date('Ymd',time()).'/';// 设置附件上传目录
		$upload->saveRule = 'uniqid';
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功
			$info = $upload->getUploadFileInfo();
			$_POST['image'] = '/'.$info[0]['savepath'].$info[0]['savename'];
			return $_POST['image'];
		}	
	}
}

?>
