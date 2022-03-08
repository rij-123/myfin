<?php

if(!$_POST) exit;

// Email address verification, do not edit.
function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$name     = $_POST['name'];
$email    = $_POST['email'];
//$surname    = $_POST['surname'];
$phone    = $_POST['phone'];
$comments = $_POST['comments'];
//$verify = $_POST['verify'];
$headermai = 'noreply@godrejkandivalinest.com';

if(trim($name) == '') 			{echo '<div class="error_message">Please enter your name.</div>';exit();}
else if(trim($email) == '') 	{echo '<div class="error_message">Please enter a valid email address.</div>';exit();}
else if(!isEmail($email)) 		{echo '<div class="error_message">Attention! This is invalid E-mail Address. Please try again.</div>';exit();}
//else if(trim($company) == '')   {echo '<div class="error_message">Please enter company  name.</div>';exit();}
else if(!is_numeric($phone))    {echo '<div class="error_message">Attention! Phone number only with digits.</div>';exit();}  
else if(trim($comments) == '')  {echo '<div class="error_message">Please enter your message.</div>';exit();}   
//else if(trim($purpose) == '')  {echo '<div class="error_message">Please select your purpose.</div>';exit();} 
//else if(!isset($verify) || trim($verify) == '') {echo '<div class="error_message">Attention! Please enter the verification number.</div>';exit();}
//else if(trim($verify) != '8')   {echo '<div class="error_message">Attention! The verification number you entered is incorrect.</div>';exit();}

if(get_magic_quotes_gpc()) {
	$comments = stripslashes($comments);
}

$toaddress = "rconnect@myfintrans.com";  //kamblevinod33@gmail.com  //projects2vk@gmail.com //pankaj.realdeals@gmail.com

$e_subject = 'Godrej At Chandivali New Booking By ' . $name . '.';

$message = '<!DOCTYPE HTML>
	<html>
	<head>From Popup Form</head>
	<body>
	<table>
	    <tr><td>Name:</td><td>' . $name . '</td></tr>
		<tr><td>Email:</td><td>' . $email . '</td></tr>
		<tr><td>Phone:</td><td>' . $phone . '</td></tr>
		<tr><td>Message:</td><td>' . nl2br($comments) . '</td></tr>
	</table>
	</body>
	</html>';
$headers = "From: $name" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "CC: projects2vk@gmail.com" . "\r\n";
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if(mail($toaddress, $e_subject, $message, $headers)) {

	// Email has sent successfully, echo a success page.

	echo "<fieldset>";
	echo "<div id='success_page'>";
	echo "<h1>Email Sent Successfully.</h1>";
	echo "<p>Thank you <strong>$name</strong>, your message has been submitted to us.</p>";
	echo "</div>";
	echo "</fieldset>";

} else {

	echo 'ERROR!';

}


?>