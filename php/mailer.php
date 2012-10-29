<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
class mailer {
	
	private static $responder_email,$email_subject,$email_message,$headers,$sender_email,$sender_name;
	
	// constructer method of mailer class
	public function __construct($responder_email,$email_subject,$email_message,$sender_email,$sender_name){
		self::$responder_email	= $responder_email;
		self::$email_subject	= $email_subject;
		self::$email_message	= $email_message;
		self::$sender_email		= $sender_email;
		self::$sender_name		= $sender_name;

		self::setHeaders();
		}
	
	// Sending mail method
	public function sendMail(){
		// if not fails sending mail
		if(mail(self::$responder_email,self::$email_subject,self::$email_message,self::$headers)){
			echo "Mail has sent";
			}// if fails sending mail
			else{
				echo "ERROR::Sending mail failed..!";
				}
		}	
	
	// setter method of Headers
	private static function setHeaders(){
		$headers= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'To: Alıcı 1 <'.self::$responder_email.'>' . "\r\n";
		$headers .= 'From: '.self::$sender_name.' <'.self::$sender_email.'>' . "\r\n";
		$headers .= 'Reply-To: Yanit E-Postasi <'.self::$responder_email.'>' . "\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
		$headers .= 'Cc: '.self::$responder_email. "\r\n";
		//$headers .= 'Bcc: gizlikopya@eposta.com' . "\r\n";
		self::$headers = $headers;
		}
		
	// getter method of Headers	
	private static function getHeaders(){
		return self::$headers;
		}
			
	
	}


/*$gonderen	= 'yakup@yakupkadri.com';
$alici		= 'ynsekiz@gmail.com';
$konu 		= 'merhaba canim nasilsin';
$mesaj		= 'nasil gidiyor isler gücler';
$bisey		= 'şu an bnişey gösteriyorum';
$mailer = new mailer($alici,$konu,$mesaj,$gonderen);
$mailer->sendMail();*/

?>

</body>
</html>