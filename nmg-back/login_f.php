<?php
//登出LDAP
	session_start();
	unset($_SESSION['lastact'], $_SESSION['username'], $_SESSION['password']);
	      header("Location: login.php");
?>
