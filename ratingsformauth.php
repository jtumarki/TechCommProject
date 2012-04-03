<?PHP

session_start();
	if (!isset($_SESSION['SESS_MEMBER_ID'])){
		echo 'Please login to comment.';
	}
	else {
		$course_num = $_GET['course_num'];
		$fname = $_GET['fname'];
		$lname = $_GET['lname'];
		echo 'Go ahead and leave a comment!';
		include "ratingsform.php?course_num=".$course_num."&fname=".$fname."&lname=".$lname;
	}
?>