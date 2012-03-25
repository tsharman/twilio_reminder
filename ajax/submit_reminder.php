<?php
require_once 'config.php';

$db_handle = mysql_connect($server, $username, $password);
mysql_select_db($database, $db_handle);


$timeVal = $_POST["timeVal"];
$timeUnit = $_POST["timeUnit"];
$phone = $_POST["phone"];
$message = $_POST["message"];

//processing time

$time = strtotime("+".$timeVal." ".$timeUnit);


mysql_query("INSERT INTO reminders (phone, message, delivery_time) VALUES ('$phone', '$message', '$time')");


/*
$client = new Services_Twilio($twilioSid, $twilioTok);
$message = $client->account->sms_messages->create(
	'+18134457693',
	'+17326667966',
	"Hello good sir!"
);
*/
?>
