<?php
header('Content-Type: application/json;charset=utf-8');

include("mysql.php");

$ip=mysqli_real_escape_string($con,$_POST['ip']);//get ajax data 'lv'
$time=mysqli_real_escape_string($con,$_POST['time']);//get ajax data 'lv'
$text=mysqli_real_escape_string($con,$_POST['reason']);//get ajax data 'lv'

       $sql = "INSERT INTO `ban_table` (`ban_ip`,`ban_time`,`ban_reason`) VALUES (INET_ATON('$ip'),'$time','$text');";
	        $result = $con->query($sql);
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
return;
?>
