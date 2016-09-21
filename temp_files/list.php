<?php
require_once __DIR__.'/partials/header.php';
require_once __DIR__.'/lib/dbOperations.php';

$currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$userId = $_SESSION['user_id'];

$personsResult = getEntries('person', $currentPage, 10, "user_id = {$_SESSION['user_id']}");

$persons = $personsResult['items'];
$pageData = $personsResult['pageData'];

if ( !empty($persons) ) {
	$personIds = implode(",",array_keys($persons));
	$details = getEntries('contact_details', 1, 999999999, "person_id IN($personIds)");
	
	foreach ( $details['items'] as $detail ) {
		if (!array_key_exists($detail['person_id'], $persons)) {
			continue;
		}
		$persons[$detail['person_id']]['details'][$detail['id']] = $detail;
	}
}
?>

<div class="container">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Student List <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Student List
                        </li>
                    </ol>
                </div>
            </div>		
				
			<div class="row">
				<div class="col-lg-12">
					<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th style="width:30px;">ID</th>
								<th style="width:150px;">First Name</th>
								<th style="width:150px;">Last Name</th>
								<th style="width:150px;">Score</th>
								<th>Contact Details</th>
								<th style="width:180px;">Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($persons as $id => $person) { ?>				
						<tr>
							<td><?=$id?></td>
							<td><?=$person['first_name']?></td>
							<td><?=$person['last_name']?></td>
							<td><?=$person['score']?></td>
							<td>
								<table class="table table-bordered table-hover table-striped">
									<thead>
										<tr>
											<th style="width:100px;">Type</th>
											<th style="width:150px;">Value</th>
											<th style="width:100px;">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php if (isset($person['details'])) { foreach ( $person['details'] as $detailId=>$detail ) { ?>
										<tr>
											<td><?=$detail['type']?></td>
											<td><?=$detail['value']?></td>
											<td>
												<a class="btn btn-lg btn-primary" href="detailForm.php?action=edit&id=<?=$detailId?>&person_id=<?=$id?>">Edit</a>
												<a class="btn btn-lg btn-primary" href="deleteDetail.php?id=<?=$detailId?>">Delete</a>
											</td>
										</tr>
										<?php }} ?>
										<tr>
											<td colspan="3"><a class="btn btn-lg btn-warning" href="detailForm.php?action=add&person_id=<?=$id?>">Add Detail</a></td>
										</tr>
									</tbody>
								</table>								
							</td>
							<td>
								<a class="btn btn-lg btn-primary" href="personForm.php?action=edit&id=<?=$id?>">Edit</a>
								<a class="btn btn-lg btn-primary" href="deletePerson.php?id=<?=$id?>">Delete</a>
							</td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
require_once __DIR__.'/partials/footer.php';
?>