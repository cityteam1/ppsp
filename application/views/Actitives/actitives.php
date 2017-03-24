<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<div class="col-md-12">
    <div class="page-header"> 
        <div class="nav nav-pills" role="tablist">
        <form action="<?= base_url('Actitives') ?>" method="post" name="fm_create_acti" id="fm_create_acti">
    			<button type="submit" class="btn btn-default" name="create_acti" id="create_acti"> Create New Actitive</button>
        </form>
        <form action="<?php $_PHP_SELF ?>" method="get" name="fm_category" id="fm_category">
            
    			<button type="submit" class="btn btn-default" value="" name="category_cd" id="category_cd"> ALL </button>
    			<button type="submit" class="btn btn-default" value="FB" name="category_cd" id="category_cd"> Football </button>
    			<button type="submit" class="btn btn-default" value="BK" name="category_cd" id="category_cd"> Basketball </button>
        	</div>
        </form>
	</div>
</div>
<?php foreach($Result as $item)
    { ?>
<table style="width:70%" class="table table-bordered">
    <tr class="success">
        <td>Actitive No : <?php echo $item->ACT_ID; ?></td>
    </tr>
    <tr class="success">
        <td>Creator : <?php echo $item->username; ?></td>
        <td colspan="3">Category Type : <?php echo $item->CATE_NAME; ?></td>
    </tr>
    <tr>
        <td>Date : <?php echo $item->ACT_DATE; ?></td>
        <td>Start Time : <?php echo $item->START_TIME; ?></td>
        <td>End Time : <?php echo $item->END_TIME; ?></td>
        <td>No of Peoples : <?php echo $item->NO_PPL; ?> / <?php echo $item->MAX_NO_PPL; ?></td>
    </tr>
    <tr>
        <th colspan="4">Information : </th>
    </tr>
    <tr>
        <td colspan="4" rowspan="5"><?php echo $item->INFO; ?></td>
    </tr>
</table>
<br>
<?php }  ?>
<?php echo $_SESSION['actitive_id']  ?>
