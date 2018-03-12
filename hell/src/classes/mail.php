<?php

class Mail
{

	public static function send($to, $subject, $message, $headers="", $parameters="")
	{
		$msg = wordwrap($message, 70);
		mail($to, $subject, $msg, $headers, $parameters);
	}




}




