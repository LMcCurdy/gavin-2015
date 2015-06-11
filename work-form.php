<?php 

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname']; 
$company = $_POST['company']; 
$email = $_POST['email']; 
$phone = $_POST['phone']; 
$besttime = $_POST['besttime']; 



	$subject = "Work With Gavin - " . stripslashes($_POST['firstname']) ."";
	
	$to = "marnold@gavinadv.com"; 
	$cc = 'info@gavinadv.com';

	$headers = "From: " . strip_tags($_POST['firstname']). "<" .strip_tags($_POST['email']). ">\r\n";
	$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
	$headers .= "Cc: $cc \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	// Now here we setting up the message of the mail
	$body = '<html>';
	$body .= '<head><style type="text/css">
		body{
			font-family: "Helvetica Neue", Helvetica, arial;
			color:#888182;
			background:#fff;
			font-size:14px;
			padding-top:10px;
			line-height:18px;
		}
		h1{
			margin:0px;
			font-family: "Helvetica Neue", Helvetica, arial;
			font-weight: 200;
			color:#fff;
			font-size:20px;
			background-color:#f5821f;
			padding-top:15px;
			padding-bottom:15px;
			text-align:center;
		}
		.small-text{
			font-size: 12px !important;
			color:#bcbcbc;

		}
		a{
			color: #f5821f;
			font-weight: bold;
			text-decoration: none;
			border-bottom: #d4cbcd 1px dotted;
			-webkit-transition: all 0.25s ease-in-out;
			-o-transition: all 0.25s ease-in-out;
			transition: all 0.25s ease-in-out;
			cursor:pointer;
		}
		a:hover{
			color:#f5821f;
		}
		hr{
			background:1px solid #888182;
			height:1px;
			display:inline-block;
			width:100%;
			margin:10px 0;
		}
	</style></head>';
	$body .= '<body>';
	$body .= "<h1>SOMEONE WANTS TO WORK WITH GAVIN!</h1>";
	$body .= "<p><strong>" . stripslashes($_POST['firstname']) . " " . stripslashes($_POST['lastname']) . "</strong></p>";
	
	//$body .= "<p><strong>Contact Information</strong><br>" . strip_tags($_POST['street_address']) . "<br>" . strip_tags($_POST['city']) . ", " . strip_tags($_POST['state']) . " " . strip_tags($_POST['zip']) . "<br />";
	$body .= $phone . "<br />";
	$body .= "Best Time To Reach You: " . $besttime . "<br />";
	$body .= $company . "<br />";
	$body .= "<a href='mailto:$email'>" . strip_tags($_POST['email']) . "</a></p>";
	
	$body .= "<br /><strong>Project Details</strong><hr /><br />";
	
	$body .= "Type of Project:";
	$body .= '<ul>';
	foreach($_POST['project'] as $project) {
		$body .= '<li>'.$project .'</li>';
	}
	$body .= '</ul>';

	
	//$body .= "<div style='width:100%;display:inline-block;height:1px;background:#f9f9f9;margin:5px auto;'></div>";
	$body .= "<p class=\"small-text\">Email template designed and developed by <a href=\"http://www.gavinadvertising.com\">Gavin Advertising</a></p>";
	$body .= "</body></html>";


// Send mail
$result=mail($to, $subject, $body, $headers); 
if($result){ 
	 echo "<meta http-equiv=\"refresh\" content=\"0;URL=thank-you.php\">";
}
else{ 
	echo "<p>We're sorry, your message was not sent.</p>"; 
}  

?>