<?PHP

session_start();
	if (!isset($_SESSION['SESS_MEMBER_ID'])){
		echo 'Please login to comment.';
	}
	else {
		echo 'Go ahead and leave a comment!';
		include "ratingsform.php";
	}
?>