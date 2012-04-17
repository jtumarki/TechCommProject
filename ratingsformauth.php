<?PHP

session_start();
	if (!isset($_SESSION['SESS_MEMBER_ID'])){
		echo 'Please login to comment.';
	}
	else {
		$course_num = $_GET['course_num'];
		$fname = $_GET['fname'];
		$lname = $_GET['lname'];
		echo 'Go ahead and leave a comment!';
		
		
		$actionString = "ratings.php?course_num=".$course_num."&fname=".$fname."&lname=".$lname;
		echo '<Form name ="form1" Method ="POST" ACTION ='.$actionString.'>';
		
		echo '<table>';
		echo '<tr>';
		echo '<td>How easy is the class?</td>'; 
		echo '<td>';
		echo '<Input type = \'Radio\' Name =\'easiness\' value= \'1\' class="star" />';
		echo '<Input type = \'Radio\' Name =\'easiness\' value= \'2\' class="star" />';
		echo '<Input type = \'Radio\' Name =\'easiness\' value= \'3\' class="star" />';
		echo '<Input type = \'Radio\' Name =\'easiness\' value= \'4\' class="star" />';
		echo '<Input type = \'Radio\' Name =\'easiness\' value= \'5\' class="star" /> </td>';
		echo '</tr>';

		echo '<tr>';
		echo '<td>How helpful was the professor?</td>';
		echo '<td>';
		echo '<Input type = \'Radio\' Name =\'helpful\' value= \'1\' class="star">';
		echo '<Input type = \'Radio\' Name =\'helpful\' value= \'2\' class="star">';
		echo '<Input type = \'Radio\' Name =\'helpful\' value= \'3\' class="star">';
		echo '<Input type = \'Radio\' Name =\'helpful\' value= \'4\' class="star">';
		echo '<Input type = \'Radio\' Name =\'helpful\' value= \'5\' class="star"> </td>';
		echo '</tr>';

		echo '<tr>';
		echo '<td>How interesting was the material?</td>';
		echo '<td><Input type = \'Radio\' Name =\'interest\' value= \'1\' class="star">';
		echo '<Input type = \'Radio\' Name =\'interest\' value= \'2\' class="star">';
		echo '<Input type = \'Radio\' Name =\'interest\' value= \'3\' class="star">';
		echo '<Input type = \'Radio\' Name =\'interest\' value= \'4\' class="star">';
		echo '<Input type = \'Radio\' Name =\'interest\' value= \'5\' class="star"> </td>';
		echo '</tr>';

		echo '<tr>';
		echo '<td>Rate the overall teaching quality:</td>';
		echo '<td>'; 
		echo '<Input type = \'Radio\' Name =\'teaching\' value= \'1\' class="star">';
		echo '<Input type = \'Radio\' Name =\'teaching\' value= \'2\' class="star">';
		echo '<Input type = \'Radio\' Name =\'teaching\' value= \'3\' class="star">';
		echo '<Input type = \'Radio\' Name =\'teaching\' value= \'4\' class="star">';
		echo '<Input type = \'Radio\' Name =\'teaching\' value= \'5\' class="star"> </td>';
		echo '</tr>';

		echo '<tr>';
		echo '<td>Rate the overall course quality: </td>';
		echo '<td><Input type = \'Radio\' Name =\'course\' value= \'1\' class="star">';
		echo '<Input type = \'Radio\' Name =\'course\' value= \'2\' class="star">';
		echo '<Input type = \'Radio\' Name =\'course\' value= \'3\' class="star">';
		echo '<Input type = \'Radio\' Name =\'course\' value= \'4\' class="star">';
		echo '<Input type = \'Radio\' Name =\'course\' value= \'5\' class="star"> </td>';
		echo '</tr>';

		echo '</table>';
		echo '<textarea rows="5" cols="20" name="comment" wrap="physical"></textarea>';
		
	    require_once('recaptchalib.php');
        $publickey = "6Lc8qs8SAAAAAP2FWFnGDAePwSiCP74JmJ4gxj2n"; // you got this from the signup page
        echo recaptcha_get_html($publickey);
		
		echo '<P>';
		echo '<Input type = "Submit" Name = "Submit1" Value = "Submit Ratings">';
		echo '</FORM>';
		
	}
	
?>