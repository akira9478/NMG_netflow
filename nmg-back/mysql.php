
<?php
//資料庫設定
//資料庫位置
$db_server = "localhost";
//資料庫名稱
$db_name = "";
//資料庫管理者帳號
$db_user = "";
//資料庫管理者密碼
$db_passwd = "";

$con = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//資料庫連線採UTF8
mysqli_query($con,"SET NAMES utf8");


?> 
