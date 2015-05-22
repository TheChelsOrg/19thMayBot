<?php

	require_once ('twitteroauth.php');
	require_once( 'cron.class.php' );

  $MayBot = new MayBot();
	/**********************************************************************************************/

  foreach($array as $tweets):

  	$MayBot->Tweet( $tweets-message );
    sleep($tweets->offset);

  enforeach;
