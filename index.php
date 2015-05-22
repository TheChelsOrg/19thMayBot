<?php

	$match = 60*165; // 60 seconds * 150 minutes ( 45 + 15 + 45 + 5 + 15 + 5 + 15 + 5 + 15)

	ini_set('max_execution_time', $match);


	require_once ('twitteroauth.php');
	require_once( 'tweeter.php' );

	$bot = new bot();

	$bot->Process('commentary-log.csv');

