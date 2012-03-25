<?php
require_once 'config.php';
echo "hello";

$db_handle = mysql_connect($server, $username, $password);
mysql_select_db($database, $db_handle);


$time = $_POST["time"];
$phone = $_POST["phone"];
$message = $_POST["message"];


mysql_query("INSERT INTO reminders (phone, message, delivery_time) VALUES ('$time', '$phone', '$message')");

?>
