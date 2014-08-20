<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title>Page tips</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='Refresh' content='<?php echo ($waitSecond); ?>;URL=<?php echo ($jumpUrl); ?>'>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/style.css" />
</head>
<body>
<div class="message">
<table align="center"  cellpadding=0 cellspacing=0 class="message" >
	<tr>
		<td height='5'  class="topTd" ></td>
	</tr>
	<tr class="row" >
		<th class="tCenter space"><?php echo ($msgTitle); ?></th>
	</tr>
	<?php if(isset($message)): ?><tr class="row">
		<td style="color:blue"><?php echo ($message); ?></td>
	</tr><?php endif; ?>
	<?php if(isset($error)): ?><tr class="row">
		<td style="color:red"><?php echo ($error); ?></td>
	</tr><?php endif; ?>
	<?php if(isset($closeWin)): ?><tr class="row">
		<td>System will shut down automatically in  <span style="color:blue;font-weight:bold"><?php echo ($waitSecond); ?></span> seconds ,if you do not want to wait, direct click   <a href="<?php echo ($jumpUrl); ?>">here</a> to close</td>
	</tr><?php endif; ?>
	<?php if(!isset($closeWin)): ?><tr class="row">
		<td>System will automatically jump in <span style="color:blue;font-weight:bold"><?php echo ($waitSecond); ?></span> seconds ,if you do not want to wait, direct click   <a href="<?php echo ($jumpUrl); ?>">here</a> to jump</td>
	</tr><?php endif; ?>
	<tr>
		<td height='5' class="bottomTd"></td>
	</tr>
	</table>
</div>
</body>
</html> 

<!-- <html>
 <head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>页面提示</title>
  <script type="text/javascript">
   function refresh(){
    location.href = "<<?php echo ($jumpUrl); ?>>";
   }
   setTimeout("refresh()",<<?php echo ($waitSecond); ?>>000);
  </script>
  <style type="text/css">
   *{margin:0px;padding:0px;font-size:12px;font-family:Arial,Verdana;}
   #wrapper{width:450px;height:200px;background:#F5F5F5;border:1px solid #D2D2D2;position:absolute;top:40%;left:50%;margin-top:-100px;margin-left:-225px;}
   p.msg-title{width:100%;height:30px;line-height:30px;text-align:center;color:#EE7A38;margin-top:40px;font:14px Arial,Verdana;font-weight:bold;}
   p.message{width:100%;height:40px;line-height:40px;text-align:center;color:blue;margin-top:5px;margin-bottom:5px;}
   p.error{width:100%;height:40px;line-height:40px;text-align:center;color:red;margin-top:5px;margin-bottom:5px;}
   p.notice{width:100%;height:25px;line-height:25px;text-align:center;}
  </style>
 </head>

 <body>
  <div id="wrapper">
   <p class="msg-title"><<?php echo ($msgTitle); ?>></p>
   <?php if(isset($message)): ?><p class="message"><<?php echo ($message); ?>></p><?php endif; ?>
   <?php if(isset($error)): ?><p class="error"><<?php echo ($error); ?>></p><?php endif; ?>
   <?php if(isset($closeWin)): ?><p class="notice">System will shut down automatically in <span style="color:blue;font-weight:bold"><<?php echo ($waitSecond); ?>></span> seconds ,if you do not want to wait, direct click <a href="<<?php echo ($jumpUrl); ?>>">here</a> to close</p><?php endif; ?>
   <?php if(!isset($closeWin)): ?><p class="notice">System will automatically jump in <span style="color:blue;font-weight:bold"><<?php echo ($waitSecond); ?>></span> seconds ,if you do not want to wait, direct click <a href="<<?php echo ($jumpUrl); ?>>">here</a> to close</p><?php endif; ?>
  </div>
 </body>
</html> -->