<?php
//会员模块
class CommonAction extends Action
{

    //解密cookie数据
	public function _initialize(){
		$cookie = cookie('OrderOnlineAuth');
		if(!empty($cookie)){	
			$auth = authcode($cookie,'DECODE');
			$auth_list = explode("\t",$auth);
			$Member = M('Member');
			$ShoppingCart = M('ShoppingCart');
			$count = $ShoppingCart->where(array('member_id'=>$auth_list[0],'status'=>'0'))->count();
			$name = $Member->where(array('id'=>$auth_list[0]))->getField('name');
			if(empty($name)){
				$name = $auth_list[1];	
			}
			$this->assign('member_name',$name);
			$this->assign('member_count',$count);
		}
	}

    /**
     * 取得用户信息,转为object返回
     *
     * @return void
     * @author RainYang
     **/
    public function auth()
    {
        $cookie = cookie('OrderOnlineAuth');

		if(empty($cookie)){
			$this->redirect('Index/index');	
		}

		$authlist = explode("\t",authcode($cookie));

        $auth = new stdClass;
        $auth->id = $authlist[0];
        $auth->username = $authlist[1];
        return $auth;
    }

}
?>
