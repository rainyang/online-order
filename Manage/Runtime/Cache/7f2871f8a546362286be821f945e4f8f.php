<?php if (!defined('THINK_PATH')) exit();?><div class="page">
	<div class="pageContent">
	
	<form method="post" action="__URL__/change/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone)" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
		<div class="pageFormContent" layoutH="58">
	<div class="unit">
				<label>Tariff(%)：</label>
				<input type="text" class="required number" size="30" maxlength="20" name="tariff" value="<?php echo ($vo["tariff"]); ?>"/>
			</div>
			<div class="unit">
				<label>TipRatio(%)：</label>
				<input type="text" name="tip" size="30" maxlength="20" placeholder="Format:1,2,3(Enter up to 3)" class="required" value="<?php echo ($vo["tip"]); ?>"/>
			</div>
            
            <div class="unit">
				<label>InitialDistance(mile)：</label>
				<input type="text" name="initialdistance" size="30" maxlength="20" class="required number" value="<?php echo ($vo["initialdistance"]); ?>"/>
			</div>
            <div class="unit">
				<label>PerMilePlusMoney($)：</label>
				<input type="text" name="distanceaddmoney" size="30" maxlength="20" class="required number" value="<?php echo ($vo["distanceaddmoney"]); ?>"/>
			</div>
            <div class="unit">
				<label>Minimum($)：</label>
				<input type="text" name="minimum" size="30" maxlength="20" class="required number" value="<?php echo ($vo["minimum"]); ?>"/>
			</div>
             <div class="unit">
				<label>Parking：</label>
                <input type="radio" name="parking" value="1" <?php if($vo["parking"] == '1'): ?>checked="checked"<?php endif; ?> />Yes
                <input type="radio" name="parking" value="0" <?php if($vo["parking"] == '0'): ?>checked="checked"<?php endif; ?> />No
			</div>
            <div class="unit">
				<label>IsDelivery：</label>
                <input type="radio" name="is_delivery" value="1" <?php if($vo["is_delivery"] == '1'): ?>checked="checked"<?php endif; ?>/>Yes
                <input type="radio" name="is_delivery" value="0" <?php if($vo["is_delivery"] == '0'): ?>checked="checked"<?php endif; ?>/>No
			</div>
            
             <div class="unit">
           		 <label><h2>DeliveryHours</h2></label>
              </div>
             <div class="unit">
				<label>Monday：</label>
                <select name="mon_dstart">
                	<option value="01:00AM" <?php if($dhours['Monday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?> >01:00AM</option> 
                    <option value="02:00AM" <?php if($dhours['Monday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($dhours['Monday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($dhours['Monday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($dhours['Monday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($dhours['Monday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($dhours['Monday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($dhours['Monday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($dhours['Monday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($dhours['Monday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($dhours['Monday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($dhours['Monday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>  
                </select>
                <label style="width:10px;">to</label>
                <select name="mon_dend">
                	 <option value="01:00PM" <?php if($dhours['Monday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($dhours['Monday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($dhours['Monday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($dhours['Monday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($dhours['Monday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($dhours['Monday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($dhours['Monday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($dhours['Monday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($dhours['Monday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($dhours['Monday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($dhours['Monday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($dhours['Monday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option>  
                </select>
			</div>
             <div class="unit">
				<label>Tuesday：</label>
                <select name="tues_dstart">
                	 <option value="01:00AM" <?php if($dhours['Tuesday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($dhours['Tuesday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($dhours['Tuesday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($dhours['Tuesday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($dhours['Tuesday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($dhours['Tuesday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($dhours['Tuesday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($dhours['Tuesday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($dhours['Tuesday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($dhours['Tuesday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($dhours['Tuesday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($dhours['Tuesday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>  
                </select>
                <label style="width:10px;">to</label>
                <select name="tues_dend">
                	 <option value="01:00PM" <?php if($dhours['Tuesday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($dhours['Tuesday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($dhours['Tuesday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($dhours['Tuesday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($dhours['Tuesday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($dhours['Tuesday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($dhours['Tuesday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($dhours['Tuesday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($dhours['Tuesday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($dhours['Tuesday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($dhours['Tuesday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($dhours['Tuesday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option>  
                </select>
			</div>
             <div class="unit">
				<label>Wednesday：</label>
                <select name="wed_dstart">
                	 <option value="01:00AM" <?php if($dhours['Wednesday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($dhours['Wednesday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($dhours['Wednesday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($dhours['Wednesday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($dhours['Wednesday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($dhours['Wednesday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($dhours['Wednesday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($dhours['Wednesday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($dhours['Wednesday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($dhours['Wednesday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($dhours['Wednesday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($dhours['Wednesday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>  
                </select>
                <label style="width:10px;">to</label>
                <select name="wed_dend">
                	 <option value="01:00PM" <?php if($dhours['Wednesday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($dhours['Wednesday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($dhours['Wednesday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($dhours['Wednesday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($dhours['Wednesday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($dhours['Wednesday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($dhours['Wednesday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($dhours['Wednesday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($dhours['Wednesday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($dhours['Wednesday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($dhours['Wednesday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($dhours['Wednesday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option>  
                </select>
			</div>
             <div class="unit">
				<label>Thursday：</label>
                <select name="thur_dstart">
                	 <option value="01:00AM" <?php if($dhours['Thursday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($dhours['Thursday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($dhours['Thursday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($dhours['Thursday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($dhours['Thursday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($dhours['Thursday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($dhours['Thursday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($dhours['Thursday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($dhours['Thursday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($dhours['Thursday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($dhours['Thursday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($dhours['Thursday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>  
                </select>
                <label style="width:10px;">to</label>
                <select name="thur_dend">
                	 <option value="01:00PM" <?php if($dhours['Thursday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($dhours['Thursday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($dhours['Thursday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($dhours['Thursday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($dhours['Thursday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($dhours['Thursday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($dhours['Thursday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($dhours['Thursday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($dhours['Thursday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($dhours['Thursday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($dhours['Thursday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($dhours['Thursday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option>  
                </select>
			</div>
             <div class="unit">
				<label>Friday：</label>
                <select name="fri_dstart">
                	 <option value="01:00AM" <?php if($dhours['Friday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($dhours['Friday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($dhours['Friday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($dhours['Friday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($dhours['Friday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($dhours['Friday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($dhours['Friday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($dhours['Friday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($dhours['Friday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($dhours['Friday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($dhours['Friday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($dhours['Friday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>  
                </select>
                <label style="width:10px;">to</label>
                <select name="fri_dend">
                	 <option value="01:00PM" <?php if($dhours['Friday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($dhours['Friday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($dhours['Friday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($dhours['Friday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($dhours['Friday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($dhours['Friday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($dhours['Friday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($dhours['Friday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($dhours['Friday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($dhours['Friday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($dhours['Friday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($dhours['Friday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option>  
                </select>
			</div>
             <div class="unit">
				<label>Saturday：</label>
                <select name="sat_dstart">
                	 <option value="01:00AM" <?php if($dhours['Saturday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($dhours['Saturday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($dhours['Saturday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($dhours['Saturday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($dhours['Saturday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($dhours['Saturday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($dhours['Saturday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($dhours['Saturday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($dhours['Saturday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($dhours['Saturday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($dhours['Saturday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($dhours['Saturday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>  
                </select>
                <label style="width:10px;">to</label>
                <select name="sat_dend">
                	 <option value="01:00PM" <?php if($dhours['Saturday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($dhours['Saturday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($dhours['Saturday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($dhours['Saturday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($dhours['Saturday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($dhours['Saturday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($dhours['Saturday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($dhours['Saturday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($dhours['Saturday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($dhours['Saturday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($dhours['Saturday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($dhours['Saturday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option>  
                </select>
			</div>
             <div class="unit">
				<label>Sunday：</label>
                <select name="sun_dstart">
                	 <option value="01:00AM" <?php if($dhours['Sunday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($dhours['Sunday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($dhours['Sunday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($dhours['Sunday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($dhours['Sunday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($dhours['Sunday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($dhours['Sunday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($dhours['Sunday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($dhours['Sunday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($dhours['Sunday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($dhours['Sunday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($dhours['Sunday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>  
                </select>
                <label style="width:10px;">to</label>
                <select name="sun_dend">
                	<option value="01:00PM" <?php if($dhours['Sunday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($dhours['Sunday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($dhours['Sunday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($dhours['Sunday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($dhours['Sunday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($dhours['Sunday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($dhours['Sunday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($dhours['Sunday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($dhours['Sunday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($dhours['Sunday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($dhours['Sunday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($dhours['Sunday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option>  
                </select>
			</div>
            
             <div class="unit">
				<label>IsPickup：</label>
                <input type="radio" name="is_pickup" value="1" <?php if($vo["is_pickup"] == '1'): ?>checked="checked"<?php endif; ?>/>Yes
                <input type="radio" name="is_pickup" value="0" <?php if($vo["is_pickup"] == '0'): ?>checked="checked"<?php endif; ?>/>No
			</div>
             <div class="unit">
           		 <label><h2>PickupHours</h2></label>
              </div>
             <div class="unit">
				<label>Monday：</label>
                <select name="mon_pstart">
                	 <option value="01:00AM" <?php if($phours['Monday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($phours['Monday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($phours['Monday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($phours['Monday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($phours['Monday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($phours['Monday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($phours['Monday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($phours['Monday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($phours['Monday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($phours['Monday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($phours['Monday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($phours['Monday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>  
                </select>
                <label style="width:10px;">to</label>
                <select name="mon_pend">
                	<option value="01:00PM" <?php if($phours['Monday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($phours['Monday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($phours['Monday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($phours['Monday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($phours['Monday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($phours['Monday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($phours['Monday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($phours['Monday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($phours['Monday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($phours['Monday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($phours['Monday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($phours['Monday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option>  
                </select>
			</div>
             <div class="unit">
				<label>Tuesday：</label>
                <select name="tues_pstart">
                	 <option value="01:00AM" <?php if($phours['Tuesday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($phours['Tuesday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($phours['Tuesday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($phours['Tuesday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($phours['Tuesday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($phours['Tuesday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($phours['Tuesday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($phours['Tuesday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($phours['Tuesday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($phours['Tuesday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($phours['Tuesday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($phours['Tuesday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>   
                </select>
                <label style="width:10px;">to</label>
                <select name="tues_pend">
                	<option value="01:00PM" <?php if($phours['Tuesday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($phours['Tuesday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($phours['Tuesday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($phours['Tuesday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($phours['Tuesday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($phours['Tuesday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($phours['Tuesday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($phours['Tuesday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($phours['Tuesday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($phours['Tuesday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($phours['Tuesday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($phours['Tuesday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option>  
                </select>
			</div>
             <div class="unit">
				<label>Wednesday：</label>
                <select name="wed_pstart">
                	<option value="01:00AM" <?php if($phours['Wednesday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($phours['Wednesday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($phours['Wednesday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($phours['Wednesday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($phours['Wednesday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($phours['Wednesday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($phours['Wednesday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($phours['Wednesday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($phours['Wednesday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($phours['Wednesday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($phours['Wednesday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($phours['Wednesday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>   
                </select>
                <label style="width:10px;">to</label>
                <select name="wed_pend">
                	<option value="01:00PM" <?php if($phours['Wednesday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($phours['Wednesday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($phours['Wednesday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($phours['Wednesday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($phours['Wednesday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($phours['Wednesday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($phours['Wednesday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($phours['Wednesday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($phours['Wednesday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($phours['Wednesday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($phours['Wednesday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($phours['Wednesday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option>
                </select>
			</div>
             <div class="unit">
				<label>Thursday：</label>
                <select name="thur_pstart">
                	<option value="01:00AM" <?php if($phours['Thursday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($phours['Thursday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($phours['Thursday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($phours['Thursday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($phours['Thursday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($phours['Thursday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($phours['Thursday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($phours['Thursday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($phours['Thursday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($phours['Thursday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($phours['Thursday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($phours['Thursday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>   
                </select>
                <label style="width:10px;">to</label>
                <select name="thur_pend">
                	<option value="01:00PM" <?php if($phours['Thursday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($phours['Thursday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($phours['Thursday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($phours['Thursday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($phours['Thursday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($phours['Thursday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($phours['Thursday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($phours['Thursday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($phours['Thursday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($phours['Thursday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($phours['Thursday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($phours['Thursday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option>
                </select>
			</div>
             <div class="unit">
				<label>Friday：</label>
                <select name="fri_pstart">
                	<option value="01:00AM" <?php if($phours['Friday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($phours['Friday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($phours['Friday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($phours['Friday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($phours['Friday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($phours['Friday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($phours['Friday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($phours['Friday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($phours['Friday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($phours['Friday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($phours['Friday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($phours['Friday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>   
                </select>
                <label style="width:10px;">to</label>
                <select name="fri_pend">
                	<option value="01:00PM" <?php if($phours['Friday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($phours['Friday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($phours['Friday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($phours['Friday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($phours['Friday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($phours['Friday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($phours['Friday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($phours['Friday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($phours['Friday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($phours['Friday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($phours['Friday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($phours['Friday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option> 
                </select>
			</div>
             <div class="unit">
				<label>Saturday：</label>
                <select name="sat_pstart">
                	<option value="01:00AM" <?php if($phours['Saturday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($phours['Saturday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($phours['Saturday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($phours['Saturday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($phours['Saturday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($phours['Saturday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($phours['Saturday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($phours['Saturday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($phours['Saturday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($phours['Saturday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($phours['Saturday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($phours['Saturday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>    
                </select>
                <label style="width:10px;">to</label>
                <select name="sat_pend">
                	<option value="01:00PM" <?php if($phours['Saturday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($phours['Saturday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($phours['Saturday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($phours['Saturday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($phours['Saturday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($phours['Saturday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($phours['Saturday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($phours['Saturday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($phours['Saturday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($phours['Saturday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($phours['Saturday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($phours['Saturday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option> 
                </select>
			</div>
             <div class="unit">
				<label>Sunday：</label>
                <select name="sun_pstart">
                	<option value="01:00AM" <?php if($phours['Sunday'][0] == '01:00AM'): ?>selected="selected"<?php endif; ?>>01:00AM</option> 
                    <option value="02:00AM" <?php if($phours['Sunday'][0] == '02:00AM'): ?>selected="selected"<?php endif; ?>>02:00AM</option> 
                    <option value="03:00AM" <?php if($phours['Sunday'][0] == '03:00AM'): ?>selected="selected"<?php endif; ?>>03:00AM</option> 
                    <option value="04:00AM" <?php if($phours['Sunday'][0] == '04:00AM'): ?>selected="selected"<?php endif; ?>>04:00AM</option> 
                    <option value="05:00AM" <?php if($phours['Sunday'][0] == '05:00AM'): ?>selected="selected"<?php endif; ?>>05:00AM</option> 
                    <option value="06:00AM" <?php if($phours['Sunday'][0] == '06:00AM'): ?>selected="selected"<?php endif; ?>>06:00AM</option> 
                    <option value="07:00AM" <?php if($phours['Sunday'][0] == '07:00AM'): ?>selected="selected"<?php endif; ?>>07:00AM</option> 
                    <option value="08:00AM" <?php if($phours['Sunday'][0] == '08:00AM'): ?>selected="selected"<?php endif; ?>>08:00AM</option> 
                    <option value="09:00AM" <?php if($phours['Sunday'][0] == '09:00AM'): ?>selected="selected"<?php endif; ?>>09:00AM</option> 
                    <option value="10:00AM" <?php if($phours['Sunday'][0] == '10:00AM'): ?>selected="selected"<?php endif; ?>>10:00AM</option> 
                    <option value="11:00AM" <?php if($phours['Sunday'][0] == '11:00AM'): ?>selected="selected"<?php endif; ?>>11:00AM</option>
                    <option value="12:00AM" <?php if($phours['Sunday'][0] == '12:00AM'): ?>selected="selected"<?php endif; ?>>12:00AM</option>
                </select>
                <label style="width:10px;">to</label>
                <select name="sun_pend">
                	 <option value="01:00PM" <?php if($phours['Sunday'][1] == '01:00PM'): ?>selected="selected"<?php endif; ?>>01:00PM</option> 
                    <option value="02:00PM" <?php if($phours['Sunday'][1] == '02:00PM'): ?>selected="selected"<?php endif; ?>>02:00PM</option> 
                    <option value="03:00PM" <?php if($phours['Sunday'][1] == '03:00PM'): ?>selected="selected"<?php endif; ?>>03:00PM</option> 
                    <option value="04:00PM" <?php if($phours['Sunday'][1] == '04:00PM'): ?>selected="selected"<?php endif; ?>>04:00PM</option> 
                    <option value="05:00PM" <?php if($phours['Sunday'][1] == '05:00PM'): ?>selected="selected"<?php endif; ?>>05:00PM</option> 
                    <option value="06:00PM" <?php if($phours['Sunday'][1] == '06:00PM'): ?>selected="selected"<?php endif; ?>>06:00PM</option> 
                    <option value="07:00PM" <?php if($phours['Sunday'][1] == '07:00PM'): ?>selected="selected"<?php endif; ?>>07:00PM</option> 
                    <option value="08:00PM" <?php if($phours['Sunday'][1] == '08:00PM'): ?>selected="selected"<?php endif; ?>>08:00PM</option> 
                    <option value="09:00PM" <?php if($phours['Sunday'][1] == '09:00PM'): ?>selected="selected"<?php endif; ?>>09:00PM</option> 
                    <option value="10:00PM" <?php if($phours['Sunday'][1] == '10:00PM'): ?>selected="selected"<?php endif; ?>>10:00PM</option> 
                    <option value="11:00PM" <?php if($phours['Sunday'][1] == '11:00PM'): ?>selected="selected"<?php endif; ?>>11:00PM</option>
                    <option value="12:00PM" <?php if($phours['Sunday'][1] == '12:00PM'): ?>selected="selected"<?php endif; ?>>12:00PM</option> 
                </select>
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