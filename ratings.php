<?PHP

$easiness_status = 'unchecked';
$helpful_status = 'unchecked';
$interest_status = 'unchecked';
$teaching_status = 'unchecked';
$course_status = 'unchecked';


	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}

if (isset($_POST['Submit1'])) {
	
	$selected_easiness = clean($_POST['easiness']);
	$selected_helpful = clean($_POST['helpful']);
	$selected_interest = clean($_POST['interest']);
	$selected_teaching = clean($_POST['teaching']);
	$selected_course = clean($_POST['course']);
	
	//get course number and instructor from URL
	$course_num = $_GET['course_num'];
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];

	if ($selected_easiness != '') {
		$easiness_status = 'checked';
		echo 'Selected Easiness: '.$selected_easiness.'</br>';
	}
	
	else if ($selected_helpful != '') {
		$helpful_status = 'checked';
		echo 'Selected Helpfulness: '.$selected_helpful.'</br>';
	}
	
	else if ($selected_interest != '') {
		$interest_status = 'checked';
		echo 'Selected Interest: '.$selected_interest.'</br>';
	}
	
	else if ($selected_teaching != '') {
		$teaching_status = 'checked';
		echo 'Selected Teaching Overall: '.$selected_teaching.'</br>';
	}
	
	else if ($selected_course != '') {
		$course_status = 'checked';
		echo 'Selected Course Overall: '.$selected_course.'</br>';
	}
	
	//must check that all categories are selected before posting values to database
	//will get variables for professor name and class name from URL somehow
	
	if(($easiness_status == 'checked') && ($helpful_status == 'checked') && ($interest_status == 'checked')
		&& ($teaching_status == 'checked') && ($course_status == 'checked')){
	
		$con = mysql_connect("logindbthedrick.db.7857300.hostedresource.com", "logindbthedrick","JsJt20!2tc221");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

		$db = mysql_select_db("logindbthedrick", $con);
		
		//first query db to find the course num and instructor
		//take out the rating values and number of ratings. average with current values to get new rating values
		//add 1 to current num_ratings when inserting back in
		
		//Create query
		$qry="SELECT * FROM ratings WHERE course_num = '$course_num' AND fname = '$fname' AND lname = '$lname' ";
		$result=mysql_query($qry);
		
		//do some calculations
		if($result) {
			if(mysql_num_rows($result) == 1) {
			
				//get current ratings and number of ratings so that we can take the average
				$member = mysql_fetch_assoc($result);
				$currEasy = $member['easy'];
				$currHelpful = $member['help'];
				$currInterest = $member['interest'];
				$currTeaching = $member['teach'];
				$currCourse = $member['course'];
				$currNum = $member['ratings'];
				
				$currNum = $currNum + 1; //increment number of ratings by 1
				
				//calculate new averages
				$currEasy = ($currEasy + $selected_easiness)/$currNum;
				$currHelpful = ($currHelpful + $selected_easiness)/$currNum;
				$currInterest = ($currInterest + $selected_easiness)/$currNum;
				$currTeaching = ($currTeaching + $selected_easiness)/$currNum;
				$currCourse = ($currCourse + $selected_easiness)/$currNum;
				
				//echo ratings back for testing purposes
				echo 'New Values: '.$currEasy. ' '.$currHelpful. ' ' .$currInterest. ' '.$currTeaching. ' '.$currCourse.' '.$currNum.'</br>';
				
				//insert proper info back into table (and display new stuff? refresh page?)
				$sql="INSERT INTO ratings (course_num, instructor, easy, help, interest, teach, course, ratings)
				VALUES
				('$currEasy','$currHelpful','$currInterest', '$currTeaching', '$currCourse', '$currNum')";

				if (!mysql_query($sql,$con))
				{
					die('Error: ' . mysql_error());
				}
				
				echo '1 record added </br>';
			
			}
			
		}
		
		mysql_close($con);
		
	}
	else{ //if something has not been checked, then refresh and print an error
	
		echo 'Not all fields were checked. Please select a value for all rating categories </br>';
	
	}
	
}
	
?>
