<?php
require_once __DIR__.'/lib/dbOperations.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	
	//storeEntry('user', $entryData);
	header('Location: dashboard.php');
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SB Admin - Bootstrap Admin Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">HR Assistant</a>
            </div>
           <!-- Top Nav -->
            <ul class="nav navbar-right top-nav">
                <li>
                    <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
                </li>
				<li>
                    <a href="settings.php"><i class="fa fa-fw fa-gear"></i> Settings </a>
                </li>
                <li class="dropdown">
                    <a href="login.php"><i class="fa fa-user"></i> Log Out </a>
                    </ul>
                </li>
            </ul>
		<div class="container">
		<div class="container-fluid">
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
									<!-- Change this to a button or input when using this as a form -->
									<input class="btn btn-custom btn-responsive" type="submit" value='Change Password'/>
								</fieldset>
							</form>
						</div>
					</div>
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
