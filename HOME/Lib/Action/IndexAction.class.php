<?php
//首页
class IndexAction extends CommonAction
{

    public function index()
    {
		/*echo time().'<br>';
		$hours = date('h:ia',time());
		echo $hours.':'.strtotime(date('h:ia',time()));*/
		//echo date('F d Y ',time()).'at '.date('h:i A');
		$RestaurantMember = M('RestaurantMember');
		$Comment = M('Comment');
     	$sql = 'select a.id,a.logo,a.nickname,a.remark,b.delivery,b.minimum,b.parking from '.C('DB_PREFIX').'restaurant_member as a left join '.C('DB_PREFIX').'restaurant_details as b on a.id = b.restaurant_id where a.status = 1 order by create_time desc limit 16';
		//list = $RestaurantMember->query($sql);print_r($list);
		$list = $RestaurantMember->order('create_time desc')->limit(4)->select();//print_r($list);
		foreach($list as $k=>$v){
			$list[$k]['comment'] = $Comment->field('member_id,create_time,title')->where(array('restaurant_id'=>$v['id']))->limit(4)->select();
		}
		foreach($list as $key=>$val){
			if($key < 4){
				$list1[0][$key] = $val;	
			}elseif($key>=4 && $key<8){
				$list1[1][$key] = $val;	
			}elseif($key>=8 && $key<12){
				$list1[2][$key] = $val;	
			}else{
				$list1[3][$key] = $val;		
			}
			
		}
		//print_r($list1);
		$this->assign('list',$list1);
		$this->assign('page',$page);
		$this->display();  
    }
 	public function foot(){
	 	$this->display();
	 }


}
?>