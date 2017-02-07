<?php
//違規名單製作頁面
?>
<!DOCTYPE html>
<html>
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>東海大學資工系網管小組</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">     
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- datetimepicker -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script> 
    <link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script> 
                     
    <link href="../bootstrap/css/carousel.css" rel="stylesheet">

</head>
<body>
<div class="container" role="main">
<table class="table table-hover">
<thead>
<tr>
<th>#</th>
<th>IP</th>
<th>違規時間</th>
<th>違規原因</th>
</tr>
</thead>
<tbody id="ban">
<?php
include("../mysql.php");
$sql="SELECT INET_NTOA(`ban_ip`) as ip, `ban_time`, `ban_reason`  FROM `ban_table`";
$result=$con->query($sql);
$i=1;
while($row = $result->fetch_assoc()){
	$ip = $row["ip"];
	$time = $row["ban_time"];
  $reason = $row["ban_reason"];
	 echo '<tr>';
   echo '<td>'.$i.'</td>';
   echo '<td>'.$ip.'</td>';
   echo '<td>'.$time.'</td>';
   echo '<td>'.$reason.'</td>';
   echo '</tr>';
   $i++;
}
?>
</tbody>
</table>

</div>
<div class="container" role="form">

 <form class="form-horizontal" action="" method="POST">
 
  <div class="form-group">
    <label for="ip">違規IP</label>
    <div class="container">
    <input type="text" class="form-control" id="ip" name="ip" placeholder="140.128.XXX.XXX">
  </div>
  </div>
   
  <div class="form-group">
    <label for="time">違規時間</label>
    
<div class="container">
<div class="row">
        <div class='col-sm-6'>
                <div class='input-group date' id='datetimepicker'>
    <input type='text' class="form-control" name="time" data-date-format="YYYY-MM-DD HH:mm:ss" />
     <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
       <script type="text/javascript">
            $('#datetimepicker').datetimepicker();
        </script> 
        </div>
         </div>
        </div>
        </div>
  </div>
  
  <div class="form-group">
    <label for="reason">違規原因</label>
    <div class="container"> 
    <textarea class="form-control" rows="3"  id="reason" name="reason" placeholder="備註....."></textarea>
  </div>
  </div>
  <button type="submit" id="new" class="btn btn-default">新增</button>
</form>
<?php
if(!empty($_POST['ip'])){
$ip=mysqli_real_escape_string($con,$_POST['ip']);//get ajax data 'lv'
$time=mysqli_real_escape_string($con,$_POST['time']);//get ajax data 'lv'
$text=mysqli_real_escape_string($con,$_POST['reason']);//get ajax data 'lv'


$sql = "INSERT INTO `ban_table` (`ban_ip`,`ban_time`,`ban_reason`) VALUES (INET_ATON('$ip'),'$time','$text');";

if ($con->query($sql) == TRUE) {
    echo "<div>New record created successfully</div>";
} else {
    echo "<div>Error: " . $sql . "<br>" . $con->error . "</div>";
}
$con->close();
header("location:".$_SERVER['PHP_SELF']);
}
?> 
</div>
</body>
</html>
