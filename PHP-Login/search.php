<?php
$con = mysql_connect ("logindbthedrick.db.7857300.hostedresource.com", "logindbthedrick","JsJt20!2tc221");
mysql_select_db ("logindbthedrick", $con);
 
$term = $_POST['term'];
$parsed = str_replace('-','',$term);
 
$sql = mysql_query("select * from classData where course_num like '%$parsed%' or title like '%$term%' or instructor like '%$term%' or semester like '$term'");

echo '<table>';
echo '<tr><td>Course</td><td>Title</td><td>Units</td><td>Section</td><td>Time</td><td>Room/Bldg</td><td>Instructor</td><td>Semester</td></tr>';

while ($row = mysql_fetch_array($sql)){
	echo '<tr>';
	echo '<td> '.$row['course_num'].' </td';
    echo '<td> '.$row['title'].' </td>';
    echo '<td> '.$row['units'].' </td';
    echo '<td> '.$row['section'].' </td>';
    echo '<td> '.$row['begin'].' </td>';
    echo '<td> '.$row['end'].' </td>';
    echo '<td> '.$row['room'].' </td>';
    echo '<td> '.$row['instructor'].' </td>';
    echo '<td> '.$row['semester'].' </td>'; 
    echo '</tr>';
    }
echo '</tr>';
echo '</table>';
?>