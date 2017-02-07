
<?php
include("top.php");

//ARP分析

$buffer=NULL;
$delimiter = "\n";

$line = 1;//避免為空值
echo "
			
			<h2>ARP Watch</h2>
			<table class=\"table table-bordered table-hover\" border=\"1\">
			<tbody>";
echo "<tr>
		<th>日期</th>
		<th>時間</th>
		<th>行為</th>
		<th>IP</th>
		<th>MAC</th>
		</tr>";

$line = count(file('/var/log/arpwatch'))-1; /* count 總資料行數最大值 */
$array = file('/var/log/arpwatch'); /* array 總資料陣列 */
$no_ip = false; /* flag 此行是否沒有IP相關 */
$old = false;/* flag 此行是否為舊資料 */
$old_count = 10;/* count */
$today = date("j");/* 今天日期 */
$thismonth = date("M");/* 今天月份 */
$ip_rule="/^((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))*$/";
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
	$host = $detail[$i]; /* 第四格必定是主機 */
	$i++;
	$act = '';
	$j=$i+1;
	/* 收集行為的每個單字 若為IP或網卡br0則跳出 */
	while(isset($detail[$j])){
		if(preg_match($ip_rule,$detail[$j])){
		$no_ip=false;
		break;
		}
		$act = $act . " " . $detail[$j];	
		$j++;
		$no_ip=true;
	}
	if(!$no_ip){ /* 有IP的情況下 $act下一個為IP 下下一個為MAC */
	$ip = $detail[$j];
	$mac = $detail[$j+1];
	}
	if($day!=$today || $month!=$thismonth){
		$old=true;
	} /* 判斷該行是否為舊資料 */

//找舊的$old_count行筆資料
if($old && $old_count>=0){
//找flip flop 標整行紅色
if($detail[5]=='flip')
echo "<tr  class=\"danger\">";
else
echo "<tr  class=\"warning\">";

echo "	<td>".$month." ".$day."</td>
		<td>".$time."</td>
		";

if($no_ip){
echo "<td colspan=\"3\">".$act."</td>
		</tr>";
}else{
echo "<td>".$act."</td>
		<td>".$ip."</td>
		<td>".$mac."</td>
		</tr>";
}
		$old_count--; /* 檔案舊資料行數倒數 */
		$line--; /* 檔案資料行數倒數 */
		continue;
}else if($old_count<0){
	break; /* 舊資料印完跳出迴圈 */
}
//找flip flop 標整行紅色
if($detail[5]=='flip')
echo "<tr  class=\"danger\">";
else
echo "<tr  class=\"\">"; /* 今日新資料 */

echo "
		<td>".$month." ".$day."</td>
		<td>".$time."</td>";
if($no_ip){
echo "<td colspan=\"3\">".$act."</td>
		</tr>";
}else{
echo "<td>".$act."</td>
		<td>".$ip."</td>
		<td>".$mac."</td>
		</tr>";
}

	$line--;
	$buffer = '';//清空$buffer

}
//print_r(file("/var/log/arpwatch")); /*印出資料用*/

include("bottom.php");
?>
