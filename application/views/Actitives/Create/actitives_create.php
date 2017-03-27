<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-md-12">
	<div class="page-header">
		<h1>Create Actitives</h1>
	</div>
	<form action="<?= base_url('Actitives/Create') ?>" method="post" name="fm_create" id="fm_create">
	    <?php foreach($EventIdResult as $item2) { ?>
	        <input type="hidden" name="nm_eventid" value="<?php $act_id=$item2-> ACT_ID; echo $act_id+1; ?>">
	    <?php }  ?>
	    <input type="hidden" name="nm_userid" value="<?php echo $_SESSION['user_id']; ?>">
		<div class="form-group">
		    
			<label for="username">Category Type : </label>
            <select name="sl_Category">
				<option disabled selected value> -- Select an Option -- </option>
				<?php foreach($CateResult as $item) { ?>
                    <option name='nm_Category' value="<?php echo $item->CATE_CD; ?>"><?php echo $item->CATE_NAME; ?></option>
                <?php }  ?>
            </select>
		</div>
		<div class="form-group">
			<label for="Date">Date : </label>
			<input type="Date" id="nm_Date" name="nm_Date" placeholder="Enter your event Date">
		</div>
		<div class="form-group">
			<label for="Stime">Start Time : </label>
			<input type="Time" id="Stime" name="Stime">
			<label for="Etime">End Time : </label>
			<input type="Time" id="Etime" name="Etime">
		</div>
		<div class="form-group">
			<label for="username">Location : </label>
			<input type="text" id="nm_location" name="nm_location" placeholder="Enter the location">
		</div>
		<div class="form-group">
			<label for="MaxPPL">Total Peoples : </label>
			<input type="text" id="MaxPPL" name="MaxPPL" >
		</div>
		<div class="form-group">
			<label for="password_confirm">More Information : </label>
			<textarea id="nm_info" name="nm_info" rows="10" cols="30" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="create" value="Create">
		</div>
	</form>
</div>