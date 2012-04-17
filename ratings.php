<?PHP
session_start();
	if (!isset($_SESSION['SESS_FIRST_NAME'])){
		echo 'Please login to comment and rate.';
	}
	else{
	//if logged in, can display ratings and comment form
	
		$easiness_status = 'unchecked';
		$helpful_status = 'unchecked';
		$interest_status = 'unchecked';
		$teaching_status = 'unchecked';
		$course_status = 'unchecked';


		//NEED TO ADD: PUTTING COMMENT FROM TEXT BOX INTO THE COMMENTS DATABASE.

		if (isset($_POST['Submit1'])) {

			//checking of captcha
			 require_once('recaptchalib.php');
			$privatekey = "6Lc8qs8SAAAAAKFqM3aGR5SUDt2_8uNwGFxNRWUh";
			$resp = recaptcha_check_answer ($privatekey,
										$_SERVER["REMOTE_ADDR"],
										$_POST["recaptcha_challenge_field"],
										$_POST["recaptcha_response_field"]);

			if (!$resp->is_valid) {
				// What happens when the CAPTCHA was entered incorrectly
				die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
					"(reCAPTCHA said: " . $resp->error . ")");
			}
			
			$selected_easiness = $_POST['easiness'];
			$selected_helpful = $_POST['helpful'];
			$selected_interest = $_POST['interest'];
			$selected_teaching = $_POST['teaching'];
			$selected_course = $_POST['course'];
			$user_comment = $_POST['comment'];
			
			//get course number and instructor from URL
			$course_num = $_GET['course_num'];
			$fname = $_GET['fname'];
			$lname = $_GET['lname'];
			
			//need to get username from current session
			$username = $_SESSION['SESS_USERNAME'];
			echo 'username: '.$username.'</br>';

			if ($selected_easiness != '') {
				$easiness_status = 'checked';
				echo 'Selected Easiness: '.$selected_easiness.'</br>';
			}
			
			if ($selected_helpful != '') {
				$helpful_status = 'checked';
				echo 'Selected Helpfulness: '.$selected_helpful.'</br>';
			}
			
			if ($selected_interest != '') {
				$interest_status = 'checked';
				echo 'Selected Interest: '.$selected_interest.'</br>';
			}
			
			if ($selected_teaching != '') {
				$teaching_status = 'checked';
				echo 'Selected Teaching Overall: '.$selected_teaching.'</br>';
			}
			
			if ($selected_course != '') {
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
				
				//Create query for rating
				echo 'course number: '.$course_num;
				echo ' first name: '.$fname;
				echo ' last name: '.$lname.'</br>';
				
				$qry="SELECT * FROM rating WHERE course_num LIKE '$course_num' AND fname LIKE '$fname' AND lname LIKE '$lname' ";
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
						
						//calculate new things
						$currEasy = ($currEasy + $selected_easiness);
						$currHelpful = ($currHelpful + $selected_helpful);
						$currInterest = ($currInterest + $selected_interest);
						$currTeaching = ($currTeaching + $selected_teaching);
						$currCourse = ($currCourse + $selected_course);
						
						//echo ratings back for testing purposes
						echo 'New Values: '.$currEasy. ' '.$currHelpful. ' ' .$currInterest. ' '.$currTeaching. ' '.$currCourse.' '.$currNum.'</br>';
						
						//insert proper info back into table (and display new stuff? refresh page?)
						$sql="INSERT INTO ratings (course_num, fname, lname, easy, help, interest, teach, course, ratings)
						VALUES
						('$course_num', '$fname', '$lname', '$currEasy','$currHelpful','$currInterest', '$currTeaching', '$currCourse', '$currNum')";
						
						
						if (!mysql_query($sql,$con))
						{
							die('Error: ' . mysql_error());
						}
						
						//insert comment into table if necessary
						if($user_comment != ''){
						
							$ratingAvg = ($selected_easiness + $selected_helpful + $selected_interest + $selected_teaching + $selected_course)/5;
							$sqlComments = "INSERT INTO comments (course_num, fname, lname, username, comment, rating)
							VALUES
							('$course_num', '$fname', '$lname', '$username', '$user_comment', '$ratingAvg')";
							
							if (!mysql_query($sqlComments,$con))
							{
							die('Error: ' . mysql_error());
							}
							
						}
						

						
					}

						echo '1 record added </br>';
					
				}
				else{
				
					echo 'result query for rating failed';
				
				}
					
			}
			else{ //if something has not been checked, then refresh and print an error
			
			echo 'Not all fields were checked. Please select a value for all rating categories </br>';
			
			}
				
			mysql_close($con);
				
		}

			
	}	
?>
