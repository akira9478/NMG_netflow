<?php
session_start();

if(!isset($_SESSION['username']))
{
echo "<html lang=\"en\"><head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Login to Netflow_MG</title>

    <!-- Bootstrap core CSS -->
    <link href=\"../bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">

    <!-- Custom styles for this template -->
    <link href=\"../bootstrap/css/signin.css\" rel=\"stylesheet\">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src=\"../../assets/js/ie8-responsive-file-warning.js\"></script><![endif]-->
    <style type=\"text/css\"></style>
    <script src=\"../bootstrap/js/ie-emulation-modes-warning.js\"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
  </head>

  <body>

    <div class=\"container\">

      <form class=\"form-signin\" method=\"post\" action=\"ldap.php\">
        <h2 class=\"form-signin-heading\">Login</h2>
        <label for=\"user\" class=\"sr-only\">LDAP User</label>
        <input type=\"text\" name=\"user\" class=\"form-control\" placeholder=\"Username\" required=\"\" autofocus=\"\">
        <label for=\"inputPassword\" class=\"sr-only\">Password</label>
        <input type=\"password\" name=\"passwd\" class=\"form-control\" placeholder=\"Password\" required=\"\">
        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Sign in</button>
        <a href=\"/index.php\">回Netflow</a>
      </form>


    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src=\"../bootstrap/js/ie10-viewport-bug-workaround.js\"></script>
  

<div class=\"tvister-overlay-wrapper\">
    <div class=\"tvister-overlay-show-btn\"><i class=\"tvister-icon-heart\"></i></div>
    <div class=\"tvister-overlay-inner\">
        <div class=\"tvister-overlay-inner-header\">
            <div class=\"tvister-overlay-logo\"></div>
            <div class=\"tvister-inner-close-btn\">
                <i class=\"tvister-icon-cancel\"></i>
            </div>
        </div>
        <div class=\"tvister-overlay-channel-info\">

        </div>
    </div>
</div></body></html>";
}else{
    $_SESSION['lastact'] = time();
    header("Location: index.php");
}
?>

