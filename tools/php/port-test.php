<?php

$sockets = array('google.ch:80', 'outlook.office365.com:110', 'hex.pronovia.ch:143', 'google.ch:443', 'smtp.office365.com:587', 'outlook.office365.com:993', 'outlook.office365.com:995');

foreach($sockets as $s) {
	echo '<p>Connection to '.$s.'...<br />';
	ob_flush( );
	$fp = @stream_socket_client("tcp://".$s, $errno, $errstr, 5);
	if (!$fp) {
		echo "Failed: $errstr (ErrorNo: $errno)";
	} else {
		echo "Success: Connection established";
		fclose($fp);
	}
	echo '</p>';
}
?>