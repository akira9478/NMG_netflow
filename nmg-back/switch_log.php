
<?php
include("top.php");

//switch的紀錄

$buffer=NULL;
$delimiter = "\n";

$line = 1;//避免為空值
echo "
			
			<h2>Switch log</h2>
			<table class=\"table table-bordered table-hover\" border=\"1\">
			<tbody>";
echo "<tr>
		<th>日期</th>
		<th>時間</th>
		<th>主機</th>
		<th>行為</th>
		<th>描述</th>
		<th>MAC</th>
		<th>Port號</th>
		</tr>";

$line = count(file('/var/log/switch.log'))-1; /* count 總資料行數最大值 */
$array = file('/var/log/switch.log'); /* array 總資料陣列 */
$flag_mac = false; /* flag 此行是否沒有IP相關 */
$old = false;/* flag 此行是否為舊資料 */
$old_count = 10;/* count */
$today = date("j");/* 今天日期 */
$thismonth = date("M");/* 今天月份 */
$ip_rule="/^((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))*$/";
$act_rule="/^vlan/";
$port_rule="/^g/";
$mac_rule="/^source/";
/* 行數大於0才會運作 */
while ( $line>0 )
{

	/* 倒數開始每行 把第$line行整行給$buffer 全部切割後給$detail陣列 */
	$buffer = $array[$line];
	$detail=explode(" ",$buffer);
	if($detail[0]==NULL || $detail[4]==="--"){
		break;
	}
//print_r($detail);
	$i=0;
	$month = $detail[$i];/* 第一格必定是月份 */
	$i++;
	if($detail[1]==NULL){$i++;}
	
	$day = $detail[$i]; /* 第二格必定是日期 */
	$i++;
	$time = $detail[$i]; /* 第三格必定是時間 */
	$i++;
	$host = str_replace ("192.168.xx.","",$detail[$i]); /* 第四格必定是主機 */
	$i++;
	$act = '';

	$real_act = $detail[$i];
	if($real_act==':'){$i++;$real_act = $detail[$i];}

	$j=$i+1;
	/* 收集行為的每個單字 若為IP或網卡br0則跳出 */
	$flag_mac=false;
	while(isset($detail[$j])){
		if(preg_match($act_rule, $detail[$j])){
		$flag_mac=true;
		}else if(preg_match($port_rule, $detail[$j])){
			$port=$detail[$j];
		}else if(preg_match($mac_rule, $detail[$j])){
			$flag_mac=true;
			$j+=3;
			//$mac=$detail[$j];
			$mac=$detail[$j];
			break;
		}
		if(!$flag_mac)
		$act = $act . " " . $detail[$j];

		$j++;
	}
	$real_act=str_replace (":","",$real_act);
	
	if(isset($act))
	$act = str_replace(":"," ",$act);
	else{$act='';}
	if($flag_mac)
	$mac = str_replace(","," ",$mac);
	if(isset($port))
	$port = str_replace(","," ",$port);
	else{$port='';}
	
	if($day!=$today || $month!=$thismonth){
		$old=true;
	} /* 判斷該行是否為舊資料 */

//找舊的$old_count行筆資料
if($old && $old_count>=0){
//找flip flop 標整行紅色


echo "<tr  class=\"warning\">";

echo "	<td>".$month." ".$day."</td>
		<td>".$time."</td><td>".$host."</td>
		";

if(!$flag_mac)
echo "<td>".$real_act."</td>
<td colspan=\"2\">".$act."</td>
		<td>".$port."</td>
		</tr>";
	else{
echo "<td>".$real_act."</td>
<td>".$act."</td>
	<td>".$mac."</td>
	<td>".$port."</td>
		</tr>";

	}
		$old_count--; /* 檔案舊資料行數倒數 */
		$line--; /* 檔案資料行數倒數 */
		continue;
}else if($old_count<0){
	break; /* 舊資料印完跳出迴圈 */
}
//找flip flop 標整行紅色

echo "<tr  class=\"\">"; /* 今日新資料 */

echo "	<td>".$month." ".$day."</td>
		<td>".$time."</td>
		<td>".$host."</td>";
if(!$flag_mac)
echo "<td>".$real_act."</td>
<td colspan=\"2\">".$act."</td>
		<td>".$port."</td>
		</tr>";
	else{
echo "<td>".$real_act."</td>
<td>".$act."</td>
	<td>".$mac."</td>
	<td>".$port."</td>
		</tr>";

	}


	$line--;
	$buffer = '';//清空$buffer

}
//print_r(file("/var/log/switch.log")); /*印出資料用*/


include("bottom.php");
?>
</div>
