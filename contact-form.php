<!---<?php
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$message = $_POST['message'];
	
	$email_from = 'shuttle876@gmail.com';
	
	$email_subject = "New Form Submission";
	
	$email_body = "User Name: $name.\n".
		        "User Email: $ visitor_email.\n".
		        "User Message: $message.\n";

	$to = "shuttle876@gmail.com";
	
	$headers = "From: $email_from \r\n";
	
	$headers .= "Reply-To: $vistor_email \r\n";
	
	mail($to,$email_subject,$email_body,$headers);
	
	header("Location: index.html");

?>-->

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;


$pp = new FormHandler(); 

$validator = $pp->getValidator();
$validator->fields(['Name','Email'])->areRequired()->maxLength(50);
$validator->field('Email')->isEmail();
$validator->field('Message')->maxLength(6000);




$pp->sendEmailTo('shuttle876@gmail.com'); // ← Your email here

echo $pp->process($_POST);
