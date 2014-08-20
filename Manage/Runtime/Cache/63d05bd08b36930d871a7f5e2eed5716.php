<?php if (!defined('THINK_PATH')) exit();?><div class="page">
	<div class="pageContent">
	
	<form method="post" action="__URL__/change/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone)" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
		<div class="pageFormContent" layoutH="58">
	<div class="unit">
		<label>Username：</label>
		<input type="text" class="required email"  name="account" readonly="readonly" value="<?php echo ($vo["account"]); ?>"/>
	</div>
    <div class="unit">
		<label>Name：</label>
		<input type="text" class="required"  name="name" readonly="readonly" value="<?php echo ($vo["name"]); ?>"/>
	</div>
	<div class="unit">
		<label>RestaurantName：</label>
		<input type="text" class="required"  name="nickname" readonly="readonly" value="<?php echo ($vo["nickname"]); ?>"/>
	</div>
	<div class="unit">
		<label>Address：</label>
		<input type="text" class="required"  size="30" name="address" readonly="readonly" value="<?php echo ($vo["address"]); ?>"/>
	</div>
    <div class="unit">
		<label>Phone：</label>
		<input type="text" class="required phone"  name="phone" value="<?php echo ($vo["phone"]); ?>"/>
	</div>
	<div class="unit">
		<label>RestaurantTel：</label>
		<input type="text" class="required phone"  name="tel" value="<?php echo ($vo["tel"]); ?>"/>
	</div>
    <div class="unit">
		<label>RestaurantFax：</label>
		<input type="text" class="required phone"  name="fax" value="<?php echo ($vo["resfax"]); ?>"/>
	</div>
	<div class="unit">
		<label>OpeningHours：</label>
		<input type="text" class="required" size='30' name="opening_hours" value="<?php echo ($vo["opening_hours"]); ?>"/>
	</div>
	<div class="unit">
		<label>Logo：</label>
		<label><img src="<?php echo ($vo["logo"]); ?>" width="120" height="56" /><br /><input type="file" name="logo" /></label>
	</div>
    <div class="unit">
		<label>Remark：</label>
		<textarea name="remark" style="width:300px;height:100px;"><?php echo ($vo["remark"]); ?></textarea>
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