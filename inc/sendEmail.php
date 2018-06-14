﻿<?php

// Replace this with your own email address
$siteOwnersEmail = 'team@xist.tv';


if($_POST) {

   $name = trim(stripslashes($_POST['contactName']));
   $company = trim(stripslashes($_POST['contactCompany']));
   $email = trim(stripslashes($_POST['contactEmail']));
   $mobile = trim(stripslashes($_POST['contactMobile']));

   // Check Name
	if (strlen($name) < 2) {
		$error['name'] = "Please enter your name.";
	}
	// Check Company
 if (strlen($company) < 2) {
	 $error['company'] = "Please enter your company name.";
 }
 // Check Email
 if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
	 $error['email'] = "Please enter a valid email address.";
 }
 // Check Mobile
 /*
if (strlen($mobile) < 2) {
	$error['name'] = "Please enter a mobile number.";
}
*/


   // Set Message
   $message .= "Email from: " . $name . "<br />";
	 $message .= "Company: " . $company . "<br />";
	 $message .= "Email address: " . $email . "<br />";
	 $message .= "Mobile: " . $mobile . "<br />";
   $message .= "<br /> ----- <br /> This email was sent from your site's contact form. <br />";

   // Set From: header
   $from =  $name . " <" . $email . ">";

   // Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


   if (!$error) {

      ini_set("sendmail_from", $siteOwnersEmail); // for windows server
      $mail = mail($siteOwnersEmail, $subject, $message, $headers);

     // @mail($siteOwnersEmail, $subject, $message, $headers);

		if ($mail) { echo "OK"; }
      else { echo "Something went wrong. Please try again."; }

	} # end if - no validation error

	else {

		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['company'])) ? $error['company'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;

		echo $response;

	} # end if - there was a validation error

}
// create email headers


?>
