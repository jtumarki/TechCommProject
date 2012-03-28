<?php
$con = mysql_connect ("logindbthedrick.db.7857300.hostedresource.com", "logindbthedrick","JsJt20!2tc221");
mysql_select_db ("logindbthedrick", $con);
 
$term = $_POST['term'];
$parsed = str_replace('-','',$term);
 
$sql = mysql_query("select * from classData where course_num like '%$parsed%' or title like '%$term%' or instructor like '%$term%' or semester like '$term'");
 
while ($row = mysql_fetch_array($sql)){
    echo 'Course: '.$row['course_num'];
    echo '<br/> Title: '.$row['title'];
    echo '<br/> Units: '.$row['units'];
    echo '<br/> Section: '.$row['section'];
    echo '<br/> Time: '.$row['begin'];
    echo ' - '.$row['end'];
    echo '<br/> Room/Bldg: '.$row['room'];
    echo '<br/> Instructor: '.$row['instructor'];
    echo '<br/> Semester: '.$row['semester']; 
    echo '<br/><br/>';
    }
 
?>