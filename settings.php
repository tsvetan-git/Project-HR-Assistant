<?php
require_once __DIR__.'/partials/header.php';
?>
<div class="container">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3>Security Settings</h3>
			</div>						
			<div class="panel-body">
				<form role="form" method="POST">
					<fieldset>
					<div class="form-group">
						<input class="form-control" placeholder="Old Password" name="old-password" type="password" autofocus>
					</div>
					<div class="form-group">
						<input class="form-control" placeholder="New Password" name="password" type="password" value="">
					</div>
					<div class="form-group">
						<input class="form-control" placeholder="Retype Password" name="password" type="password" value="">
					</div>
					<input class="btn btn-custom btn-responsive" type="submit" value='Change Password'/>
					</fieldset>
				</form>
			</div>		
        </div>
	</div>	
</div>

<?php
require_once __DIR__.'/partials/footer.php';
?>
