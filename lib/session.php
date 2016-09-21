<?php
session_start();
require_once __DIR__.'/dbOperations.php';

function checkSession() {
	if ( !isset($_SESSION['user_id']) ) {
		header('Location: login.php');
	}
}

function login($username, $password) {	
	$where = sprintf("`username` = %s AND `password` = %s",
		escapeValue($username),
		escapeValue($password)
	);
	
	$userRes = getEntries('user', 1, 1, $where);
	
	if ( empty($userRes['items']) ) {
		header('Location: login.php');
	}
	$user = array_pop($userRes['items']);
	
	$_SESSION['user_id'] = $user['id'];
	
	return true;	
}

function logout() {
	$_SESSION['user_id'] = null;
}