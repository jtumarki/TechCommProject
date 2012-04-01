<?php
$con = mysql_connect ("logindbthedrick.db.7857300.hostedresource.com", "logindbthedrick","JsJt20!2tc221");
mysql_select_db ("logindbthedrick", $con);

$f = $_GET['fname'];
$l = $_GET['lname'];

if(($f == NULL )|| ($l==NULL))
	echo 'Please search a valid instructor.';
else {
	echo "$f";
	echo "$l";
	$sql = mysql_query("select * from classData where fname like '%$f%' or lname like '%$l%'");

	echo "Instructor:  $fname $lname";

	if($sql == NULL){
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