<?php
require_once 'config.php';
require_once 'lib/Services/Twilio.php';


$db_handle = mysql_connect($server, $username, $password);
mysql_select_db($database, $db_handle);


$timeNow = time();
$timePlusMinute = $timeNow + 60;

echo "timeNow ".$timeNow;
echo "timeLater ".$timePlusMinute;

$entries = mysql_query("SELECT * FROM reminders WHERE delivered = 0 AND delivery_time > '$timeNow' AND delivery_time < '$timePlusMinute'");

/*
print_r(mysql_fetch_assoc($entries));
echo "<br/>";*/


$client = new Services_Twilio($twilioSid, $twilioTok);
while($data = mysql_fetch_assoc($entries)) {
	$phone = $data["phone"];
	$phone = "+1".$phone;
	
	$message = $data["message"];
	$id = $data["id"];


	//update entry so that we dont redilver	
	mysql_query("UPDATE reminders SET delivered=1 WHERE id='$id'");

	$message = $client->account->sms_messages->create(
		'+18134457693',
		$phone,
		$message
	);
		
	

	
}

?>



