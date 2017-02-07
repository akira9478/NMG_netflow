
<?php
//include("auth_login.php");
//$ds = check_auth_ldap();

//$uid=$_SESSION['username'];

//<script src=\"http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js\"></script>   

$thu_url ="http://www.thu.edu.tw/upload_files/thu_calendar105-0713.pdf";
$irc_url ="http://webchat.freenode.net/?channels=#NMG-thu&uio=d4";
$back_url ="/nmg-back/";

echo "
<!DOCTYPE html>
<html>  
  <head>       
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />         
    <title>東海大學資工系網管小組     
    </title>         
    <!-- Bootstrap core CSS -->          
    <link href=\"bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">               
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->         
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>       
<script src=\"bootstrap/js/bootstrap.min.js\"></script> 
         
    <!-- datetimepicker -->       
<script src=\"http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js\"></script>             
    <link href=\"http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css\" rel=\"stylesheet\" type=\"text/css\" />     
<script src=\"http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js\"></script>            
    <link href=\"bootstrap/css/dashboard.css\" rel=\"stylesheet\">                           
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->          
    <!--[if lt IE 9]>
              <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
              <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
            <![endif]-->         
  </head>  
  <body>         
    <nav class=\"navbar navbar-inverse navbar-fixed-top\">             
      <div class=\"container-fluid\">                 
        <div class=\"navbar-header\">                                
          <a class=\"navbar-brand\" href=\"". htmlentities($_SERVER['PHP_SELF'])." \">NMG網管小組</a>                 
        </div>  
        <div id=\"navbar\" class=\"navbar-collapse collapse\">
          <ul class=\"nav navbar-nav navbar-right\">
            <li><a target=\"_blank\" href=\"".$irc_url."\">IRC頻道</a></li>
            <li><a target=\"_blank\" href=\"".$thu_url."\">東海105行事曆</a></li>
            <li><a href=\"".$back_url."\">登入</a></li>
            </ul>
        </div>
      </div> 
    </nav>         
    <div class=\"container-fluid\">             
      <div class=\"row\">                 
        <div class=\"col-sm-3 col-md-2 sidebar\">                     
          <ul class=\"nav nav-sidebar\">                         
            <li>              
              <a href=\"index.php\">流量圖                 
                <span class=\"sr-only\">(current)                 
                </span></a>            
            </li>   
            <li>            
            <a href=\"lab_3f.php\">ST3F_Lab流量圖</a>            
            </li>
            <li>            
            <a href=\"lab_4f5f.php\">ST4F&5F_Lab流量圖</a>            
            </li>                      
            <li>            
            <a href=\"octet.php\">Bytes_top20</a>            
            </li>                         
            <li>            
            <a href=\"flow.php\">Flows_top20</a>            
            </li>                         
                                    
            <li>            
            <a href=\"#\"></a>            
            </li>      
          </ul>                 
        </div>                 
";

?>
