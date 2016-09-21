<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Change Password</h3>
                    </div>
					
					<?php if (!empty($error)) { ?>
					<div class="alert alert-danger">
						<button type="button" class="close" aria-hidden="true">&times;</button>
						<i class="fa fa-info-circle"></i>  <?=$error?>
					</div>
					<?php } ?>
					
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <fieldset>
                                <div class="form-group">
									<label>Current Password</label>
                                    <input class="form-control" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
									<label>New Password</label>
                                    <input class="form-control" name="password" type="password" value="">
                                </div>
								<div class="form-group">
									<label>Confirm New Password</label>
                                    <input class="form-control" name="password" type="password" value="">
                                </div>
								<div class="form-group">
                                <input class="btn btn-custom btn-responsive" type="submit" value='Confirm'/>
								</div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
