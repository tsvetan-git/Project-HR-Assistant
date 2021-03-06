<?php
require_once __DIR__.'/lib/dbOperations.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	
	$entryData = [
		'username' => $_POST['username'],
		'first_name' => $_POST['first_name'],
		'last_name' => $_POST['last_name'],
		'email' => $_POST['email'],
		'password' => $_POST['password'],
	];
	storeEntry('user', $entryData);
	header('Location: login.php');
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
                        <h3>Please Register</h3>
                    </div>
					
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="First Name" name="first_name" type="text" value="">
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="Last Name" name="last_name" type="text" value="">
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" value="">
                                </div>

                                <input class="btn btn-custom btn-responsive" type="submit" value='Register'/>							
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
