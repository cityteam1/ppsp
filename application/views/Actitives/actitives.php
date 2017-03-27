<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<div class="col-md-12">
    <div class="page-header"> 
        <div class="nav nav-pills" role="tablist">
        <form action="<?php $_PHP_SELF ?>" method="get" name="fm_category" id="fm_category">
            <?php foreach($CateResult as $item) { ?>
    		        <button type="submit" class="btn btn-default" value="<?php echo $item->CATE_CD; ?>" name="category_cd" id="category_cd"> <?php echo $item->CATE_NAME; ?> </button>
    		<?php } ?>
        </form>
        </div>
        <br/>
        <?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
        <form action="<?= base_url('Actitives/Create') ?>" method="post" name="fm_create_acti" id="fm_create_acti">
    	    <button type="submit" class="btn btn-primary" name="create_acti" id="create_acti"> New Events</button>
        </form>
        <?php endif; ?>
	</div>
</div>

  
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
                    <?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
                        <div class="row">
                            <div class="col-md-12">
                        <?php
                            if( $item->CREATE_USR_ID == $_SESSION['user_id'] ):
                        ?>
                              <form action="<?= base_url('Actitives/Update') ?>" method="post" name="fm_update_acti" id="fm_update_acti" class="col-md-2"> 
                                    <button type="submit" class="btn btn-info" name="update_acti" id="update_acti" value="<?php echo $item->ACT_ID; ?>" > Update</button>
                                </form>
                        <?php endif?>
                        <?php if( $item->CREATE_USR_ID == $_SESSION['user_id'] ){ ?>
                                <form action="<?= base_url('Actitives/Disable') ?>" method="post" name="fm_join_acti" id="fm_join_acti" class="col-md-2">
                                    <button type="submit" class="btn btn-info" name="disable_acti" id="disable_acti" value="<?php echo $item->ACT_ID; ?>" > Delete</button>
                                </form>
                        <?php } ?>
                        <?php if ( $item->NO_PPL === $item->MAX_NO_PPL ) {?>
                             <form action="<?= base_url('Actitives/Update') ?>" method="post" name="fm_update_acti" id="fm_update_acti" class="col-md-2"> 
                                <button type="submit" class="btn btn-info" name="join_acti" id="join_acti" disabled > Full </button>
                                </form>
                        <?php } elseif( $item->CREATE_USR_ID == $_SESSION['user_id'] ){?>
                            <form action="<?= base_url('Actitives/Update') ?>" method="post" name="fm_update_acti" id="fm_update_acti" class="col-md-2"> 
                                <button type="submit" class="btn btn-info" name="dis_acti" id="dis_acti" disabled> Disable</button>
                            </form>
                        <?php }else{?>
                                <form action="<?= base_url('Actitives/Join') ?>" method="post" name="fm_join_acti" id="fm_join_acti" class="col-md-2">
                                    <button type="submit" class="btn btn-info" name="join_acti" id="join_acti" value="<?php echo $item->ACT_ID; ?>"> Join </button>
                                </form>
                	    <?php } ?>
                	    </div> </div>
                	 <?php endif; ?>
            </div>
          </div>
        </div>
      
     
<br>
<?php }  ?>
</div>
<!--<?php echo $_SESSION['actitive_id']  ?>-->
