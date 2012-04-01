<?php
//updating to fix git
$con = mysql_connect ("logindbthedrick.db.7857300.hostedresource.com", "logindbthedrick","JsJt20!2tc221");
mysql_select_db ("logindbthedrick", $con);

$course_num = $_GET['course'];

if($course_num == NULL)
	echo 'Please search a valid course.';
else {
	$sql = mysql_query("select * from classData where course_num like '%$course_num%'");

	echo "Course:  $course_num";

	if(mysql_num_rows($sql) == 0){
		echo 'This is not a valid course.  Please try again.';
	}
	else{
		echo '<table>';
		while ($row = mysql_fetch_array($sql)){
			echo '<tr>';
			echo '<td class="coursenum"> '.$row['course_num'].' </td>';
			echo '<td> '.$row['fname']. .$row['lname']. ' </td>';
			echo '</tr>';
			}
		echo '</table>';
		}
	}
?>