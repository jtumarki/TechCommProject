<html>
<head>
<title>Radio Buttons</title>
<script src='jquery.js' type="text/javascript"></script>
<script src='jquery.MetaData.js' type="text/javascript" language="javascript"></script>
<script src='jquery.rating.js' type="text/javascript" language="javascript"></script>
<link href='jquery.rating.css' type="text/css" rel="stylesheet"/>
</head>
<body>
<Form name ="form1" Method ="POST" ACTION ="ratings.php">

<table>
<tr>
<td>How easy is the class?</td> 
<td>
<Input type = 'Radio' Name ='easiness' value= '1' class="star" />
<Input type = 'Radio' Name ='easiness' value= '2' class="star" />
<Input type = 'Radio' Name ='easiness' value= '3' class="star" />
<Input type = 'Radio' Name ='easiness' value= '4' class="star" />
<Input type = 'Radio' Name ='easiness' value= '5' class="star" /> </td>
</tr>

<tr>
<td>How helpful was the professor?</td>
<td> 
<Input type = 'Radio' Name ='helpful' value= '1' class="star">
<Input type = 'Radio' Name ='helpful' value= '2' class="star">
<Input type = 'Radio' Name ='helpful' value= '3' class="star">
<Input type = 'Radio' Name ='helpful' value= '4' class="star">
<Input type = 'Radio' Name ='helpful' value= '5' class="star"> </td>
</tr>

<tr>
<td>How interesting was the material?</td> 
<td><Input type = 'Radio' Name ='interest' value= '1' class="star">
<Input type = 'Radio' Name ='interest' value= '2' class="star">
<Input type = 'Radio' Name ='interest' value= '3' class="star">
<Input type = 'Radio' Name ='interest' value= '4' class="star">
<Input type = 'Radio' Name ='interest' value= '5' class="star"> </td>
</tr>

<tr>
<td>Rate the overall teaching quality:</td>
<td> 
<Input type = 'Radio' Name ='teaching' value= '1' class="star">
<Input type = 'Radio' Name ='teaching' value= '2' class="star">
<Input type = 'Radio' Name ='teaching' value= '3' class="star">
<Input type = 'Radio' Name ='teaching' value= '4' class="star">
<Input type = 'Radio' Name ='teaching' value= '5' class="star"> </td>
</tr>

<tr>
<td>Rate the overall course quality: </td>
<td><Input type = 'Radio' Name ='course' value= '1' class="star">
<Input type = 'Radio' Name ='course' value= '2' class="star">
<Input type = 'Radio' Name ='course' value= '3' class="star">
<Input type = 'Radio' Name ='course' value= '4' class="star">
<Input type = 'Radio' Name ='course' value= '5' class="star"> </td>
</tr>

</table>
<textarea rows="5" cols="20" name="comment" wrap="physical"></textarea>

        <?php
          require_once('recaptchalib.php');
          $publickey = "6Lc8qs8SAAAAAP2FWFnGDAePwSiCP74JmJ4gxj2n"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>

<P>
<Input type = "Submit" Name = "Submit1" Value = "Submit Ratings">
</FORM>

</body>
</html>