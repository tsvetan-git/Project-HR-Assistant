<?php
require_once __DIR__.'/lib/session.php';
logout();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(login($_POST['username'], $_POST['password'])) {
		header('Location: dashboard.php');
	}
}
?>
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
                        <h3>Please Sign In</h3><h6>Need an Account ? <a href="register.php">Register</a></h6>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <fieldset>
                                <div class="form-group">
									<label>Username</label>
                                    <input class="form-control" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
									<label>Password</label>
                                    <input class="form-control" name="password" type="password" value="">
                                </div>
								<div class="form-group">
                                <input class="btn btn-custom btn-responsive" type="submit" value='Login'/>
								</div>
								<div class="text-right">
                                    <h6><a href="forgotten-password.php">Forgotten Password ?</a></h6>
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
