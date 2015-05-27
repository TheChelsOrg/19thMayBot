<?php
/**
 *  Author 	: ChelseaStats
 *  Date 	: 2015-05-22
 *  Url		: https://twitter.com/19thMayBot
 * 
 *  A twitter bot for 'live' tweeting that night in Munich (19th May 2012)
 * 
 *  Match : 60 seconds * 165 minutes ( 45 [1H] + 15 + 45 [2H] + 5 + 15 [1H ET] + 5 + 15 [2H ET] + 5 + 15 [pens])
 *          - the rest of the time slots are HT, FT, HT ET and pre-pens. comfort breaks.
 * 
 *  Pull requests to this file will be ignored.
 *
 */
	$match = 60*165; 
	ini_set('max_execution_time', $match);
	require_once( '../config.php');
	require_once( 'twitteroauth.php');
	require_once( 'class.bot.php' );
	$bot = new bot();
	$bot->Process('commentary-log.csv');
