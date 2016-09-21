<?php

require_once 'dbConfig.php';

$link = null;

/**
 * 
 * Connects to the database, using the config in dbConfig.php
 * 
 * @global type $config
 * @global type $link
 * @return resource
 */
function connect() {
	global $config, $link;
	
	if ( $link === null ) {
		$link = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db'], $config['port']);
		mysqli_set_charset($link, 'utf8');
	}
	
	return $link;
}

/**
 * Fetches entries from the database
 * 
 * @param type $table
 * @param type $page
 * @param type $ipp
 * @param type $where
 */
function getEntries($table, $page = 1, $ipp = 10, $where = '') {
	$page = intval($page);
	
	$query = "SELECT SQL_CALC_FOUND_ROWS * FROM `$table` ";
	
	if ( !empty($where) ) {
		$query.=' WHERE '.$where;
	}
	
	$offset = ($page - 1) * $ipp;
	
	$query.= " LIMIT $offset, $ipp";
	
	$res = mysqli_query(connect(), $query);
	
	$results = [];
	
	while ( $row = @mysqli_fetch_assoc($res) ) {
		$results[$row['id']] = $row;
	}
	
	$allResults = mysqli_query(connect(), "SELECT FOUND_ROWS()");
	
	$pageData = calcPagesData(mysqli_fetch_array($allResults)[0], $ipp, $page);
	
	return [
		'items' => $results,
		'pageData' => $pageData
	];
	
}

function calcPagesData($allResults, $ipp, $currentPage) {
	$allPages = ceil($allResults / $ipp);
	
	$firstPage = 1;
	$lastPage = max($allPages, 1);
	
	if ( $allPages > 5 ) {
		$firstPage = $currentPage - 2;
		$lastPage = $currentPage + 2;

		if ( $firstPage <= 0 ) {
			$firstPage = 1;
			$lastPage = 5;
		}

		if ( $lastPage > $allPages ) {
			$lastPage = $allPages;
			$firstPage = $allPages - 5;
		}
	}
	
	$pageData = [
		'pages' => range($firstPage, $lastPage),
		'currentPage' => $currentPage,
		'next' => $currentPage >= $allPages ? null : $currentPage + 1,
		'prev' => $currentPage <= 1 ? null : $currentPage - 1
	];
	
	return $pageData;
}

function getEntryById($table, $id) {
	$id = intval($id);
	$query = "SELECT * FROM `$table` WHERE id = '$id' LIMIT 1";
	
	$res = mysqli_query(connect(), $query);
	
	if ( mysqli_num_rows($res) == 0 ) {
		return null;
	}
	
	return mysqli_fetch_assoc($res);
	
}

function storeEntry($table, $entryData) {
	
	if (array_key_exists('id', $entryData) ) {
		unset ($entryData['id']);
	}
	
	$query = "INSERT INTO `$table`(%s) VALUES(%s)";
	
	$columns = escapeArray(array_keys($entryData), '`');
	$values = escapeArray(array_values($entryData));
	
	$query = sprintf($query, implode(',', $columns), implode(',',$values));
	
	mysqli_query(connect(), $query);
	
	return mysqli_insert_id(connect());
}

function updateEntry($table, $id, $data) {
	
	$id = intval($id);
	
	$query = "UPDATE `$table` SET ";
	
	$sets = [];
	
	foreach ( $data as $key=>$value ) {
		$sets[] = escapeValue($key, '`')."=".  escapeValue($value);
	}
	
	$query.=implode(',', $sets)." WHERE id = $id LIMIT 1";
	
	return mysqli_query(connect(), $query);
	
}

function deleteEntries($table, $where) {
	$id = intval($id);
	$query = "DELETE FROM `$table` WHERE $where";
	return mysqli_query(connect(), $query);
}

function deleteEntryById($table, $id) {
	$id = intval($id);
	$query = "DELETE FROM `$table` WHERE `id` = $id LIMIT 1";
	return mysqli_query(connect(), $query);
}

function escapeArray($data, $quote = "'") {
	array_walk($data, function (&$value) use ($quote){
		$value = escapeValue($value,$quote);
	});
	
	return $data;
}

function escapeValue($value, $quote = "'") {
	return $quote.mysqli_real_escape_string(connect(),$value).$quote;
}