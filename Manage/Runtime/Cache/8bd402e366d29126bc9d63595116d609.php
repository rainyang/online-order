<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<link href="__PUBLIC__/css/adminMain.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript">
function deleteHours(numrows,deleteid,catid){
	if(numrows < 2){
		alert("At least one timing must be required");
	}else{ 
		window.location.href="/c_panel/admin_contents/resturants/tab_add_businesshours.php?deleteid="+deleteid+"&catid="+catid;
	}
}
</script>
</head>
<body style="background-color:#FFFFFF">
  <form name="business_hrs" id="business_hrs" method="post" action="__APP__/RestaurantDetails/openDate">

   <div style="position:relative; border:#333 1px solid; padding:5px; margin:10px;">
 <div style="position:absolute; top:-10px; color: #333; font-size:12px;  background:#FFF; padding:0px 5px 0px 5px;">
 Monday </div>
  <table width="100%" border="0" cellspacing="1" class="listig_table">
  <tbody><tr bgcolor="#F7F7F7" height="25px">
    <td>From:</td>
    <td><select name="open_hr[]" id="open_hr_0_0">
            <option value="-1">Hour</option>
            <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['mon_open'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
            
            </select>
      &nbsp;
      <select name="open_min[]" id="open_min_0_0">
        <option value="-1">Minute</option>
                <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['mon_open'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
              </select></td>
    <td>To:</td>
    <td><select name="close_hr[]" id="close_hr_0_0">
    		<option value="-1" selected="selected">Hour</option>
                        <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['mon_close'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select>
        &nbsp;
        <select name="close_min[]" id="close_min_0_0">
    		<option value="-1">Minute</option>
                        <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['mon_close'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select></td>
        <!-- <td> 
        <a href="javascript: void(0)" onclick="deleteHours('1','6201','856')"><img height="22px" border="0" src="__PUBLIC__/images/removetime.png"></a>
        
        
<a href="tab_add_businesshours.php?catid=856&dayid=6201&day=0&action=delete" style="text-decoration:underline;"><img height="22px" border="0" src="../../../images/removetime.png" /></a>        
        </td>
        
    <td><a href="tab_add_businesshours.php?catid=856&amp;dayid=6201" style="text-decoration:underline;"><img height="22px" border="0" src="__PUBLIC__/images/addtime.png"></a></td> -->
  </tr>
  <input name="business_time_arr[]" type="hidden" value="6201">
  </tbody></table>
</div>
<div>&nbsp;</div>
 <div style="position:relative; border:#333 1px solid; padding:5px; margin:10px;">
 <div style="position:absolute; top:-10px; color: #333; font-size:12px;  background:#FFF; padding:0px 5px 0px 5px;">
 Tuesday </div>
  <table width="100%" border="0" cellspacing="1" class="listig_table">
  <tbody><tr bgcolor="#F7F7F7" height="25px">
    <td>From:</td>
    <td><select name="open_hr[]" id="open_hr_1_0">
      <option value="-1">Hour</option>
           <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['tue_open'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
            </select>
      &nbsp;
      <select name="open_min[]" id="open_min_1_0">
        <option value="-1">Minute</option>
                <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['tue_open'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
                <?php } ?>
              </select></td>
    <td>To:</td>
    <td><select name="close_hr[]" id="close_hr_1_0">
    		<option value="-1" selected="selected">Hour</option>
                        <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['tue_close'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select>
        &nbsp;
        <select name="close_min[]" id="close_min_1_0">
    		<option value="-1">Minute</option>
                        <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['tue_close'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select></td>
        <!-- <td> 
        <a href="javascript: void(0)" onclick="deleteHours('1','5271','856')"><img height="22px" border="0" src="images/removetime.png"></a>
        
        
<a href="tab_add_businesshours.php?catid=856&dayid=5271&day=1&action=delete" style="text-decoration:underline;"><img height="22px" border="0" src="../../../images/removetime.png" /></a>        
        </td>
        
    <td><a href="tab_add_businesshours.php?catid=856&amp;dayid=5271" style="text-decoration:underline;"><img height="22px" border="0" src="images/addtime.png"></a></td> -->
  </tr>
  <input name="business_time_arr[]" type="hidden" value="5271">
  </tbody></table>
</div>
<div>&nbsp;</div>
 <div style="position:relative; border:#333 1px solid; padding:5px; margin:10px;">
 <div style="position:absolute; top:-10px; color: #333; font-size:12px;  background:#FFF; padding:0px 5px 0px 5px;">
 Wednesday </div>
  <table width="100%" border="0" cellspacing="1" class="listig_table">
  <tbody><tr bgcolor="#F7F7F7" height="25px">
    <td>From:</td>
    <td><select name="open_hr[]" id="open_hr_2_0">
      <option value="-1">Hour</option>
            <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['wed_open'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
            </select>
      &nbsp;
      <select name="open_min[]" id="open_min_2_0">
        <option value="-1">Minute</option>
                <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['wed_open'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
              </select></td>
    <td>To:</td>
    <td><select name="close_hr[]" id="close_hr_2_0">
    		<option value="-1" selected="selected">Hour</option>
                       <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['wed_close'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select>
        &nbsp;
        <select name="close_min[]" id="close_min_2_0">
    		<option value="-1">Minute</option>
                       <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['wed_close'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select></td>
        <!-- <td> 
        <a href="javascript: void(0)" onclick="deleteHours('1','5272','856')"><img height="22px" border="0" src="images/removetime.png"></a>
        
        
<a href="tab_add_businesshours.php?catid=856&dayid=5272&day=2&action=delete" style="text-decoration:underline;"><img height="22px" border="0" src="../../../images/removetime.png" /></a>        
        </td>
        
    <td><a href="tab_add_businesshours.php?catid=856&amp;dayid=5272" style="text-decoration:underline;"><img height="22px" border="0" src="images/addtime.png"></a></td> -->
  </tr>
  <input name="business_time_arr[]" type="hidden" value="5272">
  </tbody></table>
</div>
<div>&nbsp;</div>
 <div style="position:relative; border:#333 1px solid; padding:5px; margin:10px;">
 <div style="position:absolute; top:-10px; color: #333; font-size:12px;  background:#FFF; padding:0px 5px 0px 5px;">
 Thursday </div>
  <table width="100%" border="0" cellspacing="1" class="listig_table">
  <tbody><tr bgcolor="#F7F7F7" height="25px">
    <td>From:</td>
    <td><select name="open_hr[]" id="open_hr_3_0">
      <option value="-1">Hour</option>
            <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['thu_open'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
            </select>
      &nbsp;
      <select name="open_min[]" id="open_min_3_0">
        <option value="-1">Minute</option>
                <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['thu_open'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
              </select></td>
    <td>To:</td>
    <td><select name="close_hr[]" id="close_hr_3_0">
    		<option value="-1" selected="selected">Hour</option>
                        <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['thu_close'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select>
        &nbsp;
        <select name="close_min[]" id="close_min_3_0">
    		<option value="-1">Minute</option>
                        <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['thu_close'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select></td>
        <!-- <td> 
        <a href="javascript: void(0)" onclick="deleteHours('1','5273','856')"><img height="22px" border="0" src="images/removetime.png"></a>
        
        
<a href="tab_add_businesshours.php?catid=856&dayid=5273&day=3&action=delete" style="text-decoration:underline;"><img height="22px" border="0" src="../../../images/removetime.png" /></a>        
        </td>
        
    <td><a href="tab_add_businesshours.php?catid=856&amp;dayid=5273" style="text-decoration:underline;"><img height="22px" border="0" src="images/addtime.png"></a></td> -->
  </tr>
  <input name="business_time_arr[]" type="hidden" value="5273">
  </tbody></table>
</div>
<div>&nbsp;</div>
 <div style="position:relative; border:#333 1px solid; padding:5px; margin:10px;">
 <div style="position:absolute; top:-10px; color: #333; font-size:12px;  background:#FFF; padding:0px 5px 0px 5px;">
 Friday </div>
  <table width="100%" border="0" cellspacing="1" class="listig_table">
  <tbody><tr bgcolor="#F7F7F7" height="25px">
    <td>From:</td>
    <td><select name="open_hr[]" id="open_hr_4_0">
      <option value="-1">Hour</option>
            <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['fri_open'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
            </select>
      &nbsp;
      <select name="open_min[]" id="open_min_4_0">
        <option value="-1">Minute</option>
                <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['fri_open'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
              </select></td>
    <td>To:</td>
    <td><select name="close_hr[]" id="close_hr_4_0">
    		<option value="-1" selected="selected">Hour</option>
                        <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['fri_close'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select>
        &nbsp;
        <select name="close_min[]" id="close_min_4_0">
    		<option value="-1">Minute</option>
                       <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['fri_close'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select></td>
        <!-- <td> 
        <a href="javascript: void(0)" onclick="deleteHours('1','5274','856')"><img height="22px" border="0" src="images/removetime.png"></a>
        
        
<a href="tab_add_businesshours.php?catid=856&dayid=5274&day=4&action=delete" style="text-decoration:underline;"><img height="22px" border="0" src="../../../images/removetime.png" /></a>        
        </td>
        
    <td><a href="tab_add_businesshours.php?catid=856&amp;dayid=5274" style="text-decoration:underline;"><img height="22px" border="0" src="images/addtime.png"></a></td> -->
  </tr>
  <input name="business_time_arr[]" type="hidden" value="5274">
  </tbody></table>
</div>
<div>&nbsp;</div>
 <div style="position:relative; border:#333 1px solid; padding:5px; margin:10px;">
 <div style="position:absolute; top:-10px; color: #333; font-size:12px;  background:#FFF; padding:0px 5px 0px 5px;">
 Saturday </div>
  <table width="100%" border="0" cellspacing="1" class="listig_table">
  <tbody><tr bgcolor="#F7F7F7" height="25px">
    <td>From:</td>
    <td><select name="open_hr[]" id="open_hr_5_0">
      <option value="-1">Hour</option>
           <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['sat_open'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
            </select>
      &nbsp;
      <select name="open_min[]" id="open_min_5_0">
        <option value="-1">Minute</option>
                <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['sat_open'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
              </select></td>
    <td>To:</td>
    <td><select name="close_hr[]" id="close_hr_5_0">
    		<option value="-1" selected="selected">Hour</option>
                       <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['sat_close'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select>
        &nbsp;
        <select name="close_min[]" id="close_min_5_0">
    		<option value="-1">Minute</option>
                        <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['sat_close'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select></td>
        <!-- <td> 
        <a href="javascript: void(0)" onclick="deleteHours('1','5275','856')"><img height="22px" border="0" src="images/removetime.png"></a>
        
        
<a href="tab_add_businesshours.php?catid=856&dayid=5275&day=5&action=delete" style="text-decoration:underline;"><img height="22px" border="0" src="../../../images/removetime.png" /></a>        
        </td>
        
    <td><a href="tab_add_businesshours.php?catid=856&amp;dayid=5275" style="text-decoration:underline;"><img height="22px" border="0" src="images/addtime.png"></a></td> -->
  </tr>
  <input name="business_time_arr[]" type="hidden" value="5275">
  </tbody></table>
</div>
<div>&nbsp;</div>
 <div style="position:relative; border:#333 1px solid; padding:5px; margin:10px;">
 <div style="position:absolute; top:-10px; color: #333; font-size:12px;  background:#FFF; padding:0px 5px 0px 5px;">
 Sunday </div>
  <table width="100%" border="0" cellspacing="1" class="listig_table">
  <tbody><tr bgcolor="#F7F7F7" height="25px">
    <td>From:</td>
    <td><select name="open_hr[]" id="open_hr_6_0">
      <option value="-1">Hour</option>
            <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['sun_open'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
            </select>
      &nbsp;
      <select name="open_min[]" id="open_min_6_0">
        <option value="-1">Minute</option>
                <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['sun_open'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
              </select></td>
    <td>To:</td>
    <td><select name="close_hr[]" id="close_hr_6_0">
    		<option value="-1" selected="selected">Hour</option>
                       <?php for($i = 0; $i<24; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['sun_close'][0]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select>
        &nbsp;
        <select name="close_min[]" id="close_min_6_0">
    		<option value="-1">Minute</option>
                        <?php for($i = 0; $i<60; $i++){ ?>
                <option value="<?php echo strlen($i)==1?"0".$i:$i;?>"<?php if($i == $times['sun_close'][1]): ?>selected="selected"<?php endif; ?>><?php echo strlen($i)==1?"0".$i:$i;?></option>
            <?php } ?>
                	</select></td>
        <!-- <td> 
        <a href="javascript: void(0)" onclick="deleteHours('1','5276','856')"><img height="22px" border="0" src="images/removetime.png"></a>
        
        
<a href="tab_add_businesshours.php?catid=856&dayid=5276&day=6&action=delete" style="text-decoration:underline;"><img height="22px" border="0" src="../../../images/removetime.png" /></a>        
        </td>
        
    <td><a href="tab_add_businesshours.php?catid=856&amp;dayid=5276" style="text-decoration:underline;"><img height="22px" border="0" src="images/addtime.png"></a></td> -->
  </tr>
  <input name="restaurant_id" type="hidden" value="<?php echo ($_SESSION['restaurant_id']); ?>">
  <input name="time_id" type="hidden" value="<?php echo ($info["id"]); ?>">
  </tbody></table>
</div>
<div>&nbsp;</div>
 <div>&nbsp;&nbsp;<input type="submit" name="update" id="update" value="Update"></div>
</form>


</body>
</html>