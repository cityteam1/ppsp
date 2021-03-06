<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Your Profile</h1>
			</div>
			<?= form_open(base_url()."user/profile") ?>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter a username" value="<?php echo $_SESSION['username']?>" Disabled>
					<!--<p class="help-block" >At least 4 characters, letters or numbers only</p>-->
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
					<!--<p class="help-block">At least 6 characters</p>-->
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirm password</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
					<!--<p class="help-block">Must match your password</p>-->
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-info" value="Edit">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->