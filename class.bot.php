<?php

class Bot {

	function Process($url) {

		$array ='';
		$file = fopen($url, 'r');
		while (($line = fgetcsv($file)) !== FALSE) {
			$array[] = $line;
		}

		$remove_labels = array_shift($array); // the CSV column headings
			print "<h3>{$remove_labels}</h3>";

		foreach($array as $tweet):
			$this->tweet( $tweet['1'] );
			$this->sleeper( (int) $tweet['0'] );
			print "<li>".(int) $tweet['0']." - ".$tweet['1'] ."</li>";
		endforeach;
	}
	
	function sleeper($offset) {
		sleep($offset * 60);
	}

	function tweet($message) {
		$connection = new TwitterOAuth( 'xxx', 'xxx', 'xxx', 'xxx');
		$connection->get('account/verify_credentials');
		$connection->post('statuses/update',array('status' => $message));
	}

}
