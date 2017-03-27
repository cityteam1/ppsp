<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
<?php foreach($Result as $item)
{ ?>
    <div class="col-sm-6">
      <div class="panel panel-default text-left" >
        <div class="panel-body">
            <table class="table table-hover">
                  <tr><th colspan="4" class="success">Actitive ID : <?php echo $item->ACT_ID; ?></th></tr>
                <tr>
                    <td><span class="glyphicon glyphicon-user" aria-hidden="true"> Creator</td>
                    <td><?php echo $item->username; ?></td>
                </tr> 
                <tr>
                    <td><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"> Category Type</td>
                    <td ><?php echo $item->CATE_NAME; ?></td>
                </tr>
                <tr>
                    <td><span class="glyphicon glyphicon-calendar" aria-hidden="true"> Date</td>
                    <td><?php echo $item->ACT_DATE; ?></td>
                </tr>
                <tr>
                    <td><span class="glyphicon glyphicon-time" aria-hidden="true"> Start Time</td>
                    <td ><?php echo $item->START_TIME; ?></td>
                </tr>
                <tr>
                    <td><span class="glyphicon glyphicon-time" aria-hidden="true"> End Time</td>
                    <td><?php echo $item->END_TIME; ?></td>
                </tr>
                <tr>
                    <td><span class="glyphicon glyphicon-map-marker" aria-hidden="true"> Location</td>
                    <td><?php echo $item->LOCATION; ?></td>
                </tr>
                <tr>
                    <td><span class="glyphicon glyphicon-user" aria-hidden="true"> No. of Peoples</td>
                    <td><?php echo $item->NO_PPL; ?> / <?php echo $item->MAX_NO_PPL; ?></td>
                </tr>
                <tr>
                    <th colspan="4" class="info"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"> Information </th>
                </tr>
                <tr>
                    <td colspan="4" rowspan="5"><?php echo $item->INFO; ?></td>
                </tr>
            </table>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-default text-left" >
        <div class="panel-body">
            <table class="table table-hover">
            	<form action="<?= base_url('Actitives/Join') ?>" method="post" name="fm_join_Event" id="fm_join_Event">
            		<input type="hidden" name="nm_userid" value="<?php echo $_SESSION['user_id']; ?>">
            		<input type="hidden" name="nm_noppl" value="<?php $noppl=$item-> NO_PPL; echo $noppl+1; ?>">
                    <button type="submit" class="btn btn-info" name="join_Event" id="join_Event" value="<?php echo $_POST['join_acti']; ?>"> Join </button>
                </form>
                <tr><th class="success">Partner Name List :</th></tr>
                <?php foreach($ResultPartner as $item) { ?>
	                <tr>
	                    <td><span class="glyphicon glyphicon-user" aria-hidden="true"> <?php echo $item->username; ?></td>
	                </tr> 
				<?php }  ?>
            </table>
        </div>
      </div>
    </div>
<?php }  ?>
</div>

