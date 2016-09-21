<?php
require_once __DIR__.'/lib/dbOperations.php';
require_once __DIR__.'/lib/session.php';

checkSession();

$personId = intval($_GET['id']);

$entry = getEntryById('person', $personId);

//Delete the person row
deleteEntryById('person', $personId);

//$_SESSION['message'] = "Person $personId has been deleted";

header('Location: list.php');
