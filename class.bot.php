<?php

class Bot {

	function Process($url) {

		$array ='';
		$file = fopen($url, 'r');
		while (($line = fgetcsv($file)) !== FALSE) {
			$array[] = $line;
		}

		$remove_labels = array_shift($array); // the CSV column headings discarded.

		foreach($array as $tweet):
			$this->tweet( $tweet['1'] );
			$this->sleeper( (int) $tweet['0'] );
		endforeach;
	}
	
	function sleeper($offset) {
		sleep($offset * 60);
	}

	function tweet($message) {
		$connection = new TwitterOAuth( KEY1, KEY2, KEY3, KEY4);
		$connection->get('account/verify_credentials');
		$connection->post('statuses/update',array('status' => $message));
	}

}
