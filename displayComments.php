<?php
$con = mysql_connect ("logindbthedrick.db.7857300.hostedresource.com", "logindbthedrick","JsJt20!2tc221");
mysql_select_db ("logindbthedrick", $con);

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$course_num = $_GET['course_num'];
$parsed = str_replace('-','',$course_num);

 
$sql = mysql_query("SELECT * FROM courses where course_num like '$parsed'");

if ($sql){
	if (mysql_num_rows($sql) >= 1){
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

$sql_ratings = mysql_query("SELECT * FROM rating where fname like '%$fname%' and lname like '%$lname%' or course_num like '$parsed'");

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
		$avg = ($sum_of_ratings)/(5 * ($ratings));
	}
}	

include "comments_header.php";

echo '<span class="cname">'.$course_num.' - '.$course_name.'</span>';

echo '<table>';
echo '<tr class="light">';
if (mysql_num_rows($sql_ratings) == 0) {
	$star_string = "No Rating";
}
else {
	$star_string = '';
	for ($i = 1; $i <= $avg; $i++) {
	 	$star_string = $star_string.'&#9733;';
	}
}
echo '<td class="star">'.$star_string.'</td>';
echo '<td class="professor">'.$fname.' '.$lname;

$sql_comments = mysql_query("SELECT * FROM comments where fname like '%$fname%' and lname like '%$lname%' or course_num like '$parsed'");
$cur_row = 1;
echo '<div class="reviews" style="display:none"><br />';
echo '<table class="reviews">';
if(mysql_num_rows($sql_comments)==0){
	echo '<tr class="dark">';
	echo '<td>No Comments</td>';
}
else{
while ($row = mysql_fetch_array($sql_comments)) {
	if ($cur_row % 2){
		echo '<tr class="dark">';
	}
	else {
		echo '<tr class="light">';
	}
	echo '<td>';
	$user = $row['username'];
	$comment = $row['comment'];
	$rating = $row['rating'];
	$star_string = '';
	for ($i = 1; $i <= $rating; $i++) {
	 	$star_string = $star_string.'&#9733;';
	}
	 echo $star_string.'<b> '.$user.'</b> says: '.$comment.'<br />';
	echo '</td>';
	echo'</tr>';
	$cur_row += 1;
}
}


echo '</table>';
echo '</div>';
echo '</td>';
echo '<td class"toggle"><a href="#" class="show-reviews"><h2 class="down">&nbsp;</h2></a>';
echo '</td>';
echo '</tr>';
echo '</table>';

include "ratingsformauth.php";
include "comments_footer.php";
?>















