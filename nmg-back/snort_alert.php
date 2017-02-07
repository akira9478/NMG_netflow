
<?php
include("top.php");

$buffer=NULL;
$delimiter = "\n";

$i = 1;

$fp = fopen( '/var/log/snort/alert', 'r' );
echo "
			
			<h2>Snort Alert</h2>
			<table class=\"table table-bordered table-hover\" border=\"1\">
			<tbody>";
while ( !feof ( $fp) )
{
	$buffer = stream_get_line( $fp, 1024, $delimiter );
	
	$detail=explode(" ",$buffer);
	if($detail[0]==NULL){
		break;
	}
	$j=0;
	while(!preg_match("/^tfchost/",$detail[$j]) && !preg_match("/^192.168/",$detail[$j]) ){
	              $j++;
	}
	$date=$j+1;



	echo "	<td rowspan=6>" . substr($detail[$date],0,14). "</td>
			<tr>
			<th>攻擊行為</th>
			<td colspan=3>";
	$j=0;
	while($detail[$j]!="[**]"){
		$j++;
	}
	$number=$j+1;
	$j=$number+1;
	while($detail[$j]!="[**]"){
		echo " " . $detail[$j];
		$j++;
	}
	$j++;
	echo "</td></tr><tr><th>嘗試動作</th><td colspan=3>";
	while(!preg_match("/]$/",$detail[$j])){
		echo " " . $detail[$j];
		$j++;
	}
	echo $detail[$j] . "</td></tr><tr>
			<th>編號/Flag/Protocol</th>
				<td>" . $detail[$number] . "</td>
			<td>" . $detail[$j+1] . $detail[$j+2] . "</td>
			<td>" . $detail[$j+3] . "</td></tr><tr>
			<th>Source IP</th><td colspan=3>" . $detail[$j+4] . "</td></tr><tr>
			<th>Destination IP</th><td colspan=3>" . $detail[$j+6] . "</td></tr>
			</tr>";

	$i++;
	$buffer = '';

}


include("bottom.php");
?>

