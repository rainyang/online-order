<?php if (!defined('THINK_PATH')) exit();?>
<script language="JavaScript">
<!--
function checkName(){
	ThinkAjax.send('__URL__/checkAccount/','ajax=1&account='+$F('account'));
}
//-->
</script>

<div class="page">
	<div class="pageContent">
	
	<form method="post" action="__URL__/insert/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone)" enctype="multipart/form-data">
		<div class="pageFormContent" layoutH="58">

			<div class="unit">
				<label>Username：</label>
				<input type="text" class="required email" size="30" maxlength="20" name="account"/>
			</div>
			<div class="unit">
				<label>Password：</label>
				<input type="password" name="password" size="30" maxlength="20" class="required alphanumeric"/>
			</div>
            <div class="unit">
				<label>Name：</label>
				<input type="text" name="name" size="30" maxlength="100" class="required"/>
			</div>
			<div class="unit">
				<label>Phone：</label>
				<input type="text" name="phone" size="30" maxlength="100" class="required Phone"/>
			</div>
            <div class="unit">
				<label>RestaurantName：</label>
				<input type="text" name="nickname" size="30" maxlength="100" class="required"/>
			</div>
			<div class="unit">
				<label>RestaurantTel：</label>
				<input type="text" name="tel" size="30" maxlength="100" class="required phone"/>
			</div>
            <div class="unit">
				<label>RestaurantFax：</label>
				<input type="text" name="resfax" size="30" maxlength="100" class="required phone"/>
			</div>
            <div class="unit">
				<label>Address：</label>
				<input type="text" name="address" size="30" maxlength="100" class="required"/>
			</div>
            <div class="unit">
				<label>OpenningHours：</label>
				<input type="text" name="opening_hours" placeholder="Formats: 00:00-00:00" size="30" maxlength="100" class="required"/>
			</div>
            <div class="unit" style="display:none;">
				<label>Logo：</label>
				<input type="hidden" name="logo" size="30" maxlength="100" class="required" value="/Public/Images/no-pictrue.jpg"/>
			</div>
			<div class="unit">
				<label>Status：</label>
				<select name="status">
					<option value="1">Enable</option>
					<option value="0">Disabled</option>
				</select>
			</div>
            <div class="unit">
				<label>BusinessStatus：</label>
				<select name="business_status">
					<option value="1">Business</option>
					<option value="0">Stop</option>
				</select>
			</div>
			<div class="unit">
				<label>Logo：</label>
				<input type="file" name="logo" />
			</div>
			<div class="unit">
				<label>Remark：</label>
				<textarea name="remark" style="width:300px;height:100px;"></textarea>
			</div>
			
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">Submit</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">Cancel</button></div></div></li>
			</ul>
		</div>
	</form>
	
	</div>
</div>