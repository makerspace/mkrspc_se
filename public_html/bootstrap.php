<?php

// Include a stupid-simple ORM cause I'm lazy.
require_once 'idiorm.php';

// ... and configure it
ORM::configure('mysql:host=mysql.makerspace.se;dbname=mkrspc_se');
ORM::configure('username', 'mkrspc_se');
ORM::configure('password', '');

/**
 * Super simple URL-router
 */

if($_SERVER['REQUEST_URI'] == '/') {

	// Do nothing, this is the front-page

} elseif ($_SERVER['REQUEST_URI'] == '/s') {

	if(empty($_POST['url']) || filter_var($_POST['url'], FILTER_VALIDATE_URL) === false) {
		// return 400 if empty or invalid url
		http_response_code(400);
	}

	// Make short-link
	$url = 'http://mkrspc.se/'; // Initial URL-part

	// First search if we already have a record of this url
	$urlobj = ORM::for_table('urls')->where('url', $_POST['url'])->find_one();	

	// Check if we found something...
	if($urlobj) {
		// Output previous record
		var_dump($urlobj);		
	
	} else {
		// Create new record
		$urlobj = ORM::for_table('urls')->create();
		$urlobj->url = $_POST['url'];
		$urlobj->ip = $_SERVER['REMOTE_ADDR'];
		$urlobj->created = time();
		$urlobj->save();

		var_dump($urlobj);		
	}

	#echo $url;		

	exit;

} else {
	// Look for short url in db, or 404
}
