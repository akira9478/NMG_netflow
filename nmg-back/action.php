<?php
header('Content-Type: application/json;charset=utf-8');

include("mysql.php");

$jarray = array();//使用array儲存結果，再以json_encode一次回傳
if($value != ""){
       $sql = "SELECT INET_NTOA(`ban_ip`) as ip, `ban_time`, `ban_reason`  FROM `ban_table`";
	        $result = $con->query($sql);
		if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$jarray[] = $row;        
			}
		}else{}
}else{
        echo 0;
    return;
}
echo json_encode($jarray);
$con->close();
return;
?>
