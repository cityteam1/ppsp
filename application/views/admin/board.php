<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="#">Age</a></li>
        <li><a href="#">Gender</a></li>
        <li><a href="#">Geo</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Dashboard</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a>User List</a></li>
      </ul><br>
    </div>
    <br>
    <div class="col-sm-9">
      <div class="well">
        <h4>User List</h4>
        <div class="row">
          <div class="col-md-12">
          <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>User type</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>

            
            <?php foreach($user as $user){ ?>
            <?= form_open(base_url()."admin/edit_user") ?>
            <tbody>
              <tr>
                <td><input type="hidden" id="id" name="id" value="<?php echo $user->id; ?>"><?php echo $user->id; ?></td>
                <td><input type="text" class="form-control" id="username" name="username" value="<?php echo $user->username; ?>"></td>
                <td><input type="text" class="form-control" id="email" name="email" value="<?php echo $user->email; ?>"></td>
                <td><?php if ($user->is_admin === "1"){echo "Admin";}else{echo "User";}?></td>
                <td><input type="submit" class="btn btn-info" alt="Edit" value="Edit"></td>
             </form>
                <td>
                  <?= form_open(base_url()."admin/delete_user") ?>
                    <input type="hidden" id="id" name="id" value="<?php echo $user->id; ?>">
                    <input type="submit" class="btn btn-danger" alt="Edit" value="Delete">
                  </form>
                </td>
              </tr>
            </tbody>
            <?php } ?>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--<edit window>-->
<!--<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">-->
<!--                <div class="modal-dialog">-->
<!--                  <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>-->
<!--              <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>-->
<!--            </div>-->
<!--                <div class="modal-body">-->
<!--                <div class="form-group">-->
<!--              <input class="form-control " type="text" placeholder="<?php echo $user->id; ?>">-->
<!--              </div>-->
<!--              <div class="form-group">-->
              
<!--              <input class="form-control " type="text" placeholder="Irshad">-->
<!--              </div>-->
<!--              <div class="form-group">-->
<!--              <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>-->
          
              
<!--              </div>-->
<!--            </div>-->
<!--                <div class="modal-footer ">-->
<!--              <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>-->
<!--            </div>-->
<!--              </div>-->
<!--           /.modal-content -->
<!--                </div>-->
<!--             /.modal-dialog -->
<!--          </div>-->
<!--<edit window>-->

<!--<delete window>-->
<!--<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">-->
<!--                <div class="modal-dialog">-->
<!--                <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>-->
<!--              <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>-->
<!--            </div>-->
<!--                <div class="modal-body">-->
             
<!--             <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>-->
             
<!--            </div>-->
<!--              <div class="modal-footer ">-->
<!--              <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>-->
<!--              <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>-->
<!--            </div>-->
<!--              </div>-->
          <!-- /.modal-content --> 
<!--        </div>-->
            <!-- /.modal-dialog --> 
<!--          </div>-->
<!--<delete window>-->
