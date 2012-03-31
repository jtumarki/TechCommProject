<?php
$con = mysql_connect ("logindbthedrick.db.7857300.hostedresource.com", "logindbthedrick","JsJt20!2tc221");
mysql_select_db ("logindbthedrick", $con);
 
$term = $_POST['term'];
$parsed = str_replace('-','',$term);
 
$sql = mysql_query("select * from courses where course_num like '%$parsed%' or course_name like '%$term%'");

include 'searchresults_header.php';
echo 'Showing results for ';
echo $term;
echo '... </ br>';
echo '</div>
		<div class="left">
			<h2>Courses:</h2>';
echo '<table>';
if(mysql_num_rows($sql) == 0){
	echo 'There were no results.';
}
else{
	while ($row = mysql_fetch_array($sql)){
		echo '<tr>';
		echo '<td class="coursenum"> '.$row['course_num'].' </td>';
		echo '<td> <a href="course.php?course='.$row['course_num']. '">' .$row['course_name'].'</a> </td>';
		echo '</tr>';
		}
	}
echo '</table>';

echo '</div>
		<div class="right">
			<h2>Professors:</h2>';
			
$sql = mysql_query("select * from instructors where fname like '%$term%' or lname like '%$term%'");
echo '<table>';
if(mysql_num_rows($sql) == 0){
	echo 'There were no results.';
}
while ($row = mysql_fetch_array($sql)){
	echo '<tr>';
	echo '<td> <a href="instructor.php?fname='.$row['fname']. '&lname='.$row['lname']. '">'.$row['fname']. .$row['lname'].'</a> </td>';
    echo '</tr>';
    }
echo '</table>';

include 'searchresults_footer.php';
?>