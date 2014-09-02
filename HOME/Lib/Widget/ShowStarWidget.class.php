<?php
//餐馆星级
	class ShowStarWidget extends Widget{
			 public function render($data){
					 	$id = $data['id'];
						$Comment = M('Comment'); 
						$count = $Comment->where(array('restaurant_id'=>$id))->count();
						$stars = $Comment->field('star')->where(array('restaurant_id'=>$id))->select();
						foreach($stars as $v){
							$starcount = $starcount+$v['star'];
						}
						$star = round($starcount/$count);
						return $star;
			} 
		}
?>