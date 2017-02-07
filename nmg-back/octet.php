<?php

include("top.php");
include("mysql.php");

$day = date("Ymd");
$timestamp = time();
$url = "./octet.php?TIME=";



function cal($bytes) 
{
	if($bytes / 1073741824 >= 1)
		$bytes=number_format($bytes / 1073741824,2) . "GB";
	else if($bytes / 1048576 >= 1)
		$bytes=number_format($bytes / 1048576,2) . "MB";
	else if($bytes / 1024 >= 1)
		$bytes=number_format($bytes / 1024,2) . "KB";
	else
		$bytes=$bytes . "Bytes";
	return $bytes;
}


//get specific NO
if (isset($_GET['NO']))
{
	$num=mysqli_real_escape_string($con,$_GET['NO']);
	$sql = "SELECT NO,IP,In_Octets,Out_Octets,Total_Octets FROM octet_". $day . " WHERE NO = " .$num. ";";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc())
	echo $row["IP"] ." ". $row["Total_Octets"];
}

else 
{
	//if get time then show the day else default today
	if (isset($_GET['TIME']))
	{
		$timestamp = mysqli_real_escape_string($con,$_GET['TIME']);
		$sql = "SELECT NO,IP,In_Octets,Out_Octets,Total_Octets FROM octet_". date("Ymd",$timestamp) ." WHERE NO BETWEEN 1 AND 20;";
	}
	else
		$sql = "SELECT NO,IP,In_Octets,Out_Octets,Total_Octets FROM octet_". $day ." WHERE NO BETWEEN 1 AND 20;";
		
		echo "
			
			<h2>" . date("Y/m/d",$timestamp) . " TOP 20</h2>
			
			<div>			
				<button onclick=\"self.location.href='".$url.($timestamp-86400)."'\" class=\"btn btn-lg btn-default\">←</button>		
				<button style=\"\" onclick=\"self.location.href='".$url.($timestamp+86400)."'\" class=\"btn btn-lg btn-default\">→</button>
			</div>
			<table class=\"table table-bordered table-hover\" border=\"1\">
			<tbody>
			<tr class=\"\">
				<th>NO</th>
				<th>IP</th>
				<th>In_Octets</th>
				<th>Out_Octets</th>
				<th>Total_Octets</th>
			</tr>";

	if($result = mysqli_query($con,$sql))
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			//show TOP 20
			if($row["NO"] >20)
			break;
		
			echo "<tr class=\"active\"><td>" . $row["NO"]. "</td><td>" . $row["IP"]. "</td><td>" . cal($row["In_Octets"]) . "</td><td>" . cal($row["Out_Octets"]) . "</td><td>" . cal($row["Total_Octets"]) . "</td></tr>";
		}
	} 
	echo "</tbody></table>";
}
$con->close();

include("bottom.php");

?>
