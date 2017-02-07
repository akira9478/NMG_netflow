
<?php
//snort警告字串分析
include("auth_login.php");
$ds = check_auth_ldap();
$delimiter = "\n";

$i = 1;

$fp = fopen( '/var/log/snort/alert', 'r' );
while ( !feof ( $fp) )
{
	$buffer = stream_get_line( $fp, 1024, $delimiter );
	
	$detail=explode(" ",$buffer);
	if($detail[0]==NULL){
		break;
	}
		
	$j=0;
	/*while($detail[$j]!=NULL){
		echo "data[".$j."]-> " . $detail[$j]."<br>";
		$j++;
	}*/
	print_r($detail);
	echo "<br>";
	$i++;
	$buffer = '';

}


?>
