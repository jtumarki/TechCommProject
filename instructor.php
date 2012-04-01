<?php
$con = mysql_connect ("logindbthedrick.db.7857300.hostedresource.com", "logindbthedrick","JsJt20!2tc221");
mysql_select_db ("logindbthedrick", $con);

$fname = $_GET['fname'];
$lname = $_GET['lname'];

if($course_num == NULL)
	echo 'Please search a valid instructor.';
else {
	$sql = mysql_query("select * from classData where fname like '%$fname%' or lname like '%$lname%");

	echo "Instructor:  $fname $lname";

	if(mysql_num_rows($sql) == 0){
		echo 'This is not a valid instructor.  Please try again.';
	}
	else{
		echo '<table>';
		while ($row = mysql_fetch_array($sql)){
			echo '<tr>';
			echo '<td class="coursenum"> '.$row['course_num'].' </td>';
			echo '<td> '.$row['title'].' </td>';
			echo '</tr>';
			}
		echo '</table>';
		}
	}
?>