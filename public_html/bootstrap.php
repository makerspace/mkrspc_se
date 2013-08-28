<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <jim@jine.se> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return. - Jim Nelin
 * ----------------------------------------------------------------------------
 */

// Include base62-lib
require_once 'base62-encode.php';

// Include a stupid-simple ORM cause I'm lazy.
require_once 'idiorm.php';

// ... and configure idiorm.
ORM::configure('mysql:host=mysql.makerspace.se;dbname=mkrspc_se');
ORM::configure('username', 'mkrspc_se');
ORM::configure('password', '');

/**
 * Super simple URL-router
 */
if($_SERVER['REQUEST_URI'] == '/') {

	// Do nothing, this is the front-page

} elseif ($_SERVER['REQUEST_URI'] == '/s') {

	// Trim URL to avoid whitespaces etc.
	$url = trim($_POST['url']);

	if(empty($url) || filter_var($url, FILTER_VALIDATE_URL) === false) {
		// return 400 if empty or invalid url
		http_response_code(400);
	}

	// Make short-link
	$result = 'http://mkrspc.se/'; // Initial URL-part

	// First search if we already have a record of this url
	$urlobj = ORM::for_table('urls')->where('url', $url)->find_one();	

	// Check if we found something...
	if(!$urlobj) {

		// No - create new record
		$urlobj = ORM::for_table('urls')->create();
		$urlobj->url = $url;
		$urlobj->ip = $_SERVER['REMOTE_ADDR'];
		$urlobj->created = time();
		$urlobj->save();

	}

	// Create base62-number from the database id.
	$result .= Base62::convert($urlobj->id);

	// Return it.
	echo $result;

	exit;

} else {

	// Failsafe
	if(!strlen($_SERVER['REQUEST_URI']) > 1) {
		header('Location: /');
	}

	// Get the base62-id from url
	$urlid = substr($_SERVER['REQUEST_URI'], 1);
	$id = Base62::convert($urlid, 62, 10);

	// Another failsafe
	if(!is_int($id)) {
		header('Location: /');
	}
	
	// Get ID from db
	$urlobj = ORM::for_table('urls')->where('id', $id)->find_one();

	if($urlobj) {
		// Redirect to "real" url
		header('Location: '.$urlobj->url);
		exit;
	}

	// Or just redirect to front page
	header('Location: /');
}
