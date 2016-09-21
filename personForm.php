<?php
require_once __DIR__.'/lib/dbOperations.php';
require_once __DIR__.'/partials/header.php';
$action = isset($_GET['action']) ? $_GET['action'] : 'add';
$entryId = isset($_GET['id']) ? $_GET['id'] : null;

$entry = [
	'id' => null,
	'first_name' => '',
	'last_name' => '',
	'score' => ''
];

if ( $entryId ) {
	$dbEntry = getEntryById('person', $entryId);
	$entry = empty($dbEntry) ? $entry : $dbEntry;
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$entryToStore = [
		'id' => $entryId,
		'score' => $_POST['score']
	];
	
	if ( $action == 'add' ) {
		storeEntry('person', $entryToStore);
		$_SESSION['message'] = "Person $entryId has been added";
	} else {
		updateEntry('person', $entryId, $entryToStore);
		$_SESSION['message'] = "Person $entryId has been updated";
	}
	
	header('Location: list.php');
	exit();
	
}

?>

<div class="container">
    <div id="page-wrapper">
        <div class="container-fluid">	
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<div><label>Student: </label> <?='  '?><?=$entry['first_name']?><?='  '?><?=$entry['last_name']?></div>
					</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form role="form" action="?action=<?=$action?>&id=<?=$entryId?>" method="POST">		
							<div class="form-group">
								<label>Score</label>
								<input id="score" name="score" placeholder="score" class="form-control" value="<?=$entry['score']?>">
								<div id="save-score"><button class="btn btn-lg btn-primary" type="submit">Save</button></div>
							</div>							
						<?php require_once __DIR__.'/barometer.php';?>										
					</form>
				</div>
			</div>
        </div>
    </div>
</div>
<?php
require_once __DIR__.'/partials/footer.php';
?>