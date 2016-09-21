<?php
require_once __DIR__.'/../lib/session.php';
checkSession();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HR Assistant</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">HR Assistant</a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li>
                    <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
                </li>
				<li>
                    <a href="settings.php"><i class="fa fa-fw fa-gear"></i> Settings </a>
                </li>
                <li class="dropdown">
                    <a href="login.php"><i class="fa fa-user"></i> Log Out </a>
                </li>
            </ul>
        </nav>