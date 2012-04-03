<?php
$con = mysql_connect ("logindbthedrick.db.7857300.hostedresource.com", "logindbthedrick","JsJt20!2tc221");
mysql_select_db ("logindbthedrick", $con);

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$course_num = $_GET['course_num'];
 
$sql = mysql_query("SELECT * FROM courses where course_num like '$course_num'");

if ($sql){
	if (mysql_num_rows($sql) == 1){
		$course_info = mysql_fetch_assoc($sql);
		$course_name = $course_info['course_name'];
	}
	else {
		echo 'This should never happen... \n';
	}
}
else {
	echo 'Invalid course number. \n';
}

$sql_ratings = mysql_query("SELECT * FROM rating where fname like '%$fname%' and lname like '%$lname%' and course_num like '$course_num'");

if ($sql_ratings) {
	if (mysql_num_rows($sql_ratings) == 1){
		$rating_info = mysql_fetch_assoc($sql_ratings);
		$easy = $rating_info['easy'];
		$help = $rating_info['help'];
		$interest = $rating_info['interest'];
		$teach = $rating_info['teach'];
		$course = $rating_info['course'];
		$ratings = $rating_info['ratings'];
		$sum_of_ratings = $easy + $help + $interest + $teach + $course;
		$avg = float($sum_of_ratings)/float($ratings);
	}
	else {
		echo 'Invalid search \n';
	}
}	

include "comments_header.php";

echo '<span class="cname">'.$course_num.' - '.$course_name.'</span>';

echo '<table';
echo '<tr class="light">';
$star_string = '';
for ($i = 1; $i <= $avg; $i++) {
	 $star_string = $star_string.'&#9733;';
}
echo '<td class="star">'.$star_string.'</td>';
echo '<td class="professor">'.$fname.' '.$lname;
echo '<div class="reviews" style="display:none"><br />';
echo '<table class="reviews">';
echo '<tr class="dark">';
echo '<td>';
echo '<b> User </b> says some shit';
echo '</td>';
echo '</tr>';

include "comments_footer.php";
?>















