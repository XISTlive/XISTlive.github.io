<?php 
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "doyoon.one@gmail.com";
    $to = "doyoon@xist.tv";
    $subject = "PHP Mail Test script";
    $message = "This is a test to check the PHP Mail functionality";
    $headers = "From:" . $from;

    $mail = mail($to,$subject,$message, $headers);
    if ($mail) { echo "Email sent"; }
      else { echo "Didn't send"; }

?>