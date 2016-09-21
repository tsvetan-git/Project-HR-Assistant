<?php
require_once __DIR__.'/partials/header.php';
require_once __DIR__.'/lib/dbOperations.php';

$currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
//$userId = $_SESSION['user_id'];

$personsResult = getEntries('person', $currentPage, 10);

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
								<a class="btn btn-lg btn-primary" href="personForm.php?action=edit&id=<?=$id?>">Interview</a>
								<a class="btn btn-lg btn-primary" href="deletePerson.php?id=<?=$id?>">Remove</a>
							</td>
						</tr>
						<?php } ?>
						</tbody>
					</table>					
					</div>							
				</div>
			</div>
				<div class="row">
		<div>
			&nbsp;&nbsp;&nbsp;
			
			<?php if ( $pageData['prev'] ) { ?>
			<a class="btn btn-lg btn-primary" href="?page=<?=$pageData['prev']?>">&lt;</a>&nbsp;&nbsp;&nbsp;
			<?php } ?>
			<ul style="display: inline; padding:0;">
				<?php foreach ( $pageData['pages'] as $page ) { 
					$class = $page == $currentPage ? 'btn-warning' : 'btn-primary';
				?>
				<li style="display: inline;"><a class="btn btn-lg <?=$class?>" href="?page=<?=$page?>"><?=$page?></a></li>
				<?php } ?>
			</ul>
			<?php if ( $pageData['next'] ) { ?>
			
			&nbsp;&nbsp;&nbsp;
			
			<a class="btn btn-lg btn-primary" href="?page=<?=$pageData['next']?>">&gt;</a>
			
			<?php } ?>
			
		</div>
		</div>
	</div>
</div>
	
	
</div>

<?php

require_once __DIR__.'/partials/footer.php';
?>