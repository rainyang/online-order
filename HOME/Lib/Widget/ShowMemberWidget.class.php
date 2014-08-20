<?php
//会员名
	class ShowMemberWidget extends Widget{
			 public function render($data){
					 	$id = $data['id'];
						$Member = M('Member');
				 		$name = $Member->where(array('id'=>$id))->getField('name');
						return $name;
				 } 
		}
?>