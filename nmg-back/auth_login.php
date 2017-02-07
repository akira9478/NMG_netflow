<?php

function check_auth_ldap () {

	
	$host = "/";
	$sessionTimeout = 1200;
  	$ldapServer = 'ldaps://ldapserver';

  	if (!isset($_SESSION)) session_start();

  	if (!empty($_SESSION['lastact']) && $_SESSION['lastact'] > time() - $sessionTimeout) {

    // Session is already authenticated
    $ds = ldap_connect($ldapServer);
    ldap_set_option($ds,LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option(NULL, LDAP_OPT_DEBUG_LEVEL, 7);
    $ldaprdn  = 'uid='.$_SESSION['username'].',ou=,dc='; 
      if (ldap_bind($ds, $ldaprdn , $_SESSION['password'])) {
      $_SESSION['lastact'] = time();
      return $ds;
    } else {
      unset($_SESSION['lastact'], $_SESSION['username'], $_SESSION['password']);
      header("Location: ".$host."login.php");
      exit;
    }

  } else if (isset($_POST['user'], $_POST['passwd'])) {
  	$ldapid =$_POST['user'];
	$ldaprdn  = 'uid='.$ldapid.',ou=,dc=';     // ldap rdn or dn
	$ldappass = $_POST['passwd'];  // associated password
    // Handle login requests
    $ds = ldap_connect($ldapServer);
    ldap_set_option($ds,LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option(NULL, LDAP_OPT_DEBUG_LEVEL, 7);
    if (ldap_bind($ds, $ldaprdn, $ldappass)) {
      // Successful auth
      $_SESSION['lastact'] = time();
      $_SESSION['username'] = $ldaprdn;
      $_SESSION['password'] = $ldappass;
      return $ds;
    } else {
      // Auth failed
      header("Location: ".$host."login.php");
      exit;
    }

  } else {

    // Session has expired or a logout was requested
    unset($_SESSION['lastact'], $_SESSION['username'], $_SESSION['password']);
    header("Location: ".$host."login.php");
    exit;

  }

}




?>
