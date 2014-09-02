
 
	$(document).ready(function() {

	$('#cmdsearch').click(function(){
		 if($.trim($("#searchtext").val())=='')
				return false;
		  else 
			    return true;
			});
			
			
			
 $('[placeholder]').focus(function() {	 
	  var input = $(this);
	   if (input.val() == input.attr('placeholder')) {
		input.val('');
		input.removeClass('placeholder');
	  }
	}).blur(function() {
	  var input = $(this);
	  if (input.val() == '' || input.val() == input.attr('placeholder')) {
		input.addClass('placeholder');
		input.val(input.attr('placeholder'));
	  }
	}).blur().parents('form').submit(function() {
	  $(this).find('[placeholder]').each(function() {
		var input = $(this);
		if (input.val() == input.attr('placeholder')) {
		  input.val('');
		}
	  })
	});
	
  $('.dropdownhead').mouseover(function() {
			$(".dropdownhead").attr("style", "cursor:pointer");											 
		});
  	   $('.dropdownhead').click(function() {
		   	//$(".dropdownopt").attr("style", "display:block; cursor:pointer;float:none;");
			if( $(".dropdownopt").css("display")=='none' ){
			//	$(".dropdownopt").show('slide', {direction: 'right'}, 1000);
				 		
				$(".dropdownopt").show("slow", function() {
					$(".dropdownopt").attr("style", "display:block; cursor:pointer;;");
				  });
				
			}else{
			 				 
				$(".dropdownopt").hide("slow", function() {
				  	$(".dropdownopt").attr("style", "display:none;");		
				  });
				
			}
		});

 	$(".dropdownopt .opt_container").hover(
		  function () {
			$(this).addClass("dhover");
		  }, 
		  function () {
			 if($(this).attr("selected")!=1)
				$(this).removeClass("dhover");
		  }
		);
 
 
	   $('.dropdownopt .opt_container').click(function() {
 
			setselected($(this).attr('id'),$(this).children(".opt_date").html(),$(this).children(".opt_wd").html(),$(this).attr('reload'))
			if( $(".dropdownopt").css("display")=='none' ){
				$(".dropdownopt").attr("style", "display:block; cursor:pointer;");
			 
			}else{
				$(".dropdownopt").attr("style", "display:none;");											 
			}
				$(".dhover").attr("selected",0);
				$(".dhover").removeClass("dhover");
			//	$(".dhover").each(function() {$(this).attr("selected",0));
				$(this).attr("selected",1);
				$(this).addClass("dhover");
		});
		
});
 
  
  function toggle_visibility(id) {

     var e = document.getElementById(id);
	if(e){
    	   if(e.style.display == 'block')

       	   e.style.display = 'none';

      else

	 	e.style.display = 'block';
	  }
	



    }

	

  function Hide(id){

    var obj=document.getElementById(id);

    var evt=window.event||arguments.callee.caller.arguments[0];

    var eobj=window.event?evt.srcElement:evt.target;

    if(eobj.nodeType==3) eobj=eobj.parentNode;

    while (eobj.parentNode){

      if (eobj==obj) return;

        eobj=eobj.parent