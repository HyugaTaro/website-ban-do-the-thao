<?php
session_start();
include"connection/connection.php"; # Connect To the database
$active_sessions = 0;
$minutes = 5; # period considered active
if($sid = session_id()) # if there is an active session
{
# DB connect here
$ip = $_SERVER['REMOTE_ADDR']; # Get Users IP address
# Delete users from the table if time is greater than $minutes
mysqli_query($con,"DELETE FROM `active_sessions` WHERE
`date` < DATE_SUB(NOW(),INTERVAL $minutes MINUTE)")or die(mysqli_error());
# Check to see if the current ip is in the table
$sql = mysqli_query($con,"SELECT * FROM active_sessions WHERE ip='$ip'");
$row = mysqli_fetch_array($sql);
# If the ip isn't in the table add it.
if(!$row){
mysqli_query($con,"INSERT INTO `active_sessions` (`ip`, `session`, `date`)
VALUES ('$ip', '$sid', NOW()) ON DUPLICATE KEY UPDATE `date` = NOW()")or die(mysqli_error());
}
# Get all the session in the table
$sessions = mysqli_query($con,'SELECT * FROM `active_sessions`')or die(mysqli_error());
# Add up all the rows returned
$active_sessions = mysqli_num_rows($sessions);
}
# Print the final result
echo'<img src="images/Icon/icontruycap.png" width:"100px" height="100px"/><b style="font-size:20px;">Số người đang truy cập: </b>'.$active_sessions;
?>