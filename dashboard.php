<?php
require_once __DIR__.'/partials/header.php';
?>

<div class="container">
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
			
			<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>IT-Talents SEASON 6</p>
									<p>Tech.Interview-01</p>
									<p>Date 24/07/2016</p>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="huge">12</div>
                                    <div>members</div>
                                </div>
                            </div>
                        </div>
						
                        <a href="list.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Student List</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

<?php
require_once __DIR__.'/partials/footer.php';
?>