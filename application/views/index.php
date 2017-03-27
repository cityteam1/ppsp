<? php require_once "actitives.php";?>
<!--<div class="jumbotron" style="background-color:	#ADD8E6;" >-->
<div class="jumbotron" style="background-image: url('http://www.pgl.co.uk/Files/Files/Adventure%20Holidays/Holidays/Multi%20Activity/AH-MH-Multi-Activity-Boys-o.jpg'); color:white;" >
  <h1>Activities Platform System</h1>
  <p>This is Activities Platform.</p>
  <p><a class="btn btn-primary btn-lg" href="/Actitives">Learn more</a></p>
</div>

<div class="row">
<?php foreach($Result as $item)
{ ?>
        <div class="col-sm-6">
          <div class="panel panel-default text-left" >
            <div class="panel-body">

                <table class="table table-hover">
                <form action="<?= base_url('Actitives/') ?>" method="post" name="fm_join_acti" id="fm_join_acti">
                  <tr><th colspan="4" class="success">Actitive No : <?php echo $item->ACT_ID; ?></th></tr>
                </form>
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
                        <th colspan="4" class="info"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"> Information</th>
                    </tr>
                    <tr>
                        <td colspan="4" rowspan="5"><?php echo $item->INFO; ?></td>
                    </tr>
                </table>
                    <?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
                        <?php if ( $item->NO_PPL === $item->MAX_NO_PPL ) {?>
                                <button type="submit" class="btn btn-info" name="join_acti" id="join_acti" disable> Full </button>
                        <?php } else { ?>
                                <button type="submit" class="btn btn-info" name="join_acti" id="join_acti" value="<?php echo $item->ACT_ID; ?>"> Join </button>
                	    <?php } ;?>
                	 <?php endif ?>
            </div>
          </div>
        </div>
<?php };?>
</div>

  





