$(function(){
	reviewsList();
	
	//reviews列表展示效
	function reviewsList(){
		$(".reviews").i_scroll();	
		$(".banner").slide({t1:500,t2:5000});
	}
});