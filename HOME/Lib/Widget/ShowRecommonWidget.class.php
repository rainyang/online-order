<?php
//餐馆推荐
	class ShowRecommonWidget extends Widget{
			 public function render($data){
					 	$id = $data['id'];
						$Dishes = M('Dishes'); 
						$list = $Dishes->field('image,dishes_name,price')->where(array('restaurant_id'=>$id,'is_commend'=>'1'))->select();
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
						$html = $this->renderFile('recommon',array('list'=>$list1));
						return $html;
			} 
		}
?>