<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-md-12">
	<div class="page-header">
		<h1>Update Actitives - ID: <?php echo $Result->ACT_ID?></h1>
	</div>
	<?php echo validation_errors(); ?>
	<form action="<?= base_url('Actitives/DoUpdate') ?>" method="post" name="fm_create" id="fm_create">
		<input type="hidden" name="ACTID" value="<?php echo $Result->ACT_ID?>"/>
	    <?php foreach($EventIdResult as $item2) { ?>
	        <input type="hidden" name="nm_eventid" value="<?php $act_id=$item2-> ACT_ID; echo $act_id+1; ?>">
	    <?php }  ?>
	    <input type="hidden" name="nm_userid" value="<?php echo $_SESSION['user_id']; ?>">
		<div class="form-group">
		    
			<label for="username">Category Type : </label>
            <select name="sl_Category">
				<option disabled selected value> -- Select an Option -- </option>
				<?php foreach($CateResult as $item) {  ?>
                    <option name='nm_Category' value="<?php echo $item->CATE_CD; ?>"  <?php if(( $item->CATE_NAME) == ($Result->CATE_NAME)){echo "selected=selected";} ?>><?php echo $item->CATE_NAME; ?></option>
                <?php }  ?>
            </select>
		</div>
		<div class="form-group">
			<label for="Date">Date : </label>
			<input type="Date" id="nm_Date" name="nm_Date" placeholder="Enter your event Date" value="<?php echo $Result->ACT_DATE; ?>">
		</div>
		<div class="form-group">
			<label for="Stime">Start Time : </label>
			<input type="Time" id="Stime" name="Stime" value="<?php echo $Result->START_TIME; ?>">
			<label for="Etime">End Time : </label>
			<input type="Time" id="Etime" name="Etime" value="<?php echo $Result->END_TIME; ?>">
		</div>
		<div class="form-group">
			<label for="username">Location : </label>
			<input type="text" id="nm_location" name="nm_location" placeholder="Enter the location" value="<?php echo $Result->LOCATION; ?>">
		</div>
		<div class="form-group">
			<label for="MaxPPL">Total Peoples (Original: <?php echo $Result->MAX_NO_PPL; ?>): </label>
			<input type="text" id="MaxPPL" name="MaxPPL" value="<?php echo $Result->MAX_NO_PPL; ?>">
			<input type="hidden" id="OriMaxPPL" name="OriMaxPPL" value="<?php echo $Result->MAX_NO_PPL; ?>">	
		</div>
		<div class="form-group">
			<label for="password_confirm">More Information : </label>
			<textarea id="nm_info" name="nm_info" rows="10" cols="30" class="form-control" ><?php echo $Result->INFO; ?></textarea>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="btnUpdate" value="Update">
		</div>
	</form>
</div>