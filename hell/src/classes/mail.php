<?php

require_once '/var/www/html/swift/lib/swift_required.php';

class Mail
{

	public static function send($to, $subject, $message)
	{

	    //echo $to;
        //echo $subject;
        //echo $message;
		/** Code pulled from Shasi Kanth's answer on https://stackoverflow.com/questions/712392/send-email-using-the-gmail-smtp-server-from-a-php-page
		*/
        $config = config_reader::getEnv();

		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, "tls")
		  ->setUsername($config['emailuser'])
		  ->setPassword($config['emailpass']);

		$mailer = Swift_Mailer::newInstance($transport);

		$message = Swift_Message::newInstance($subject)
		  ->setFrom(array('donotreply@hell.ca' => 'Hell\'s Tech Support'))
		  ->setTo(array($to))
		  ->setBody($message);

		$result = $mailer->send($message);
	}




}




