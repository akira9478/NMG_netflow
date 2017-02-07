
<?php
include("top.php");
include("mysql.php");


$day = date("Ymd");
$timestamp = time();
$url = "./flow.php?TIME=";

// Create connection

// Check connection

  //每日流量TOP20
	//if get time then show the day else default today
	if (isset($_GET['TIME']))
	{
		$timestamp = mysqli_real_escape_string($con,$_GET['TIME']);
		$sql = "SELECT NO,IP,In_Flows,Out_Flows,Total_Flows FROM flow_". date("Ymd",$timestamp) ." WHERE NO BETWEEN 1 AND 20;";
	}
	else
		$sql = "SELECT NO,IP,In_Flows,Out_Flows,Total_Flows FROM flow_". $day ." WHERE NO BETWEEN 1 AND 20;";

		echo "<div class=\"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main\">

			<h2>" . date("Y/m/d",$timestamp) . " TOP 20</h2>

			<div id=\"\">
				<button onclick=\"self.location.href='".$url.($timestamp-86400)."'\" class=\"btn btn-lg btn-default\">←</button>
				<button style=\"\" onclick=\"self.location.href='".$url.($timestamp+86400)."'\" class=\"btn btn-lg btn-default\">→</button>
			</div>
			<table class=\"table table-bordered table-hover\" border=\"1\">
			<tbody>
			<tr class=\"\">
				<th>NO</th>
				<th>IP</th>
				<th>In_Flows</th>
				<th>Out_Flows</th>
				<th>Total_Flows</th>
			</tr>";

	if($result = mysqli_query($con,$sql))
	{
		$flag=false;
		// output data of each row
		while($row = $result->fetch_assoc())
		{
		if(!$flag){
			if($row["IP"]=="except_ip" || $row["IP"]=="google_vectorIP" || $row["IP"]=="except_ip"){
				echo "<tr class=\"info\"><td>" . $row["NO"]. "</td><td>" . $row["IP"]. "</td><td>" . number_format($row["In_Flows"]) . "</td><td>" . number_format($row["Out_Flows"]) . "</td><td>" . number_format($row["Total_Flows"]) . "</td></tr>";
				$flag=true;
			}else{
				echo "<tr class=\"danger\"><td>" . $row["NO"]. "</td><td>" . $row["IP"]. "</td><td>" . number_format($row["In_Flows"]) . "</td><td>" . number_format($row["Out_Flows"]) . "</td><td>" . number_format($row["Total_Flows"]) . "</td></tr>";
			}
		}else{
			if($row["IP"]=="except_ip" || $row["IP"]=="google_vectorIP" || $row["IP"]=="except_ip")
				echo "<tr class=\"info\"><td>" . $row["NO"]. "</td><td>" . $row["IP"]. "</td><td>" . number_format($row["In_Flows"]) . "</td><td>" . number_format($row["Out_Flows"]) . "</td><td>" . number_format($row["Total_Flows"]) . "</td></tr>";
			else if(($row["Out_Flows"] == 0) || ($row["In_Flows"]== 0) )
				echo "<tr class=\"danger\"><td>" . $row["NO"]. "</td><td>" . $row["IP"]. "</td><td>" . number_format($row["In_Flows"]) . "</td><td>" . number_format($row["Out_Flows"]) . "</td><td>" . number_format($row["Total_Flows"]) . "</td></tr>";
			else if(!(strpos($row["IP"],"xxx.xxx") === 0))
				echo "<tr class=\"warning\"><td>" . $row["NO"]. "</td><td>" . $row["IP"]. "</td><td>" . number_format($row["In_Flows"]) . "</td><td>" . number_format($row["Out_Flows"]) . "</td><td>" . number_format($row["Total_Flows"]) . "</td></tr>";
			else
				echo "<tr class=\"active\"><td>" . $row["NO"]. "</td><td>" . $row["IP"]. "</td><td>" . number_format($row["In_Flows"]) . "</td><td>" . number_format($row["Out_Flows"]) . "</td><td>" . number_format($row["Total_Flows"]) . "</td></tr>";
		}


		}
	}
	echo "</tbody></table></div>";

$con->close();
include("bottom.php");
?>
