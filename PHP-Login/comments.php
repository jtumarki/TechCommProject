<?php 
session_start();
	if (!isset($_SESSION['SESS_FIRST_NAME'])){
		echo 'Please login to comment.';
	}
	else {
		echo 'Go ahead and leave a comment!';
	}
?>
